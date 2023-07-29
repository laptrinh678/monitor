@foreach($cate_pro as $val)
<div class="col-md-3 cate_pro">
  <div class="cat_content">
       <h4 align="left">
        <img  src="{{url('public/fontend')}}/img/bosh.png" alt="">
        </h4>
       <div class="cookingclass">
            <span style="color: #666666;">Sản suất bởi </span> <br>
            <span class="bosch"><strong>BOSCH</strong></span>
        </div>
        <div class="img_item_pro">
           <a href="{{url('chi-tiet-san-pham')}}/{{$val->id}}">
            <img  height="300" src="{{url('public/backend/product')}}/{{$val->pro_img}}" alt="">
            </a>
        </div>
        <div class="content_pro">
              <p class="p1"> <span class="serie">Model</span>: <span class="name_pro">{{$val->pro_name}}</span>
  <i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i>
                <p>
              <p align="left"><span  class="serie">Giá:</span> <span class="name_pro">{{number_format($val->pro_price,2)}} VNĐ</span></p>
          <p class="p_muangay"><a href="{{$val->id}}" class="muangay">MUA NGAY</a> <a class="xemchitiet" href="{{url('chi-tiet-san-pham')}}/{{$val->id}}">XEM CHI TIẾT</a>
          </p>             
      </div>
  </div>
</div>
@endforeach