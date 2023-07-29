@extends('backend.master.index')
@section('content')
@include('errors.function_post')
<script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="assets/ckeditor/ckfinder/ckfinder.js"></script>
<div class="page-content">		
	<div class="page-header">
		<h1>
			Thêm mới bài viết
			<small>
				<i class="ace-icon fa fa-angle-double-right"></i>
				Thông tin bài viết
			</small>
		</h1>
	</div><!-- /.page-header -->
	<div class="row">
		<div class="col-xs-12">
			<!-- PAGE CONTENT BEGINS -->
			<form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
				<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Danh mục bài viết</label>
					<div class="col-sm-3">
	                    <select required name="cat_id" class="form-control">
										<option value="">Chọn danh mục</option>
							@php
	                       		menuParent_post($catepost,0,'',old('parent')); 
	                       	@endphp
				         </select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tên bài viết </label>
					<div class="col-sm-9">
						<input type="text" required="" id="form-field-1" name="post_name" placeholder="Nhập tên sản phẩm" class="col-xs-10 col-sm-5" />
					</div>
				</div>
				<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Ảnh bài viết 1</label>
					<div class="col-sm-9">
						<div id="div_1">
							<div class="div_border">
								<div class="box-preview-img"></div>	
							</div>
					       <input type="file" name="post_img" multiple="true" onchange="previewImg(event);" id="img_file" accept="image/*">
							<button type="reset" class="btn-reset btn_reset_lap">Làm mới</button>
						</div>
					</div>
				</div>
				<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Ảnh bài viết 2</label>
					<div class="col-sm-9">
						<div id="div_2">	
						 <div class="div_border">
						 	<div class="box-preview-img" id="box_preview2"></div>
						 </div>
							<input type="file"  name="post_img2" multiple="true" onchange="previewImg2(event);" id="img_file2" accept="image/*">
							<button type="reset" class="btn-reset2 btn_reset_lap">Làm mới</button>
						</div>
					</div>
				</div>
				<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Mô tả ngắn bài viết</label>
					<div class="col-sm-9">
						<textarea class="ckeditor" required name="description1" id="" cols="30" rows="10" ></textarea>
					</div>
				</div>
				<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Mô tả chi tiết bài viết</label>
				<div class="col-sm-9">
					<textarea class="ckeditor" required name="description2" id="" cols="30" rows="10" ></textarea>
					<script type="text/javascript">
				      var editor = CKEDITOR.replace('description2',{
				       language:'vi',
				       filebrowserImageBrowseUrl: '../../ckeditor/ckfinder/ckfinder.html?Type=Images/',
				       filebrowserImageBrowseUrl: '../../ckeditor/ckfinder/ckfinder.html?Type=Flash/',
				       filebrowserImageBrowseUrl: '../../ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
				       filebrowserImageBrowseUrl: '../../ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
			
				       });
				      </script>﻿					
				</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 
						Loại bài viết
					</label>
					<div class="col-sm-3">
						<select name="loaibaiviet" id="">
							<option value="1">Bài viết mới nhất</option>
							<option value="2">Bài viết thông thường</option>
							<option value="3">Bài viết sự kiện</option>
							<option value="4">Bài viết khác</option>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 
						Meta description
					</label>
					<div class="col-sm-3">
						<input type="text" name="meta_des" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 
						Meta keywords
					</label>
					<div class="col-sm-3">
						<input type="text" name="meta_keywords" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tác giả</label>
					<div class="col-sm-3">
						<input type="text" name="tacgia" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Ngày đăng</label>
					<div class="col-sm-3">
						<input type="date" name="date" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Trạng thái hiển thị</label>
					<div class="col-sm-3">
						<select name="online" id="">
							<option value="1">Hiển thị</option>
							<option value="0">Không hiển thị</option>
						</select>
					</div>
				</div>
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
<script src="assets/uploadfile_lap/jquery.js"></script>
 <script>
 	// Xem hình ảnh trước khi upload
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

	