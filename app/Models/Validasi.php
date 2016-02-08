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
            array (
                'required' => '%label% tidak boleh kosong',
                'numeric' => '%label% harus berupa angka',
                'compare' => '%label% harus sama dengan %comparatorLabel%',
                'min' => '%label% harus lebih dari 5 karakter'
            )
        );
    }
    
    public function setRules()
    {
        return array (
            'id_orangtua' => array(
                'rules' => array(
                    'required'
                ),
                'label' => 'ID Orang Tua',
                'filter' => array('trim')
            ),
            
            'id_siswa' => array(
                'rules' => array(
                    'required'
                ),
                'label' => 'ID Siswa',
                'filter' => array('trim')
            ),
            
            'id_mapel' => array(
                'rules' => array(
                    'required'
                ),
                'label' => 'ID Mapel',
                'filter' => array('trim')
            ),
            
            'nilai_prak' => array(
                'rules' => array(
                    'required',
                    'numeric'                   
                ),
                'label' => 'Nilai Praktikum',
                'filter' => array('trim')
            ),
            
            'nilai_kop' => array(
                'rules' => array(
                    'required',
                    'numeric'                  
                ),
                'label' => 'Nilai Kopetensi',
                'filter' => array('trim')
            ),
            
            'nilai_sikap' => array(
                'rules' => array(
                    'required',
                    'numeric'                   
                ),
                'label' => 'Nilai Sikap',
                'filter' => array('trim')
            ),
            
            'nilai_tugas' => array(
                'rules' => array(
                    'required',
                    'numeric'
                ),
                'label' => 'Nilai Tugas',
                'filter' => array('trim')
            ),
            
            'nilai_uts' => array(
                'rules' => array(
                    'required',
                    'numeric'                
                ),
                'label' => 'Nilai UTS',
                'filter' => array('trim')
            ),
            
            'nilai_uas' => array(
                'rules' => array(
                    'required',
                    'numeric'
                ),
                'label' => 'Nilai UAS',
                'filter' => array('trim')
            ),
            
            'nissiswa' => array(
                'rules' => array(
                    'required',
                    'numeric',
                    'callback' => 'ceknissiswa'
                ),
                'label' => 'NIS Siswa',
                'filter' => array('trim')
            ),
            
            'nissiswa_edit' => array(
                'rules' => array(
                    'required',
                    'numeric',
                    'callback' => 'nissiswa_edit'
                ),
                'label' => 'NIS Siswa',
                'filter' => array('trim')
            ),
            
            'nama_siswa' => array(
                'rules' => array(
                    'required'
                ),
                'label' => 'Nama Siswa',
                'filter' => array('trim')
            ),
        
            'nama_ortu' => array(
                'rules' => array(
                    'required',
                    'regex' => '/^([a-zA-Z .])+$/i'
                ),
                'label' => 'Nama Orang Tua',
                'filter' => array('trim')
            ),
            
            'alamat' => array(
                'rules' => array(
                    'required',
                ),
                'label' => 'Alamat',
                'filter' => array('trim')
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
                    'callback' => 'nohp_edit'
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
            
            'pekerjaan' => array(
                'rules' => array(
                    'required',      
                ),
                'label' => 'Pekerjaan'
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
    
    public function ceknissiswa($field, $value)
    {
         $result = $this->db->row("SELECT NIS_SISWA FROM table_siswa WHERE NIS_SISWA='".$value."' ");
         
         if( $result == null)
         return true;
            
         $this->setErrorMessage($field, 'NIS Sudah Terdaftar.');
        
         return false;
    }
    
    public function nissiswa_edit($field, $value)
    {
         $this->cekUserID = false;
         $result = $this->db->row("SELECT NIS_SISWA FROM table_siswa WHERE NIS_SISWA='".$value."' ");
         
         if(! $this->cekUserID)
         return true;
         
         if(! $result == null)
         return true;
         
         $this->setErrorMessage($field, 'NIS Sudah Terdaftar.');
        
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
    
    public function nohp_edit($field, $value)
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