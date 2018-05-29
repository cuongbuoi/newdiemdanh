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

Route::get('/',[
    'as' => 'trang-chu',
    'uses'=>'Controller@index'
]
);
Route::get('login',[
    'as' => 'dang-nhap',
    'uses'=>'Controller@login'
]
);
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
        Route::get('quan-ly-mon-hoc',['as'=>'quan-ly-mon-hoc','uses'=>'Controller@quanLyMonHoc']);
         Route::get('quan-ly-sinh-vien',['as'=>'quan-ly-sinh-vien','uses'=>'Controller@quanLySinhVien']);
          Route::get('quan-ly-lop',['as'=>'quan-ly-lop','uses'=>'Controller@quanLylop']);
    });
