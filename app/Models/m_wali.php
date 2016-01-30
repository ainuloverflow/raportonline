<?php
namespace Models;
use Resources;
 
class M_wali {
    public function __construct(){
        $this->session = new Resources\Session;
        $this->db = new Resources\Database;
    }
    
    public function bacaortu($page = 1, $limit = 10) {
        $offset = ($limit * $page) - $limit;
    	Return $result = $this->db->results("SELECT ortu.ID_ORANGTUA, siswa.NAMA_SISWA, ortu.NAMA, ortu.ALAMAT, ortu.PEKERJAAN FROM table_orang_tua AS ortu INNER JOIN table_siswa AS siswa WHERE "
                . "ortu.ID_SISWA = siswa.ID_SISWA ORDER BY ID_ORANGTUA ASC LIMIT $offset, $limit");
    }
    
    public function bacasiswakelas($page = 1, $limit = 10) {
        $offset = ($limit * $page) - $limit;
    	Return $result = $this->db->results("SELECT * FROM table_siswa ORDER BY ID_SISWA ASC LIMIT $offset, $limit");
    }
    
    public function tambahortusiswakelas($value) {
        Return $this->db->insert("table_orang_tua", $value);
    }
    
    public function tambahsiswakelas($value) {
        Return $result = $this->db->insert("table_siswa", $value);
    }
   
    public function geteditsiswakelas($value) {
        Return $this->db->row("SELECT * FROM table_siswa WHERE ID_SISWA = $value ");
    }
    
    public function get_edit_ortusiswa_kelas($value) {
        Return $this->db->row("SELECT * FROM table_orang_tua WHERE ID_ORANGTUA = $value ");
    }
    
    public function getnamasiswa($namasiswa) {
        Return $this->db->results("SELECT * FROM table_siswa WHERE NAMA_SISWA LIKE '%$namasiswa%'");
    }
    
    public function getnamasiswall() {
        Return $this->db->results("SELECT * FROM table_siswa");
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
    
    public function query($idwali) {
        Return $this->db->row("SELECT ID_KELAS FROM table_wali_kelas AS wali INNER JOIN table_guru_mapel AS guru "
                . "ON wali.ID_WALI = guru.ID_GURU WHERE wali.ID_WALI = $idwali");
    }
    
    public function hapusdatasiswakelas() {
            
    }
}