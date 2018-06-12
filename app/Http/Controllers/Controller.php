<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Auth;
use App\admin;
use App\monhoc;

use Carbon;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function index(){
    	return view('modules.indexcontent');
    }

    public function glogin()
    {
        if(Auth::guard('admin')->check())
        {
            return redirect('trang-chu');
        }
        else
            return view('login');
    }
    public function plogin(Request $request)
    {
        // return $request->all();
        $auth= array('taikhoan'=>$request->taikhoan,'password'=>$request->matkhau);
        if(Auth::guard('admin')->attempt($auth,false))
			{
                return redirect()->route('trang-chu');	
            }
		else
			{
				return redirect()->back()->with(['errormessage'=>'Email hoặc password không đúng!']);
			}
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('gdang-nhap');
    }


    public function trainingList(){
    	return view('modules.training-list');
    }
     public function training(){
    	return view('modules.training');
    }
    public function GetquanLyMonHoc(){
        $mh=monhoc::all();
    	return view('modules.quanlymonhoc',compact('mh'));
    }
    public function PostquanLyMonHoc(Request $request)
    {
        monhoc::insert([
            'mamon'=> $request->mamon,
            'tenmon'=>$request->tenmon,
            'sotinchi'=>$request->sotinchi,
            'sotiet'=>$request->sotiet,
        ]);
        return redirect()->route('gquan-ly-mon-hoc')->with(['message'=>'Thêm thành công!']);
    }
    public function Getupdatemonhoc()
    {
        $mh=monhoc::all();
        return view('modules.updatemonhoc',compact('mh'));
    }


     public function quanLySinhVien(){
    	return view('modules.quanlysinhvien');
    }
     public function quanLyLop(){
    	return view('modules.quanlylop');
    }
}
