<?php
namespace Models;
use Resources;
 
class M_wali {
    public function __construct(){
        $this->session = new Resources\Session;
        $this->db = new Resources\Database;
    }
    
    public function grafik_nilai_mapel_wali(){
        $id_mapel = $this->session->getValue("ID_MAPEL");
        $nama_mapel = $this->session->getValue("NAMA_MAPEL");
        
        Return $result = $this->db->results("SELECT * FROM table_nilai AS nilai "
                . "INNER JOIN table_mapel AS mapel ON nilai.ID_MAPEL = mapel.ID_MAPEL "
                . "INNER JOIN table_siswa AS siswa ON nilai.ID_SISWA = siswa.ID_SISWA "
                . "WHERE mapel.ID_MAPEL = $id_mapel");
//                . "WHERE mapel.NAMA_MAPEL = $nama_mapel");
    }
    
    public function nilai_mapel_wali($nama_mapel){
        Return $result = $this->db->results("SELECT * FROM table_nilai AS nilai "
                . "INNER JOIN table_mapel AS mapel ON nilai.ID_MAPEL = mapel.ID_MAPEL "
                . "INNER JOIN table_siswa AS siswa ON nilai.ID_SISWA = siswa.ID_SISWA "
                . "WHERE mapel.NAMA_MAPEL = '$nama_mapel'");
//                . "WHERE mapel.NAMA_MAPEL = $nama_mapel");
    }
    
    public function tampil_mapel(){
        Return $result = $this->db->reseults("SELECT * FROM table_mapel");
    }
    
    public function bacaortu($page = 1, $limit = 10) { // query data orang tua dengan pagenation
        $offset = ($limit * $page) - $limit;
        $id_kelas = $this->session->getValue("ID_KELAS");
        Return $result = $this->db->results("SELECT DISTINCT * FROM table_orang_tua AS ortu "
                . "INNER JOIN table_kelas AS kelas ON kelas.ID_KELAS = $id_kelas "
                . "ORDER BY ortu.ID_ORANGTUA ASC LIMIT $offset, $limit");
    }
    
    public function bacasiswakelas($page = 1, $limit = 10) { // query data siswa dengan pagenation
        $id_kelas = $this->session->getValue("ID_KELAS");
        $offset = ($limit * $page) - $limit;
    	return $result = $this->db->results("SELECT * FROM table_siswa WHERE ID_KELAS = $id_kelas ORDER BY ID_KELAS ASC LIMIT $offset, $limit");
    }
    
    public function totalsiswa_kelas(){
        $id_kelas = $this->session->getValue("ID_KELAS");
        Return $result = $this->db->getVar("SELECT COUNT(ID_SISWA) FROM table_siswa "
                . "WHERE ID_KELAS = $id_kelas");
    }
    
    public function bacanilaisiswa($page = 1, $limit = 10) { // query data siswa dengan pagenation
        $offset = ($limit * $page) - $limit;
        $id_kelas = $this->session->getValue("ID_KELAS");
    	Return $result = $this->db->results("SELECT * FROM table_nilai AS nilai "
                . "INNER JOIN table_siswa AS siswa ON nilai.ID_SISWA = siswa.ID_SISWA "
                . "INNER JOIN table_mapel AS mapel ON nilai.ID_MAPEL = mapel.ID_MAPEL "
                . "WHERE siswa.ID_KELAS = $id_kelas "
                . "ORDER BY nilai.ID_NILAI ASC LIMIT $offset, $limit");
    }
    
    public function tambahnilai($value) { //query insert data_nilai
        Return $this->db->insert("table_nilai", $value);
    }
    
    public function tambahortusiswakelas($value) { //query insert data ortu siswa
        Return $this->db->insert("table_orang_tua", $value);
    }
    
    public function tambahsiswakelas($value) { //query insert data siswa
        Return $result = $this->db->insert("table_siswa", $value);
    }
    
    public function reset_password_siswa($value, $where) { //query reset password siswa
        Return $result = $this->db->update("table_siswa", $value, $where);
    }
    
