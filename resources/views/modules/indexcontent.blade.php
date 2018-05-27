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
						<form action="#" class="dropzone" enctype="multipart/form-data" style="border-color: #0573D6;border-radius: 5px">
							<div class="fallback">
								<input name="file" type="file" multiple />
							</div>
						</form>
						<script>
							
						</script>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection