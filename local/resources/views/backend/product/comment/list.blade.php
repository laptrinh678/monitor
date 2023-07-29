@extends('backend.master.index')
@section('content')
<div class="page-content">
	<div class="page-header">
	<h1>
		Danh sách bình luận sản phẩm
		<small>
			<i class="ace-icon fa fa-angle-double-right"></i>
			<a href="{{url('admin/post/listpost/add')}}"> Thêm bài viết mới</a>
		</small>
			@include('errors.note')
	</h1>
	</div><!-- /.page-header -->
	<form action="{{url('admin/post/listpost/search_post')}}" method="get">
		<input type="text" placeholder="Nhập từ khóa tìm kiếm" style="padding-right: 20px; padding-left: 10px" required="" name="valude_search">
		<input type="submit" class="search" value="Tìm kiếm">
		{{csrf_field()}}
	</form>
	<br>
	<div class="row">
		<div class="col-xs-12">
			<!-- PAGE CONTENT BEGINS -->
			<div class="row">
				<div class="col-xs-12">
					<table id="simple-table" class="table  table-bordered table-hover">
						<thead>
							<tr>
								<th class="detail-col">Id</th>
								<th>Tên bài viết</th>
								<th>Danh mục</th>
								<th class="hidden-480">Ảnh 1</th>
								<th class="hidden-480">Ảnh 2</th>
								<!--<th class="hidden-480">Ngày đăng</th>
								<th class="hidden-480">Hiển thị</th>-->
								<th>Hành động</th>
							</tr>
						</thead>
						<tbody>
							
							<tr>
								<td class="center">
									
								</td>
								<td >
									
								</td>
								<td>
									
								</td>
								<td class="hidden-480">
									<img width="50" src="{{asset('public/backend/post/')}}" class="thumbnail">
									
								</td>
								<td class="hidden-480">
									<img width="50" src="{{asset('public/backend/post/')}}" class="thumbnail">
								</td>
								
								<td>
									<div class="hidden-sm hidden-xs btn-group">
										<button class="btn btn-xs btn-success">
											<a href="{{url('admin/post/listpost/add')}}"><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
										</button>

										<button class="btn btn-xs btn-info">
											<a href="{{url('admin/post/listpost/edit')}}"><i class="ace-icon fa fa-pencil bigger-120"></i></a>
										</button>

										<button class="btn btn-xs btn-danger">
											<a onclick="return confirm('Bạn chắn chắn muốn xóa bài viết này không ?');"  href="{{url('admin/post/listpost/delete')}}">
											<i class="ace-icon fa fa-trash-o bigger-120"></i>
											</a>
										</button>
									</div>
								</td>
							</tr>
							
							
						</tbody>
					</table>
				</div><!-- /.span -->
				<div class="pagination">
					
				</div>
			</div><!-- /.row -->
		</div><!-- /.col -->
	</div><!-- /.row -->
</div><!-- /.page-content -->
@endsection('content')

