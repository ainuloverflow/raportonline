<?php
namespace Models;
use Resources;

class Validasi extends Resources\Validation {
    
    public function __construct()
    {
        parent::__construct();
        $this->db = new Resources\Database;
        $this->setRuleErrorMessages(
            array(
                'required' => '%label% tidak boleh kosong',
                'numeric' => '%label% Harus Berupa Angka'
            )
        );
    }
    
    public function setRules()
    {
        return array(
            
            'idsiswa' => array(
                'rules' => array(
                    'required',
                    'numeric',
                    //'min' => 3,
                    //'max' => 15,
                    //'regex' => '/^([-a-z0-9_-])+$/i',
                    'callback' => 'cekidsiswa'
                ),
                'label' => 'ID Siswa',
                'filter' => array('trim', 'strtolower')
            ),
            
            'nama' => array(
                'rules' => array(
                    'required',
                    'regex' => '/^([a-zA-Z .])+$/i'
                ),
                'label' => 'Nama',
                'filter' => array('trim', 'strtolower')
            ),
            
            'alamat' => array(
                'rules' => array(
                    'required',
                ),
                'label' => 'Alamat',
                'filter' => array('trim', 'strtolower')
            ),
            
            'nohp' => array(
                'rules' => array(
                    'required',
                    'numeric',
                    'callback' => 'cekhpsiswa'
                ),
                'label' => 'No. Handphone',
                'filter' => array('trim', 'strtolower')
            ),
            
            'jenkel' => array(
                'rules' => array(
                    'required',      
                ),
                'label' => 'Jenis Kelamin'
            ),
            
            'password' => array(
                'rules' => array(
                    'required',
                    'min' => 5,
                    'regex' => '/^([-a-z0-9_-])+$/i',
                    'compare' => 'verifikasipass'
                ),
                'label' => 'Password',
                'filter' => array('trim')
            ),
            
            'verifikasipass' => array(
                'rules' => array(
                    'required'
                ),
                'label' => 'Konfirmasi Password',
                'filter' => array('trim')
            )
            );
    }
    
    public function cekidsiswa($field, $value)
    {
         $result = $this->db->row("SELECT ID_SISWA FROM table_siswa WHERE ID_SISWA='".$value."' ");
         
         if( $result == null)
         return true;
         
         $this->setErrorMessage($field, 'Username Sudah Terdaftar.');
        
         return false;
    }
    
    public function cekhpsiswa($field, $value)
    {
         $result = $this->db->row("SELECT NO_TELP FROM table_siswa WHERE NO_TELP='".$value."' ");
         
         if( $result == null)
         return true;
         
         $this->setErrorMessage($field, 'Nomor Hanphone Sudah Terdaftar.');
        
         return false;
    }
}

?>