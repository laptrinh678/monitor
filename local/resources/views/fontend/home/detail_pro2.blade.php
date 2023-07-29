@extends('fontend.master.index')
 @section('title')
 	{{$detailproductId->pro_name}}
 @endsection
 @section('header_style')
 <script type="text/javascript" src="{{url('public/fontend/fancybox')}}/js/vendor/xzoom.min.js"></script>
<link rel="stylesheet" type="text/css" href="{{url('public/fontend/fancybox')}}/css/xzoom.css" media="all" /> 
<!-- hammer plugin here -->
<script type="text/javascript" src="{{url('public/fontend/fancybox')}}/hammer.js/1.0.5/jquery.hammer.min.js"></script>  
<!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<link type="text/css" rel="stylesheet" media="all" href="{{url('public/fontend/fancybox')}}/fancybox/source/jquery.fancybox.css" />
<link type="text/css" rel="stylesheet" media="all" href="{{url('public/fontend/fancybox')}}/magnific-popup/css/magnific-popup.css" />
<script type="text/javascript" src="{{url('public/fontend/fancybox')}}/fancybox/source/jquery.fancybox.js"></script>
<script type="text/javascript" src="{{url('public/fontend/fancybox')}}/magnific-popup/js/magnific-popup.js"></script>
 <link rel="stylesheet" href="{{url('public/fontend/css')}}/detailproduct.css" />
 @endsection('header_style')

@section('content')

 
 <section class="detail_pro">
	<div class="container">
		<div class="row">
			<div class="col-md-8 ">
				<div class="mottram detail_pro_left">
				<h1 class="titel_detail_pro"><span>Trang chủ</span> <i class="fa fa-angle-double-right" aria-hidden="true"></i> <span>Sản phẩm</span> <i class="fa fa-angle-double-right" aria-hidden="true"></i> <span>{{$detailproductId->pro_name}}</span></h1>
				<div class="img_detail_pro">

				<div class="large-5 column">
			        <div class="xzoom-container">
			        	<div class="x_zoom_right">
			                 <div class="baymuoi">
			                 	 <img class="xzoom imgshowzom" id="xzoom-default" src="{{url('public/backend/product')}}/{{$detailproductId->pro_img}}" xoriginal="{{url('public/backend/product')}}/{{$detailproductId->pro_img}}" />
			                 </div>
			                 <div class="bamuoi">
			                 	
			                   <p align="center">
			                 		<a href="{{url("dowload/$detailproductId->pro_img")}}">
			                 			<img class="img_dowload" src="{{url('public/fontend/images')}}/download.png" alt="">
			                 		</a>
			                 	</p>
			                 	
			                 </div>
			        		
			        	</div>
			        
			          <div class="xzoom-thumbs">
					@if(count($value_img_decode)>0)
			          @foreach($value_img_decode as $val)
			            <a href="{{url('public/backend/imgdetail')}}/{{$val}}">
			              <img class="xzoom-gallery" width="80" src="{{url('public/backend/imgdetail')}}/{{$val}}"  xpreview="{{url('public/backend/imgdetail')}}/{{$val}}" title="The description goes here">
			          </a>
			          @endforeach
			         @endif
			            
			            
			          </div>
			        </div>        
			      </div>

					
                 	<p align="center">Chia sẻ<span><div class="fb-share-button" data-href="http://nhamoipro.xyz/ao-thu-dong/ao-len-nu-canh-doi-thu-dong.html" data-layout="button_count" data-size="large" data-mobile-iframe="true"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fnhamoipro.xyz%2Fao-thu-dong%2Fao-len-nu-canh-doi-thu-dong.html&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Chia sẻ</a></div></span>
                 	</p>
				</div>
				</div>
			</div>


			
			<div class="col-md-4 thongtinchitietsp col-xs-12 col-sm-12">
				<div class="mottram">
				<h1 class="title_detail"><i class="fa fa-hand-o-right" aria-hidden="true"></i>{{$detailproductId->pro_name}}</h1>
				<div class="item_tt_sp">
					<p class="gia">Giá: <span>{{number_format($detailproductId->pro_price) }} VNĐ</span></p>
				</div>
				
				<div class="masp item_tt_sp">
					<p>Mã sản phẩm: <span>{{$detailproductId->pro_masp}}</span></p>
				</div>
				<div class="trangthai item_tt_sp">
					<p>Trạng thái: <span> @if($detailproductId->pro_trangthai==0)
									{{'Hết hàng'}}
								@elseif($detailproductId->pro_trangthai==1)
									{{'Còn hàng'}}
								@elseif($detailproductId->pro_trangthai=='')
									{{'None'}}
									@endif</span>
					</p>
				</div>
				<div class="mausac item_tt_sp">
					<p>Màu sắc</p>
					<ul>
						<?php
						$mausac = $detailproductId->mausac;
						$mausac_decode = json_decode($mausac, true);
						if(isset($mausac_decode))
						{
							foreach ($mausac_decode as $value) 
							{
								echo '<li> '.$value. ' </li>';
							}
						}
							

						 ?>
					
					</ul>
				</div>
				<div class="kichthuoc item_tt_sp">
					<p>Size</p>
					<ul>
						<?php
							$kichthuoc = $detailproductId->kichthuoc;
							$kichthuoc_decode = json_decode($kichthuoc, true);
							if(isset($kichthuoc_decode))
						{
							foreach ($kichthuoc_decode as $value) 
							{
								echo '<li> '.$value. ' </li>';
							}
						}
							

						 ?>
					
					</ul>
				</div>
				
				<div class="soluong item_tt_sp">
				</div>
				<div class="huongdanmuahang item_tt_sp">
					<p><a class="" href="{{url('cart/add')}}/{{$detailproductId->id}}"> <i class="fa fa-shopping-bag" aria-hidden="true"></i>HƯỚNG DẪN MUA HÀNG</a></p>
				</div>
				
			</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-8 ">
				 <div class="tabs-x tabs-above">
            <ul id="myTab-kv-1" class="nav nav-tabs" role="tablist">
                <li class="active"><a href="#home-kv-1" role="tab" data-toggle="tab">
                CHI TIẾT</a></li>
               
            </ul>
            <div id="myTabContent-kv-1" class="tab-content">
                <div class="tab-pane fade in active" id="home-kv-1">
                    <div class="anhchitietsp">
						{!!$detailproductId->description3!!}
					</div>
                </div>
               
            </div>
        </div>
				
