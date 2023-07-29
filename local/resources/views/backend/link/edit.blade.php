@extends('backend.master.index')
@section('content')
@include('errors.functions')
  <div class="page-content">		
	<div class="page-header">
		<h1>
			Sửa link liên kết
			<small>
				<i class="ace-icon fa fa-angle-double-right"></i>
				Thông tin link
			</small>
		</h1>
	</div><!-- /.page-header -->
	<div class="row">
		<div class="col-xs-12">
			<!-- PAGE CONTENT BEGINS -->
			<form class="form-horizontal" role="form" method="post">
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Link url</label>
					<div class="col-sm-9">
						<input type="text" id="form-field-1" value="{{$id_link->link_url}}" name="link_url" placeholder="Nhập link_url" class="col-xs-10 col-sm-5" />
						
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">link_name</label>
						<div class="col-sm-9">
							<input type="text" name="link_name" value="{{$id_link->link_name}}" class="col-xs-10 col-sm-5" placeholder="Nhập link_name">
						</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">link_image</label>
						<div class="col-sm-9">
							<input type="text" name="link_image" value="{{$id_link->link_image}}" class="col-xs-10 col-sm-5" placeholder="Nhập link_image">
						</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">link_target</label>
						<div class="col-sm-9">
							<input type="text" name="link_target" value="{{$id_link->link_target}}" class="col-xs-10 col-sm-5" placeholder="Nhập link_target">
						</div>
				</div>
				
					<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">link_description</label>
						<div class="col-sm-9">
							<input type="text" name="link_description" value="{{$id_link->link_description}}" class="col-xs-10 col-sm-5"    placeholder="Nhập link_description">
						</div>
				</div>
				
					<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">link_rel</label>
						<div class="col-sm-9">
							<input type="text" name="link_rel" value="{{$id_link->link_rel}}" class="col-xs-10 col-sm-5"  placeholder="Nhập link_rel">
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

	