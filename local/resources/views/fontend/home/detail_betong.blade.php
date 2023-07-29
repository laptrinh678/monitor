@extends('fontend.master.index')
@section('content')
<style>
	.img_detail{width: 100%;}
	.dactinh{background: white; padding-top: 10px; padding-bottom: 10px;}
</style>
 <div class="detail_pro" style="background: white">
 	<div class="mottram">
 		<img class="img_detail" src="{{url('public/backend/product')}}/{{$detailproductId->pro_img2}}" alt="">
 	</div>
 	<div class="container" style="background: #EBEBEB">
 		<div class="row">
 			<h1 align="center">{{$detailproductId->pro_name}}</h1>
 			<div class="col-md-12 dactinh">
 				<h3 align="center">ĐẶC TÍNH CỦA SẢN PHẨM</h3>
 				{!!$detailproductId->description3!!}
 			</div>
 			
 		</div>
 		<div id="exTab1" class="row" style="padding-top: 10px; padding-bottom: 10px;">	
			<ul  class="nav nav-pills">
						<li class="active">
			        <a  href="#1a" data-toggle="tab">Tiêu điểm</a>
						</li>
						<li><a href="#2a" data-toggle="tab">Thông số kỹ thuật</a>
						</li>
						<li><a href="#3a" data-toggle="tab">Hồ sơ dự án</a>
						</li>
			  		<li><a href="#4a" data-toggle="tab">Bản vẽ Autocard</a>
						</li>
					</ul>

						<div class="tab-content clearfix">
						  <div class="tab-pane active" id="1a">
			              {!!$detailproductId->pro_gtngan!!}
						 </div>
							<div class="tab-pane" id="2a">
			         		 {!!$detailproductId->pro_gtchitiet!!}
							</div>
			        <div class="tab-pane" id="3a">
			                 {!!$detailproductId->description3!!}
							</div>
			          <div class="tab-pane" id="4a">
							@foreach($chitiet_sp as $val)
				                <p><a href="{{url("dowload/$val->banve")}}">file dowload {{$val->banve}}</a></p>
				            @endforeach
							</div>
						</div>
			  </div>

 	</div>
 	
 	
 </div>
@endsection
