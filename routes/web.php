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

Route::get('a/a',[
    'as' => 'trang-chu',
    'uses'=>'Controller@index'
]
);
Route::get('login',['as' => 'gdang-nhap','uses'=>'Controller@glogin']);
Route::post('login',['as' => 'pdang-nhap','uses'=>'Controller@plogin']);
Route::get('logout',['as'=>'logout','uses'=>'Controller@logout']);

Route::get('training-list',[
    'as' => 'training-list',
    'uses'=>'Controller@trainingList'
]
);
Route::get('training',[
    'as' => 'training',
    'uses'=>'Controller@training'
]
);
Route::group(['prefix' => 'quan-ly'], function () {
    Route::group(['middleware' => ['checkAdmin']], function () {

        Route::get('quan-ly-mon-hoc',['as'=>'gquan-ly-mon-hoc','uses'=>'Controller@GetquanLyMonHoc']);
        Route::post('quan-ly-mon-hoc',['as'=>'pquan-ly-mon-hoc','uses'=>'Controller@PostquanLyMonHoc']);
        Route::get('updatemonhoc',['as'=>'gupdatemh','uses'=>'Controller@Getupdatemonhoc']);
        Route::post('updatemonhoc',['as'=>'pupdatemh','uses'=>'Controller@Postupdatemonhoc']);

        Route::get('quan-ly-sinh-vien',['as'=>'quan-ly-sinh-vien','uses'=>'Controller@quanLySinhVien']);
        Route::get('quan-ly-lop',['as'=>'quan-ly-lop','uses'=>'Controller@quanLylop']);
    });

    });
