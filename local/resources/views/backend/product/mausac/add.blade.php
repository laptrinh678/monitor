@extends('backend.master.index')
@section('content')
@include('errors.functions')
<script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="assets/ckeditor/ckfinder/ckfinder.js"></script>
<div class="page-content">		
	<div class="page-header">
		<h1>
			Thêm thông tin chi tiết sản phẩm
			<small>
				<i class="ace-icon fa fa-angle-double-right"></i>
				Thông tin chi tiết sản phẩm
			</small>
		</h1>
	</div><!-- /.page-header -->
	<div class="row">
		<div class="col-xs-12">
			<!-- PAGE CONTENT BEGINS -->
			<form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
				<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Sản phẩm</label>
					<div class="col-sm-3">
						
						<select class="form-control" name="product_id" required="">
	                        <option  value="">Chọn sản phẩm</option>
	                      
	                        @foreach($product as $list)
	                        <option value="{{$list->id}}">{{$list->pro_name}}</option>
	                         @endforeach
	                        
	                    </select>
					</div>
				</div>
				
				<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Ảnh sản phẩm</label>
					<div class="col-sm-9">
						<div id="div_1">
							<div class="div_border">
								<div class="box-preview-img"></div>	
							</div>
					       <input type="file" required="" name="imgdetail1" multiple="true" onchange="previewImg(event);" id="img_file" accept="image/*">
							<button type="reset" class="btn-reset btn_reset_lap">Làm mới</button>
						</div>
					</div>
				</div>



				
				<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Bản vẽ</label>
					<div class="col-sm-9">
						<div id="div_3">	
						 <div class="div_border">
						 	<div class="box-preview-img" id="box_preview3"></div>
						 </div>
							<input type="file" required=""  name="imgdetail2" multiple="true" onchange="previewImg3(event);" id="img_file3" accept="image/*">
							<button type="reset" class="btn-reset3 btn_reset_lap">Làm mới</button>
						</div>
					</div>
				</div>




				<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Anh Dự án</label>
					<div class="col-sm-9">
						<div id="div_2">	
						 <div class="div_border">
						 	<div class="box-preview-img" id="box_preview2"></div>
						 </div>
							<input type="file" required=""  name="imgdetail3" multiple="true" onchange="previewImg2(event);" id="img_file2" accept="image/*">
							<button type="reset" class="btn-reset2 btn_reset_lap">Làm mới</button>
						</div>
					</div>
				</div>
				<div class="form-group">
				<div class="clearfix form-actions">
					<div class="col-md-offset-3 col-md-9">
							<input type="submit" class="sub_mit_l" value="Lưu và quay vể trang list">
						&nbsp; &nbsp; &nbsp;
							<input type="reset" class="reset_l" value="Làm mới">
					</div>
				</div>
				{{csrf_field()}}
			</form>
		</div><!-- /.col --
	</div><!-- /.row -->
</div><!-- /.page-content -->
<script>
	function previewImg(event) {
	// Gán giá trị các file vào biến files
    var files = document.getElementById('img_file').files; 
    // Show khung chứa ảnh xem trước
    $('#div_1 .box-preview-img').show();
    // Dùng vòng lặp for để thêm các thẻ img vào khung chứa ảnh xem trước
    for (i = 0; i < files.length; i++)
    {
    	// Thêm thẻ img theo i
        $('#div_1 .box-preview-img').append('<img src="" id="' + i +'">');
        // Thêm src vào mỗi thẻ img theo id = i
       $('#div_1 .box-preview-img img:eq('+i+')').attr('src', URL.createObjectURL(event.target.files[i]));
    }   
}
// Nút reset form upload
$('#div_1 .btn-reset').on('click', function(){
	$('#div_1 .box-preview-img').html('');
	$('#div_1 .box-preview-img').hide();
	// Hide khung kết quả
	$('#div_1 .output').hide();
});
// xử lý ảnh dự án
function previewImg3(event) {
	// Gán giá trị các file vào biến files
    var files = document.getElementById('img_file3').files; 
    // Show khung chứa ảnh xem trước
    $('#div_3 #box_preview3').show();
    // Dùng vòng lặp for để thêm các thẻ img vào khung chứa ảnh xem trước
    for (i = 0; i < files.length; i++)
    {
    	// Thêm thẻ img theo i
        $('#div_3 #box_preview3').append('<img src="" id="' + i +'">');
        // Thêm src vào mỗi thẻ img theo id = i
       $('#div_3 #box_preview3 img:eq('+i+')').attr('src', URL.createObjectURL(event.target.files[i]));
    }   
}
// Nút reset form upload
$('#div_3 .btn-reset3').on('click', function() {
	// Làm trống khung chứa hình ảnh xem trước
	$('#div_3 .box-preview-img').html('');
	// Hide khung chứa hình ảnh xem trước
	$('#div_3 .box-preview-img').hide();
	// Hide khung kết quả
	$('#div_3 .output').hide();
});
// xử lý ảnh bản vẽ
function previewImg2(event) {
	// Gán giá trị các file vào biến files
    var files = document.getElementById('img_file2').files; 
    // Show khung chứa ảnh xem trước
    $('#div_2 #box_preview2').show();
    // Dùng vòng lặp for để thêm các thẻ img vào khung chứa ảnh xem trước
    for (i = 0; i < files.length; i++)
    {
    	// Thêm thẻ img theo i
        $('#div_2 #box_preview2').append('<img src="" id="' + i +'">');
        // Thêm src vào mỗi thẻ img theo id = i
       $('#div_2 #box_preview2 img:eq('+i+')').attr('src', URL.createObjectURL(event.target.files[i]));
    }   
}
// Nút reset form upload
$('#div_2 .btn-reset2').on('click', function() {
	// Làm trống khung chứa hình ảnh xem trước
	$('#div_2 .box-preview-img').html('');
	// Hide khung chứa hình ảnh xem trước
	$('#div_2 .box-preview-img').hide();
	// Hide khung kết quả
	$('#div_2 .output').hide();
});

</script>
@endsection('content')

	