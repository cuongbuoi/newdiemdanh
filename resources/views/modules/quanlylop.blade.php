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
						<form action="">
							<div class="form-group">
								<div class="custom-file">
									<input type="file" class="custom-file-input" multiple>
									<label class="custom-file-label">Nạp file Excel</label>
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
						<h3 class="card-title text-uppercase">Danh sách lớp</h3>
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
										<th>Lớp</th>
										<th class="text-right">Chức năng</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1</td>
										<td>Hệ thống thông tin</td>
										<td class="text-right">
											<a href="#" class="btn btn-warning"><i class="fe fe-edit"></i></a>
											<a href="#" class="btn btn-success"><i class="fe fe-edit"></i></a>
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