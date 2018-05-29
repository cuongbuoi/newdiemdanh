<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function index(){
    	return view('modules.indexcontent');
    }
    public function login(){
    	return view('login');
    }
     public function trainingList(){
    	return view('modules.training-list');
    }
     public function training(){
    	return view('modules.training');
    }
    public function quanLyMonHoc(){
    	return view('modules.quanlymonhoc');
    }
     public function quanLySinhVien(){
    	return view('modules.quanlysinhvien');
    }
     public function quanLyLop(){
    	return view('modules.quanlylop');
    }
}
