@extends('backend.master.index')
@section('content')
@include('errors.functions')
  <div class="page-content">		
	<div class="page-header">
		<h1>
			Sửa từ khóa seo
			<small>
				<i class="ace-icon fa fa-angle-double-right"></i>
				Thông tin từ khóa seo
			</small>
		</h1>
	</div><!-- /.page-header -->
	<div class="row">
		<div class="col-xs-12">
			<!-- PAGE CONTENT BEGINS -->
			<form class="form-horizontal" role="form" method="post">
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1">title_seo</label>
					<div class="col-sm-9">
						<input type="text" id="form-field-1" value="{{$tkseo->title_seo}}" name="title_seo" placeholder="Nhập từ khóa seo" class="col-xs-10 col-sm-5" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">alt_img</label>
						<div class="col-sm-9">
							<input type="text" name="alt_img" value="{{$tkseo->alt_img}}" class="col-xs-10 col-sm-5" placeholder="Nhập alt_img">
						</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">meta_seo</label>
						<div class="col-sm-9">
							<input type="text" name="meta_seo" value="{{$tkseo->meta_seo}}" class="col-xs-10 col-sm-5" placeholder="Nhập meta_seo">
						</div>
				</div>
				<div class="space-4"></div>
				<div class="clearfix form-actions">
					<div class="col-md-offset-3 col-md-9">
							<input type="submit" value="Submit">
						&nbsp; &nbsp; &nbsp;
							<input type="reset" value="Reset">
					</div>
				</div>
				{{csrf_field()}}
			</form>
		</div><!-- /.col --
	</div><!-- /.row -->
</div><!-- /.page-content -->
@endsection('content')

	