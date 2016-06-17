<?php

namespace Controllers;
use Resources, Models, Libraries;

class Guru extends Resources\Controller 
{
    public function __construct(){
        parent::__construct();
        $this->post = new Resources\Request;
        $this->session = new Resources\Session;
        $this->gurumodel = new Models\M_guru;
        $this->validasi = new Models\Validasi;
        $this->pagination = new Resources\Pagination();
        $this->enkripsi = new Libraries\Enkripsi;
    }
    
    private function nama_mapel(){
        Return $this->session->getValue('NAMA_MAPEL');
    }
    
    public function cek(){
        $ceklogin = $this->session->getValue('isLoginGuru');
        $cekguru = $this->session->getValue('ID_GURU');
        
        if ($ceklogin == true && $cekguru) {
            return true;
        } else {
            $this->redirect('login');
            return false;
        }
    }
    
    public function cek_id_mapel(){ //fungsi untuk cek id mapel sesuai guru pengamupu matapel
        Return $this->session->getValue('ID_MAPEL');
    }
    
    public function index() {
        $this->cek();
        $data = array (
            'nama' => $this->session->getValue('username'),
            'title' => 'Dashboard Guru',
            'header' => 'Dashboard Guru',
            'dash' => 'Guru',
            'konten' => 'Dashboard Guru',
            'url' => $this->uri->baseUri
        );
        
        $this->output('Gurukonten/Gurukonten_home/v_header_backend', $data);
        $this->output('Gurukonten/v_guru_konten_sidebar', $data);
        $this->output('Gurukonten/Gurukonten_home/v_home_guru', $data);   
        $this->output('Gurukonten/Gurukonten_home/v_footer_backend', $data);
    }
    
    public function data_nilai($page = 1){ //baca data nilai oleh guru
        $this->cek();
        $nama_mapel = $this->nama_mapel();
        $page = (int) $page;
        $limit = 10;
        
        $data = array(
            'nilaisiswa' => $this->gurumodel->bacanilaisiswa($page, $limit),
            'nama' => $this->session->getValue('username'),
            'namaCTRL' => 'DATA NILAI '."<strong>$nama_mapel</strong>",
            'title' => 'Dashboard Guru',
            'header' => 'Dashboard Guru',
            'dash' => 'Guru',
            'url' => $this->uri->baseUri
        );
                
        $this->output('Gurukonten/Gurukonten_nilai/v_guru_konten_header', $data);
        $this->output('Gurukonten/v_guru_konten_sidebar', $data);;
        $this->output('Gurukonten/Gurukonten_nilai/v_guru_konten_listnilai', $data);   
        $this->output('Gurukonten/Gurukonten_nilai/v_guru_konten_footer_nilai', $data);
    }
    
    public function tambah_nilai(){
        $this->cek();
        $id_mapel = $this->cek_id_mapel();
        $nama_mapel = $this->nama_mapel();
        
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            $idsiswa=$this->post->POST('id_siswa',FILTER_SANITIZE_STRING);
            $ID_SISWA = explode(" ", $idsiswa);

            if($this->validasi->validate()) {                                                         
                $value = array (
                    'ID_SISWA' => $ID_SISWA[0],
                    'ID_MAPEL' => $id_mapel,
                    'ID_KKM' => 1,
                    //'ID_KOPDAR' => NULL,
                    'NILAI_KOP_PENGETAHUAN' => $this->post->POST('nilai_kop_pengetahuan',FILTER_SANITIZE_MAGIC_QUOTES),
                    'NILAI_KOP_KETERAMPILAN' => $this->post->POST('nilai_kop_keterampilan',FILTER_SANITIZE_MAGIC_QUOTES),
                    'NILAI_SIKAP' => $this->post->POST('nilai_sikap',FILTER_SANITIZE_NUMBER_FLOAT),
                    'NILAI_TUGAS' => $this->post->POST('nilai_tugas',FILTER_SANITIZE_NUMBER_FLOAT),
                    'NILAI_UTS' => $this->post->POST('nilai_uts',FILTER_SANITIZE_NUMBER_FLOAT),
                    'NILAI_UAS' => $this->post->POST('nilai_uas',FILTER_SANITIZE_NUMBER_FLOAT)
                );
                $this->cek_input_nilai_dobel($ID_SISWA, $id_mapel, $value);
            }
        }
        $data = array (
            'validasi' => $this->validasi,
            'sisall' => $this->gurumodel->getnamasiswall(),
            //'mapelall' => $this->gurumodel->getmapelall(),
            //'kelasall' => $this->gurumodel->getkelasall(),
            'breadcrumb' => 'Data Nilai',
            'namaCTRL' => 'TAMBAH DATA NILAI '."<strong>$nama_mapel</strong>",
            'title' => 'Halaman Guru',
            'nama' => $this->session->getValue('username'),
            'url' => $this->uri->baseUri
        );
        $this->output('Gurukonten/Gurukonten_nilai/v_guru_konten_header', $data);
        $this->output('Gurukonten/v_guru_konten_sidebar', $data);
        $this->output('Gurukonten/Gurukonten_nilai/v_guru_konten_tambahnilai', $data);
        $this->output('Gurukonten/Gurukonten_nilai/v_guru_konten_footer_nilai', $data);
    }
    
    public function edit_nilai(){
        $this->cek();
        $nama_mapel = $this->nama_mapel();
        
        $hasil = $this->enkripsi->safe_b64decode(addslashes($this->resource->uri->path(1)));
        
         $data = array (
            'editnilai' => $this->gurumodel->get_edit_nilaisiswa($hasil),
            'sisall' => $this->gurumodel->getnamasiswall(),
            //'mapelall' => $this->gurumodel->getmapelall(),
            'namaCTRL' => 'EDIT DATA NILAI '."<strong>$nama_mapel</strong>",
            'breadcrumb' => 'Data Nilai',
            'title' => 'Halaman Guru',
            'nama' => $this->session->getValue('username'),
            'url' => $this->uri->baseUri
        );
        $this->output('Gurukonten/Gurukonten_nilai/v_guru_konten_header', $data);
        $this->output('Gurukonten/v_guru_konten_sidebar', $data);
        $this->output('Gurukonten/Gurukonten_nilai/v_guru_konten_editnilai', $data);
        $this->output('Gurukonten/Gurukonten_nilai/v_guru_konten_footer_nilai', $data);
    }
    
    public function validate_edit_nilai(){
        $this->cek();
        $id_mapel = $this->cek_id_mapel();
        
        if($_SERVER['REQUEST_METHOD'] === 'POST') {    
            
            $ID_SISWA = $this->post->POST('id_siswa',FILTER_SANITIZE_MAGIC_QUOTES);
            $id_siswa = explode(" ", $ID_SISWA);
            //$ID_KKM = $this->post->POST('id_kkm', FILTER_SANITIZE_MAGIC_QUOTES);
            //$id_kkm = explode(" ", $ID_KKM);
            
            if($this->validasi->validate()) { 
                $value = array (
                    'ID_MAPEL' => $id_mapel,
                    'ID_SISWA' => $id_siswa[0],
                    'ID_KKM' => 1,
                    'NILAI_KOP_PENGETAHUAN' => $this->post->POST('nilai_kop_pengetahuan',FILTER_SANITIZE_MAGIC_QUOTES),
                    'NILAI_KOP_KETERAMPILAN' => $this->post->POST('nilai_kop_keterampilan',FILTER_SANITIZE_MAGIC_QUOTES),
                    'NILAI_SIKAP' => $this->post->POST('nilai_sikap',FILTER_SANITIZE_MAGIC_QUOTES),
                    'NILAI_TUGAS' => $this->post->POST('nilai_tugas',FILTER_SANITIZE_MAGIC_QUOTES),
                    'NILAI_UTS' => $this->post->POST('nilai_uts',FILTER_SANITIZE_MAGIC_QUOTES),
                    'NILAI_UAS' => $this->post->POST('nilai_uas',FILTER_SANITIZE_MAGIC_QUOTES)
                );
                $where = array(
                    'ID_NILAI' => $this->post->POST('id_nilai',FILTER_SANITIZE_NUMBER_INT)
                );
                $this->eksekusi_edit_nilai($value, $where);
            }
        }
        $data = array (
            'validasi' =>$this->validasi,
            'sisall' => $this->gurumodel->getnamasiswall(),
            //'mapelall' => $this->gurumodel->getmapelall(),
            //'kkm' => $this->gurumodel->getkkm(),
            'namaCTRL' => 'EDIT DATA NILAI SISWA',
            'breadcrumb' => 'Edit Data Nilai Siswa',
            'title' => 'Halaman Guru Kelas',
            'nama' => $this->session->getValue('username'),
            'url' => $this->uri->baseUri
        );
        $this->output('Gurukonten/Gurukonten_nilai/v_guru_konten_header', $data);
        $this->output('Gurukonten/v_guru_konten_sidebar', $data);
        $this->output('Gurukonten/Gurukonten_nilai/v_guru_konten_validasieditnilai', $data);
        $this->output('Gurukonten/Gurukonten_nilai/v_guru_konten_footer_nilai', $data);
    }
    
    /** hapus nilai siswa*/
    public function hapus_nilai() {
        $this->cek();
        $value = $this->enkripsi->safe_b64decode(addslashes($this->resource->uri->path(1)));
        $where = array('ID_SISWA' => $value);
        
        $this->gurumodel->hapus_nilai($where);
        $this->redirect('data-nilai-as-guru');
    }
    /** end hapus nilai siswa */
    
