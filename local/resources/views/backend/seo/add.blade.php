@extends('backend.master.index')
@section('content')
@include('errors.functions')
  <div class="page-content">		
	<div class="page-header">
		<h1>
			Thêm từ khóa seo
			<small>
				<i class="ace-icon fa fa-angle-double-right"></i>
				Thông tin từ khóa
			</small>
		</h1>
	</div><!-- /.page-header -->
	<div class="row">
		<div class="col-xs-12">
			<!-- PAGE CONTENT BEGINS -->
			<form class="form-horizontal" role="form" method="post">
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Từ khóa Seo chính</label>
					<div class="col-sm-9">
						<input type="text" id="form-field-1" name="title_seo" placeholder="Nhập từ khóa seo" class="col-xs-10 col-sm-5" />
						
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">alt_img</label>
						<div class="col-sm-9">
							<input type="text" name="alt_img" placeholder="Nhập từ khóa seo alt_img">
						</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">meta_seo</label>
						<div class="col-sm-9">
							<input type="text" name="meta_seo" placeholder="Nhập link_image">
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

	