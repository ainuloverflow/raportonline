<?php
namespace Models;
use Resources;
 
class M_login {
    public function __construct(){
        $this->db = new Resources\Database;
    }
    
    public function loginsiswa($username, $password){
    	Return $result = $this->db->row("SELECT * FROM table_siswa WHERE ID_SISWA = '$username' AND PASSWORD = '$password' ");
    }
	
    public function loginguru($username, $password){
        Return $result = $this->db->row("SELECT * FROM table_guru_mapel WHERE NIP = '$username' AND PASSWORD ='$password' ");
    }
    
    public function loginwali($username, $password){
        Return $result = $this->db->row("SELECT * FROM table_guru_mapel AS a JOIN table_wali_kelas AS b 
                                         ON a.ID_WALI = b.ID_WALI WHERE a.NIP = '$username' AND a.PASSWORD ='$password' ");
    }
    
    public function loginortu($username, $password){
        Return $result = $this->db->row("SELECT * FROM table_orang_tua WHERE NAMA = '$username' AND PASSWORD = '$password' ");
    }
}