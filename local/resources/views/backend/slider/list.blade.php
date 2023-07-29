@extends('backend.master.index')
@section('content')
<div class="page-content">
	<div class="page-header">
	<h1>
		Thông tin slider
		<small>
			<i class="ace-icon fa fa-angle-double-right"></i>
			<a href="{{url('admin/slider/add')}}"> Thêm slider</a>
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
								<th>Thông tin 1</th>
								<th class="hidden-480">Thông tin 2</th>
								<th class="hidden-480">Thông tin 3</th>
								<th class="hidden-480">Thông tin 4</th>
								<th>Hành động</th>
							</tr>
						</thead>
						<tbody>
							@foreach($slider as $val)
							<tr>
								
								<td>
									{{$val->id}}
								</td>
								<td class="center">
									<img width="70px" height="80" src="{{url('public/backend/slider')}}/{{$val->img}}" alt="">
								</td>
								<td>
									{{$val->thongtin1}}
								</td>
								<td >
									{{$val->thongtin2}}
								</td>
								<td>
									{{$val->thongtin3}}
								</td>
								<td class="hidden-480">
									{{$val->thongtin4}}
								</td>
								
								<td>
									<div class="hidden-sm hidden-xs btn-group">
										<button class="btn btn-xs btn-success">
											<a href="{{url('admin/slider/add')}}"><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
										</button>

										<button class="btn btn-xs btn-info">
											<a href="{{url('admin/slider/edit')}}/{{$val->id}}"><i class="ace-icon fa fa-pencil bigger-120"></i></a>
										</button>

										<button class="btn btn-xs btn-danger">
											<a onclick="return confirm('Bạn có muốn xóa không ?');"  href="{{url('admin/slider/delete')}}/{{$val->id}}">
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

