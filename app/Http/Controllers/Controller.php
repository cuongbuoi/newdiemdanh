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
use App\monhoc;
use App\Lop;
use App\SinhVien;
use App\Classes\My_Face;
use Carbon;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        $dslop = Lop::all();

        return view('modules.indexcontent', compact('dslop'));
    }

    public function glogin()
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('trang-chu');
        } else {
            return view('login');
        }
    }

    public function GetDanhsachsinhvien(Request $request)
    {
        if ($request->ajax()) {
            $dssinhvien = SinhVien::where('malop', $request->get('malop'))->get();
            $tenlop = Lop::where('malop', $request->get('malop'))->pluck('tenlop');
            $ds = '';
            foreach ($dssinhvien as $sinhvien) {
                $ds .= '<tr>
                <td>'.$sinhvien->masv.'</td>
                <td>'.$sinhvien->hoten.'</td>
                <td class="text-right">
                    <a href="'.route('training', [$sinhvien->masv]).'" class="btn btn-warning"><i class="fe fe-gitlab"></i> Train Now</a>
                </td>
            </tr>';
            }

            return array('ds' => $ds, 'tenlop' => $tenlop);
        }
    }

    public function plogin(LoginRequest $request)
    {
        // return $request->all();
        $auth = array('taikhoan' => $request->taikhoan, 'password' => $request->matkhau);
        if (Auth::guard('admin')->attempt($auth, false)) {
            return redirect()->route('trang-chu');
        } else {
            return redirect()->back()->with(['errormessage' => 'Email hoặc password không đúng!']);
        }
    }

    public function Train_data_image(Request $request,$id)
    {
        $fail = [];
        $done = [];
        $result =  [];
        
        $dmm = new My_Face();
        $up = $request->file('upload');
        if(!empty($up))
        {
            if (count($up) > 0) {
                foreach ($up as $data) {
    
                    $result[] = $dmm->enroll($data,$id);
                }
                foreach($result as $val)
                {
                    if(isset($val->face_id)){
                        $done[] = $data->getClientOriginalName();
                    }
                    else
                    {
                        $fail[] = $data->getClientOriginalName();
                    }
                }
               
            }
        }
        

        
       
        return redirect()->back()->with(['result' => array('done'=>$done,'fail'=>$fail)]);
    }

    public function logout()
    {
        Auth::guard('admin')->logout();

        return redirect()->route('gdang-nhap');
    }

    public function trainingList()
    {
        $dslop = lop::all();

        return view('modules.training-list', compact('dslop'));
    }

    public function training($mssv)
    {
        if (!empty($mssv)) {
            $sinhvien = SinhVien::where('masv', $mssv)->get()[0];
        }

        return view('modules.training', compact('sinhvien','mssv'));
    }

    public function GetquanLyMonHoc()
    {
        $mh = monhoc::all();

        return view('modules.quanlymonhoc', compact('mh'));
    }

    public function PostquanLyMonHoc(MonhocRequest $request)
    {
        monhoc::insert([
            'mamon' => $request->mamon,
            'tenmon' => $request->tenmon,
            'sotinchi' => $request->sotinchi,
            'sotiet' => $request->sotiet,
        ]);

        return redirect()->route('gquan-ly-mon-hoc')->with(['message' => 'Thêm thành công!']);
    }

    public function Postupdatemonhoc(Request $request, $id)
    {
        monhoc::find($id)->update(['tenmon' => $request->tenmon, 'sotinchi' => $request->sotinchi, 'sotiet' => $request->sotiet]);

        return redirect()->route('gquan-ly-mon-hoc');
    }

    public function Getupdatemonhoc($id)
    {
        $mh = monhoc::all();
        $up = monhoc::find($id);
        if ($up) {
            return view('modules.updatemonhoc', compact('mh', 'up'));
        } else {
            return redirect()->route('gquan-ly-mon-hoc');
        }
    }

    public function Delete_monhoc(Request $request)
    {
        if ($request->ajax()) {
            if (monhoc::find($request->id)->delete()) {
                return 'ok';
            } else {
                return 'error';
            }
        }
    }

    public function GetquanLyLop()
    {
        $lop = Lop::all();

        return view('modules.quanlylop', compact('lop'));
    }

    public function PostquanLyLop(LopRequest $request)
    {
        Lop::insert([
            'malop' => $request->malop,
            'tenlop' => $request->tenlop,
        ]);

        return redirect()->route('gquan-ly-lop')->with(['message' => 'Thêm thành công!']);
    }

<<<<<<< HEAD
    public function quanLySinhVien()
    {
        return view('modules.quanlysinhvien');
=======
     public function quanLySinhVien(Request $request){
        if($request->get('query') && $request->get('query')!='')
        {
            $data=SinhVien::where('malop',$request->get('query'))->get();
            $query=$request->get('query');
           
        }
        else{
            $data=SinhVien::all();
            $query='';
          
        }
        $lop=Lop::all();
        return view('modules.quanlysinhvien',compact('data','lop','query'));
    }
    public function destroy_sinhvien(Request $request)
    {
        if($request->ajax())
        {
            SinhVien::find($request->id)->delete();
            return 'ok';
        }
       
>>>>>>> 4069ce422a3d899a92665f498da8e02d8e5a9607
    }

    public function quanLyLop()
    {
    }
<<<<<<< HEAD
=======
    public function quanLyDiemDanh(){
        return view('modules.danhsachdiemdanh');
    }
    public function chiTietBuoiVang(){
        return view('modules.chitietbuoivang');
    }
    
>>>>>>> 4069ce422a3d899a92665f498da8e02d8e5a9607
}
