<?php
namespace Controllers;

class Alias
{
    public function index() {
    
    $args = func_get_args();

    $route = [
        
        'dashboard_wali' => [
            'class' => '\\Controllers\Wali',
            'method' => 'index'
        ],
        
        'listortu' => [
            'class' => '\\Controllers\Wali',
            'method' => 'data_orangtua'
        ],
        
        'listsiswa' => [
            'class' => '\\Controllers\Wali',
            'method' => 'datasiswa'
        ],
        
        'datanilai' => [
            'class' => '\\Controllers\Wali',
            'method' => 'tampil_nilai'
        ],
        
        'getsiswa' => [
            'class' => '\\Controllers\Wali',
            'method' => 'getsiswa_kelas'
        ],
       
        'tambahsiswa' => [
            'class' => '\\Controllers\Wali',
            'method' => 'tambah_siswa_kelas'
        ],
        
        'tambahortu' => [
            'class' => '\\Controllers\Wali',
            'method' => 'tambah_ortusiswa_kelas'
        ],
        
        'tambahnilai' => [
            'class' => '\\Controllers\Wali',
            'method' => 'input_nilai'
        ],
        
        'nilaisiswa' => [
            'class' => '\\Controllers\Wali',
            'method' => 'tampil_nilai'
        ],
        
        'editsiswa' => [
            'class' => '\\Controllers\Wali',
            'method' => 'edit_siswa_kelas'
        ],
        
        'editortu' => [
            'class' => '\\Controllers\Wali',
            'method' => 'edit_ortusiswa_kelas'
        ],
        
        'hapusiswa' => [
            'class' => '\\Controllers\Wali',
            'method' => 'hapus_siswa_kelas'
        ],
        
        'hapusortu' => [
            'class' => '\\Controllers\Wali',
            'method' => 'hapus_ortusiswa_kelas'
        ],
        
        'validasieditsiswa' => [
            'class' => '\\Controllers\Wali',
            'method' => 'validate_edit_siswa_kelas'
        ],
        
        'validasieditortu' => [
            'class' => '\\Controllers\Wali',
            'method' => 'validate_edit_ortusiswa_kelas'
        ],
        
        'login' => [
            'class' => '\\Controllers\Home',
            'method' => 'login'
        ],
        
        'logout' => [
            'class' => '\\Controllers\Home',
            'method' => 'logout'
        ], 
        'kembali' => [
            'class' =>'\\Controllers\Home',
            'method' => 'direct'
        ]
    ];

    if( in_array($args[0], ['dashboard_wali', 'listortu' ,'listsiswa', 'datanilai', 'tambahsiswa', 'tambahnilai', 'getsiswa', 
       'tambahortu', 'nilaisiswa', 'editsiswa', 'hapusiswa', 'editortu', 'hapusortu', 'validasieditsiswa', 
       'validasieditortu', 'login', 'logout', 'kembali'])) {

        try {
            $route[$args[0]]['class'] = new $route[$args[0]]['class'];

            call_user_func_array(
                array_values($route[$args[0]]),
                array_slice($args, 1)
            );
        }
        catch(\Exception $e) {
        throw new \Resources\HttpException('Page not found!');
        }
    }
    }
}