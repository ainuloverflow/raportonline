<?php
namespace Controllers;

/*
 * @author kandar <k4ndar@yahoo.com>
 */
class Alias
{
    /*
    * This is method to receive alias requests
    */
    public function index()
    {
    $args = func_get_args();

    $route = [
        'listsiswa' => [
            'class' => '\\Controllers\Wali',
            'method' => 'datasiswa'
        ],
        
        'dashboard_wali' => [
            'class' => '\\Controllers\Wali',
            'method' => 'index'
        ],
        
        'tambahsiswa' => [
            'class' => '\\Controllers\Wali',
            'method' => 'tambah_siswa_kelas'
        ],
        
        'editsiswa' => [
            'class' => '\\Controllers\Wali',
            'method' => 'edit_siswa_kelas'
        ],
        
        'login' => [
            'class' => '\\Controllers\Home',
            'method' => 'login'
        ]
    ];

    if( in_array($args[0], ['listsiswa', 'dashboard_wali', 'tambahsiswa', 'editsiswa', 'login']) ) {

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