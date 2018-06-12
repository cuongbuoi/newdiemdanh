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
    'as' => 'gdang-nhap',
    'uses'=>'Controller@glogin'
]
);
Route::post('/',['as' => 'pdang-nhap','uses'=>'Controller@plogin']);
Route::get('logout',['as'=>'logout','uses'=>'Controller@logout']);

Route::group(['prefix' => 'quan-ly','middleware' => ['checkAdmin']], function () {
   
    Route::get('trang-chu',[
        'as' => 'trang-chu',
        'uses'=>'Controller@index'
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
        Route::get('quan-ly-mon-hoc',['as'=>'gquan-ly-mon-hoc','uses'=>'Controller@GetquanLyMonHoc']);
        Route::post('quan-ly-mon-hoc',['as'=>'pquan-ly-mon-hoc','uses'=>'Controller@PostquanLyMonHoc']);
        Route::get('updatemonhoc/{id}',['as'=>'gupdatemh','uses'=>'Controller@Getupdatemonhoc']);
        Route::post('updatemonhoc/{id}',['as'=>'pupdatemh','uses'=>'Controller@Postupdatemonhoc']);

 
        Route::get('quan-ly-lop',['as'=>'gquan-ly-lop','uses'=>'Controller@GetquanLylop']);
        Route::post('quan-ly-lop',['as'=>'pquan-ly-lop','uses'=>'Controller@PostquanLylop']);

        Route::get('quan-ly-sinh-vien',['as'=>'quan-ly-sinh-vien','uses'=>'Controller@quanLySinhVien']);
        //Route::get('quan-ly-lop',['as'=>'quan-ly-lop','uses'=>'Controller@quanLylop']);

        //route ajax
        Route::post('ajaxdeletemonhoc',['as'=>'ajax_delete_monhoc','uses'=>'Controller@Delete_monhoc']);
 

    });


