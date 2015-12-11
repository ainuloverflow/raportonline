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
                'numeric' => '%label% Harus Berupa Angka',
                'alpha' => '%label% Harus Berupa Karakter Alfabet',
                
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
                    'numeric'
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
}

?>