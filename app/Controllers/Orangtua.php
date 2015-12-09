<?php

namespace Controllers;
use Resources;

class Orangtua extends Resources\Controller
{
    public function __construct(){
        parent::__construct();
        $this->session = new Resources\Session;
    }
    
    public function index(){
    $ceklogin=$this->session->getValue('isLogin');
     
    if($ceklogin == true){
            $data = array (
            'nama' => $this->session->getValue('username'),
            'url' => $this->uri->baseUri
            );
       $this->output('v_home_ortu');
    } 
    else {
       $this->redirect('home/login');
    }    
}
}
