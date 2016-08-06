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
                'alpha' => '%label% harus berupa huruf',
                'compare' => '%label% harus sama dengan %comparatorLabel%',
                'min' => '%label% harus lebih dari 5 karakter'
            )
        );
    }
    
    public function setRules()
    {
        return array (
            /** validasi Orangtua oleh controller Wali */
            'id_orangtua' => array( //validasi id orangtua
                'rules' => array(
                    'required'
                ),
                'label' => 'ID Orang Tua',
                'filter' => array('trim')
            ),
            
            'username_ortu' => array( //validasi id orangtua
                'rules' => array(
                    'required',
                    'callback'=>'cekusername_ortu'
                ),
                'label' => 'Username Orang Tua',
                'filter' => array('trim')
            ),
            
            'nik_ayah' => array( //validasi nik ayah
                'rules' => array(
                    'required',
                    'numeric',
                    'callback' => 'ceknikayah'
                ),
                'label' => 'NIK Ayah',
                'filter' => array('trim')
            ),
            
            'nik_ayah_edit' => array( //validasi nik ayah edit
                'rules' => array(
                    'required',
                    'numeric',
                    'callback' => 'nikayah_edit'
                ),
                'label' => 'NIK Ayah',
                'filter' => array('trim')
            ),
            
            'nama_ayah' => array( //validasi nama ayah
                'rules' => array(
                    'required',
                ),
                'label' => 'Nama Ayah',
                'filter' => array('trim')
            ),
            
            'tempat_lahir_ayah' => array( //validasi tempat lahir ayah
                'rules' => array(
                    'required',
                ),
                'label' => 'Tempat Lahir Ayah',
                'filter' => array('trim')
            ),
            
            'tgl_lahir_ayah' => array( //validasi tanggal lahir ayah
                'rules' => array(
                    'required',
                ),
                'label' => 'Tanggal Lahir Ayah',
                'filter' => array('trim')
            ),
            
            'pekerjaan_ayah' => array( //validasi pekerjaan ayah
                'rules' => array(
                    'required',
                ),
                'label' => 'Pekerjaan Ayah',
                'filter' => array('trim')
            ),
            
            'nik_ibu' => array( //validasi nik ibu
                'rules' => array(
                    'required',
                    'numeric',
                    'callback' => 'ceknikibu'
                ),
                'label' => 'NIK Ibu',
                'filter' => array('trim')
            ),
            
            'nik_ibu_edit' => array( //validasi nik edit ibu
                'rules' => array(
                    'required',
                    'numeric',
                    'callback' => 'nikibu_edit'
                ),
                'label' => 'NIK Ayah',
                'filter' => array('trim')
            ),
            
            'nama_ibu' => array( //validasi nama ibu
                'rules' => array(
                    'required',
                ),
                'label' => 'Nama Ibu',
                'filter' => array('trim')
            ),
            
            'tempat_lahir_ibu' => array( //validasi tempat lahir ibu
                'rules' => array(
                    'required',
                ),
                'label' => 'Tempat Lahir Ibu',
                'filter' => array('trim')
            ),
            
            'tgl_lahir_ibu' => array( //validasi tanggal lahir ibu
                'rules' => array(
                    'required',
                ),
                'label' => 'Tanggal Lahir Ibu',
                'filter' => array('trim')
            ),
            
            'pekerjaan_ibu' => array( //validasi pekerjaan ibu
                'rules' => array(
                    'required',
                ),
                'label' => 'Pekerjaan Ibu',
                'filter' => array('trim')
            ),
            
            'id_kopdar' => array( 
                'rules' => array(
                    'required',
                ),
                'label' => 'ID Kopetensi dasar',
                'filter' => array('trim')
            ),
            
            'ki-3' => array( 
                'rules' => array(
                    'required',
                ),
                'label' => 'Kopetensi dasar KI-3',
                'filter' => array('trim')
            ),
            
            'deskripsiki-3' => array( 
                'rules' => array(
                    'required',
                ),
                'label' => 'Deskripsi singkat KI-3',
                'filter' => array('trim')
            ),
            
//            'ki-4' => array( 
//                'rules' => array(
//                    'required',
//                ),
//                'label' => 'Kopetensi dasar KI-4',
//                'filter' => array('trim')
//            ),
//            
//            'deskripsiki-4' => array( 
//                'rules' => array(
//                    'required',
//                ),
//                'label' => 'Deskripsi singkat KI-4',
//                'filter' => array('trim')
//            ),
            
            'ki-1' => array( 
                'rules' => array(
                    'required',
                ),
                'label' => 'Kopetensi dasar KI-1',
                'filter' => array('trim')
            ),
            
            'deskripsiki-1' => array( 
                'rules' => array(
                    'required',
                ),
                'label' => 'Deskripsi singkat KI-1',
                'filter' => array('trim')
            ),
            
            'ki-2' => array( 
                'rules' => array(
                    'required',
                ),
                'label' => 'Kopetensi dasar KI-2',
                'filter' => array('trim')
            ),
            
            'deskripsiki-2' => array( 
                'rules' => array(
                    'required',
                ),
                'label' => 'Deskripsi singkat KI-2',
                'filter' => array('trim')
            ),
          
            
            /** End Validasi orangtua oleh controller Wali */
            
            /** Validasi nilai oleh controller Wali */ 
            
            'id_nilai' => array( //validasi id nilai
                'rules' => array(
                    'required'
                ),
                'label' => 'ID Nilai',
                'filter' => array('trim')
            ),
            
            'id_mapel' => array( //validasi id mata pelajaran
                'rules' => array(
                    'required'
                ),
                'label' => 'ID Mapel',
                'filter' => array('trim')
            ),
            
            'nilai_kop_pengetahuan' => array( //validasi nilai pengetahuan
                'rules' => array(
                    'required',
                    'numeric'                   
                ),
                'label' => 'Nilai Kopetensi Pengetahuan',
                'filter' => array('trim')
            ),
            
            'nilai_kop_keterampilan' => array( //validasi nilai keterampilan
                'rules' => array(
                    'required',
                    'numeric'                  
                ),
                'label' => 'Nilai Kopetensi Keterampilan',
                'filter' => array('trim')
            ),
            
            'nilai_sikap' => array( //validasi nilai sikap
                'rules' => array(
                    'required',
                    'alpha'                   
                ),
                'label' => 'Nilai Sikap',
                'filter' => array('trim')
            ),
            
            'nilai_tugas' => array( //validasi nilai sikap
                'rules' => array(
                    'required',
                    'numeric'
                ),
                'label' => 'Nilai Tugas',
                'filter' => array('trim')
            ),
            
            'nilai_uts' => array( //validasi nilai uts
                'rules' => array(
                    'required',
                    'numeric'                
                ),
                'label' => 'Nilai UTS',
                'filter' => array('trim')
            ),
            
            'nilai_uas' => array( //validasi nilai uas
                'rules' => array(
                    'required',
                    'numeric'
                ),
                'label' => 'Nilai UAS',
                'filter' => array('trim')
            ),
            
//            'nilai_ahkir' => array( //validasi nilai uas
//                'rules' => array(
//                    'required',
//                    'numeric'
//                ),
//                'label' => 'Nilai Ahkir',
//                'filter' => array('trim')
//            ),
            
            /** End Validasi nilai oleh controller Wali */
            
            /** Validasi Siswa oleh controller Wali */
            'id_siswa' => array( //validasi id siswa
                'rules' => array(
                    'required'
                ),
                'label' => 'ID Siswa',
                'filter' => array('trim')
            ),
            
            'nama_siswa' => array( // validasi nama siswa
                'rules' => array(
                    'required'
                ),
                'label' => 'Nama Siswa',
                'filter' => array('trim')
            ),
            
            'nissiswa' => array( //validasi nis siswa
                'rules' => array(
                    'required',
                    'numeric',
                    'callback' => 'ceknissiswa'
                ),
                'label' => 'NIS Siswa',
                'filter' => array('trim')
            ),
            
            'nissiswa_edit' => array( // validasi nis siswa edit
                'rules' => array(
                    'required',
                    'numeric',
                    'callback' => 'nissiswa_edit'
                ),
                'label' => 'NIS Siswa',
                'filter' => array('trim')
            ),
            
            'tempat_lahir_siswa' => array( //validasi tempat lahir siswa
                'rules' => array(
                    'required',
                ),
                'label' => 'Tempat Lahir Siswa',
                'filter' => array('trim')
            ),
            
            'tgl_lahir_siswa' => array( //validasi nis siswa
                'rules' => array(
                    'required',
                ),
                'label' => 'Tanggal Lahir Siswa',
                'filter' => array('trim')
            ),
            
            /** Validasi ini digunakan untuk validasi alamat orangtua dan siswa */
            'alamat' => array( // Validasi alamat
                'rules' => array(
                    'required',
                ),
                'label' => 'Alamat',
                'filter' => array('trim')
            ),
            
            'jenkel' => array( //Validasi Jenis Kelamin
                'rules' => array(
                    'required',      
                ),
                'label' => 'Jenis Kelamin'
            ),
            
            /** End Validasi Siswa oleh controller Wali */
            
            /** Validasi ini digunakan untuk validasi password semua hak akses */
            'password' => array( //Validasi Password
                'rules' => array(
                    'required',
                    'min' => 5,
                    'regex' => '/^([-a-z0-9_-])+$/i',
                    'compare' => 'verifikasipass'
                ),
                'label' => 'Password',
                'filter' => array('trim')
            ),
            
            'verifikasipass' => array( //Validasi Verifikasi Password
                'rules' => array(
                    'required',
                    'min' => 5
                ),
                'label' => 'Verifikasi Password',
                'filter' => array('trim')
            )
        );
    }
    
    public function ceknissiswa($field, $value)
    {
         $result = $this->db->row("SELECT NIS_SISWA FROM table_siswa WHERE NIS_SISWA='".$value."' ");
         
         if( $result == null)
         return true;
            
         $this->setErrorMessage($field, 'NIS sudah ada');
        
         return false;
    }
    
    public function cekusername_ortu($field, $value)
    {
         $result = $this->db->row("SELECT username FROM table_orang_tua WHERE username='".$value."' ");
         
         if( $result == null) {
            return true;
         }
         else {
            $this->setErrorMessage($field, 'Username sudah ada');
            return false;
         }
    }
    public function ceknikayah($field, $value)
    {
         $result = $this->db->row("SELECT NIK_AYAH FROM table_orang_tua WHERE NIK_AYAH='".$value."' ");
         
         if( $result == null) {
            return true;
         }
         else {
            $this->setErrorMessage($field, 'NIK Ayah sudah ada');
            return false;
         }
    }
    
    public function ceknikibu($field, $value)
    {
         $result = $this->db->row("SELECT NIK_IBU FROM table_orang_tua WHERE NIK_IBU='".$value."' ");
         
         if( $result == null) {
            return true;
         }
         else {
            $this->setErrorMessage($field, 'NIK Ibu sudah ada');
            return false;
         }
    }
    
    public function nissiswa_edit($field, $value)
    {
         $this->cekedit = false;
         $result = $this->db->row("SELECT NIS_SISWA FROM table_siswa WHERE NIS_SISWA='".$value."' ");
         
         if(! $this->cekedit){
            return true;
         }
         else if ($result == null){
            return true;
         }
         else {
            $this->setErrorMessage($field, 'NIS sudah ada');
            return false;
         }  
    }
    
    public function nikayah_edit($field, $value)
    {
         $this->cekedit = false;
         $result = $this->db->row("SELECT NIK_AYAH FROM table_orang_tua WHERE NIK_AYAH='".$value."' ");
         
         if(! $this->cekedit){
            return true;
         }
         else if ($result == null){
            return true;
         }
         else {
            $this->setErrorMessage($field, 'NIK sudah ada');
            return false;
         }  
    }
    
    public function nikibu_edit($field, $value)
    {
         $this->cekedit = false;
         $result = $this->db->row("SELECT NIK_IBU FROM table_orang_tua WHERE NIK_IBU='".$value."' ");
         
         if(! $this->cekedit){
            return true;
         }
         else if ($result == null){
            return true;
         }
         else {
            $this->setErrorMessage($field, 'NIK sudah ada');
            return false;
         }  
    }
    
    /*public function cekhpsiswa($field, $value)
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
    }*/
}
?>