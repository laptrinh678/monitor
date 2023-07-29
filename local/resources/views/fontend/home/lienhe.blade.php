@extends('fontend.master.index')
@section('title')
Liên hệ
@endsection('title')
@section('header_style')
<link rel="stylesheet" href="{{url('public/fontend')}}/css/cate_new.css">
@endsection('header_style')
  
@section('content')
<div class="tranglienhe">
     <div class="container ">
       <div class="row ">
        <div class="bannerthuvien">
            <h1 align="center" class="animated fadeInRight">LIÊN HỆ </h1>
         <p align="center" class="animated fadeInLeft">Bạn có thắc mắc? Chúng tôi luôn ở đây để giúp bạn</p>
        </div>
       
       </div>
     </div>
  <div class="mottram">
     <div class="container">
      <div class="row">
           <h3 class="title_tintuc"> Trang chủ <i class="fa fa-angle-double-right" aria-hidden="true"></i> <span>Liên hệ</span></h3>
           <div class="col-md-6">
             <p class="title">XÂY DỰNG XIN HÂN HẠNH ĐƯỢC HỖ TRỢ QUÝ KHÁCH</p>
             <p>Vui lòng điền đầy đủ thông tin bên dưới để được hỗ trợ trong thời gian sớm nhất</p>
             <form action="/action_page.php">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Họ tên *">
              </div>
               <div class="form-group">
                <input type="text" class="form-control" placeholder="Email *">
              </div>
               <div class="form-group">
                <input type="number" class="form-control" placeholder="Điện thoại *">
              </div>
              <div class="form-group">
                 <textarea class="form-control" rows="10" id="comment" placeholder="Nội dung *"></textarea>
              </div>
              <div class="form-group">
               <button type="submit" class="btn btn-default">GỬI LIÊN HỆ</button>
              </div>
             
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
                                        center: new google.maps.LatLng(21.007388, 105.800973),
                                        mapTypeId: google.maps.MapTypeId.ROADMAP
                                    };
                                    map = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions);
                                    marker = new google.maps.Marker({
                                        map: map,
                                        position: new google.maps.LatLng(21.007388, 105.800973)
                                    });
                                    infowindow = new google.maps.InfoWindow({
                                        content: "<b>Tầng 2, toà nhà 25 T1, Hoàng Đạo Thúy, Trung Hòa, Cầu Giấy, Hà Nội.</b> "
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
              <p>Tầng 2 tòa nhà 25 T1 Hoàng Đạo Thúy, Trung Hòa, Cầu Giấy, Hà Nội</p>
            </div>
            <div class="left_10">
             <i class="fa fa-phone" aria-hidden="true"></i>
            </div>
            <div class="right_90">
              <p><span>Điện thoại</span></p>
              <p>024 3555 1939</p>
            </div>
             <div class="left_10">
            <i class="fa fa-envelope-o" aria-hidden="true"></i>
            </div>
            <div class="right_90">
              <p><span>Email</span></p>
              <p>infor@egroup.vn</p>
            </div>
          </div>
          <div class="nammuoi">
              <div class="left_10">
              <i class="fa fa-map-marker" aria-hidden="true"></i>
            </div>
            <div class="right_90">
              <p><span>Thành phố Hồ Chí Minh</span></p>
              <p>Tầng 2 tòa nhà Pico, 20 Cộng Hòa, Phường 12, Quận Tân Bình, Thành phố Hồ Chí Minh</p>
            </div>
            <div class="left_10">
             <i class="fa fa-phone" aria-hidden="true"></i>
            </div>
            <div class="right_90">
              <p><span>Điện thoại</span></p>
              <p>028 3948 1500</p>
            </div>
             <div class="left_10">
            <i class="fa fa-envelope-o" aria-hidden="true"></i>
            </div>
            <div class="right_90">
              <p><span>Email</span></p>
              <p>inforhcm@egroup.vn</p>
            </div>
          </div>
       
           </div>
           
          
      </div>
     </div>
  </div>
</div>
@endsection
