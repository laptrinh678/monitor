@extends('fontend.master.index')
@section('title')
  {{$post_detail->post_name}}
@endsection
@section('header_style')
   <link rel="stylesheet" href="{{url('public/fontend')}}/css/cate_new.css">
 <link rel="stylesheet" href="{{url('public/fontend')}}/css/detail_new.css">
@endsection('header_style')
@section('content')
<div class="chitietbaiviet wow animated zoomIn">
  <div class="container">
    <div class="row">
     <div class="col-md-8 content_baiviet wow slideInRight">
        <h3 class="title_tintuc"> <a href="{{url('')}}">Trang chủ </a>
          <i class="fa fa-angle-double-right" aria-hidden="true"></i> 
          <a href="">
            {{$post_detail->catepostmodel->cat_name}}</a>
          <i class="fa fa-angle-double-right" aria-hidden="true"></i> <span>{{$post_detail->post_name}}</span></h3>
       <div class="motram">
         <a href=""><img src="{{url('public/backend/post')}}/{{$post_detail->post_img}}" alt=""></a>
         <h5><a href="">{{$post_detail->post_name}}</a></h5>
         <p class="ngaydang">
             <i class="fa fa-calendar-check-o" aria-hidden="true"></i>{{date('d-m-Y',strtotime($post_detail->date))}}
          </p>
       </div>
       <div class="mottram content_detial_new">
        {!!$post_detail->post_gtchitiet!!}
       </div>
       <div class="mottram">
         <ul class="icon_chiase">
           <li> <span>Chia sẻ:</span></li>
           <li><a href=""><img src="{{url('public/fontend')}}/images/f.png" alt="" class="hvr-grow"></a></li>
           <li><a href=""><img src="{{url('public/fontend')}}/images/za.png" alt="" class="hvr-grow"></a></li>
           <li><a href=""><img src="{{url('public/fontend')}}/images/gg.png" alt="" class="hvr-grow"></a></li>
           <li><a href=""><img src="{{url('public/fontend')}}/images/tw.png" alt="" class="hvr-grow"></a></li>
           <li><a href=""><img src="{{url('public/fontend')}}/images/em.png" alt="" class="hvr-grow"></a></li>
         </ul>
       </div>
       <div class="mottram giaithuong">
          <ul class="icon_chiase">
           <li><img src="{{url('public/fontend')}}/images/tag.png" alt=""></li>
           <li><a href="" class="apax"> Apax English </a></li>
           <li><a href="" class="apax"> Giải thưởng doanh nhân Châu Á </a></li>
         </ul>
       </div>
        <div class="mottram binhluan">
          <h6>Bình luận</h6>
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
        <div class="mottram commentbinhluan">
          <div class="itembinhluan">
            <div class="muoipt">
              <img src="{{url('public/fontend')}}/images/iconbl.png" alt="">
            </div>
            <div class="chinmuoi">
              <p class="name_bl">Nguyễn Phước Huynh - <span>10:25 26 tháng 9 năm 2017</span></p>
              <div>
                Thật mừng khi giáo dục Việt Nam có những người đam mê cống hiến như anh Thủy. Chúc anh mạnh khỏe để tiếp tục nâng tầm cho giáo dục việt 
              </div>
              <p class="likebl">
                <i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 2 thích 
                <i class="fa fa-comments-o" aria-hidden="true"></i> 1 Trả lời
              </p>
            </div>
           </div>
           <div class="itembinhluan">
            <div class="muoipt">
              <img src="{{url('public/fontend')}}/images/iconbl.png" alt="">
            </div>
            <div class="chinmuoi">
              <p class="name_bl">Nguyễn Phước Huynh - <span>10:25 26 tháng 9 năm 2017</span></p>
              <div>
                Thật mừng khi giáo dục Việt Nam có những người đam mê cống hiến như anh Thủy. Chúc anh mạnh khỏe để tiếp tục nâng tầm cho giáo dục việt 
              </div>
              <p class="likebl">
                <i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 2 thích 
                <i class="fa fa-comments-o" aria-hidden="true"></i> 1 Trả lời
              </p>
            </div>
           </div>
       </div>

     </div>
      <div class="col-md-4 tintuc_right wow slideInLeft">
     
      <div class="mottram tindocnhieu"> 
        <span>CÓ THỂ BẠN QUAN TÂM</span>
      </div>
      <div class="mottram">
        @foreach($post_lienquan as $val)
        <div class="item_tintuc">
          <div class="left_15">
            <a href="{{url("chi-tiet-tin/$val->post_slug.html")}}"><img src="{{url('public/backend/post')}}/{{$val->post_img}}" alt=""></a>
          </div>
          <div class="right_85">
            <p class="title_con_new"> 
              <a href="{{url("chi-tiet-tin/$val->post_slug.html")}}">{{$val->post_name}}</a>
            </p>
           <p class="ngaydang">
             <i class="fa fa-calendar-check-o" aria-hidden="true"></i>{{date('d-m-Y',strtotime($val->date))}}
          </p>
          </div>
       </div>
       @endforeach


       


      </div>
    </div>
  </div>
  <!-- start tin khac-->
  <!-- end tin khac-->
</div>
</div>
@endsection
