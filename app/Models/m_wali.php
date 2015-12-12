<?php
namespace Models;
use Resources;
 
class M_wali {
    public function __construct(){
        $this->session = new Resources\Session;
        $this->db = new Resources\Database;
    }
    
    public function bacadatasiswa($page = 1, $limit = 10) {
        $offset = ($limit * $page) - $limit;
    	Return $result = $this->db->results("SELECT * FROM table_siswa ORDER BY ID_SISWA ASC LIMIT $offset, $limit");
    }
    
    public function tambahsiswakelas($value) {
        Return $result = $this->db->insert("table_siswa", $value);
    }
    
    public function query($idwali) {
        Return $this->db->row("SELECT ID_KELAS FROM table_wali_kelas AS wali INNER JOIN table_guru_mapel AS guru "
                . "ON wali.ID_WALI = guru.ID_GURU WHERE wali.ID_WALI = $idwali");
    }
    
    public function editdatasiswa() {
            
    }
    
    public function hapusdatasiswa() {
            
    }
}