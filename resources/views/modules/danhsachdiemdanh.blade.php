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
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label>Chọn lớp</label>
										<select  id="" class="form-control">
											<option value="">HTTT</option>
											<option value="">CNPM</option>
											<option value="">CNM</option>
										</select>
										<p class="text-danger">{{$errors->first('malop')}}</p>
									</div>
								</div>
								<div class="col-lg-6">
										<div class="form-group">
											<label>Chọn môn</label>
											<select  id="" class="form-control">
												<option value="">HTTT</option>
												<option value="">CNPM</option>
												<option value="">CNM</option>
											</select>
											<p class="text-danger">{{$errors->first('tenlop')}}</p>
										</div>
								</div>
							</div>
							<div class="text-right">
								<button class="btn btn-primary"><i class="fe fe-arrow-down-circle"></i> Thêm danh sách lớp</button>
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
						<div class="card-options">
							<a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
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
										<th class="text-center">Số buổi vắng</th>
										<th class="text-right">Chức năng</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1</td>
										<td>15C4801040046</td>
										<td>Ngô Minh Thư</td>
										<td class="text-center">2</td>
										<td class="text-right">
											<a href="{{route('chi-tiet-buoi-vang')}}" class="btn btn-success"><i class="fe fe-eye"></i> Xem chi tiết</a>
										</td>
									</tr>

								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection