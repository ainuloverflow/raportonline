<?php

namespace Controllers;
use Resources, Models;

class Home extends Resources\Controller
{

    public function __construct(){
        parent::__construct();
        $this->post = new Resources\Request;
        $this->login = new Models\M_login; 
        $this->session = new Resources\Session;
    }
	
    public function direct() {
        $this->redirect('home/login');
    }
	
    /*public function index(){
        $ceklogin=$this->session->getValue('isLogin');

        if($ceklogin == true) {
                 $data = array(			
                    'nama' => $this->session->getValue('username'),
                    'url' => $this->uri->baseUri
                );
                $this->output('dashboard', $data);
        }
        else {
                $this->redirect('home/login');
        }
    }**/
	
    public function login() {
        $salah = '';
        if($_POST) {
        $username = $this->post->POST('username', FILTER_SANITIZE_MAGIC_QUOTES);
        $password = md5($this->post->POST('password', FILTER_SANITIZE_MAGIC_QUOTES));

        $usersiswa = $this->login->loginsiswa($username,$password);
        $userguru = $this->login->loginguru($username,$password);
        $userwali = $this->login->loginwali($username,$password);
        $userortu = $this->login->loginortu($username,$password);

        if(empty($username) OR empty($password)) {
                $salah = "Maaf username dan password tidak boleh kosong !!";
        }

        if ($salah == '') {
                if($usersiswa) {
                        // Username dan password sudah benar, simpan nilai ke dalam session
                        $data = array(
                                'isLogin' => true,
                                'username' => $usersiswa->NAMA_SISWA
                                );
                        $this->session->setValue($data);
                        $this->redirect('siswa');
                }
                
                else if($userwali) {
                        $data = array(
                                'isLogin' => true,
                                'username' => $userwali->NAMA_GURU,
                                'ID_WALI' => $userguru->ID_WALI
                        );
                        $this->session->setValue($data);
                        $this->redirect('wali/home');
                }
                
                else if($userguru) {
                        $data = array(
                                'isLogin' => true,
                                'username' => $userguru->NAMA_GURU
                        );
                        $this->session->setValue($data);
                        $this->redirect('guru/dashboard');
                }
                
                else if($userortu) {
                        $data = array(
                                'isLogin' => true,
                                'username' => $userortu->NAMA
                        );
                        $this->session->setValue($data);
                        $this->redirect('orangtua');
                }
                else {
                        $salah = "Maaf username dan password anda tidak terdaftar !!";
                }
        }
                echo "<script>alert('$salah'); window.location = 'direct' </script>";			
        }

        $title = 'Login Rapot Online SMKN 1 Krembung';
        $data['title'] = $title;

        $this->output('v_login', $data);
    }
	
    public function logout() {
            $this->session->destroy();
            $this->redirect('home/login');
    }
}	