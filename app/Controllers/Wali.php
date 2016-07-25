<?php

namespace Controllers;
use Resources, Models, Libraries;

class Wali extends Resources\Controller
{
    public function __construct(){
        parent::__construct();
        $this->post = new Resources\Request;
        $this->session = new Resources\Session;
        $this->walimodel = new Models\M_wali;
        $this->validasi = new Models\Validasi;
        $this->pagination = new Resources\Pagination();
        $this->enkripsi = new Libraries\Enkripsi;
        $this->fpdf = new Libraries\FPDF();
    }
    
    private function nama_kelas(){
        Return $this->session->getValue('NAMA_KELAS');
    }
    
    private function nama_mapel(){
        Return $this->session->getValue('NAMA_MAPEL');
    }

    private function cek(){ //Cek Session Login
        $ceklogin = $this->session->getValue('isLoginWali');
        $cekwali = $this->session->getValue('ID_WALI');
        $cekelas = $this->session->getValue('ID_KELAS');
        if ($ceklogin == true && $cekwali && $cekelas) {
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
        $this->output('Walikonten/Walikonten_home/v_header_backend', $data);
        $this->output('Walikonten/v_wali_konten_sidebar', $data);
        $this->output('Walikonten/Walikonten_home/v_home_wali', $data);   
        $this->output('Walikonten/Walikonten_home/v_footer_backend', $data);
        
    }
        
    /** baca siswa */
    public function datasiswa($page = 1) {
        $this->cek();
        $page = (int) $page;
        $limit = 10;
        
        $nama_kelas = $this->nama_kelas();
        //$encrypted = $this->crypt->encrypt('%#%');    
        $data = array (
            'datasiswa' => $this->walimodel->bacasiswakelas($page, $limit), 
            'namaCTRL' => 'DATA SISWA '. "<strong>$nama_kelas</strong>",
            'title' => 'Halaman Wali Kelas',
            'nama' => $this->session->getValue('username'),
            'url' => $this->uri->baseUri,
            'pageLinks' => $this->pagination->setOption(
                array (
                    'limit' => $limit,
                    'base' =>  $this->uri->baseUri."list-siswa/%#%",
                    'total' => $this->walimodel->totalsiswa_kelas(),
                    'current' => $page
                )
            ) ->getUrl()
        );

        $this->output('Walikonten/Walikonten_siswa/v_wali_konten_header', $data);
        $this->output('Walikonten/v_wali_konten_sidebar', $data);
        $this->output('Walikonten/Walikonten_siswa/v_wali_konten_listsiswa', $data);
        $this->output('Walikonten/Walikonten_siswa/v_wali_konten_footer_siswa', $data);   
    }
    /** end baca siswa */
    
    /** tambah siswa */
    public function tambah_siswa_kelas() {
        $this->cek();
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            if($this->validasi->validate()) {
                $id_ortu = $this->post->POST('id_orangtua', FILTER_SANITIZE_NUMBER_INT);
                $ID_ORANGTUA = explode(" ",$id_ortu);
                
                $nis_siswa = $this->post->POST('nissiswa',FILTER_SANITIZE_MAGIC_QUOTES);
                
                $value = array (
                    'NIS_SISWA' => $nis_siswa,
                    'ID_ORANGTUA' => $ID_ORANGTUA[0],
                    'NAMA_SISWA' => $this->post->POST('nama_siswa',FILTER_SANITIZE_MAGIC_QUOTES),
                    'ID_KELAS' => $this->session->getValue('ID_KELAS'),
                    'TEMPAT_LAHIR_SISWA' => $this->post->POST('tempat_lahir_siswa',FILTER_SANITIZE_MAGIC_QUOTES),
                    'TGL_LAHIR_SISWA' => $this->post->POST('tgl_lahir_siswa',FILTER_SANITIZE_MAGIC_QUOTES),
                    'JENIS_KELAMIN' => $this->post->POST('jenkel',FILTER_SANITIZE_MAGIC_QUOTES),
                    'ALAMAT' => $this->post->POST('alamat',FILTER_SANITIZE_MAGIC_QUOTES)
                );

                $this->ceksiswadobel($nis_siswa, $value);
            }
        }
        $data = array (
            'validasi' => $this->validasi,
            'getortuall' =>$this->walimodel->getortuall(),
            'namaCTRL' => 'TAMBAH DATA SISWA KELAS',
            'breadcrumb' => 'Data Siswa Kelas',
            'title' => 'Halaman Wali Kelas',
            'nama' => $this->session->getValue('username'),
            'url' => $this->uri->baseUri
        );

        $this->output('Walikonten/Walikonten_siswa/v_wali_konten_header', $data);
        $this->output('Walikonten/v_wali_konten_sidebar', $data);
        $this->output('Walikonten/Walikonten_siswa/v_wali_konten_tambahsiswa', $data);
        $this->output('Walikonten/Walikonten_siswa/v_wali_konten_footer_siswa', $data);   
    }
    /** end tambah siswa */
    
    /** edit siswa */
    public function edit_siswa_kelas() {
        $this->cek();
            $value = $this->enkripsi->safe_b64decode(addslashes($this->resource->uri->path(1)));
        $data = array (
            'editsiswa' => $this->walimodel->geteditsiswakelas($value),
            'getortuall' => $this->walimodel->getortuall(),
            'validasi' =>$this->validasi,
            'namaCTRL' => 'EDIT DATA SISWA KELAS',
            'breadcrumb' => 'Data Siswa Kelas',
            'title' => 'Halaman Wali Kelas',
            'nama' => $this->session->getValue('username'),
            'url' => $this->uri->baseUri
        );
        $this->output('Walikonten/Walikonten_siswa/v_wali_konten_header', $data);
        $this->output('Walikonten/v_wali_konten_sidebar', $data);
        $this->output('Walikonten/Walikonten_siswa/v_wali_konten_editsiswa', $data);
        $this->output('Walikonten/Walikonten_siswa/v_wali_konten_footer_siswa', $data);
    }
    /** end edit siswa */
    
