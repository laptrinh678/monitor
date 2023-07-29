@extends('backend.master.index')
@section('content')
<div class="page-content">
	<div class="page-header">
	<h1>
		Kết quả tìm kiếm danh mục sản phẩm
		<small>
			<i class="ace-icon fa fa-angle-double-right"></i>
			<a href="{{url('admin/product/cate/add')}}"> Thêm Danh mục sản phẩm</a>
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
								<th>Tên danh mục</th>
								<th>Slug danh mục</th>
								<th class="hidden-480">Icon</th>
								<th>
									Ảnh
								</th>
								<th class="hidden-480">Parent_id</th>
								<th>Hành động</th>
							</tr>
						</thead>
						<tbody>
						@foreach($cat as $ls_cat)
							<tr>
								
								<td class="center">
									{{$ls_cat->id}}
								</td>
								<td>
									{{$ls_cat->cat_name}}
								</td>
								<td>{{$ls_cat->cat_slug}}</td>
								<td class="hidden-480">
									<img width="80" src="{{asset('public/backend/product/'.$ls_cat->cat_icon)}}" class="thumbnail">
								</td>
								<td>
									<img width="80" src="{{asset('public/backend/product/'.$ls_cat->cat_img)}}" class="thumbnail">
								</td>
								<td class="hidden-480">
									{{$ls_cat->parent_id}}
								</td>
								<td>
									<div class="hidden-sm hidden-xs btn-group">
										<button class="btn btn-xs btn-success">
											<a href="{{url('admin/product/cate/add')}}"><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
										</button>

										<button class="btn btn-xs btn-info">
											<a href="{{url('admin/product/cate/edit')}}/{{$ls_cat->id}}"><i class="ace-icon fa fa-pencil bigger-120"></i></a>
										</button>

										<button class="btn btn-xs btn-danger">
											<a onclick="return confirm('Bạn có muốn xóa không ?');"  href="{{url('admin/product/cate/delete')}}/{{$ls_cat->id}}">
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
				{{$cat->links()}}
			</div>
			</div><!-- /.row -->
		</div><!-- /.col -->
	</div><!-- /.row -->
</div><!-- /.page-content -->
@endsection('content')

