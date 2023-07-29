@extends('backend.master.index')
@section('content')
@include('errors.functions')
<script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="assets/ckeditor/ckfinder/ckfinder.js"></script>
<div class="page-content">		
	<div class="page-header">
		<h1>
			Thêm danh mục sản phẩm
			<small>
				<i class="ace-icon fa fa-angle-double-right"></i>
				Thông tin danh mục sản phẩm
			</small>
		</h1>
	</div><!-- /.page-header -->
	<div class="row">
		<div class="col-xs-12">
			<!-- PAGE CONTENT BEGINS -->
			<form class="form-horizontal" method="post" enctype="multipart/form-data">
				<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Danh mục cha</label>
					<div class="col-sm-3">
						<select class="form-control select_lap" name="parent">
	                        <option  value="0">Chọn danh mục cha</option>
	                       	@php
	                       		menuParent($cat,0,'',old('parent')); 
	                       	@endphp
	                    </select>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tên danh mục</label>
					<div class="col-sm-9">
						<input type="text" required="" id="form-field-1" name="cat_name" placeholder="Nhập danh mục" class="col-xs-10 col-sm-5" />
					</div>
				</div>

				<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Icon danh mục</label>
					<div class="col-sm-9">
						<div id="div_1">
							<div class="div_border">
								<div class="box-preview-img"></div>	
							</div>
					       <input type="file"  name="cat_icon" multiple="true" onchange="previewImg(event);" id="img_file" accept="image/*">
							<button type="reset" class="btn-reset btn_reset_lap">Làm mới</button>
						</div>
					</div>
				</div>
				<div class="space-4"></div>

				<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Ảnh danh mục</label>
					<div class="col-sm-9">
						<div id="div_2">	
						 <div class="div_border">
						 	<div class="box-preview-img" id="box_preview2"></div>
						 </div>
							<input type="file" name="cat_img" multiple="true" onchange="previewImg2(event);" id="img_file2" accept="image/*">
							<button type="reset" class="btn-reset2 btn_reset_lap">Làm mới</button>
						</div>
					</div>
				</div>

				<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Mô tả danh mục</label>
					<div class="col-sm-9">
						<textarea class="ckeditor" name="description1" id="" cols="30" rows="10" >
						</textarea>
						<script type="text/javascript">
				               CKEDITOR.replace('description1');
				        </script>﻿		
					</div>
				</div>
				<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Mô tả chi tiết danh mục</label>
				<div class="col-sm-9">
					<textarea class="ckeditor" required name="description2" id="" cols="30" rows="10" ></textarea>
					<script type="text/javascript">
				     CKEDITOR.replace('description2');
				      </script>﻿					
				</div>
				</div>
				<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Title danh mục</label>
					<div class="col-sm-9">
						<input type="text" name="title" class="seo_input" placeholder="Nhập <title> Tiêu đề</title>">
					</div>
				</div>
				<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Từ khóa danh mục</label>
					<div class="col-sm-6">
						<input type="text" name="tukhoa" class="seo_input" placeholder="Nhập Từ khóa danh mục ">
					</div>
				</div>
				<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">
				Mô tả danh mục (description)</label>
					<div class="col-sm-6">
						<input type="text" name="mota" class="seo_input" placeholder="Nhập Mô tả danh mục ">
					</div>
				</div>
				<div class="clearfix form-actions">
					<div class="col-md-offset-3 col-md-9">
							
							<button type="submit" class="btn btn-app btn-grey btn-xs radius-4">
											<i class="ace-icon fa fa-floppy-o bigger-160"></i>

											Lưu
											<span class="badge badge-transparent">
												<i class="light-red ace-icon fa fa-asterisk"></i>
											</span>
							</button>
							<button type="reset" class="btn btn-app btn-success> 
											<i class="ace-icon fa fa-refresh bigger-230"></i>
											Làm mới
							</button>			
						
					</div>
				</div>
				{{csrf_field()}}
			</form>
		</div>
<script src="assets/uploadfile_lap/jquery.js"></script>
<script type="text/javascript">
	$(document).ready(function()
		{
			  $('#click_logout').click(function(){
		         alert('kkkk');
		        })

		});
</script>
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

	