    /** validasi edit siswa */
    public function validate_edit_siswa_kelas() {
        $this->cek();      
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            $id_Orangtua = $this->post->POST('id_orangtua',FILTER_SANITIZE_MAGIC_QUOTES);
            $id_orangtua = explode(" ", $id_Orangtua);
            
            
            if($this->validasi->validate()) {                                                         
                $value = array (
                    'NIS_SISWA' => $this->post->POST('nissiswa_edit',FILTER_SANITIZE_MAGIC_QUOTES),
                    'ID_ORANGTUA' => $id_orangtua[0],
                    'NAMA_SISWA' => $this->post->POST('nama_siswa',FILTER_SANITIZE_MAGIC_QUOTES),
                    'TEMPAT_LAHIR_SISWA' => $this->post->POST('tempat_lahir_siswa',FILTER_SANITIZE_MAGIC_QUOTES),
                    'TGL_LAHIR_SISWA' => $this->post->POST('tgl_lahir_siswa',FILTER_SANITIZE_MAGIC_QUOTES),
                    'JENIS_KELAMIN' => $this->post->POST('jenkel',FILTER_SANITIZE_MAGIC_QUOTES),
                    'ALAMAT' => $this->post->POST('alamat',FILTER_SANITIZE_MAGIC_QUOTES)
                );

                $where = array (
                    'ID_SISWA' => $this->post->POST('id_siswa',FILTER_SANITIZE_NUMBER_INT)
                );

                $update = $this->walimodel->validate_edit_siswakelas($value, $where);

                if($update) {
                    echo "<script>alert('Data berhasil diperbarui'); window.location = 'list-siswa' </script>";
                }
                else {
                    echo "<script>alert('Data gagal diperbarui'); window.location = 'list-siswa' </script>";
                }
            }
        }
        $data = array (
            'validasi' =>$this->validasi,
            'getortuall' => $this->walimodel->getortuall(),
            'namaCTRL' => 'EDIT DATA SISWA KELAS',
            'breadcrumb' => 'Data Siswa Kelas',
            'title' => 'Halaman Wali Kelas',
            'nama' => $this->session->getValue('username'),
            'url' => $this->uri->baseUri
        );
        $this->output('Walikonten/Walikonten_siswa/v_wali_konten_header', $data);
        $this->output('Walikonten/v_wali_konten_sidebar', $data);
        $this->output('Walikonten/Walikonten_siswa/v_wali_konten_validasieditsiswa', $data);
        $this->output('Walikonten/Walikonten_siswa/v_wali_konten_footer_siswa', $data);
    }
    /** end validasi edit siswa */
    
    /** hapus siswa */
    public function hapus_siswa_kelas() {
        $this->cek();
        $value = $this->enkripsi->safe_b64decode(addslashes($this->resource->uri->path(1)));
        $where = array('ID_SISWA' => $value);
        
        $this->walimodel->hapus_siswakelas($where);
        $this->redirect('list-siswa');
    }
    /** end hapus siswa */
    
    /** hapus siswa */
    public function reset_password_siswa() {
        $this->cek();
        $wheres = $this->enkripsi->safe_b64decode(addslashes($this->resource->uri->path(1)));
        
        $value = array(
            'PASSWORD' =>null
        );
        $where = array(
            'ID_SISWA' => $wheres
        );
        
        $this->walimodel->reset_password_siswa($value, $where);
        $this->redirect('list-siswa');
    }
    /** end hapus siswa */
    
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
    
    /** baca orangtua siswa */
    public function data_orangtua($page = 1) {
        $this->cek();
        $page = (int) $page;
        $limit = 10;
        
        $nama_kelas = $this->nama_kelas();
            $data = array (
                'dataortu' => $this->walimodel->bacaortu($page, $limit),
                'namaCTRL' => 'DATA ORANG TUA SISWA '."<strong>$nama_kelas</strong>",
                'title' => 'Halaman Wali Kelas',
                'nama' => $this->session->getValue('username'),
                'url' => $this->uri->baseUri,
                'pageLinks' => $this->pagination->setOption(
                array (
                    'limit' => $limit,
                    'base' =>  $this->uri->baseUri."list-ortu/%#%",
                    'total' => $this->walimodel->totalsiswa_kelas(),
                    'current' => $page
                    )
                ) ->getUrl()
            );
        $this->output('Walikonten/Walikonten_ortu/v_wali_konten_header', $data);
        $this->output('Walikonten/v_wali_konten_sidebar', $data);
        $this->output('Walikonten/Walikonten_ortu/v_wali_konten_listortu', $data);
        $this->output('Walikonten/Walikonten_ortu/v_wali_konten_footer_ortu', $data);  
    }
    /** end baca orangtua siswa */
    
    /** tambah orangtua siswa */
    public function tambah_ortusiswa_kelas() {
        $this->cek();
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            if($this->validasi->validate()) {                                                         
                $value = array (
                    'NIK_AYAH' => $this->post->POST('nik_ayah',FILTER_SANITIZE_MAGIC_QUOTES),
                    'NAMA_AYAH' => $this->post->POST('nama_ayah',FILTER_SANITIZE_MAGIC_QUOTES),
                    'TEMPAT_LAHIR_AYAH' => $this->post->POST('tempat_lahir_ayah',FILTER_SANITIZE_MAGIC_QUOTES),
                    'TGL_LAHIR_AYAH' => $this->post->POST('tgl_lahir_ayah',FILTER_SANITIZE_MAGIC_QUOTES),
                    'PEKERJAAN_AYAH' => $this->post->POST('pekerjaan_ayah',FILTER_SANITIZE_MAGIC_QUOTES),
                    'NIK_IBU' => $this->post->POST('nik_ibu',FILTER_SANITIZE_MAGIC_QUOTES),
                    'NAMA_IBU' => $this->post->POST('nama_ibu',FILTER_SANITIZE_MAGIC_QUOTES),
                    'TEMPAT_LAHIR_IBU' => $this->post->POST('tempat_lahir_ibu',FILTER_SANITIZE_MAGIC_QUOTES),
                    'TGL_LAHIR_IBU' => $this->post->POST('tgl_lahir_ibu',FILTER_SANITIZE_MAGIC_QUOTES),
                    'PEKERJAAN_IBU' => $this->post->POST('pekerjaan_ibu',FILTER_SANITIZE_MAGIC_QUOTES),
                    'ALAMAT' => $this->post->POST('alamat',FILTER_SANITIZE_MAGIC_QUOTES),
                    'USERNAME' => $this->post->POST('username_ortu',FILTER_SANITIZE_MAGIC_QUOTES),
                    'PASSWORD' => md5($this->post->POST('password',FILTER_SANITIZE_MAGIC_QUOTES)),
                );

                $tambahortu = $this->walimodel->tambahortusiswakelas($value);
                if($tambahortu) {
                    echo "<script>alert('Data berhasil dimasukan'); window.location = 'list-ortu' </script>";
                }
                else {
                    echo "<script>alert('Data gagal dimasukan'); window.location = 'list-ortu' </script>";
                }
            }
        }

        $data = array (
            'validasi' => $this->validasi,
            'breadcrumb' => 'Data Orang Tua Siswa',
            'namaCTRL' => 'TAMBAH DATA ORANG TUA SISWA',
            'title' => 'Halaman Wali Kelas',
            'nama' => $this->session->getValue('username'),
            'url' => $this->uri->baseUri
        );

        $this->output('Walikonten/Walikonten_ortu/v_wali_konten_header', $data);
        $this->output('Walikonten/v_wali_konten_sidebar', $data);
        $this->output('Walikonten/Walikonten_ortu/v_wali_konten_tambahortu');
        $this->output('Walikonten/Walikonten_ortu/v_wali_konten_footer_ortu', $data);   
    }
    /** end orangtua siswa */
    
    /** edit orangtua siswa */
    public function edit_ortusiswa_kelas() {
        $this->cek();
            $hasil = $this->enkripsi->safe_b64decode(addslashes($this->resource->uri->path(1)));
            
        $data = array (
            'editortu' => $this->walimodel->get_edit_ortusiswa_kelas($hasil),
            'namaCTRL' => 'EDIT DATA ORANG TUA SISWA',
            'breadcrumb' => 'Data Orang Tua Siswa',
            'title' => 'Halaman Wali Kelas',
            'nama' => $this->session->getValue('username'),
            'url' => $this->uri->baseUri
                
        );
        $this->output('Walikonten/Walikonten_ortu/v_wali_konten_header', $data);
        $this->output('Walikonten/v_wali_konten_sidebar', $data);
        $this->output('Walikonten/Walikonten_ortu/v_wali_konten_editortu', $data);
        $this->output('Walikonten/Walikonten_ortu/v_wali_konten_footer_ortu', $data);
    }
    /** end edit orangtua siswa */
    
    /** validasi edit orangtua siswa */
    public function validate_edit_ortusiswa_kelas() {
        $this->cek();
        if($_SERVER['REQUEST_METHOD'] === 'POST') {    
            
            if($this->validasi->validate()) { 
                $value = array (
                    'NIK_AYAH' => $this->post->POST('nik_ayah_edit',FILTER_SANITIZE_MAGIC_QUOTES),
                    'NAMA_AYAH' => $this->post->POST('nama_ayah',FILTER_SANITIZE_MAGIC_QUOTES),
                    'TEMPAT_LAHIR_AYAH' => $this->post->POST('tempat_lahir_ayah',FILTER_SANITIZE_MAGIC_QUOTES),
                    'TGL_LAHIR_AYAH' => $this->post->POST('tgl_lahir_ayah',FILTER_SANITIZE_MAGIC_QUOTES),
                    'PEKERJAAN_AYAH' => $this->post->POST('pekerjaan_ayah',FILTER_SANITIZE_MAGIC_QUOTES),
                    'NIK_IBU' => $this->post->POST('nik_ibu_edit',FILTER_SANITIZE_MAGIC_QUOTES),
                    'NAMA_IBU' => $this->post->POST('nama_ibu',FILTER_SANITIZE_MAGIC_QUOTES),
                    'TEMPAT_LAHIR_IBU' => $this->post->POST('tempat_lahir_ibu',FILTER_SANITIZE_MAGIC_QUOTES),
                    'TGL_LAHIR_IBU' => $this->post->POST('tgl_lahir_ibu',FILTER_SANITIZE_MAGIC_QUOTES),
                    'PEKERJAAN_IBU' => $this->post->POST('pekerjaan_ibu',FILTER_SANITIZE_MAGIC_QUOTES),
                    'ALAMAT' => $this->post->POST('alamat',FILTER_SANITIZE_MAGIC_QUOTES),
                );
                $where = array(
                    'ID_ORANGTUA' => $this->post->POST('id_orangtua',FILTER_SANITIZE_NUMBER_INT)
                );
                $update = $this->walimodel->validate_edit_ortusiswa($value, $where);
                
                if($update) {
                    echo "<script>alert('Data berhasil diperbarui'); window.location = 'list-ortu' </script>";
                } else {
                    echo "<script>alert('Data gagal diperbarui'); window.location = 'list-ortu' </script>";
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
        $this->output('Walikonten/Walikonten_ortu/v_wali_konten_header', $data);
        $this->output('Walikonten/v_wali_konten_sidebar', $data);
        $this->output('Walikonten/Walikonten_ortu/v_wali_konten_validasieditortu', $data);
        $this->output('Walikonten/Walikonten_ortu/v_wali_konten_footer_ortu', $data);
    }
    /** validasi edit orangtua siswa */
    
    /** hapus orangtua siswa */
    public function hapus_ortusiswa_kelas() {
        $this->cek();
        $value = $this->enkripsi->safe_b64decode(addslashes($this->resource->uri->path(1)));
        $where = array('ID_ORANGTUA' => $value);
        
        $this->walimodel->hapus_ortusiswa_kelas($where);
        $this->redirect('list-ortu');
    }
    /** end hapus orangtua siswa */
    
    /** reset password orangtua */
    public function reset_password_ortu() {
        $this->cek();
        $wheres = $this->enkripsi->safe_b64decode(addslashes($this->resource->uri->path(1)));
        
        $value = array(
            'PASSWORD' =>null
        );
        $where = array(
            'ID_ORANGTUA' => $wheres
        );
        
        $this->walimodel->reset_password_ortu($value, $where);
        $this->redirect('list-ortu');
    }
    /** end reset password orangtua */
    
    /** tampil nilai */
    public function tampil_nilai($page = 1){
        $this->cek();
        $page = (int) $page;
        $limit = 10;
        
        $nama_kelas = $this->nama_kelas();
            $data = array (
                'nilaisiswa' => $this->walimodel->bacanilaisiswa($page, $limit), 
                'namaCTRL' => 'DATA NILAI '."<strong>$nama_kelas</strong>",
                'mapelall' => $this->walimodel->getmapelall(),
                'sisall' => $this->walimodel->getnamasiswall(),
                'title' => 'Halaman Wali Kelas',
                'nama' => $this->session->getValue('username'),
                'url' => $this->uri->baseUri,
                'pageLinks' => $this->pagination->setOption(
                array (
                    'limit' => $limit,
                    'base' =>  $this->uri->baseUri."data-nilai/%#%",
                    'total' => $this->walimodel->totalsiswa_kelas(),
                    'current' => $page
                    )
                ) ->getUrl()
            );

        $this->output('Walikonten/Walikonten_nilai/v_wali_konten_header', $data);
        $this->output('Walikonten/v_wali_konten_sidebar', $data);
        $this->output('Walikonten/Walikonten_nilai/v_wali_konten_listnilai', $data);
        $this->output('Walikonten/Walikonten_nilai/v_wali_konten_footer_nilai');
    }
    /** end tampil nilai */
    
    /** input nilai */
    public function input_nilai(){
        $this->cek();
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            $idsiswa=$this->post->POST('id_siswa',FILTER_SANITIZE_MAGIC_QUOTES);
            $ID_SISWA = explode(" ", $idsiswa);
            $idmapel=$this->post->POST('id_mapel',FILTER_SANITIZE_MAGIC_QUOTES);
            $ID_MAPEL = explode(" ", $idmapel);

            if($this->validasi->validate()) {                                                         
                $value = array (
                    'ID_SISWA' => $ID_SISWA[0],
                    'ID_MAPEL' => $ID_MAPEL[0],
                    'ID_KKM' => 1,
                    'NILAI_KOP_PENGETAHUAN' => $this->post->POST('nilai_kop_pengetahuan',FILTER_SANITIZE_NUMBER_FLOAT),
                    'NILAI_KOP_KETERAMPILAN' => $this->post->POST('nilai_kop_keterampilan',FILTER_SANITIZE_NUMBER_FLOAT),
                    'NILAI_SIKAP' => $this->post->POST('nilai_sikap',FILTER_SANITIZE_MAGIC_QUOTES),
                    'NILAI_TUGAS' => $this->post->POST('nilai_tugas',FILTER_SANITIZE_NUMBER_FLOAT),
                    'NILAI_UTS' => $this->post->POST('nilai_uts',FILTER_SANITIZE_NUMBER_FLOAT),
                    'NILAI_UAS' => $this->post->POST('nilai_uas',FILTER_SANITIZE_NUMBER_FLOAT),
                    'NILAI_AHKIR' => $this->hitung_nilai_ahkir()
                );
                $this->ceknilaidobel($ID_SISWA, $ID_MAPEL, $value);
            }
        }
        $data = array (
            'validasi' => $this->validasi,
            'sisall' => $this->walimodel->getnamasiswall(),
            //'mapel_by_idkelas' => $this->walimodel->getmapel_by_idkelas(),
            'mapelall' => $this->walimodel->getmapelall(),
            'breadcrumb' => 'Data Nilai',
            'namaCTRL' => 'TAMBAH DATA NILAI',
            'title' => 'Halaman Wali Kelas',
            'nama' => $this->session->getValue('username'),
            'url' => $this->uri->baseUri
        );
        $this->output('Walikonten/Walikonten_nilai/v_wali_konten_header', $data);
        $this->output('Walikonten/v_wali_konten_sidebar', $data);
        $this->output('Walikonten/Walikonten_nilai/v_wali_konten_tambahnilai');
        $this->output('Walikonten/Walikonten_nilai/v_wali_konten_footer_nilai', $data);  
    }
    /** end input nilai */
    
    /** Edit Nilai */
    public function edit_nilai(){
        $this->cek();
            $hasil = $this->enkripsi->safe_b64decode(addslashes($this->resource->uri->path(1)));
            
        $data = array (
            'editnilai' => $this->walimodel->get_edit_nilaisiswa($hasil),
            'namaCTRL' => 'EDIT DATA NILAI SISWA',
            'sisall' => $this->walimodel->getnamasiswall(),
            //'mapel_by_idkelas' => $this->walimodel->getmapel_by_idkelas(),
            'mapelall' => $this->walimodel->getmapelall(),
            'breadcrumb' => 'Data Nilai Siswa',
            'title' => 'Halaman Wali Kelas',
            'nama' => $this->session->getValue('username'),
            'url' => $this->uri->baseUri
        );
        $this->output('Walikonten/Walikonten_nilai/v_wali_konten_header', $data);
        $this->output('Walikonten/v_wali_konten_sidebar', $data);
        $this->output('Walikonten/Walikonten_nilai/v_wali_konten_editnilai', $data);
        $this->output('Walikonten/Walikonten_nilai/v_wali_konten_footer_nilai', $data);
    }
    
    public function validate_edit_nilai(){
        $this->cek();
        if($_SERVER['REQUEST_METHOD'] === 'POST') {    
       
            $ID_MAPEL = $this->post->POST('id_mapel', FILTER_SANITIZE_MAGIC_QUOTES);
            $id_mapel = explode(" ", $ID_MAPEL);
            $ID_SISWA = $this->post->POST('id_siswa',FILTER_SANITIZE_MAGIC_QUOTES);
            $id_siswa = explode(" ", $ID_SISWA);
  
            if($this->validasi->validate()) {
                $value = array (
                    'ID_MAPEL' => $id_mapel[0],
                    'ID_SISWA' => $id_siswa[0],
                    'ID_KKM' => 1,
                    'NILAI_KOP_PENGETAHUAN' => $this->post->POST('nilai_kop_pengetahuan',FILTER_SANITIZE_NUMBER_FLOAT),
                    'NILAI_KOP_KETERAMPILAN' => $this->post->POST('nilai_kop_keterampilan',FILTER_SANITIZE_NUMBER_FLOAT),
                    'NILAI_SIKAP' => $this->post->POST('nilai_sikap',FILTER_SANITIZE_MAGIC_QUOTES),
                    'NILAI_TUGAS' => $this->post->POST('nilai_tugas',FILTER_SANITIZE_NUMBER_FLOAT),
                    'NILAI_UTS' => $this->post->POST('nilai_uts',FILTER_SANITIZE_MAGIC_QUOTES),
                    'NILAI_UAS' => $this->post->POST('nilai_uas',FILTER_SANITIZE_NUMBER_FLOAT),
                    'NILAI_AHKIR' => $this->hitung_nilai_ahkir()
                );
                $where = array(
                    'ID_NILAI' => $this->post->POST('id_nilai',FILTER_SANITIZE_NUMBER_INT)
                );
                $this->eksekusi_edit_nilai($value, $where);
            }
        }
        $data = array (
            'validasi' =>$this->validasi,
            'sisall' => $this->walimodel->getnamasiswall(),
            //'mapel_by_idkelas' => $this->walimodel->getmapel_by_idkelas(),
            'mapelall' => $this->walimodel->getmapelall(),
            'namaCTRL' => 'EDIT DATA NILAI SISWA',
            'breadcrumb' => 'Edit Data Nilai Siswa',
            'title' => 'Halaman Wali Kelas',
            'nama' => $this->session->getValue('username'),
            'url' => $this->uri->baseUri
        );
        $this->output('Walikonten/Walikonten_nilai/v_wali_konten_header', $data);
        $this->output('Walikonten/v_wali_konten_sidebar', $data);
        $this->output('Walikonten/Walikonten_nilai/v_wali_konten_validasieditnilai', $data);
        $this->output('Walikonten/Walikonten_nilai/v_wali_konten_footer_nilai', $data);
    }
    
    public function hapus_nilai(){
        $this->cek();
        $value = $this->enkripsi->safe_b64decode(addslashes($this->resource->uri->path(1)));
        $where = array('ID_NILAI' => $value);
        
        $this->walimodel->hapus_nilai_siswa($where);
        $this->redirect('data-nilai');
    }
    
    public function rapot_siswa($page = 1) {
        $this->cek();
        $page = (int) $page;
        $limit = 10;
        
        $nama_kelas = $this->nama_kelas();
            $data = array (
                'rapot_siswa' => $this->walimodel->bacanilaisiswa($page, $limit), 
                'namaCTRL' => 'Rapot Siswa '."<strong>$nama_kelas</strong>",
                'mapelall' => $this->walimodel->getmapelall(),
                'sisall' => $this->walimodel->getnamasiswall(),
                'title' => 'Halaman Wali Kelas',
                'nama' => $this->session->getValue('username'),
                'url' => $this->uri->baseUri,
                'pageLinks' => $this->pagination->setOption(
                array (
                    'limit' => $limit,
                    'base' =>  $this->uri->baseUri."rapot-siswa-as-wali/%#%",
                    'total' => $this->walimodel->totalsiswa_kelas(),
                    'current' => $page
                    )
                ) ->getUrl()
            );

        $this->output('Walikonten/Walikonten_rapot/v_wali_konten_header', $data);
        $this->output('Walikonten/v_wali_konten_sidebar', $data);
        $this->output('Walikonten/Walikonten_rapot/v_wali_konten_rapotsiswa', $data);
        $this->output('Walikonten/Walikonten_rapot/v_wali_konten_footer_rapot', $data);
    }
    
    public function cetak_rapot_siswa(){
        $this->cek();
            $data = array(
                'url' => $this->uri->baseUri
            );
        $this->output('Walikonten/Walikonten_rapot/v_wali_konten_raportsiswa', $data);
    }
    
    public function grafik_nilai(){
        $this->cek();      
        
        $data = array(
            'nama' => $this->session->getValue('username'),
            'nama_kelas' => $this->nama_kelas(),
            'nama_mapel' => $this->nama_mapel(),
            'title' => 'Dashboard Wali Kelas',
            'header' => 'Dashboard Wali Kelas',
            'kontendash' => 'Dashboard Wali Kelas',
            'url' => $this->uri->baseUri
        );
        
        $this->output('Walikonten/Walikonten_grafik/v_wali_konten_header', $data);
        $this->output('Walikonten/v_wali_konten_sidebar', $data);
        $this->output('Walikonten/Walikonten_grafik/v_wali_konten_grafik', $data);
        $this->output('Walikonten/Walikonten_grafik/v_wali_konten_footer_grafik', $data);
    }
           
    public function data_kkm_kd(){
        $this->cek();
        $data = array (
            'nama' => $this->session->getValue('username'),
            'kd_data' => $this->walimodel->data_kd(),
            'namaCTRL' => 'DATA KKM DAN KOMPETENSI DASAR',
            'title' => 'Dashboard Wali Kelas',
            'header' => 'Dashboard Wali Kelas',
            'kontendash' => 'Dashboard Wali Kelas',
            'url' => $this->uri->baseUri
        );
        
        $this->output('Walikonten/Walikonten_kkm_kd/v_wali_konten_header', $data);
        $this->output('Walikonten/v_wali_konten_sidebar', $data);
        $this->output('Walikonten/Walikonten_kkm_kd/v_wali_konten_lists', $data);
        $this->output('Walikonten/Walikonten_kkm_kd/v_wali_konten_footer', $data);
    }
    
    public function tambah_kd(){
        $this->cek();
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            if($this->validasi->validate()) {                                                         
                $value = array (
                    'ID_MAPEL' => $this->session->getValue('ID_MAPEL'),
                    'KI_3' => $this->post->POST('ki-3',FILTER_SANITIZE_MAGIC_QUOTES),
                    'DESKRIPSI_KD_KI_3' => $this->post->POST('deskripsiki-3',FILTER_SANITIZE_MAGIC_QUOTES),
                    'KI_4' => $this->post->POST('ki-4',FILTER_SANITIZE_MAGIC_QUOTES),
                    'DESKRIPSI_KD_KI_4' => $this->post->POST('deskripsiki-4',FILTER_SANITIZE_MAGIC_QUOTES),
                    'KI_1' => $this->post->POST('ki-1',FILTER_SANITIZE_MAGIC_QUOTES),
                    'DESKRIPSI_KD_KI_1' => $this->post->POST('deskripsiki-1',FILTER_SANITIZE_MAGIC_QUOTES),
                    'KI_2' => $this->post->POST('ki-2',FILTER_SANITIZE_MAGIC_QUOTES),
                    'DESKRIPSI_KD_KI_2' => $this->post->POST('deskripsiki-2',FILTER_SANITIZE_MAGIC_QUOTES),
                );
                $this->cekKI_4($value);
            }   
        }
                   
        $data = array(
            'validasi' =>$this->validasi,
            'nama' => $this->session->getValue('username'),
            'namaCTRL' => 'TAMBAH DATA KOPETENSI DASAR',
            'breadcrumb' => 'Data KKM dan KD',
            'title' => 'Dashboard Wali Kelas',
            'header' => 'Dashboard Wali Kelas',
            'kontendash' => 'Dashboard Wali Kelas',
            'url' => $this->uri->baseUri
        );
        $this->output('Walikonten/Walikonten_kkm_kd/v_wali_konten_header', $data);
        $this->output('Walikonten/v_wali_konten_sidebar', $data);
        $this->output('Walikonten/Walikonten_kkm_kd/v_wali_konten_tambah_kd', $data);
        $this->output('Walikonten/Walikonten_kkm_kd/v_wali_konten_footer');
    }
    
    private function cekKI_4($value){
        $this->cek();
        if ($value['KI_4'] == NULL && $value['DESKRIPSI_KD_KI_4'] == NULL){
            $cekid_mapel = $this->walimodel->cek_exist_id_mapel_kd($value['ID_MAPEL']);            
            
            if ($cekid_mapel == NULL){
                $hasil = $this->walimodel->tambah_kd($value);
                if($hasil) {
                    echo "<script>alert('Data Kopetensi Dasar berhasil dimasukan!')</script>";
                }
                else {
                    echo "<script>alert('Data Kopetensi Dasar berhasil dimasukan!')</script>";
                }
            }
            else {
                echo "<script>alert('Data sudah ada!')</script>"; 
            }    
            return $value;
        }  
        else {
            $cekid_mapel = $this->walimodel->cek_exist_id_mapel_kd($value['ID_MAPEL']);
                
            if ($cekid_mapel == NULL){
                $hasil = $this->walimodel->tambah_kd($value);
                if($hasil) {
                    echo "<script>alert('Data Kopetensi Dasar berhasil dimasukan')</script>";
                }
                else {
                    echo "<script>alert('Data Kopetensi Dasar berhasil dimasukan')</script>";
                    }
            }
            else {
                echo "<script>alert('Data sudah ada!')</script>";
            }
            return $value;
        }
    }
    
    public function edit_kd(){
        $this->cek();
        $edit = $this->enkripsi->safe_b64decode(addslashes($this->resource->uri->path(1)));
     
        $data = array (
            'edit_kd' => $this->walimodel->edit_kd($edit),
            'namaCTRL' => 'EDIT DATA KOPETENSI DASAR',
            'breadcrumb' => 'Data KKM dan KD',
            'title' => 'Halaman Wali Kelas',
            'nama' => $this->session->getValue('username'),
            'url' => $this->uri->baseUri
        );
        
        $this->output('Walikonten/Walikonten_kkm_kd/v_wali_konten_header', $data);
        $this->output('Walikonten/v_wali_konten_sidebar', $data);
        $this->output('Walikonten/Walikonten_kkm_kd/v_wali_konten_edit', $data);
        $this->output('Walikonten/Walikonten_kkm_kd/v_wali_konten_footer', $data);
    }
    
    public function validasi_edit_kd(){
        $this->cek();
        if($_SERVER['REQUEST_METHOD'] === 'POST') {    
            if($this->validasi->validate()) {
                $value = array (
                    'ID_MAPEL' => $id_mapel[0],
                    'ID_SISWA' => $id_siswa[0],
                    'ID_KKM' => 1,
                    'NILAI_KOP_PENGETAHUAN' => $this->post->POST('nilai_kop_pengetahuan',FILTER_SANITIZE_NUMBER_FLOAT),
                    'NILAI_KOP_KETERAMPILAN' => $this->post->POST('nilai_kop_keterampilan',FILTER_SANITIZE_NUMBER_FLOAT),
                    'NILAI_SIKAP' => $this->post->POST('nilai_sikap',FILTER_SANITIZE_MAGIC_QUOTES),
                    'NILAI_TUGAS' => $this->post->POST('nilai_tugas',FILTER_SANITIZE_NUMBER_FLOAT),
                    'NILAI_UTS' => $this->post->POST('nilai_uts',FILTER_SANITIZE_MAGIC_QUOTES),
                    'NILAI_UAS' => $this->post->POST('nilai_uas',FILTER_SANITIZE_NUMBER_FLOAT),
                    'NILAI_AHKIR' => $this->hitung_nilai_ahkir()
                );
                $where = array(
                    'ID_NILAI' => $this->post->POST('id_nilai',FILTER_SANITIZE_NUMBER_INT)
                );
                $this->eksekusi_edit_nilai($value, $where);
            }
        }
        $data = array (
            'validasi' =>$this->validasi,
            'namaCTRL' => 'EDIT DATA NILAI SISWA',
            'breadcrumb' => 'Edit Data Nilai Siswa',
            'title' => 'Halaman Wali Kelas',
            'nama' => $this->session->getValue('username'),
            'url' => $this->uri->baseUri
        );
        $this->output('Walikonten/Walikonten_nilai/v_wali_konten_header', $data);
        $this->output('Walikonten/v_wali_konten_sidebar', $data);
        $this->output('Walikonten/Walikonten_nilai/v_wali_konten_validasieditnilai', $data);
        $this->output('Walikonten/Walikonten_nilai/v_wali_konten_footer_nilai', $data);
    }
    
    public function hapus_kd(){
        $this->cek();
        $data = array(
            
        );
        $this->output();
        $this->output();
        $this->output();
        $this->output();
    }
    
//    public function data_kkm(){
//        $this->cek();
//        
//        $data = array (
//            'datakkm' => $this->walimodel->baca_kkm(),
//            'mapelall' => $this->walimodel->getmapelall(),
//            'namaCTRL' => 'List Data KKM',
//            'breadcrumb' => 'Data KKM',
//            'title' => 'Halaman Wali Kelas',
//            'nama' => $this->session->getValue('username'),
//            'url' => $this->uri->baseUri
//        );
//        $this->output('Walikonten/Walikonten_kkm/v_wali_konten_header', $data);
//        $this->output('Walikonten/Walikonten_kkm/v_wali_konten_sidebar', $data);
//        $this->output('Walikonten/Walikonten_kkm/v_wali_konten_listskkm', $data);
//        $this->output('Walikonten/Walikonten_kkm/v_wali_konten_footer_kkm', $data);
//    }
    
//    public function tambah_data_kkm(){
//        $this->cek();
//        
//        if($_SERVER['REQUEST_METHOD'] === 'POST') {    
//       
//            $ID_MAPEL = $this->post->POST('id_mapel', FILTER_SANITIZE_MAGIC_QUOTES);
//            $id_mapel = explode(" ", $ID_MAPEL);
//  
//            if($this->validasi->validate()) {
//                $value = array (
//                    'ID_MAPEL' => $id_mapel[0],
//                    'NILAI_KOP_PENGETAHUAN' => $this->post->POST('nilai_kop_pengetahuan',FILTER_SANITIZE_NUMBER_FLOAT),
//                    'NILAI_KOP_KETERAMPILAN' => $this->post->POST('nilai_kop_keterampilan',FILTER_SANITIZE_NUMBER_FLOAT),
//                    'NILAI_SIKAP' => $this->post->POST('nilai_sikap',FILTER_SANITIZE_MAGIC_QUOTES),
//                    'NILAI_TUGAS' => $this->post->POST('nilai_tugas',FILTER_SANITIZE_NUMBER_FLOAT),
//                    'NILAI_UTS' => $this->post->POST('nilai_uts',FILTER_SANITIZE_MAGIC_QUOTES),
//                    'NILAI_UAS' => $this->post->POST('nilai_uas',FILTER_SANITIZE_NUMBER_FLOAT),
//                    'NILAI_AHKIR' => $this->hitung_nilai_ahkir()
//                );
//                $where = array(
//                    'ID_NILAI' => $this->post->POST('id_nilai',FILTER_SANITIZE_NUMBER_INT)
//                );
//                $this->eksekusi_edit_nilai($value, $where);
//            }
//        }
//        
//        $data = array (
//            'namaCTRL' => 'Tambah Data KKM',
//            'breadcrumb' => 'Data KKM',
//            'title' => 'Halaman Wali Kelas',
//            'nama' => $this->session->getValue('username'),
//            'url' => $this->uri->baseUri
//        );
//        $this->output('Walikonten/Walikonten_kkm/v_wali_konten_header', $data);
//        $this->output('Walikonten/Walikonten_kkm/v_wali_konten_sidebar', $data);
//        $this->output('Walikonten/Walikonten_kkm/v_wali_konten_tambahkkm', $data);
//        $this->output('Walikonten/Walikonten_kkm/v_wali_konten_footer_kkm', $data);
//    }
    
    private function ceknilaidobel($ID_SISWA, $ID_MAPEL, $value){
        $this->cek();
        $results = $this->walimodel->ceknilaidobel($ID_SISWA[0], $ID_MAPEL[0]);
        
        if($results==null) {
            $tambahnilai = $this->walimodel->tambahnilai($value);
            if($tambahnilai) {
                    echo "<script>alert('Data berhasil dimasukan'); window.location = 'data-nilai' </script>";
                }
                else {
                    echo "<script>alert('Data gagal dimasukan'); window.location = 'data-nilai' </script>";
                }
            return true;
        } else {
            echo "<script>alert('Error!! Nilai sudah ada'); window.location = 'data-nilai' </script>";
            return false;
        }        
    }
    
    private function ceksiswadobel($nis_siswa, $value){
        $this->cek();
        $results = $this->walimodel->ceksiswadobel($nis_siswa[0]);
        
        if($results ==null){
            $tambahsiswa = $this->walimodel->tambahsiswakelas($value);
            if($tambahsiswa){
                    echo "<script>alert('Data berhasil dimasukan'); window.location = 'list-siswa' </script>";
                }
                else {
                    echo "<script>alert('Data gagal dimasukan'); window.location = 'list-siswa' </script>";
                }   
            return true;    
        }
        else {
           echo "<script>alert('Error!! Siswa dengan NIS tersebut sudah ada'); window.location = 'list-siswa' </script>";
           return false; 
        }
    }
    
    private function eksekusi_edit_nilai($value, $where){
        $this->cek();
        $update = $this->walimodel->validate_edit_nilai($value, $where);
        if($update) {
            echo "<script>alert('Data berhasil diperbarui'); window.location = 'data-nilai' </script>";
            return true;
        }
        else {
             echo "<script>alert('Data gagal diperbarui'); window.location = 'data-nilai' </script>";
        }
    }
    
    private function hitung_nilai_ahkir(){
        $NILAI_TUGAS = $this->post->POST('nilai_tugas',FILTER_SANITIZE_NUMBER_FLOAT);
        $NILAI_UTS = $this->post->POST('nilai_uts',FILTER_SANITIZE_MAGIC_QUOTES);
        $NILAI_UAS = $this->post->POST('nilai_uas',FILTER_SANITIZE_NUMBER_FLOAT);
        
        return $NA = ($NILAI_TUGAS + $NILAI_UTS + $NILAI_UAS)/3;
    }
    
    public function data_grafik_nilai(){
        $this->cek();
        
        $result = $this->walimodel->grafik_nilai_mapel_wali();
        
        $kolom2 = array();
        $kolom2['label'] = 'Nama Mata Pelajaran';
        $kolom2['type'] = 'string';
        
        $kolom0 = array();
        $kolom0['label'] = 'Nilai Kopetensi Pengetahuan';
        $kolom0['type'] = 'number';
        
        $kolom1 = array();
        $kolom1['label'] = 'Nilai Kopetensi Keterampilan';
        $kolom1['type'] = 'number';
                       
        $kolom3 = array();
        $kolom3['label'] = 'Nilai Tugas';
        $kolom3['type'] = 'number';
        
        $kolom4 = array();
        $kolom4['label'] = 'Nilai UTS';
        $kolom4['type'] = 'number';
        
        $kolom5 = array();
        $kolom5['label'] = 'Nilai UAS';
        $kolom5['type'] = 'number';
        
        $kolom6 = array();
        $kolom6['label'] = 'Nilai Ahkir';
        $kolom6['type'] = 'number';
        
        $cols = array ($kolom2, $kolom0, $kolom1, $kolom3, $kolom4, $kolom5, $kolom6);
        $rows = array();
        
        foreach($result as $results){
            $cell2["v"] = $results->NIS_SISWA;
            $cell0["v"] = intval($results->NILAI_KOP_PENGETAHUAN);
            $cell1["v"] = intval($results->NILAI_KOP_KETERAMPILAN);
            
            $cell3["v"] = intval($results->NILAI_TUGAS);
            $cell4["v"] = intval($results->NILAI_UTS);
            $cell5["v"] = intval($results->NILAI_UAS);
            $cell6["v"] = intval($results->NILAI_AHKIR);
            
            $row0["c"] = array($cell2, $cell0,$cell1,$cell3,$cell4,$cell5,$cell6);
            array_push($rows, $row0);
        } 
        $data = array("cols" => $cols, "rows" => $rows);
        echo json_encode($data);
    }
}
