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
					</div>
					<div class="card-body">
						<form action="" method="get">
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label>Chọn lớp</label>
										<select  id="lop" class="form-control" name="lop">
											@foreach($lop as $val)
											<option value="{{ $val->malop }}">{{ $val->tenlop }}</option>
											@endforeach
										</select>
										<p class="text-danger">{{$errors->first('malop')}}</p>
									</div>
								</div>
								<div class="col-lg-6">
										<div class="form-group">
											<label>Chọn môn</label>
											<select  id="mon" class="form-control" name="mon">
												@foreach($monhoc as $val)
												<option value="{{ $val->mamon }}">{{ $val->tenmon }}</option>
												@endforeach
											</select>
											<p class="text-danger">{{$errors->first('tenlop')}}</p>
										</div>
								</div>
							</div>
							<div class="text-right">
								<button class="btn btn-primary"><i class="fe fe-arrow-down-circle view"></i> Xem</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="col-lg-12">
				<div class="card">
					<div class="card-status bg-blue"></div>
					<div class="card-header">
						<h3 class="card-title text-uppercase">Danh sách điểm danh</h3>
					</div>
					@if(count($data)>0)
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-hover">
								<thead>
									<tr>
										<th>STT</th>
										<th>MSSV</th>
										<th>Tên sinh viên</th>
										<th class="text-center">Số buổi có mặt</th>
										<th class="text-right">Chức năng</th>
									</tr>
								</thead>
								<tbody>
									@foreach($data as $key=> $val)
									<tr>
										<td>{{ $key+1 }}</td>
										<td>{{ $val->masv }}</td>
										<td>{{ $val->hoten }}</td>
										<td class="text-center">{{ $val->bv }}</td>
										<td class="text-right">
											<a href="{{ url('quan-ly/chi-tiet-buoi-vang/'.$val->masv.'/'.$val->mamon) }}" class="btn btn-success"><i class="fe fe-eye"></i> Xem chi tiết</a>
										</td>
									</tr>
									@endforeach

								</tbody>
							</table>
						</div>
					</div>
					@endif
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	$('.view').click(function (e) { 
		console.log($('#lop').val())
		
	});
</script>
@endsection