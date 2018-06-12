@extends('masterlayout')
@section('content')
<div id="content" class="page-main">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-status bg-blue"></div>
					<div class="card-header">
						<h3 class="card-title text-uppercase">Thao tác</h3>
						<div class="card-options">
							<a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
						</div>
					</div>
					<div class="card-body">
						<form action="" method="post">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label>Mã sinh viên</label>
										<input type="text" class="form-control" placeholder="Nhập mã sinh viên..." name="masv">
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label>Tên sinh viên</label>
										<input type="text" class="form-control" placeholder="Nhập tên sinh viên..." name="hoten">
									</div>
								</div>
								<div class="col-lg-6">
										<div class="form-group">
											<label>Giới tính</label>
											<select name="gioitinh" id="" class="form-control">
												<option value="Nam">Nam</option>
												<option value="Nữ">Nữ</option>
											</select>
										</div>
								</div>
								<div class="col-lg-6">
										<div class="form-group">
											<label>Lớp</label>
											<select name="malop" id="" class="form-control">
												@foreach($lop as $val)
												<option value="{{ $val->malop }}">{{ $val->tenlop }}</option>
												
												@endforeach
											</select>
										</div>
								</div>
							</div>
							<div class="text-right">
								<button class="btn btn-primary"><i class="fe fe-arrow-down-circle"></i> Thêm sinh viên</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="col-lg-12">
				<div class="card">
					<div class="card-status bg-blue"></div>
					<div class="card-header">
						<div class="col-md-6"><h3 class="card-title text-uppercase">Danh sách sinh viên</h3></div>
						<div class="col-md-6">
							<select name="" id="lop" class="form-control">
								<option value="">--Chọn lớp--</option>
								@foreach($lop as $val)
								<option @if($val->malop==$query) selected @endif value="{{$val->malop}}">{{$val->tenlop}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-hover">
								<thead>
									<tr>
										<th>STT</th>
										<th>MSSV</th>
										<th>Tên sinh viên</th>
										<th>Giới tính</th>
										{{--<th>Lớp</th> --}}
										<th class="text-right">Chức năng</th>
									</tr>
								</thead>
								<tbody>
									@foreach($data as $key=>$val)
									<tr>
										<td>{{$key+1}}</td>
										<td hidden class='id'>{{$val->id}}</td>
										<td>{{$val->masv}}</td>
										<td>{{$val->hoten}}</td>
										<td>{{ $val->gioitinh }}</td>
										<td class="text-right">
											<a href="{{ route('update-sinh-vien',$val->id) }}" class="btn btn-warning"><i class="fe fe-edit"></i></a>
											<a  class="btn btn-success delete"><i class="fe fe-delete"></i></a>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	require(['jquery'],function(){
		$('.delete').click(function (e) { 
			
			var t=$(this).closest('tr').find('.id').text()
			if(confirm("Are you sure!"))
			{
				$.ajax({
					type: "post",
					url: "{{route('destroysinhvien')}}",
					data: {
						'_token':"{{csrf_token()}}",
						'id':t
					},
		
					success: function (response) {
						response=='ok'? location.reload():''
					}
				});
			}
		
			
		});
		$('#lop').change(function (e) { 
			if(this.value!='')
				location.href=location.pathname+"?query="+this.value
			
		});
    });
</script>
@endsection