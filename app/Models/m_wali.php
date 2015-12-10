<?php
namespace Models;
use Resources;
 
class M_wali {
    public function __construct(){
        $this->db = new Resources\Database;
    }
    
    public function bacadatasiswa($page = 1, $limit = 10) {
        $offset = ($limit * $page) - $limit;
    	Return $result = $this->db->results("SELECT * FROM table_siswa ORDER BY ID_SISWA ASC LIMIT $offset, $limit");
    }
    
    public function tambahdatasiswa() {
            
    }
    
    public function editdatasiswa() {
            
    }
    
    public function hapusdatasiswa() {
            
    }
}