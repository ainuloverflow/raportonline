<?php

namespace Controllers;
use Resources, Models;

class Wali extends Resources\Controller
{
    public function __construct(){
        parent::__construct();
        $this->post = new Resources\Request;
        $this->session = new Resources\Session;
        $this->walimodel = new Models\M_wali;
        $this->validasi = new Models\Validasi;
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
                    'title' => 'Halaman Wali Kelas',
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
            
            if($_SERVER['REQUEST_METHOD'] == 'POST') {    
                
                $idwali = $this->session->getValue('ID_WALI');
                $id_kelas = $this->walimodel->query($idwali);
                
                if($this->validasi->validate()) {                                                         
                    $value = array (
                        'ID_SISWA' => $this->post->POST('idsiswa',FILTER_SANITIZE_MAGIC_QUOTES),
                        'NAMA_SISWA' => $this->post->POST('nama',FILTER_SANITIZE_MAGIC_QUOTES),
                        'ID_KELAS' => $id_kelas->ID_KELAS,
                        'JENIS_KELAMIN' => $this->post->POST('jenkel',FILTER_SANITIZE_MAGIC_QUOTES),
                        'ALAMAT' => $this->post->POST('alamat',FILTER_SANITIZE_MAGIC_QUOTES),
                        'NO_TELP' => $this->post->POST('nohp',FILTER_SANITIZE_MAGIC_QUOTES),
                        'PASSWORD' => md5($this->post->POST('password',FILTER_SANITIZE_MAGIC_QUOTES)),
                         
                    );
                    
                    $tambahsiswa = $this->walimodel->tambahsiswakelas($value);
                    if($tambahsiswa) {
                        echo "<script>alert('Data berhasil dimasukan'); window.location = '' </script>";
                    }
                    else {
                        echo "<script>alert('Data gagal dimasukan'); window.location = '' </script>";
                    }
                }
            }
            
            $data = array (
                    'validasi' => $this->validasi,
                    'namaCTRL' => 'TAMBAH DATA SISWA KELAS',
                    'title' => 'Halaman Wali Kelas',
                    'nama' => $this->session->getValue('username'),
                    'url' => $this->uri->baseUri
                    );

            //$this->output('v_addsiswa_wali', $data);
            $this->output('header_backend', $data);
            $this->output('sidebar_backend', $data);
            $this->output('wali_konten_tambahsiswa');
            $this->output('footer_backend', $data);
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
