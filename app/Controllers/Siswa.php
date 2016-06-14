<?php

namespace Controllers;
use Resources;

class Siswa extends Resources\Controller
{
    public function __construct(){
        parent::__construct();
        $this->session = new Resources\Session;
    }
    
    private function cek(){ //Cek Session Login
        $ceklogin = $this->session->getValue('isLoginSiswa');
//        $cekwali = $this->session->getValue('ID_SISWA');
//        $cekelas = $this->session->getValue('ID_KELAS');
        if ($ceklogin == true) { //&& $cekwali && $cekelas/*/
    
            return true;
        } else {
            $this->redirect('login');
            return false;
        }
    }
    
    public function index(){ // Dasbor atau Homebase Wali Kelas
        $this->cek();
        $data = array (
            'nama' => $this->session->getValue('username'),
            'title' => 'Dashboard Siswa Kelas',
            'header' => 'Dashboard Siswa Kelas',
            'kontendash' => 'Dashboard Siswa Kelas',
            'url' => $this->uri->baseUri
            );
        $this->output('Siswakonten/Siswakonten_home/v_header_backend', $data);
        $this->output('Siswakonten/v_sidebar_backend', $data);
        $this->output('Siswakonten/Siswakonten_home/v_home_siswa', $data);   
        $this->output('Siswakonten/Siswakonten_home/v_footer_backend', $data);
        
    }
} 