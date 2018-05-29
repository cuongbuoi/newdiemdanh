@extends('masterlayout')
@section('content')
<div id="content" class="page-main">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-status bg-blue"></div>
					<div class="card-header">
						<h3 class="card-title text-uppercase">Chọn lớp</h3>
						<div class="card-options">
							<a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
						</div>
					</div>
					<div class="card-body">
						<form action="">
							<div class="form-group">
								<select  id="" class="form-control">
									<option value="">Lorem ipsum dolor sit amet.</option>
									<option value="">Optio illo asperiores dignissimos! Laudantium.</option>
									<option value="">At veritatis sunt officiis, nesciunt.</option>
								</select>
							</div>
							<div class="text-right">
								<button class="btn btn-primary"><i class="fe fe-arrow-down-circle"></i> Nạp danh sách lớp</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="col-lg-12">
				<div class="card">
					<div class="card-status bg-blue"></div>
					<div class="card-header">
						<h3 class="card-title text-uppercase">Danh sách sinh viên lớp Hệ thống thông tin</h3>
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
										<th>Họ tên</th>
										<th class="text-right">Chức năng</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1</td>
										<td>Ngô Minh Thư</td>
										<td class="text-right">
											<a href="{{route('training')}}" class="btn btn-warning"><i class="fe fe-gitlab"></i> Train Now</a>
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