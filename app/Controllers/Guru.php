<?php

namespace Controllers;
use Resources;

class Guru extends Resources\Controller
{
    public function __construct(){
        parent::__construct();
        $this->session = new Resources\Session;
    }
    
    public function cek(){
        $ceklogin = $this->session->getValue('isLogin');
        return $ceklogin;
    }
    
    public function index(){
        if($this->cek() == true){
                $data = array (
                'nama' => $this->session->getValue('username'),
                'url' => $this->uri->baseUri
                );
           $this->output('v_home_guru', $data);
        } 
        else {
           $this->redirect('home/login');
        }    
    }
    
    public function dashboard(){
        if($this->cek() == true){
                $data = array (
                'nama' => $this->session->getValue('username'),
                'url' => $this->uri->baseUri
                );
           $this->output('v_home_guru', $data);
        } 
        else {
           $this->redirect('home/login');
        }    
    }
    
    public function input_nilai(){
        if($this->cek() == true){
                $data = array (
                'nama' => $this->session->getValue('username'),
                'url' => $this->uri->baseUri
                );
        } 
        else {
           $this->redirect('home/login');
        }    
    }    
}
