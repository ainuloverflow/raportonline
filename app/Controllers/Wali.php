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

    private function cek(){ //Cek Session Login
        $ceklogin = $this->session->getValue('isLogin');
        if ($ceklogin == true) {
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
        'title' => 'Dashboard Wali Kelas',
        'header' => 'Dashboard Wali Kelas',
        'kontendash' => 'Dashboard Wali Kelas',
        'url' => $this->uri->baseUri
        );
        $this->output('v_header_backend', $data);
        $this->output('v_sidebar_backend', $data);
        $this->output('v_home_wali', $data);   
        $this->output('v_footer_backend', $data);
        
    }

    public function home(){ // Dasbor atau Homebase Wali Kelas
        $this->cek();
        $data = array (
        'nama' => $this->session->getValue('username'),
        'title' => 'Dashboard Wali Kelas',
        'header' => 'Dashboard Wali Kelas',
        'kontendash' => 'Dashboard Wali Kelas',
        'url' => $this->uri->baseUri
        );
        $this->output('v_header_backend', $data);
        $this->output('v_sidebar_backend', $data);
        $this->output('v_home_wali', $data);   
        $this->output('v_footer_backend', $data);  
    }
    
    public function data_orangtua($page = 1) {
        $this->cek();
        $page = (int) $page;
        $limit = 10;
        
            $data = array (
                'dataortu' => $this->walimodel->bacaortu($page, $limit),
                'namaCTRL' => 'DATA ORANG TUA SISWA',
                'title' => 'Halaman Wali Kelas',
                'nama' => $this->session->getValue('username'),
                'url' => $this->uri->baseUri
            );
        $this->output('v_header_backend', $data);
        $this->output('v_sidebar_backend', $data);
        $this->output('Walikonten/Walikonten_ortu/v_wali_konten_listortu', $data);
        $this->output('v_footer_backend', $data);
    }

    public function datasiswa($page = 1) {
        $this->cek();
        $page = (int) $page;
        $limit = 10;
        
            $data = array (
                'datasiswa' => $this->walimodel->bacasiswakelas($page, $limit), 
                'namaCTRL' => 'DATA SISWA',
                'title' => 'Halaman Wali Kelas',
                'nama' => $this->session->getValue('username'),
                'url' => $this->uri->baseUri
            );

        $this->output('v_header_backend', $data);
        $this->output('v_sidebar_backend', $data);
        $this->output('Walikonten/v_wali_konten_listsiswa', $data);
        $this->output('v_footer_backend', $data);   
    }

    public function tambah_siswa_kelas() {
        $this->cek();
        if($_SERVER['REQUEST_METHOD'] == 'POST') {    

            $idwali = $this->session->getValue('ID_WALI');
            $id_kelas = $this->walimodel->query($idwali);
            
            if($this->validasi->validate()) {                                                         
                $value = array (
                    'NIK_SISWA' => $this->post->POST('idsiswa',FILTER_SANITIZE_MAGIC_QUOTES),
                    'NAMA_SISWA' => $this->post->POST('nama',FILTER_SANITIZE_MAGIC_QUOTES),
                    'ID_KELAS' => $id_kelas->ID_KELAS,
                    'JENIS_KELAMIN' => $this->post->POST('jenkel',FILTER_SANITIZE_MAGIC_QUOTES),
                    'ALAMAT' => $this->post->POST('alamat',FILTER_SANITIZE_MAGIC_QUOTES),
                    'NO_TELP' => $this->post->POST('nohp',FILTER_SANITIZE_MAGIC_QUOTES),
                    'PASSWORD' => md5($this->post->POST('password',FILTER_SANITIZE_MAGIC_QUOTES)),
                );

                $tambahsiswa = $this->walimodel->tambahsiswakelas($value);
                if($tambahsiswa) {
                    echo "<script>alert('Data berhasil dimasukan'); window.location = 'listsiswa' </script>";
                }
                else {
                    echo "<script>alert('Data gagal dimasukan'); window.location = 'listsiswa' </script>";
                }
            }
        }

        $data = array (
            'validasi' => $this->validasi,
            'namaCTRL' => 'TAMBAH DATA SISWA KELAS',
            'breadcrumb' => 'Data Siswa Kelas',
            'title' => 'Halaman Wali Kelas',
            'nama' => $this->session->getValue('username'),
            'url' => $this->uri->baseUri
        );

        //$this->output('v_addsiswa_wali', $data);
        $this->output('v_header_backend', $data);
        $this->output('v_sidebar_backend', $data);
        $this->output('Walikonten/v_wali_konten_tambahsiswa');
        $this->output('v_footer_backend', $data);   
    }
    
    /*public function getsiswa_kelas() {
        $namasiswa = $this->post->POST('nama_siswa');
        $getnamasiswa = $this->walimodel->getnamasiswa($namasiswa);
        $results = array();
	
            foreach ($getnamasiswa as $query) {
                $results[] = array(
                    $query->ID_SISWA,
                    $query->NAMA_SISWA
                );
            }
            echo json_encode($results);
    }**/
    
    public function tambah_ortusiswa_kelas() {
        $this->cek();
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            $idsiswa=$this->post->POST('nama_siswa',FILTER_SANITIZE_MAGIC_QUOTES);
            $ID_SISWA = explode(" ", $idsiswa);

            if($this->validasi->validate()) {                                                         
                $value = array (
                    'ID_SISWA' => $ID_SISWA[0],
                    'NAMA' => $this->post->POST('nama_ortu',FILTER_SANITIZE_MAGIC_QUOTES),
                    'PASSWORD' => md5($this->post->POST('password',FILTER_SANITIZE_MAGIC_QUOTES)),
                    'ALAMAT' => $this->post->POST('alamat',FILTER_SANITIZE_MAGIC_QUOTES),
                    'PEKERJAAN' => $this->post->POST('pekerjaan',FILTER_SANITIZE_MAGIC_QUOTES)
                );

                $tambahortu = $this->walimodel->tambahortusiswakelas($value);
                if($tambahortu) {
                    echo "<script>alert('Data berhasil dimasukan'); window.location = 'listortu' </script>";
                }
                else {
                    echo "<script>alert('Data gagal dimasukan'); window.location = 'listortu' </script>";
                }
            }
        }

        $data = array (
            'validasi' => $this->validasi,
            'sisall' => $this->walimodel->getnamasiswall(),
            'breadcrumb' => 'Data Orang Tua Siswa',
            'namaCTRL' => 'TAMBAH DATA ORANG TUA SISWA',
            'title' => 'Halaman Wali Kelas',
            'nama' => $this->session->getValue('username'),
            'url' => $this->uri->baseUri
        );

        $this->output('v_header_backend', $data);
        $this->output('v_sidebar_backend', $data);
        $this->output('Walikonten/Walikonten_ortu/v_wali_konten_tambahortu');
        $this->output('v_footer_backend', $data);   
    }
    
    public function edit_siswa_kelas() {
        $this->cek();
            $value = addslashes($this->resource->uri->path(1));
            
        $data = array (
            'editsiswa' => $this->walimodel->geteditsiswakelas($value),
            'validasi' =>$this->validasi,
            'namaCTRL' => 'EDIT DATA SISWA KELAS',
            'breadcrumb' => 'Data Siswa Kelas',
            'title' => 'Halaman Wali Kelas',
            'nama' => $this->session->getValue('username'),
            'url' => $this->uri->baseUri
        );
        $this->output('v_header_backend', $data);
        $this->output('v_sidebar_backend', $data);
        $this->output('Walikonten/v_wali_konten_editsiswa', $data);
        $this->output('v_footer_backend', $data);
    }
    
    public function edit_ortusiswa_kelas() {
        $this->cek();
            $hasil = addslashes($this->resource->uri->path(1));
            
        $data = array (
            'editortu' => $this->walimodel->get_edit_ortusiswa_kelas($hasil),
            'sisall' => $this->walimodel->getnamasiswall(),
            'namaCTRL' => 'EDIT DATA ORANG TUA SISWA',
            'breadcrumb' => 'Data Orang Tua Siswa',
            'title' => 'Halaman Wali Kelas',
            'nama' => $this->session->getValue('username'),
            'url' => $this->uri->baseUri
        );
        $this->output('v_header_backend', $data);
        $this->output('v_sidebar_backend', $data);
        $this->output('Walikonten/Walikonten_ortu/v_wali_konten_editortu', $data);
        $this->output('v_footer_backend', $data);
    }
   
    public function validate_edit_siswa_kelas() {
        $this->cek();      
        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            if($this->validasi->validate()) {                                                         
                $value = array (
                    'ID_SISWA' => $this->post->POST('idsiswa_edit',FILTER_SANITIZE_MAGIC_QUOTES),
                    'NAMA_SISWA' => $this->post->POST('nama',FILTER_SANITIZE_MAGIC_QUOTES),
                    'JENIS_KELAMIN' => $this->post->POST('jenkel',FILTER_SANITIZE_MAGIC_QUOTES),
                    'ALAMAT' => $this->post->POST('alamat',FILTER_SANITIZE_MAGIC_QUOTES),
                    'NO_TELP' => $this->post->POST('nohp_edit',FILTER_SANITIZE_MAGIC_QUOTES)
                );

                $where = array (
                    'ID_SISWA' => $this->post->POST('idsiswa_edit',FILTER_SANITIZE_MAGIC_QUOTES)
                );

                $update = $this->walimodel->validate_edit_siswakelas($value, $where);

                if($update) {
                    echo "<script>alert('Data berhasil diperbarui'); window.location = 'listsiswa' </script>";
                }
                else {
                    echo "<script>alert('Data gagal diperbarui'); window.location = 'listsiswa' </script>";
                }
            }
        }
        $data = array (
            'validasi' =>$this->validasi,
            'namaCTRL' => 'EDIT DATA SISWA KELAS',
            'breadcrumb' => 'Data Siswa Kelas',
            'title' => 'Halaman Wali Kelas',
            'nama' => $this->session->getValue('username'),
            'url' => $this->uri->baseUri
        );
        $this->output('v_header_backend', $data);
        $this->output('v_sidebar_backend', $data);
        $this->output('Walikonten/v_wali_konten_validasieditsiswa', $data);
        $this->output('v_footer_backend', $data);
    }
    
    public function validate_edit_ortusiswa_kelas() {
        $this->cek();
        if($_SERVER['REQUEST_METHOD'] === 'POST') {    
            $idsiswa=$this->post->POST('nama_siswa',FILTER_SANITIZE_MAGIC_QUOTES);
            $ID_SISWA = explode(" ", $idsiswa);
            if($this->validasi->validate()) { 
                $value = array (
                    'ID_SISWA' => $ID_SISWA[0],
                    'NAMA' => $this->post->POST('nama',FILTER_SANITIZE_MAGIC_QUOTES),
                    'ALAMAT' => $this->post->POST('alamat',FILTER_SANITIZE_MAGIC_QUOTES),
                    'PEKERJAAN' => $this->post->POST('pekerjaan',FILTER_SANITIZE_MAGIC_QUOTES)
                );
                $where = array(
                    'ID_ORANGTUA' => $this->post->POST('id_orangtua',FILTER_SANITIZE_NUMBER_INT)
                );
                $update = $this->walimodel->validate_edit_ortusiswa($value, $where);
                
                if($update) {
                    echo "<script>alert('Data berhasil diperbarui'); window.location = 'listortu' </script>";
                } else {
                    echo "<script>alert('Data gagal diperbarui'); window.location = 'listortu' </script>";
                }
            }
        }
        $data = array (
            'validasi' =>$this->validasi,
            'sisall' => $this->walimodel->getnamasiswall(),
            'namaCTRL' => 'EDIT DATA ORANG TUA SISWA',
            'breadcrumb' => 'Data Orang Tua Siswa',
            'title' => 'Halaman Wali Kelas',
            'nama' => $this->session->getValue('username'),
            'url' => $this->uri->baseUri
        );
        $this->output('v_header_backend', $data);
        $this->output('v_sidebar_backend', $data);
        $this->output('Walikonten/Walikonten_ortu/v_wali_konten_validasieditortu', $data);
        $this->output('v_footer_backend', $data);
    }
    
    public function hapus_ortusiswa_kelas() {
        $this->cek();
        $value = addslashes($this->resource->uri->path(1));
        $where = array('ID_ORANGTUA' => $value);
        
        $this->walimodel->hapus_ortusiswa_kelas($where);
        $this->redirect('listortu');
    }

    public function hapus_siswa_kelas() {
        $this->cek();
        $value = addslashes($this->resource->uri->path(1));
        $where = array('ID_SISWA' => $value);
        
        $this->walimodel->hapus_siswakelas($where);
        $this->redirect('listsiswa');
    }
}
