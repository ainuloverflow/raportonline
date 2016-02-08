<?php
namespace Models;
use Resources;
 
class M_wali {
    public function __construct(){
        $this->session = new Resources\Session;
        $this->db = new Resources\Database;
    }
    
    private function isValue($id_kelas='', $id_wali='') {
        Return $id_kelas = $this->session->getValue("ID_KELAS");
        Return $id_wali = $this->session->getValue("ID_WALI");
    }
    
    public function bacaortu($page = 1, $limit = 10) { // read ortu
        $offset = ($limit * $page) - $limit;
    	Return $result = $this->db->results("SELECT ortu.ID_ORANGTUA, siswa.NAMA_SISWA, ortu.NAMA, ortu.ALAMAT, ortu.PEKERJAAN FROM table_orang_tua AS ortu INNER JOIN table_siswa AS siswa WHERE "
                . "ortu.ID_SISWA = siswa.ID_SISWA ORDER BY ID_ORANGTUA ASC LIMIT $offset, $limit");
    }
    
    public function bacasiswakelas($page = 1, $limit = 10, $id_kelas) { // read siswa
        $offset = ($limit * $page) - $limit;
    	Return $result = $this->db->results("SELECT * FROM table_siswa WHERE id_kelas = '$id_kelas' ORDER BY ID_SISWA ASC LIMIT $offset, $limit");
    }
    
    public function bacanilaisiswa($page = 1, $limit = 10) {
        $offset = ($limit * $page) - $limit;
    	Return $result = $this->db->results("SELECT * FROM table_nilai AS nilai "
                . "INNER JOIN table_siswa AS siswa ON nilai.ID_SISWA = siswa.ID_SISWA "
                . "INNER JOIN table_mapel AS mapel ON nilai.ID_MAPEL = mapel.ID_MAPEL "
                . "ORDER BY nilai.ID_NILAI ASC LIMIT $offset, $limit");
    }
    
    public function tambahnilai($value) { //insert data nilai
        Return $this->db->insert("table_nilai", $value);
    }
    
    public function tambahnilais($values) { //insert data nilai_pengetahuan
        Return $this->db->insert("table_nilai_pengetahuan", $values);
    }
    
    public function tambahortusiswakelas($value) { //insert data ortu siswa
        Return $this->db->insert("table_orang_tua", $value);
    }
    
    public function tambahsiswakelas($value) { //insert data siswa
        Return $result = $this->db->insert("table_siswa", $value);
    }
   
    public function geteditsiswakelas($value) { //edit siswa
        Return $this->db->row("SELECT * FROM table_siswa WHERE ID_SISWA = $value ");
    }
    
    public function get_edit_ortusiswa_kelas($value) { //edit orang tua
        Return $this->db->row("SELECT * FROM table_orang_tua WHERE ID_ORANGTUA = $value ");
    }
    
    public function getnamasiswa($namasiswa) {
        Return $this->db->results("SELECT * FROM table_siswa WHERE NAMA_SISWA LIKE '%$namasiswa%'");
    }
    
    public function getnamasiswall() {
        $id_kelas = $this->isValue($id_kelas='');
        Return $this->db->results("SELECT * FROM table_siswa WHERE ID_KELAS = '$id_kelas'");
    }
    
    public function getmapelall() {
        Return $this->db->results("SELECT * FROM table_mapel");
    }
    
    public function validate_edit_siswakelas($value, $where) {
        Return $this->db->update('table_siswa', $value, $where);
    }
    
    public function validate_edit_ortusiswa($value, $where) {
        Return $this->db->update('table_orang_tua', $value, $where);
    }
    
    public function hapus_siswakelas($value) {
        Return $this->db->delete('table_siswa', $value);
    }
    
    public function hapus_ortusiswa_kelas($value) {
        Return $this->db->delete('table_orang_tua', $value);
    }
    
    /**public function query($idwali) {
        Return $this->db->row("SELECT ID_KELAS FROM table_wali_kelas AS wali INNER JOIN table_guru_mapel AS guru "
                . "ON wali.ID_WALI = guru.ID_GURU WHERE wali.ID_WALI = $idwali");
    }**/
    public function ceknilaidobel($nilai) {
        Return $this->db->row("SELECT table_nilai.ID_SISWA FROM table_nilai INNER JOIN table_nilai_pengetahuan WHERE table_nilai.ID_SISWA = '$nilai'");
    }
   
}