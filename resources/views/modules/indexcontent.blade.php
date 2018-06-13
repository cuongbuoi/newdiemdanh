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
						
							<div class="form-group">
								<label>Chọn lớp</label>
								<select  id="lophoc" class="form-control">
								@forelse($dslop as $lop)
								<option value="{{ $lop->malop }}">{{ $lop->tenlop }}</option>
								@empty
								<option value="">Chưa có lớp </option>
								@endforelse
									
								</select>
							</div>
							<form id="data" method="post" enctype="multipart/form-data">
							<div class="form-group">
								<div class="custom-file">
									<input type="file" class="custom-file-input" onchange="read(this)" name="fileanh">
									<label class="custom-file-label">Chọn ảnh</label>
								</div>
							</div>
							<div class="text-right">
								<button class="btn btn-primary" type="submit"><i class="fe fe-check"></i> Điểm Danh</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
function read(input){
	if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('.rounded')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
}
$(document).ready(function () {
	// $("#anhup").change(function(){
	// 	$(".rounded").attr('src',formData.get('fileanh'))
	// })
	$("#data").submit(function(e) {
    e.preventDefault();  
	// console.log($("#lophoc").val());  
    var formData = new FormData(this);
	var reader = new FileReader();
          reader.onload = function (e) {
              $('#img-detection').html('<img src="'+formData.get('fileanh')+'">');
          }
          reader.readAsDataURL(formData.get('fileanh'));
	formData.append('malop',$("#lophoc").val());
	formData.append('_token',"{{csrf_token()}}");
    $.ajax({
        url: '{{ route('diemdanh') }}',
        type: 'POST',
        data: formData,
        success: function (data) {
            console.log('data');
        },
        cache: false,
        contentType: false,
        processData: false
    });
});
});
</script>
@endsection