//    public function cetak_rapot_siswa(){
//       // Column headings
//        $header = array('Country', 'Capital', 'Area (sq km)', 'Pop. (thousands)');
//        
//        // Data loading
//        $data = array(
//            array('Austria','Vienna','83859','8075'),
//            array('Belgium','Brussels','30518','8075'),
//            array('Denmark','Copenhagen','30518','8075'),
//        );
//        
//        $this->fpdf->SetFont('Arial','',14);
//        $this->fpdf->AddPage();
//        $this->fpdf->BasicTable($header,$data);
//        $this->fpdf->AddPage();
//        $this->fpdf->ImprovedTable($header,$data);
//        $this->fpdf->AddPage();
//        $this->fpdf->FancyTable($header,$data);
//        $this->fpdf->Output();
//    }
    
    public function grafik_nilai(){
        $this->cek();      
        
        $data = array(
            'nama' => $this->session->getValue('username'),
            'nama_mapel' => $this->nama_mapel(),
            'title' => 'Dashboard Guru',
            'header' => 'Dashboard Guru',
            'kontendash' => 'Dashboard Guru',
            'url' => $this->uri->baseUri
        );
        
        $this->output('Gurukonten/Gurukonten_grafik/v_guru_konten_header', $data);
        $this->output('Gurukonten/v_guru_konten_sidebar', $data);
        $this->output('Gurukonten/Gurukonten_grafik/v_guru_konten_grafik', $data);
        $this->output('Gurukonten/Gurukonten_grafik/v_guru_konten_footer_grafik', $data);
    }
    
    public function data_grafik_nilai(){
        $this->cek();
        
        $result = $this->gurumodel->grafik_nilai_mapel_guru();
        
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
    
    private function cek_input_nilai_dobel($ID_SISWA, $id_mapel, $value){ //fungsi untuk cek input nilai dobel untuk guru
        $this->cek();
        $results = $this->gurumodel->ceknilaidobel($ID_SISWA[0], $id_mapel);
        
        if($results==null) {
            $tambahnilai = $this->gurumodel->tambahnilai($value);
            if($tambahnilai) {
                    echo "<script>alert('Data berhasil dimasukan'); window.location = 'data-nilai-as-guru' </script>";
                }
                else {
                    echo "<script>alert('Data gagal dimasukan'); window.location = 'data-nilai-as-guru' </script>";
                }
            return true;
        } else {
            echo "<script>alert('Error!! Nilai sudah ada'); window.location = 'data-nilai-as-guru' </script>";
            return false;
        }        
    }
    
    private function eksekusi_edit_nilai($value, $where){ //Cek edit nilai dobel
        $this->cek();
        $update = $this->gurumodel->validate_edit_nilai($value, $where);
        if ($update){
            echo "<script>alert('Data berhasil diperbarui'); window.location = 'data-nilai-as-guru' </script>";
            return true;
        }
        else {
            echo "<script>alert('Data gagal diperbarui'); window.location = 'data-nilai-as-guru' </script>";
            return false;
        }
    }
}


    
