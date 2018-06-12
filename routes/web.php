<?php


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Classes\My_Face;

Route::get('/test', function () {
    // $image = base64_encode(file_get_contents('https://scontent-sin6-2.xx.fbcdn.net/v/t1.0-9/34585047_1213055052163838_2607312007875002368_n.jpg?_nc_cat=0&_nc_eui2=AeFFYhRweclS4nkf-G-TvUNo5pHpArsaH9avicdACBUvp1eeXX1GSRmKPYxvkDAfZ3fcjLmj4YzpptJfj6Sdr2Flz_oO9fEKsQHVeOXycXu7nQ&oh=6b2dd504f1a070cbb1aa00d5b56ba1d1&oe=5BBB6A03'));
    // echo $image;
    // die();
    $a = new My_Face();
    dd($a->view());
    // dd($a->recognize('https://scontent-sin6-2.xx.fbcdn.net/v/t1.15752-9/35078604_1216569385145738_2849228519018332160_n.jpg?_nc_cat=0&_nc_eui2=AeGAhNLSzDoDS6iRcMXgFE1NDr6_zwMz7qEwfQiOuKYVr5CHrk-gPZbqnoBI3KqtjJMNs9yKBGm8Fmt68QEtNdVotA48WjwjONIxMcGqaQXVcA&oh=43bd4bb16e77a703531145b3c0fe5e88&oe=5BBF0CFE'));
});
Route::get(
    '/',
    [
    'as' => 'index',
    'uses' => 'Controller@glogin',
]
);
Route::get('login', ['as' => 'gdang-nhap', 'uses' => 'Controller@glogin']);
Route::post('login', ['as' => 'pdang-nhap', 'uses' => 'Controller@plogin']);
Route::get('logout', ['as' => 'logout', 'uses' => 'Controller@logout']);

Route::group(['prefix' => 'quan-ly', 'middleware' => ['checkAdmin']], function () {
    Route::get(
        'trang-chu',
        [
        'as' => 'trang-chu',
        'uses' => 'Controller@index',
    ]
    );

    Route::get(
        'training-list',
        [
    'as' => 'training-list',
    'uses' => 'Controller@trainingList',
    ]
    );
    Route::get(
            'training/{id}',
            [
    'as' => 'training',
    'uses' => 'Controller@training',
    ]
    );
    Route::get('get-ds-lop', ['as' => 'ds_sinhvien_lop', 'uses' => 'Controller@GetDanhsachsinhvien']);
    Route::get('quan-ly-mon-hoc', ['as' => 'gquan-ly-mon-hoc', 'uses' => 'Controller@GetquanLyMonHoc']);
    Route::post('quan-ly-mon-hoc', ['as' => 'pquan-ly-mon-hoc', 'uses' => 'Controller@PostquanLyMonHoc']);
    Route::get('updatemonhoc/{id}', ['as' => 'gupdatemh', 'uses' => 'Controller@Getupdatemonhoc']);
    Route::post('updatemonhoc/{id}', ['as' => 'pupdatemh', 'uses' => 'Controller@Postupdatemonhoc']);

    Route::get('quan-ly-lop', ['as' => 'gquan-ly-lop', 'uses' => 'Controller@GetquanLylop']);
    Route::post('quan-ly-lop', ['as' => 'pquan-ly-lop', 'uses' => 'Controller@PostquanLylop']);

    Route::get('quan-ly-sinh-vien', ['as' => 'quan-ly-sinh-vien', 'uses' => 'Controller@quanLySinhVien']);
    //Route::get('quan-ly-lop',['as'=>'quan-ly-lop','uses'=>'Controller@quanLylop']);

    //route ajax
    Route::post('ajaxdeletemonhoc', ['as' => 'ajax_delete_monhoc', 'uses' => 'Controller@Delete_monhoc']);
    // Route::get('train_data_image', ['as' => 'traindata', 'uses' => 'Controller@Train_data_image']);
    Route::post('train_data_image/{id}', ['as' => 'traindata', 'uses' => 'Controller@Train_data_image']);
});
