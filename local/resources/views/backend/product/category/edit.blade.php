@extends('backend.master.index')
@section('content')
@include('errors.functions')
<script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="assets/ckeditor/ckfinder/ckfinder.js"></script>
<!--<link rel="stylesheet" href="assets/jasny-bootstrap/jasny-bootstrap.min.css">
<scrip type="text/javascript" src="assets/jasny-bootstrap/jasny-bootstrap.min.js"t></script>-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<div class="page-content">		
	<div class="page-header">
		<h1>
			Sửa danh mục <span class="red">sản phẩm</span>
			<small>
				<i class="ace-icon fa fa-angle-double-right"></i>
				Thông tin danh mục sản phẩm
			</small>
			@include('errors.note')
		</h1>
	</div><!-- /.page-header -->
	<div class="row">
		<div class="col-xs-12">
			<!-- PAGE CONTENT BEGINS -->
			<form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
				<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Danh mục cha</label>
					<div class="col-sm-3">
						<select class="form-control select_lap" name="parent">
	                        <option  value="0">Chọn danh mục cha</option>
	                       	@php
	                       		menuParent($parent,0,'',$cat->parent_id);
	                       	@endphp
	                    </select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tên danh mục</label>
					<div class="col-sm-9">
						<input type="text" required="" id="form-field-1" name="cat_name" value="{{$cat->cat_name}}" class="col-xs-10 col-sm-5" />
					</div>
				</div>

				<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Icon danh mục mới</label>
					<div class="col-sm-9">
						<div id="div_1">
							<div class="div_border">
								<img class="anhedit_lap" id="blah" src="{{url('public/backend/product')}}/{{$cat->cat_icon}}" alt="your image" />
							</div>
					         <input type='file' id="imgInp" name="new_cat_icon" value=""  />
							<button type="reset" class="btn-reset btn_reset_lap">Làm mới</button>
						</div>
					</div>
				</div>
				<div class="space-4"></div>
				<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Ảnh danh mục mới</label>
					<div class="col-sm-9">
						<div id="div_2">	
						 <div class="div_border">
						 	<img class="anhedit_lap" id="output" src="{{url('public/backend/product')}}/{{$cat->cat_img}}" alt="your image" />
						 </div>
							<input type="file" accept="image/*" onchange="loadFile(event)" name="new_cat_img" value="">
							<button type="reset" class="btn-reset2 btn_reset_lap">Làm mới</button>
						</div>
					</div>
				</div>
				<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Mô tả danh mục</label>
					<div class="col-sm-9">
				<textarea class="ckeditor" required name="description1"  id="" cols="30" rows="10" >
							{{$cat->cat_gtngan}}
				</textarea>
				<script type="text/javascript">
					     CKEDITOR.replace('description1');
					      </script>﻿
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Mô tả chi tiết danh mục</label>
					<div class="col-sm-9">
					<textarea class="ckeditor" required name="description2" id="" cols="30" rows="10">
							{{$cat->cat_gtchitiet}}
						</textarea>
						<script type="text/javascript">
					     CKEDITOR.replace('description2');
					      </script>﻿
											
					</div>
				</div>
				<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Title danh mục</label>
					<div class="col-sm-9">
						<input type="text" name="title" class="seo_input" value="{{$cat->title}}">
					</div>
				</div>

				<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Từ khóa danh mục</label>
					<div class="col-sm-9">
						<input type="text" name="tukhoa" class="seo_input" value="{{$cat->tukhoa}}">
					</div>
				</div>
				
				<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">
				Mô tả danh mục (description)</label>
					<div class="col-sm-9">
						<input type="text" name="mota" class="seo_input" value="{{$cat->mota}}" >
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
		</div>
	</div>
</div>
<script>
	function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      $('#blah').attr('src', e.target.result);
    }
    reader.readAsDataURL(input.files[0]);
  }
}
$("#imgInp").change(function() {
  readURL(this);
});
</script>
<script>
  var loadFile = function(event) {
    var reader = new FileReader();
    reader.onload = function(){
      var output = document.getElementById('output');
      output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  };
</script>
 
@endsection('content')

	