    public function reset_password_ortu($value, $where) { //query reset password orang tua
        Return $result = $this->db->update("table_orang_tua", $value, $where);
    }
   
    public function geteditsiswakelas($value) { //query edit siswa
        Return $this->db->row("SELECT * FROM table_siswa AS a "
                . "INNER JOIN table_kelas AS b ON a.ID_KELAS = b.ID_KELAS "
                . "INNER JOIN table_orang_tua AS c ON a.ID_ORANGTUA = c.ID_ORANGTUA "
                . "WHERE a.ID_SISWA = $value ");
    }
    
    public function get_edit_ortusiswa_kelas($value) { //query edit orang tua
        Return $this->db->row("SELECT * FROM table_orang_tua WHERE ID_ORANGTUA = $value ");
    }
    
    public function get_edit_nilaisiswa($value) { //query edit nilai
        Return $this->db->row("SELECT * FROM table_nilai AS a "
                . "INNER JOIN table_siswa AS b ON a.ID_SISWA = b.ID_SISWA "
                . "INNER JOIN table_mapel AS c ON a.ID_MAPEL = c. ID_MAPEL "
                . "WHERE ID_NILAI = $value ");
    }
    
    /*public function getnamasiswa($namasiswa) { //query get all nama siswa
        Return $this->db->results("SELECT * FROM table_siswa WHERE NAMA_SISWA LIKE '%$namasiswa%'");
    }**/
    
    public function getnamasiswall() { //query get all namasiswa sesuai id kelas
        $id_kelas = $this->session->getValue("ID_KELAS");
        Return $this->db->results("SELECT * FROM table_siswa WHERE ID_KELAS = '$id_kelas'");
    }
    
    public function getmapel_by_idkelas() { //query get all nama mapel sesuai id kelas
        $id_mapel = $this->session->getValue("ID_MAPEL");
        Return $this->db->results("SELECT * FROM table_mapel WHERE ID_MAPEL = '$id_mapel'");
    }
    
    public function getmapelall() { //query get all nama mapel untuk wali kelas
        Return $this->db->results("SELECT * FROM table_mapel");
    }
    
    public function getortuall(){ //query get all orang tua untuk wali kelas
         Return $this->db->results("SELECT * FROM table_orang_tua");
    }
    
    public function validate_edit_siswakelas($value, $where) { //query validasi edit siswa kelas
        Return $this->db->update('table_siswa', $value, $where);
    }
    
    public function validate_edit_ortusiswa($value, $where) { //query validasi edit orang tua kelas
        Return $this->db->update('table_orang_tua', $value, $where);
    }
    
    public function validate_edit_nilai($value, $where) { //query validasi edit nilai siswa
        Return $this->db->update('table_nilai', $value, $where);
    }
    
    public function hapus_siswakelas($value) { //query hapus siswa kelas
        Return $this->db->delete('table_siswa', $value);
    }
    
    public function hapus_ortusiswa_kelas($value) { //query hapus orangtua siswa kelas
        Return $this->db->delete('table_orang_tua', $value);
    }
    
    public function hapus_nilai_siswa($value) { //query hapus siswa kelas
        //$wheres=implode($where, ",");
        Return $this->db->delete('table_nilai', $value);
    }
    
    /**public function query($idwali) {
        Return $this->db->row("SELECT ID_KELAS FROM table_wali_kelas AS wali INNER JOIN table_guru_mapel AS guru "
                . "ON wali.ID_WALI = guru.ID_GURU WHERE wali.ID_WALI = $idwali");
    }**/
    public function ceknilaidobel($ID_SISWA, $ID_MAPEL) { //query cek nilai dobel
        Return $this->db->row("SELECT ID_SISWA FROM table_nilai WHERE ID_SISWA = '$ID_SISWA' AND ID_MAPEL = '$ID_MAPEL'");
    }
    
    public function ceksiswadobel($NIS_SISWA) { //query cek nilai dobel
        Return $this->db->row("SELECT NIS_SISWA FROM table_siswa WHERE NIS_SISWA = $NIS_SISWA[0]");
    }
}