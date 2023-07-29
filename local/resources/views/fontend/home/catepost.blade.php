 @extends('fontend.master.index')
 @section('title')
  {{$catepost->cat_name}}
 @endsection('title')
 @section('header_style')
     <link rel="stylesheet" href="{{url('public/fontend')}}/css/cate_new.css">
 @endsection('header_style')
 @section('content')
 <div class="cate_new wow animated zoomIn">
  <div class="container">
    <div class="mottram catenew_motram">
    <div class="tieude_item">
        <span class="s_left">
          <a href="{{url('')}}">TRANG CHỦ</a>
         <i class="fa fa-angle-double-right" aria-hidden="true"></i>
         <a href="{{url("$catepost->cat_slug.html")}}">{{$catepost->cat_name}}</a>
       </span>
       </div>
  <!-- start tin khac-->
  <div class="row thongtincate_new">
    <div class="col-md-8">

      @foreach($lispost as $val)
      <div class="item_tintuc">
        <div class="left_35">
          <a href="{{url("$slugcate/$val->post_slug.html")}}">
            <img src="{{url('public/backend/post')}}/{{$val->post_img}}" alt="">
          </a>
        </div>
        <div class="right_65">
          <div class="title_tintuc">
            <a href="{{url("$slugcate/$val->post_slug.html")}}">{{$val->post_name}}</a>
          </div>
          <div class="conttent_new">
           {!!$val->post_gtngan!!}
          </div>
          <p class="ngaydang">
            <i class="fa fa-calendar-check-o" aria-hidden="true"></i>{{date('d-m-Y',strtotime($val->date))}}
          </p>
        </div>
       </div>
      @endforeach
        

       <div class="mottram pagination">
          {{$lispost->links()}}
        </div>
      
    </div>
    <div class="col-md-4 tintuc_right">
     <form action="{{url('search_post')}}" method="get">
        <input type="text" placeholder="Nội dung tìm kiếm" class="search_text_new" name="search_post">
          <input type="submit" value="Tìm Kiếm" required="" class="search_sub_new2">
      </form>
      <div class="mottram tindocnhieu"> 
        <span>TIN ĐỌC NHIỀU</span>
      </div>
      <div class="mottram">

        @foreach($allpost as $val)
        <div class="item_tintuc">
          <div class="left_15">
            <a href="{{url("$slugcate/$val->post_slug.html")}}"><img src="{{url('public/backend/post')}}/{{$val->post_img}}" alt=""></a>
          </div>
          <div class="right_85">
            <p class="title_con_new"> 
              <a href="{{url("$slugcate/$val->post_slug.html")}}">{{$val->post_name}}</a>
            </p>
            <p class="ngaydang">
             <i class="fa fa-calendar-check-o" aria-hidden="true"></i>{{date('d-m-Y',strtotime($val->date))}}
            </p>
          </div>
       </div>
       @endforeach()




      </div>
    </div>
  </div>
  <!-- end tin khac-->
</div>

</div>

</div>   
       

@endsection