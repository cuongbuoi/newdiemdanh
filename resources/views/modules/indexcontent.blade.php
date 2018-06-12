@extends('masterlayout')
@section('content')
<div id="content" class="page-main">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-8">
				<div class="card">
					<div class="card-status bg-blue"></div>
					<div class="card-header">
						<h3 class="card-title">Nạp hình ảnh</h3>
						<div class="card-options">
							<a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
						</div>
					</div>
					<div class="card-body">
						<div class="img-detection">
							<img class="rounded" width="100%" src="{!!asset('assets/images/faces.png') !!}" alt="">
							<span class="detected">Name</span>
							<span class="undetected">Name</span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="card">
					<div class="card-status bg-blue"></div>
					<div class="card-header">
						<h3 class="card-title">Thao tác</h3>
						<div class="card-options">
							<a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
						</div>
					</div>
					<div class="card-body">
						<form>
							<div class="form-group">
								<label>Chọn lớp</label>
								<select  id="" class="form-control">
									<option value="">Lorem ipsum dolor sit amet.</option>
									<option value="">Optio illo asperiores dignissimos! Laudantium.</option>
									<option value="">At veritatis sunt officiis, nesciunt.</option>
								</select>
							</div>
							<div class="form-group">
								<div class="custom-file">
									<input type="file" class="custom-file-input" multiple>
									<label class="custom-file-label">Chọn ảnh</label>
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