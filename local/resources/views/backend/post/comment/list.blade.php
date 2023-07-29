@extends('backend.master.index')
@section('content')
<div class="page-content">
	<div class="page-header">
	<h1>
		Các bình luận về bài viết
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
								<th>Tên bài viết</th>
								<th>Nội dung bình luận</th>
								<th class="hidden-480">Email bình luận</th>
								<th class="hidden-480">Điện thoại</th>
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
							
									
								</td>
								<td class="hidden-480">
					
								</td>
								
								<td>
									<div class="hidden-sm hidden-xs btn-group">
										

										<button class="btn btn-xs btn-info">
											<a href=""><i class="ace-icon fa fa-pencil bigger-120"></i></a>
										</button>

										<button class="btn btn-xs btn-danger">
											<a onclick="return confirm('Bạn chắn chắn muốn xóa bài viết này không ?');"  href="">
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

