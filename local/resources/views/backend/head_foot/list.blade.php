@extends('backend.master.index')
@section('content')
<div class="page-content">
	<div class="page-header">
	<h1>
		Thông tin header-footer
		<small>
			<i class="ace-icon fa fa-angle-double-right"></i>
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
								<th class="detail-col">Tên cơ quan</th>
								<th class="detail-col">Logo</th>
								<th class="detail-col">Ảnh khác</th>
								<th>Địa chỉ</th>
								<th>ĐT bàn</th>
								<th class="hidden-480">Di động</th>
								<th class="hidden-480">Hotline</th>
								<th class="hidden-480">Mail</th>
								<th class="hidden-480">Slogan</th>
								<th class="hidden-480">Facebook</th>
								<th>Hành động</th>
							</tr>
						</thead>
						<tbody>
							@foreach($listheader as $val)
							<tr>
								<td>{{$val->id}}</td>
								<td class="center">
									{{$val->name}}
								</td>
								<td>
									<img width="60" height="70" src="{{url('public/backend/header/')}}/{{$val->logo1}}" alt="">
								</td>
								<td>
									<img width="60" height="70" src="{{url('public/backend/header/')}}/{{$val->logo2}}" alt="">
								</td>
								<td >
									{{$val->adress}}
								</td>
								<td >
									{{$val->dtban}}
								</td>
								<td>
									{{$val->didong}}
								</td>
								<td class="hidden-480">
									
									{{$val->hotline}}
								</td>
								<td class="hidden-480">
									{{$val->email}}
								</td>
								<td class="hidden-480">
									{{$val->slogan}}
								</td>
								<td class="hidden-480">
									{{$val->facebook}}
								</td>
								<td>
									<div class="hidden-sm hidden-xs btn-group">

										<button class="btn btn-xs btn-info">
											<a href="{{url('admin/header-footer/edit')}}/{{$val->id}}"><i class="ace-icon fa fa-pencil bigger-120"></i></a>
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

