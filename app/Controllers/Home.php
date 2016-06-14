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
        $this->redirect('login');
    }
	
    public function login() {
        $salah = '';
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $this->post->POST('username', FILTER_SANITIZE_MAGIC_QUOTES);
        $password = md5($this->post->POST('password', FILTER_SANITIZE_MAGIC_QUOTES));

        $usersiswa = $this->login->loginsiswa($username,$password);
        $userwali = $this->login->loginwali($username,$password);
        $userguru = $this->login->loginguru($username,$password);
        $userortu = $this->login->loginortu($username,$password);

        if(empty($username) OR empty($password)) {
                $salah = "Maaf username dan password tidak boleh kosong !!";
        }

        if ($salah == '') {                                
            if($usersiswa) {
                // Username dan password sudah benar, simpan nilai ke dalam session
                $data = array(
                    'isLoginSiswa' => true,
                    'username' => $usersiswa->NAMA_SISWA,
                    'ID_KELAS' => $usersiswa->ID_KELAS,
                    'ID_MAPEL' => $usersiswa->ID_MAPEL,
                    'ID_NILAI' => $usersiswa->ID_NILAI,
                    'ID_KKM' => $usersiswa->ID_KKM
                    );
                $this->session->setValue($data);
                $this->redirect('dashboard_siswa');
            }

            else if($userwali) {
                $data = array(
                    'isLoginWali' => true,
                    'username' => $userwali->NAMA_GURU,
                    'ID_GURU' => $userwali->ID_GURU,
                    'ID_WALI' => $userwali->ID_WALI,
                    'ID_KELAS' => $userwali->ID_KELAS,
                    'NAMA_KELAS' => $userwali->NAMA_KELAS,
                    'NAMA_MAPEL' => $userwali->NAMA_MAPEL,
                    'ID_MAPEL' => $userwali->ID_MAPEL
                );
                $this->session->setValue($data);
                $this->redirect('dashboard_wali');
            }

            else if($userguru) {
                $data = array(
                    'isLoginGuru' => true,
                    'username' => $userguru->NAMA_GURU,
                    'ID_GURU' => $userguru->ID_GURU,
                    'ID_MAPEL' => $userguru->ID_MAPEL, 
                    'ID_KELAS' => $userguru->ID_KELAS,
                    'NAMA_MAPEL' => $userguru->NAMA_MAPEL,
                );
                $this->session->setValue($data);
                $this->redirect('dashboard_guru');
            }

            else if($userortu) {
                $data = array(
                    'isLoginOrtu' => true,
                    'username' => $userortu->USERNAME
                );
                $this->session->setValue($data);
                $this->redirect('dashboard_orangtua');
            }
            else {
                $salah = "Maaf username dan password anda tidak terdaftar !!";
            }
        }
                echo "<script>alert('$salah'); window.location = 'kembali' </script>";			
        }
        $title = 'Login Rapot Online SMKN 1 Krembung';
        $data['title'] = $title;

        $this->output('v_login', $data);
    }
	
    public function logout() {
        $this->session->destroy();
        $this->redirect('login');
    }
}	
