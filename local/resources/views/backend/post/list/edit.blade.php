@extends('backend.master.index')
@section('content')
@include('errors.function_post')
<script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="assets/ckeditor/ckfinder/ckfinder.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
								<option value="{{$postid->catepostmodel->id}} {{$postid->catepostmodel->cat_slug}}">{{$postid->catepostmodel->cat_name}}</option>
							@php
	                       		menuParent_post($catepost,0,'',old('cat_id')); 
	                       	@endphp
				         </select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tên bài viết </label>
					<div class="col-sm-9">
						<input type="text" required="" id="form-field-1" name="new_post_name" placeholder="Nhập tên bài viết" class="col-xs-10 col-sm-5" value="{{$postid->post_name}}" />
					</div>
				</div>
				<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Ảnh bài viết 1</label>
					<div class="col-sm-9">
						
						<div id="div_1">
							<div class="div_border">
								<img class="anhedit_lap" id="blah" src="{{url('public/backend/post')}}/{{$postid->post_img}}" alt="your image" />
							</div>
					         <input type='file' id="imgInp" name="new_post_img" value=""  />
							<button type="reset" class="btn-reset btn_reset_lap">Làm mới</button>
						</div>


						


					</div>
				</div>
				<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Ảnh bài viết 2</label>
					<div class="col-sm-9">


						<div id="div_2">	
						 <div class="div_border">
						 	<img class="anhedit_lap" id="output" src="{{url('public/backend/post')}}/{{$postid->post_img2}}" alt="your image" />
						 </div>
							<input type="file" accept="image/*" onchange="loadFile(event)" name="new_post_img2" value="">
							<button type="reset" class="btn-reset2 btn_reset_lap">Làm mới</button>
						</div>





					</div>
				</div>
				<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Mô tả ngắn bài viết</label>
					<div class="col-sm-9">
						<textarea class="ckeditor" required name="description1" id="" cols="30" rows="10" >
							{{$postid->post_gtngan}}
						</textarea>
					</div>
				</div>
				<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Mô tả chi tiết bài viết</label>
				<div class="col-sm-9">
					<textarea class="ckeditor" required name="description2" id="" cols="30" rows="10">
						{{$postid->post_gtchitiet}}
					</textarea>
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
							@if($postid->loaibaiviet==1)
								{!<option value="1">Bài viết mới nhất</option> !}
								@elseif($postid->loaibaiviet==2)
								{!<option value="2">Bài viết thông thường</option> !}
								@elseif($postid->loaibaiviet==3)
								{!<option value="3">Bài viết sự kiện</option> !}
								@elseif($postid->loaibaiviet==4)
								{! <option value="4">Bài viết khác</option>!}
							@endif
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
						<input type="text" name="meta_des" class="form-control" value="{{$postid->meta_des}}">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 
						Meta keywords
					</label>
					<div class="col-sm-3">
						<input type="text" name="meta_keywords" class="form-control" value="{{$postid->meta_keywords}}">
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tác giả</label>
					<div class="col-sm-3">
						<input type="text" name="new_tacgia" class="form-control" value="{{$postid->tacgia}}">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Ngày đăng</label>
					<div class="col-sm-3">
					<input type="date" name="new_date" class="form-control" value="{{$postid->date}}">
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

	