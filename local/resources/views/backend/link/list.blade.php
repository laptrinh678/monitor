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
								<th class="detail-col">link_url</th>
								<th>link_name</th>
								<th>link_image</th>
								<th>link_target</th>
								
								<th>Hành động</th>
							</tr>
						</thead>
						<tbody>
							@foreach($link as $val)
							<tr>
								
								<td class="center">
									{{$val->link_url}}
								</td>
								<td>
									{{$val->link_name}}
								</td>
								<td>
									{{$val->link_image}}
									
								</td>
								<td>
									{{$val->link_target}}
								</td>
								
								<td>
									<div class="hidden-sm hidden-xs btn-group">
										<button class="btn btn-xs btn-info">
										<a href="{{url('admin/link/edit')}}/{{$val->id}}">	<i class="ace-icon fa fa-pencil bigger-120"></i></a>
										</button>
										<button class="btn btn-xs btn-danger">
											<a href="{{url('admin/link/delete')}}/{{$val->id}}"><i class="ace-icon fa fa-trash-o bigger-120"></i></a>
										</button>
									</div>
								</td>
							</tr>
							@endforeach()
							
						</tbody>
					</table>
				</div><!-- /.span -->
			</div><!-- /.row -->
		</div><!-- /.col -->
	</div><!-- /.row -->
</div><!-- /.page-content -->
@endsection('content')

