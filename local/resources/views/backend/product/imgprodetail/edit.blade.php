@extends('backend.master.index')
@section('content')
@section('header_style')
<!--<link href="assets/editimg/css/app.css" rel="stylesheet" type="text/css" />
<link href="assets/editimg/css/jasny-bootstrap.css" rel="stylesheet" type="text/css" />-->
<link href="assets/editimg/css/bootstrap-editable.css" rel="stylesheet" type="text/css" />
<link href="assets/editimg/css/user_profile.css" rel="stylesheet" type="text/css" />
<style>
.btn {
    display: inline-block;
    margin-bottom: 0;
    font-weight: 400;
    text-align: center;
    vertical-align: middle;
    touch-action: manipulation;
    cursor: pointer;
    border: 1px solid transparent;
    white-space: nowrap;
    padding: 6px 2px;
    font-size: 14px;
    /* line-height: 1.42857143; */
    border-radius: 4px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}
.img-max {
    max-width: 200px;
    max-height: 150px;
    height: 120px;
}
.thumbnail>img {width: 100%;height: 100%;}
.fileinput .btn {
    background: #13797d;
    padding: 0px;
}
input[type=file] {
    display: block;
    font-size: 11px;
}

</style>
@endsection('header_style')
<div class="page-content">		
	<div class="page-header">
		<h1>
			Sửa thông tin chi tiết sản phẩm
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
						
						<select class="form-control" name="product_id">
	                   
	                      
	                        <option value="{{$imgdeid->productmodel->id}}  .{{$imgdeid->productmodel->pro_slug}}">{{$imgdeid->productmodel->pro_name}}
	                        </option>
	                        @foreach($product as $val)
	                        <option value="{{$val->pro_id}}">{{$val->pro_name}}
	                        </option>
							@endforeach

	                    </select>
					</div>
				</div>
				<div class="motram">
						<h3 align="center">Ảnh chi tiết sản phẩm</h3>
				<?php
					$img = json_decode($imgdeid->img);
				 ?>
				@if(count($img)>0)
				@foreach($img as $key=>$val)
				<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Ảnh chi tiết sản phẩm {{$key}}</label>
					<div class="col-sm-9">
			          <div class="fileinput fileinput-new" data-provides="fileinput">
			                <div class="fileinput-preview fileinput-exists thumbnail img-max">
			                </div>
			                <div>
			                    <span class="btn btn-file ">
			                    <span class="fileinput-new">Select image</span>
			                    <span class="fileinput-exists">Change</span>
			                    <input type="file" required="" name="img_edit[]" value="{{$val}}">
			                    </span>
			                    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
			                </div>
			            </div>
					</div>
				</div>
				@endforeach
				@endif

				<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Ảnh chi tiết sản phẩm </label>
					<div class="col-sm-9">
			          <div class="fileinput fileinput-new" data-provides="fileinput">
			                <div class="fileinput-preview fileinput-exists thumbnail img-max">
			                </div>
			                <div>
			                    <span class="btn btn-file ">
			                    <span class="fileinput-new">Select image</span>
			                    <span class="fileinput-exists">Change</span>
			                    <input type="file" required="" name="img_edit[]" value="">
			                    </span>
			                    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
			                </div>
			            </div>
					</div>
				</div>

				<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Ảnh chi tiết sản phẩm </label>
					<div class="col-sm-9">
			          <div class="fileinput fileinput-new" data-provides="fileinput">
			                <div class="fileinput-preview fileinput-exists thumbnail img-max">
			                </div>
			                <div>
			                    <span class="btn btn-file ">
			                    <span class="fileinput-new">Select image</span>
			                    <span class="fileinput-exists">Change</span>
			                    <input type="file" required="" name="img_edit[]" value="">
			                    </span>
			                    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
			                </div>
			            </div>
					</div>
				</div>
			<!--Ảnh màu sắc sản phẩm  -->
			<!--<div class="nammuoi">
						<h3 align="center">Ảnh màu sắc sản phẩm</h3>
				<?php
					$img = json_decode($imgdeid->img);
				 ?>
				@if(count($img)>0)
				@foreach($img as $key=>$val)
				<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Ảnh màu sắc sản phẩm {{$key}}</label>
					<div class="col-sm-9">
			          <div class="fileinput fileinput-new" data-provides="fileinput">
			                <div class="fileinput-preview fileinput-exists thumbnail img-max">
			                </div>
			                <div>
			                    <span class="btn btn-file ">
			                    <span class="fileinput-new">Select image</span>
			                    <span class="fileinput-exists">Change</span>
			                    <input type="file" name="mausac_edit[]" value="{{$val}}">
			                    </span>
			                    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
			                </div>
			            </div>
					</div>
				</div>
				@endforeach
				@endif

				<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Ảnh màu sắc sản phẩm </label>
					<div class="col-sm-9">
			          <div class="fileinput fileinput-new" data-provides="fileinput">
			                <div class="fileinput-preview fileinput-exists thumbnail img-max">
			                </div>
			                <div>
			                    <span class="btn btn-file ">
			                    <span class="fileinput-new">Select image</span>
			                    <span class="fileinput-exists">Change</span>
			                    <input type="file" name="mausac_edit[]" value="">
			                    </span>
			                    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
			                </div>
			            </div>
					</div>
				</div>

				<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Ảnh màu sắc sản phẩm </label>
					<div class="col-sm-9">
			          <div class="fileinput fileinput-new" data-provides="fileinput">
			                <div class="fileinput-preview fileinput-exists thumbnail img-max">
			                </div>
			                <div>
			                    <span class="btn btn-file ">
			                    <span class="fileinput-new">Select image</span>
			                    <span class="fileinput-exists">Change</span>
			                    <input type="file" name="mausac_edit[]" value="">
			                    </span>
			                    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
			                </div>
			            </div>
					</div>
				</div>
			</div>-->
					
					
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
		</div><!-- /.col -->
	</div><!-- /.row -->
</div><!-- /.page-content -->
@endsection('content')
@section('script')
    <script src="assets/editimg/js/app.js" type="text/javascript"></script>
    <!-- end of global js -->
    <!-- begining of page level js -->
    <!-- Bootstrap WYSIHTML5 -->
    <script src="assets/editimg/js/jasny-bootstrap.js" type="text/javascript"></script>
    <script src="assets/editimg/js/jquery.mockjax.js" type="text/javascript"></script>
    <script src="assets/editimg/js/bootstrap-editable.js" type="text/javascript"></script>
    <script src="assets/editimg/js/pages/user_profile.js" type="text/javascript"></script>
 
@endsection('script')

	