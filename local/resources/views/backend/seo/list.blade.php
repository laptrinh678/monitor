@extends('backend.master.index')
@section('content')
<div class="page-content">
	<div class="page-header">
		<h1>
			Danh sách link liên kết
			<small>
				<i class="ace-icon fa fa-angle-double-right"></i>
				<a href="{{url('admin/link/add')}}"> Thêm link</a>
			</small>
		</h1>
		@include('errors.note')
	</div><!-- /.page-header -->
	<div class="row">
		<div class="col-xs-12">
			<!-- PAGE CONTENT BEGINS -->
			<div class="row">
				<div class="col-xs-12">
				<table id="simple-table" class="table  table-bordered table-hover">
						<thead>
							<tr>
								
								<th>title_seo</th>
								<th>alt_img</th>
								<th>meta_seo</th>
								
								<th>Hành động</th>
							</tr>
						</thead>
						<tbody>
							@foreach($list_key as $val)
							<tr>
								
								<td class="center">
									{{$val->title_seo}}
								</td>
								<td>
									{{$val->alt_img}}
								</td>
								<td>
									{{$val->meta_seo}}
									
								</td>
								
								<td>
									<div class="hidden-sm hidden-xs btn-group">
										<button class="btn btn-xs btn-info">
										<a href="{{url('admin/seo/edit')}}/{{$val->id}}">	<i class="ace-icon fa fa-pencil bigger-120"></i></a>
										</button>
										<button class="btn btn-xs btn-danger">
											<a href="{{url('admin/seo/delete')}}/{{$val->id}}"><i class="ace-icon fa fa-trash-o bigger-120"></i></a>
										</button>
									</div>
								</td>
							</tr>
						@endforeach
							
						</tbody>
					</table>
				</div><!-- /.span -->
			</div><!-- /.row -->
		</div><!-- /.col -->
	</div><!-- /.row -->
</div><!-- /.page-content -->
@endsection('content')

