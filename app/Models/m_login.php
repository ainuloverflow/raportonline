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
    
    public function loginwali($username, $password){
        Return $result = $this->db->row("SELECT DISTINCT * FROM table_guru_mapel AS a "
        . "INNER JOIN table_mapel AS b ON a.ID_MAPEL = b.ID_MAPEL "
        . "INNER JOIN table_kelas AS c ON a.ID_KELAS = c.ID_KELAS "
        . "WHERE NIP = '$username' AND PASSWORD = '$password' AND ID_WALI = 1");
    }
    
    public function loginguru($username, $password){
        Return $result = $this->db->row("SELECT DISTINCT * FROM table_guru_mapel AS a "
        . "INNER JOIN table_mapel AS b ON a.ID_MAPEL = b.ID_MAPEL "
        . "INNER JOIN table_kelas AS c ON a.ID_KELAS = c.ID_KELAS "
        . "WHERE a.NIP = '$username' AND a.PASSWORD = '$password' ");
    }
    
    public function loginortu($username, $password){
        Return $result = $this->db->row("SELECT * FROM table_orang_tua WHERE USERNAME = '$username' AND PASSWORD = '$password' ");
    }
    
    public function login_admin($username, $password){
        Return true;
    }
}