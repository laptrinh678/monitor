@extends('backend.master.index')
@section('content')
<div class="page-content">
	<div class="page-header">
	<h1>
		Chi tiết sản phẩm
		<small>
			<i class="ace-icon fa fa-angle-double-right"></i>
			<a href="{{url('admin/product/imgprodetail/add')}}"> Thêm thông tin chi tiết sản phẩm</a>
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
								<th class="center">
									Id 
								</th>
								<th>Ảnh </th>
								<th>Bản vẽ</th>
								<th>Dự án</th>
								<th>Id sp</th>
							    <th>Tên SP</th>
								<th>Hành động</th>
							</tr>
						</thead>
						<tbody>
							@foreach($listimg as $val)
							<tr>
								<td class="center">
									{{$val->id}}
								</td>
								
								<td>
									<img width="70px" height="80" src="{{url('public/backend/imgdetail')}}/{{$val->img}}" alt="">
								</td>
								<td>
									{{$val->banve}}
								</td>
								<td>
									<img width="70px" height="80" src="{{url('public/backend/imgdetail')}}/{{$val->duan}}" alt="">
								</td>
								<td>
									{{$val->productmodel->id}}
								</td>
								<td>
									
									{{$val->productmodel->pro_name}}
								</td>
								
								
								<td>
									<div class="hidden-sm hidden-xs btn-group">
										<button class="btn btn-xs btn-success">
											<a href="{{url('admin/product/imgprodetail/add')}}"><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
										</button>

										<button class="btn btn-xs btn-info">
											<a href="{{url('admin/product/imgprodetail/edit')}}/{{$val->id}}"><i class="ace-icon fa fa-pencil bigger-120"></i></a>
										</button>

										<button class="btn btn-xs btn-danger">
											<a onclick="return confirm('Bạn có muốn xóa không ?');"  href="{{url('admin/product/imgprodetail/delete')}}/{{$val->id}}">
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

