@extends('backend.master.index')
@section('content')
<div class="page-content">
	<div class="page-header">
	<h1>
		Thông tin chi tiết bài viết
		<small>
			<i class="ace-icon fa fa-angle-double-right"></i>
			<a href="{{url('admin/post/postimg/add')}}"> Thêm thông tin chi tiết bài viết</a>
		</small>
			@include('errors.note')
	</h1>
	</div><!-- /.page-header -->
	<div class="row">
		<div class="col-xs-12">
			<!-- PAGE CONTENT BEGINS -->
			<div class="row">
				<div class="col-xs-12">
					<table id="simple-table" class="table  table-bordered table-hover">
						<thead>
							<tr>
								<th class="detail-col">Id</th>
								<th>Ảnh</th>
								<th>Bài viết</th>
								<th>Hành động</th>
							</tr>
						</thead>
						<tbody>
							@foreach($imgpost_2 as $val)
							<tr>
								<td>
								{{$val->id}}
								</td>
								<td>
								<img width="40" src="{{url('public/backend/imgpost')}}/{{$val->img}}" alt="">
								</td>
								<td>
									{{$val->postmodel->post_name}}
									@if(!empty($val->postmodel->post_name))
												{{$val->postmodel->post_name}}
												[id{{$val->postmodel->id}}]
											@else
												{{'None'}}
											@endif
								</td>
								<td>
									<div class="hidden-sm hidden-xs btn-group">
										<button class="btn btn-xs btn-success">
											<a href="{{url('admin/post/postimg/add')}}"><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
										</button>

										<button class="btn btn-xs btn-info">
											<a href="{{url('admin/post/postimg/edit')}}/{{$val->id}}"><i class="ace-icon fa fa-pencil bigger-120"></i></a>
										</button>

										<button class="btn btn-xs btn-danger">
											<a onclick="return confirm('Bạn có muốn xóa không ?');"  href="{{url('admin/post/postimg/delete')}}/{{$val->id}}">
											<i class="ace-icon fa fa-trash-o bigger-120"></i>
											</a>
										</button>
									</div>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div><!-- /.span -->
				<div class="pagination">
				<p align="left">
					
				</p>
				</div>
			</div><!-- /.row -->
		</div><!-- /.col -->
	</div><!-- /.row -->
</div><!-- /.page-content -->
@endsection('content')

