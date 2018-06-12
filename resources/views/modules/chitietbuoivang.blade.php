@extends('masterlayout')
@section('content')
<div id="content" class="page-main">
	<div class="container-fluid">
		<div class="row">
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
										<th class="text-center">Vắng ngày</th>
										<th class="text-right">Chức năng</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1</td>
										<td>15C4801040046</td>
										<td>Ngô Minh Thư</td>
										<td class="text-center">20/06/2018</td>
										<td class="text-right">
											<a href="#" class="btn btn-danger"><i class="fe fe-trash"></i> Xóa</a>
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