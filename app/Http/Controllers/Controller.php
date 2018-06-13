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
use DB;
use App\diemdanh;

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


    public function Diem_danh(Request $request){
      if($request->ajax())
      {
        if($request->has('fileanh'))
        {
            $dmm = new My_Face();
            return response()->json($dmm->recognize($request->file('fileanh')));
        }
      }
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
       

    }

    public function quanLyLop()
    {
    }

    public function quanLyDiemDanh(Request $request){
      
        if($request->get('lop')!='' && $request->get('mon')!=''){
            $malop=$request->get('lop');
            $mamom=$request->get('mon');
            $data=SinhVien::join('diemdanhs','sinh_viens.masv','=','diemdanhs.masv')
            ->select('diemdanhs.masv','hoten','mamon',DB::raw('count(buoivang) as bv'))
            ->groupBy('diemdanhs.masv','hoten','mamon')->where('malop',$malop)->where('mamon',$mamom)->get();
           
        }
        else
        {
            $data=[];
        }
        $monhoc=monhoc::all();
        $lop=Lop::all();
        //dd($data);
        return view('modules.danhsachdiemdanh',compact('monhoc','lop','data'));
    }
    public function chiTietBuoiVang($masv,$mon){
        $data=diemdanh::join('sinh_viens','diemdanhs.masv','=','sinh_viens.masv')->where('diemdanhs.masv',$masv)->where('mamon',$mon)->get();
        if(count($data)>0)
        {
            return view('modules.chitietbuoivang',compact('data'));
        }
        else{
            return redirect()->route('quan-ly-diem-danh');
        }
  
    }
    public function Post_themsinhvien(Request $request){
        try{
            SinhVien::create($request->all());
            return redirect()->back();
        }
        catch(\Illuminate\Database\QueryException $ex){
            
        }
    }
    public function UpdateSinhVien($id)
    {
        $data=SinhVien::find($id);
        if($data)
        {
            $lop=Lop::all();
            return view('modules.updatesinhvien',compact('data','lop'));
        }
        else
        {
            return redirect()->route('quan-ly-sinh-vien');
        }
    }
    public function PostUpdateSinhVien(Request $request,$id){
        SinhVien::find($id)->update([
            'hoten'=>$request->hoten,
            'gioitinh'=>$request->gioitinh,
            'malop'=>$request->malop
        ]);
        return redirect()->route('quan-ly-sinh-vien');
    }
    public function destroy_lop(Request $request){
        if($request->ajax()){
            if(Lop::find($request->id)->delete())
                return 'ok';
            else
                return 'error';
            
        }
    }
    public function update_lop($id){
        $data=Lop::find($id);
        return view('modules.updatelop',compact('data'));
    }
    public function post_update_lop(Request $request,$id){
        Lop::find($id)->update([
            'tenlop'=>$request->tenlop
        ]);
        return redirect()->route('gquan-ly-lop');
    }
    public function Destroy_diemdanh(Request $request){
        if($request->ajax())
        {
            //return $request->masv;
            $dd=diemdanh::where('masv',$request->masv)->where('mamon',$request->mamon)->where('buoivang',$request->buoivang)->delete();
            if($dd)

                return 'ok';
            else
                return 'error';
        }
    }
    
}
