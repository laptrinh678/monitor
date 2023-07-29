@extends('fontend.master.index')
@section('title')
Đặt hàng thành công
@endsection('title')
@section('header_style')
<link rel="stylesheet" href="{{url('public/fontend')}}/css/cate_new.css">
@endsection('header_style')
  
@section('content')
<div class="tranglienhe">
     <div class="container ">
       <div class="row ">
        <div class="bannerthuvien">
            <h1 align="center" class="animated fadeInRight">XÁC NHẬN <br> ĐẶT HÀNG THÀNH CÔNG </h1>

         <p align="center" class="animated fadeInLeft">Chúng tôi sẽ gọi lại bạn trong vòng 18h</p>
        </div>
       
       </div>
     </div>
  <div class="mottram">
     <div class="container">
      <div class="row">
           <h3 class="title_tintuc"> Trang chủ <i class="fa fa-angle-double-right" aria-hidden="true"></i> <span>Liên hệ</span></h3>
           <div class="col-md-6">
             <p class="title">{{$header_footer->name}} <br>XIN HÂN HẠNH ĐƯỢC HỖ TRỢ QUÝ KHÁCH</p>
             <p>Vui lòng điền đầy đủ thông tin bên dưới để được hỗ trợ trong thời gian sớm nhất</p>
             @include('errors.note')
             <form action="" method="post">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Họ tên *" name="name">
              </div>
               <div class="form-group">
                <input type="text" class="form-control" placeholder="Email *" name="email">
              </div>
               <div class="form-group">
                <input type="number" class="form-control" placeholder="Điện thoại *" name="dienthoai">
              </div>
              <div class="form-group">
                 <textarea class="form-control" name="ghichu" rows="10" id="comment" placeholder="Nội dung *"></textarea>
              </div>
              <div class="form-group">
               <button type="submit" class="btn btn-default">GỬI LIÊN HỆ</button>
              </div>
             {{csrf_field()}}
            </form>
           </div>
           <div class="col-md-6">
               <script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyBynM-M9Wbv9_qEK3QwTRVcpuygF9Lttqo">
               </script>
               <div id="gmap_canvas" style="height:250px;width:100%;">
                <style>
                    #gmap_canvas img {
                        max-width:none!important;
                        background:none!important
                    }
                
                </style>
                </div>
                  <script type="text/javascript">
                                function init_map() {
                                    var myOptions = {
                                        zoom: 14,
                                        center: new google.maps.LatLng(20.963170, 105.817360),
                                                                 // copy lat vào đây // lọng vào đây
                                        mapTypeId: google.maps.MapTypeId.ROADMAP
                                    };
                                    map = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions);
                                    marker = new google.maps.Marker({
                                        map: map,
                                        position: new google.maps.LatLng(20.963170, 105.817360)
                                    });
                                    infowindow = new google.maps.InfoWindow({
                                        content: "<b>Số 15 ngách 750/46 đường Kim Giang - Thôn Nội - Thanh Liệt - Thanh trì - Hà Nội</b> "
                                    });
                                    google.maps.event.addListener(marker, "click", function () {
                                        infowindow.open(map, marker);
                                    });
                                    infowindow.open(map, marker);
                                }
                                google.maps.event.addDomListener(window, 'load', init_map);
                            
                            </script>
<!-- tích hợp bản dồ tại https://www.latlong.net/-->
          <div class="nammuoi">
            <div class="left_10">
              <i class="fa fa-map-marker" aria-hidden="true"></i>
            </div>
            <div class="right_90">
              <p><span>Trụ sở Hà Nội</span></p>
              <p>{{$header_footer->adress}}</p>
            </div>
            <div class="left_10">
             <i class="fa fa-phone" aria-hidden="true"></i>
            </div>
            <div class="right_90">
              <p><span>Điện thoại</span></p>
              <p>{{$header_footer->hotline}}</p>
            </div>
             <div class="left_10">
            <i class="fa fa-envelope-o" aria-hidden="true"></i>
            </div>
            <div class="right_90">
              <p><span>Email</span></p>
              <p>{{$header_footer->email}}</p>
            </div>
          </div>
        
       
           </div>
           
          
      </div>
     </div>
  </div>



</div>
@endsection
