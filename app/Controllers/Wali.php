<?php

namespace Controllers;
use Resources, Models;

class Wali extends Resources\Controller
{
    public function __construct(){
        parent::__construct();
        $this->session = new Resources\Session;
        $this->walimodel = new Models\M_wali;
    }

    public function cek(){
        $ceklogin = $this->session->getValue('isLogin');
        return $ceklogin;
    }

    public function index(){
        if($this->cek() == true){
                $data = array (
                'nama' => $this->session->getValue('username'),
                'title' => 'Halaman Wali Kelas',
                'url' => $this->uri->baseUri
                );
           $this->output('v_home_wali', $data);
        } 
        else {
           $this->redirect('home/login');
        }    
    }

    public function home(){
        if($this->cek() == true){
                $data = array (
                'nama' => $this->session->getValue('username'),
                'title' => 'Halaman Wali Kelas',
                'url' => $this->uri->baseUri
                );
           $this->output('v_home_wali', $data);
        } 
        else {
           $this->redirect('home/login');
        }    
    }

    public function datasiswa($page = 1){
        $page = (int) $page;
        $limit = 10;

        if($this->cek() == true){         
            $data = array (
                    'datasiswa' => $this->walimodel->bacadatasiswa($page, $limit), 
                    'namaCTRL' => 'DATA SISWA',
                    'nama' => $this->session->getValue('username'),
                    'url' => $this->uri->baseUri
                    );

            $this->output('v_datasiswa_wali', $data);
        } 
        else {
            $this->redirect('home/login');
        }    
    }

    public function tambah_siswa_kelas() {
        if($this->cek() == true){         

            $data = array (
                    'datasiswa' => $this->walimodel->tambahdatasiswa(),
                    'namaCTRL' => 'TAMBAH DATA SISWA KELAS',
                    'nama' => $this->session->getValue('username'),
                    'url' => $this->uri->baseUri
                    );

            $this->output('v_addsiswa_wali', $data);
        } 
        else {
            $this->redirect('home/login');
        }    
    }
    
     public function edit_siswa_kelas() {
        if($this->cek() == true){         

            $data = array (
                    'datasiswa' => $this->walimodel->editdatasiswa(),
                    'namaCTRL' => 'PERBARUI DATA SISWA KELAS',
                    'nama' => $this->session->getValue('username'),
                    'url' => $this->uri->baseUri
                    );

            $this->output('v_addsiswa_wali', $data);
        } 
        else {
            $this->redirect('home/login');
        }    
    }

    public function hapus_siswa_kelas() {
        if($this->cek() == true){         

            $this->output('v_addsiswa_wali');
        } 
        else {
            $this->redirect('home/login');
        }    
    }
}