<!-- Tab panels -->
					
			</div>
			<div class="col-md-4 splienquan">
				<div class="mottram">
					<h5 class="title_detail"> <i class="fa fa-hand-o-right" aria-hidden="true"></i>SẢN PHẨM LIÊN QUAN</h5>
						@foreach($product_lienquan as $val)
						<div class="content">
							<div class="left_30">
								<a href="{{url("chi-tiet-san-pham/$val->pro_slug.html")}}" class="">
		                <img src="{{url('public/backend/product')}}/{{$val->pro_img }}" alt="{{$val->pro_name}}">
		              </a>
							</div>
							<div class="right_70">
								<p> <a href="{{url("chi-tiet-san-pham/$val->pro_slug.html")}}"> {{$val->pro_name}}</a></p>
								<p>{{number_format($val->pro_price)}}VNĐ</p>
							</div>
						</div>
						@endforeach
					</div>
				</div>
				
		</div>
		<div class="row">
			<div class="col-md-8 col-sm-12 col-xs-12 CommentProduct">
				 <div class="mottram binhluan">
		          <h6 class="title_detail">Bình luận</h6>
		          <p>Địa chỉ Email của bạn sẽ không được công khai</p>
		          <form action="">
		            <div class="nammuoi">
		              <input type="text" placeholder="Họ tên" class="hoten_inpt_d">
		            </div>
		            <div class="nammuoi">
		              <input type="text" placeholder="Địa chỉ Email" class="email_input_d">
		            </div>
		            <textarea rows="4" cols="50">

		              </textarea>
		            <input type="submit" value="ĐĂNG" class="hvr-radial-out search_sub_new2 ">
		          </form>
		       </div>

				
				
			</div>
			<div class="col-md-4 col-sm-12 col-xs-12 col-lg-6">
				
			</div>
		</div>
		
			

			
			
			
	</div>	


 	
 </section>
@endsection
@section('script')
    <script src="{{url('public/fontend/fancybox')}}/js/foundation.min.js"></script>
    <script src="{{url('public/fontend/fancybox')}}/js/setup.js"></script>
@endsection('script')