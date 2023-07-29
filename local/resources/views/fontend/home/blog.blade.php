 @extends('fontend.master.index')
 @section('title','home')
@section('content')
<section class="blog_cate">
  <div class="container">
    <div class="row">
      <h1>TRANG CHỦ <span aria-hidden="true">› {{$cate->cat_name}}</span></h1>
      <div class="col-md-9">
        @foreach($list_blog as $val)
      <div class="item">
            <div class="left_30">
              <a href="{{url("chi-tiet-bai-viet/$val->post_slug.html")}}"><img class="hvr-bounce-in" src="{{url('public/backend/post')}}/{{$val->post_img}}" alt=""></a>
            </div>
            <div class="right_70">
               <h2><a href="{{url("chi-tiet-bai-viet/$val->post_slug.html")}}">{{$val->post_name}}</a></h2>
               <div class="content">
                   <p>Người đăng:{{$val->tacgia}} <span>Ngày đăng:{{$val->date}}</span></p>
                  {!!$val->post_gtngan!!}
                   <p><a href="{{url("chi-tiet-bai-viet/$val->post_slug.html")}}">Xem thêm <i class="fa fa-arrow-right" aria-hidden="true"></i></a></p>
               </div>
            </div>
      </div>
      @endforeach
      </div>
      <div class="col-md-3 right_cat_blog">
       <form action="http://hamesco.com/search" method="get">
                            
                                <input class="h_tk" type="text" id="inputsearch" placeholder="Tìm kiếm  " name="giatrisearch">
                                <button class="btn_header" id="btsearch" type="submit" value=""><i class="fa fa-search" aria-hidden="true"></i></button>
                          {{csrf_field()}}
        </form>
        <h5>BÀI VIẾT GẦN ĐÂY</h5>
        @foreach($list_moinhat as $val)
        <div class="item_right"> 
               <div class="left_30">
                     <a href="{{url("chi-tiet-bai-viet/$val->post_slug.html")}}"><img class="hvr-bounce-in" src="{{url('public/backend/post')}}/{{$val->post_img}}" alt=""></a>  
               </div>
               <div class="right_70"> 
                  <p><a href="{{url("chi-tiet-bai-viet/$val->post_slug.html")}}">{{$val->post_name}}</a></p>
                  <p>{{$val->date}}</p>
               </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
  
</section>
@endsection
