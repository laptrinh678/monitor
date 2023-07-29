@foreach($product as $val)
<div class="col-md-3">
  <div class="item item_nha">
            <div class="img">
                 <a href="{{url("chi-tiet-san-pham/$val->pro_slug.html")}}"><img class="hvr-bob" src="{{url('public/backend/product')}}/{{$val->pro_img}}" alt=""></a>
            </div>
            <div class="content">
              <h4> <a href="{{url("chi-tiet-san-pham/$val->pro_slug.html")}}"> {{$val->pro_name}}</a> </h4>
            </div>
            <div class="click">
              <span class="start">
                {{number_format($val->pro_price)}} VNĐ
              </span>
              <span class="chitet">
                <a class="text_chitiet" href="{{url("chi-tiet-san-pham/$val->pro_slug.html")}}">Chi tiết</a>
              </span>
            </div>
            <div class="shopingcart">
              <a href="{{url("cart/add/$val->id")}}">Thêm vào giỏ hàng</a>
            </div>
  </div>
</div>
 


@endforeach