@extends('masterlayout')
@section('content')
<div id="content" class="page-main">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-8">
				<div class="card">
					<div class="card-status bg-blue"></div>
					<div class="card-header">
						<h3 class="card-title text-uppercase">Training cho sinh viên Ngô Minh Thư</h3>
						<div class="card-options">
							<a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
						</div>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-4">
								<div class="img-training">
									<img src="{!!asset('demo/faces/female/25.jpg') !!}" alt="">
								</div>
							</div>
							<div class="col-md-4">
								<div class="img-training">
									<img src="{!!asset('demo/faces/female/25.jpg') !!}" alt="">
								</div>
							</div>
							<div class="col-md-4">
								<div class="img-training">
									<img src="" alt="">
								</div>
							</div>
							
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
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
									<label class="custom-file-label">Chọn tối đa 3 ảnh</label>
								</div>
							</div>
							<div class="text-right">
								<button class="btn btn-primary"><i class="fe fe-check"></i> Nạp</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection