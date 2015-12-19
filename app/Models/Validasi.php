<?php
namespace Models;
use Resources;

class Validasi extends Resources\Validation {

public $cekUserID = true;
public $cekHP = true;
    
    public function __construct()
    {
        parent::__construct();
        $this->db = new Resources\Database;
        $this->setRuleErrorMessages(
            array(
                'required' => '%label% tidak boleh kosong',
                'numeric' => '%label% Harus Berupa Angka',
                'compare' => '%label% harus samas dengan %comparatorLabel%',
                'min' => '%label% harus lebih dari 5 karakter'
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
                'label' => 'ID Siswa'            
            ),
            
            'idsiswa_edit' => array(
                'rules' => array(
                    'required',
                    'numeric',
                    //'min' => 3,
                    //'max' => 15,
                    //'regex' => '/^([-a-z0-9_-])+$/i',
                    'callback' => 'idsiswa_edit'
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
            
            'nohp_edit' => array(
                'rules' => array(
                    'required',
                    'numeric',
                    'callback' => 'hpsiswa_edit'
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
                    'required',
                    'min' => 5
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
    
    public function idsiswa_edit($field, $value)
    {
         $this->cekUserID = false;
         $result = $this->db->row("SELECT ID_SISWA FROM table_siswa WHERE ID_SISWA='".$value."' ");
         
         if(! $this->cekUserID)
         return true;
         
         if(! $result == null)
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
    
    public function hpsiswa_edit($field, $value)
    {
        $this->cekHP = false;
        
        $result = $this->db->row("SELECT NO_TELP FROM table_siswa WHERE NO_TELP='".$value."' ");
        
        if(! $this->cekHP)
        return true;
         
        if(! $result == null)
        return true;
         
        $this->setErrorMessage($field, 'Nomor Hanphone Sudah Terdaftar.');
        return false;
    }
}
?>