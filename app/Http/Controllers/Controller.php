<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Illuminate\Http\Request;
use App\Http\Requests\MonhocRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\LopRequest;



use Auth;
use App\admin;
use App\monhoc;
use App\Lop;

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
            return redirect()->route('trang-chu');
        }
        else
            return view('login');
    }
    public function plogin(LoginRequest $request)
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
    public function PostquanLyMonHoc(MonhocRequest $request)
    {
        monhoc::insert([
            'mamon'=> $request->mamon,
            'tenmon'=>$request->tenmon,
            'sotinchi'=>$request->sotinchi,
            'sotiet'=>$request->sotiet,
        ]);
        return redirect()->route('gquan-ly-mon-hoc')->with(['message'=>'Thêm thành công!']);
    }
    public function Postupdatemonhoc(Request $request,$id)
    {
        monhoc::find($id)->update(['tenmon'=>$request->tenmon,'sotinchi'=>$request->sotinchi,'sotiet'=>$request->sotiet]);
        return redirect()->route('gquan-ly-mon-hoc');
    }
    public function Getupdatemonhoc($id)
    {
        $mh=monhoc::all();
        $up=monhoc::find($id);
        if($up){
            return view('modules.updatemonhoc',compact('mh','up'));
        }
        else{
            return redirect()->route('gquan-ly-mon-hoc');
        }
       
        
    }
    public function Delete_monhoc(Request $request){
        if($request->ajax()){
            if(monhoc::find($request->id)->delete())
                return 'ok';
            else
                return 'error';
        }
    }
    public function GetquanLyLop(){
        $lop=Lop::all();
    	return view('modules.quanlylop',compact('lop'));
    }
    public function PostquanLyLop(LopRequest $request)
    {
        Lop::insert([
            'malop'=> $request->malop,
            'tenlop'=>$request->tenlop,
        ]);
        return redirect()->route('gquan-ly-lop')->with(['message'=>'Thêm thành công!']);
    }

     public function quanLySinhVien(){
    	return view('modules.quanlysinhvien');
    }
    public function quanLyLop(){

    }
    public function quanLyDiemDanh(){
        return view('modules.danhsachdiemdanh');
    }
    public function chiTietBuoiVang(){
        return view('modules.chitietbuoivang');
    }
    
}
