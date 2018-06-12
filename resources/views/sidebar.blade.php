
<nav id="sidebar">
    <div class="profile">
        <div class="d-flex justify-content-center py-4">
                <span class="avatar avatar-xxl" style="background-image: url({!!asset('demo/faces/female/25.jpg') !!}"></span>
        </div>
        <h5 class="text-center">Admin</h5>
    </div>
    <ul class="list-unstyled components">
        <li @if(Request::segment(1)=="") class="active" @endif>
            <a href="{{route('trang-chu')}}"><i class="fe fe-user"></i> Điểm danh</a>
        </li>
        <li @if(Request::segment(1)=="training-list" || Request::segment(1)=="training") class="active" @endif>
            <a href="{{route('training-list')}}"><i class="fe fe-gitlab"></i> Training khuôn mặt</a>
        </li>
        <li @if(Request::segment(1)=="training-list" || Request::segment(1)=="training") class="active" @endif>
                <a href="{{route('logout')}}"><i class="fe fe-gitlab"></i> Đăng xuất</a>
            </li>
        <li @if(Request::segment(1)=='quan-ly') class="active" @endif>
            <a href="#quanly" data-toggle="collapse" aria-expanded="false"><i class="fe fe-eye"></i> Quản lý<i class="dropdown-toggle float-right"></i></a>
            <ul @if(Request::segment(2)=='quan-ly-lop'||Request::segment(2)=='quan-ly-mon-hoc'||Request::segment(2)=='quan-ly-sinh-vien') class="collapsed list-unstyled" @endif  id="quanly" class="collapse list-unstyled">
                <li @if(Request::segment(2)=='quan-ly-mon-hoc') class="active" @endif><a href="{{route('gquan-ly-mon-hoc')}}">Danh sách môn học</a></li>
                <li @if (Request::segment(2)=='quan-ly-sinh-vien') class="active" @endif><a href="{{route('quan-ly-sinh-vien')}}">Danh sách sinh viên</a></li>
                <li @if (Request::segment(2)=='quan-ly-lop') class="active" @endif><a href="{{route('gquan-ly-lop')}}">Danh sách lớp</a></li>
            </ul>
        </li>
    </ul>
</nav>