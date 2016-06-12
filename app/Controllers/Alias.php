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
        
        'tambahsiswa' => [
            'class' => '\\Controllers\Wali',
            'method' => 'tambah_siswa_kelas'
        ],
        
        'resetpass-siswa' => [
            'class' => '\\Controllers\Wali',
            'method' => 'reset_password_siswa'
        ],
        
        'resetpass-ortu' => [
            'class' => '\\Controllers\Wali',
            'method' => 'reset_password_ortu'
        ],
        
        'tambahortu' => [
            'class' => '\\Controllers\Wali',
            'method' => 'tambah_ortusiswa_kelas'
        ],
        
        'tambahnilai' => [
            'class' => '\\Controllers\Wali',
            'method' => 'input_nilai'
        ],
        
        'editsiswa' => [
            'class' => '\\Controllers\Wali',
            'method' => 'edit_siswa_kelas'
        ],
        
        'editnilai' => [
            'class' => '\\Controllers\Wali',
            'method' => 'edit_nilai'
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
        
        'hapusnilai' => [
            'class' => '\\Controllers\Wali',
            'method' => 'hapus_nilai'
        ],
        
        'validasieditsiswa' => [
            'class' => '\\Controllers\Wali',
            'method' => 'validate_edit_siswa_kelas'
        ],
        
        'validasieditortu' => [
            'class' => '\\Controllers\Wali',
            'method' => 'validate_edit_ortusiswa_kelas'
        ],
        
        'validasieditnilai' => [
            'class' => '\\Controllers\Wali',
            'method' => 'validate_edit_nilai'
        ],
        
        'rapot-siswa-as-wali' => [
            'class' => '\\Controllers\Wali',
            'method' => 'rapot_siswa'
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
        
        'datanilai-as-guru' => [
            'class' => '\\Controllers\Guru',
            'method' => 'data_nilai'
        ],
        
        'tambahnilai-as-guru' => [
            'class' => '\\Controllers\Guru',
            'method' => 'tambah_nilai'
        ],
        
        'editnilai-as-guru' => [
            'class' => '\\Controllers\Guru',
            'method' => 'edit_nilai'
        ],
        
        'validasieditnilai-as-guru' => [
            'class' => '\\Controllers\Guru',
            'method' => 'validate_edit_nilai'
        ],
        
        'rapot-siswa-as-guru' => [
            'class' => '\\Controllers\Guru',
            'method' => 'rapot_siswa'
        ],
        
        'grafik-nilai-guru' => [
            'class' => '\\Controllers\Guru',
            'method' => 'grafik_nilai'
        ],
        
        'data-grafik-nilai-guru' => [
            'class' => '\\Controllers\Guru',
            'method' => 'data_grafik_nilai'
        ]
        //End routing untuk guru
        
    ];

    if( in_array($args[0], [
        /*Wali routing**/ 
       'dashboard_wali', 'listortu' ,'listsiswa', 'datanilai', 'tambahsiswa', 'resetpass-siswa', 'resetpass-ortu', 'tambahnilai', 'getsiswa', 
       'tambahortu', 'editsiswa', 'editnilai', 'hapusiswa', 'hapusnilai', 'editortu', 'hapusortu', 'validasieditsiswa', 
       'validasieditortu', 'validasieditnilai', 'rapot-siswa-as-wali', 'grafik-nilai', 'data-grafik-nilai', 
        /*End wali routing**/
        
        //Home Routing
        'login', 'logout', 'kembali',
        //End Home Routing
        
        /*Guru Routing **/
        'dashboard_guru', 'datanilai-as-guru', 'tambahnilai-as-guru', 'editnilai-as-guru', 'validasieditnilai-as-guru', 'grafik-nilai-guru', 'data-grafik-nilai-guru', 'rapot-siswa-as-guru' 
        /*End guru routing **/])) {

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