@extends('fontend.master.index')
@section('title')
List API
@endsection('title')
@section('header_style')
<link rel="stylesheet" href="{{url('public/fontend')}}/css/cate_new.css">
@endsection('header_style')
  
@section('content')
<div class="tranglienhe">
     <div class="container ">
       <div class="row ">
        <div class="bannerthuvien">
            <h1 align="center" class="animated fadeInRight">API </h1>
         <p align="center" class="animated fadeInLeft">HỆ THỐNG API SẢN PHẨM VÀ TIN TỨC</p>
        </div>
       
       </div>
     </div>
  <div class="mottram">
     <div class="container">
      <div class="row">
           <h3 class="title_tintuc"> Trang chủ <i class="fa fa-angle-double-right" aria-hidden="true"></i> <span>API</span></h3>
           <div class="col-md-6">
             <p class="title"> <i class="fa fa-shopping-bag" aria-hidden="true"></i> API sản phẩm</p>
              <ul class="list-group">
                <li class="list-group-item"><a href="{{url('api/sanphamnoibat')}}">API Sản phẩm nổi bật</a></li>
                <li class="list-group-item"><a href="{{url('api/cateproduct')}}">API Danh mục Sản phẩm</a></li>
                <li class="list-group-item">Morbi leo risus</li>
                <li class="list-group-item">Porta ac consectetur ac</li>
                <li class="list-group-item">Vestibulum at eros</li>
              </ul>
           </div>
           <div class="col-md-6">
              <p class="title"> <i class="fa fa-newspaper-o" aria-hidden="true"></i> API tin tức</p>
              <ul class="list-group">
                <li class="list-group-item"><a href="{{url('api/Question')}}">Question</a></li>
                <li class="list-group-item">Dapibus ac facilisis in</li>
                <li class="list-group-item">Morbi leo risus</li>
                <li class="list-group-item">Porta ac consectetur ac</li>
                <li class="list-group-item">Vestibulum at eros</li>
              </ul>

       
           </div>
           
          
      </div>
     </div>
  </div>
</div>
@endsection
