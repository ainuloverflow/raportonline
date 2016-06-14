<?php
namespace Controllers;
class Alias
{
    public function index() {
    $args = func_get_args();
    $route = [
        
        //routing untuk wali
        'dashboard_wali' => [
            'class' => '\\Controllers\Wali',
            'method' => 'index'
        ],
                       
        'list-ortu' => [
            'class' => '\\Controllers\Wali',
            'method' => 'data_orangtua'
        ],
        
        'list-siswa' => [
            'class' => '\\Controllers\Wali',
            'method' => 'datasiswa'
        ],
        
        'data-nilai' => [
            'class' => '\\Controllers\Wali',
            'method' => 'tampil_nilai'
        ],
        
        'tambah-siswa' => [
            'class' => '\\Controllers\Wali',
            'method' => 'tambah_siswa_kelas'
        ],
        
        'reset-pass-siswa' => [
            'class' => '\\Controllers\Wali',
            'method' => 'reset_password_siswa'
        ],
        
        'resetpass-ortu' => [
            'class' => '\\Controllers\Wali',
            'method' => 'reset_password_ortu'
        ],
        
        'tambah-ortu' => [
            'class' => '\\Controllers\Wali',
            'method' => 'tambah_ortusiswa_kelas'
        ],
        
        'tambah-nilai' => [
            'class' => '\\Controllers\Wali',
            'method' => 'input_nilai'
        ],
        
        'edit-siswa' => [
            'class' => '\\Controllers\Wali',
            'method' => 'edit_siswa_kelas'
        ],
        
        'edit-nilai' => [
            'class' => '\\Controllers\Wali',
            'method' => 'edit_nilai'
        ],
        
        'edit-ortu' => [
            'class' => '\\Controllers\Wali',
            'method' => 'edit_ortusiswa_kelas'
        ],
        
        'hapusiswa' => [
            'class' => '\\Controllers\Wali',
            'method' => 'hapus_siswa_kelas'
        ],
        
        'hapus-ortu' => [
            'class' => '\\Controllers\Wali',
            'method' => 'hapus_ortusiswa_kelas'
        ],
        
        'hapus-nilai' => [
            'class' => '\\Controllers\Wali',
            'method' => 'hapus_nilai'
        ],
        
        'validasi-edit-siswa' => [
            'class' => '\\Controllers\Wali',
            'method' => 'validate_edit_siswa_kelas'
        ],
        
        'validasi-edit-ortu' => [
            'class' => '\\Controllers\Wali',
            'method' => 'validate_edit_ortusiswa_kelas'
        ],
        
        'validasi-edit-nilai' => [
            'class' => '\\Controllers\Wali',
            'method' => 'validate_edit_nilai'
        ],
        
        'rapot-siswa-as-wali' => [
            'class' => '\\Controllers\Wali',
            'method' => 'rapot_siswa'
        ],
        
        'cetak-rapot-siswa-as-wali' => [
            'class' => '\\Controllers\Wali',
            'method' => 'cetak_rapot_siswa'
        ],
        
        'grafik-nilai' => [
            'class' => '\\Controllers\Wali',
            'method' => 'grafik_nilai'
        ],

        'data-grafik-nilai' => [
            'class' => '\\Controllers\Wali',
            'method' => 'data_grafik_nilai'
        ],
        //end routing untuk wali
        
        //Routing untuk Home
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
        ],
        //End routing untuk home
        
        //Routing untuk guru
        'dashboard_guru' => [
            'class' => '\\Controllers\Guru',
            'method' => 'index'
        ],
        
        'data-nilai-as-guru' => [
            'class' => '\\Controllers\Guru',
            'method' => 'data_nilai'
        ],
        
        'tambah-nilai-as-guru' => [
            'class' => '\\Controllers\Guru',
            'method' => 'tambah_nilai'
        ],
        
        'edit-nilai-as-guru' => [
            'class' => '\\Controllers\Guru',
            'method' => 'edit_nilai'
        ],
        
        'validasi-edit-nilai-as-guru' => [
            'class' => '\\Controllers\Guru',
            'method' => 'validate_edit_nilai'
        ],
        
//        'rapot-siswa-as-guru' => [
//            'class' => '\\Controllers\Guru',
//            'method' => 'rapot_siswa'
//        ],
        
        'grafik-nilai-guru' => [
            'class' => '\\Controllers\Guru',
            'method' => 'grafik_nilai'
        ],
        
        'data-grafik-nilai-guru' => [
            'class' => '\\Controllers\Guru',
            'method' => 'data_grafik_nilai'
        ],
        //End routing untuk guru
        
        //Routing siswa
        'dashboard_siswa' => [
            'class' => '\\Controllers\Siswa',
            'method' => 'index'
        ],
    
    ];

    if( in_array($args[0], [
        /*Wali routing**/ 
       'dashboard_wali', 'list-ortu' ,'list-siswa', 'data-nilai', 'tambah-siswa', 'reset-pass-siswa', 'reset-pass-ortu', 'tambah-nilai',
       'tambah-ortu', 'edit-siswa', 'edit-nilai', 'hapusiswa', 'hapus-nilai', 'edit-ortu', 'hapus-ortu', 'validasi-edit-siswa', 
       'validasi-edit-ortu', 'validasi-edit-nilai', 'rapot-siswa-as-wali', 'cetak-rapot-siswa-as-wali', 'grafik-nilai', 'data-grafik-nilai', 
        /*End wali routing**/
        
        //Home Routing
        'login', 'logout', 'kembali',
        //End Home Routing
        
        /*Guru Routing **/
        'dashboard_guru', 'data-nilai-as-guru', 'tambah-nilai-as-guru', 'editnilai-as-guru', 'validasi-edit-nilai-as-guru', 'grafik-nilai-guru', 
        'data-grafik-nilai-guru', //'rapot-siswa-as-guru' 
        /*End guru routing **/
        
        /*Siswa routing**/
        'dashboard_siswa'        
        /*End siswa routing**/
        
        ])) {

        try {
            $route[$args[0]]['class'] = new $route[$args[0]]['class'];

            call_user_func_array(
                array_values($route[$args[0]]),
                array_slice($args, 1)
            );
        }
        catch(Exception $e) {    
            throw new \Resources\HttpException('Page not found!');
        }
    }
    }

}