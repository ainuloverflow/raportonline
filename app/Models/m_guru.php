<?php
namespace Models;
use Resources;
 
class M_guru {
    public function __construct(){
        $this->session = new Resources\Session;
        $this->db = new Resources\Database;
    }
    
    public function grafik_nilai_mapel_guru(){
        $id_mapel = $this->session->getValue("ID_MAPEL");
//        $nama_mapel = $this->session->getValue("NAMA_MAPEL");
     
        Return $result = $this->db->results("SELECT * FROM table_nilai AS nilai "
                . "INNER JOIN table_mapel AS mapel ON nilai.ID_MAPEL = mapel.ID_MAPEL "
                . "INNER JOIN table_siswa AS siswa ON nilai.ID_SISWA = siswa.ID_SISWA "
                . "WHERE mapel.ID_MAPEL = $id_mapel");
//                . "WHERE mapel.NAMA_MAPEL = $nama_mapel");
    }

    public function bacanilaisiswa($page = 1, $limit = 10) { // query data siswa dengan pagenation
        $offset = ($limit * $page) - $limit;
        $nama_mapel = $this->session->getValue("NAMA_MAPEL");
        $id_kelas = $this->session->getValue("ID_KELAS");
        
    	Return $result = $this->db->results("SELECT * FROM table_nilai AS nilai "
            . "INNER JOIN table_siswa AS siswa ON nilai.ID_SISWA = siswa.ID_SISWA "
            . "INNER JOIN table_mapel AS mapel ON nilai.ID_MAPEL = mapel.ID_MAPEL "
            . "WHERE mapel.NAMA_MAPEL = '$nama_mapel' "
            . "AND siswa.ID_KELAS = $id_kelas "
            . "ORDER BY nilai.ID_NILAI "
            . "ASC LIMIT $offset, $limit");
    }
        
    public function tambahnilai($value) { //query insert data_nilai
        Return $this->db->insert("table_nilai", $value);
    }
        
    public function get_edit_nilaisiswa($value) { //query edit nilai
        Return $this->db->row("SELECT * FROM table_nilai AS a "
                . "INNER JOIN table_siswa AS b ON a.ID_SISWA = b.ID_SISWA "
                . "INNER JOIN table_mapel AS c ON a.ID_MAPEL = c. ID_MAPEL "
                . "WHERE ID_NILAI = $value ");
    }
    
    public function validate_edit_nilai($value, $where) { //query validasi edit nilai siswa
        Return $this->db->update('table_nilai', $value, $where);
    }
    
    public function getnamasiswall() { //query get all namasiswa sesuai id kelas
        $id_kelas = $this->session->getValue("ID_KELAS");
        Return $this->db->results("SELECT * FROM table_siswa WHERE ID_KELAS = '$id_kelas'");
    }
    
    public function getmapelall() { //query get all nama mapel sesuai id mapel
        $id_mapel = $this->session->getValue("ID_MAPEL");
        Return $this->db->results("SELECT * FROM table_mapel WHERE ID_MAPEL = '$id_mapel'");
    }
    
    public function getkkm() { //query get all kkm sesuai id kelas
        //$id_mapel = $this->isValue($id_mapel='');
        Return $this->db->results("SELECT * FROM table_kkm");
    }
    
    public function ceknilaidobel($ID_SISWA, $id_mapel) { //query cek nilai dobel
        Return $this->db->row("SELECT ID_SISWA FROM table_nilai WHERE ID_SISWA = '$ID_SISWA' AND ID_MAPEL = '$id_mapel'");
    }
}   