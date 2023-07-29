@extends('fontend.master.index')
 @section('title')
  {{$cate->cat_name}}
 @endsection('title')
 @section('header_style')
      <link rel="stylesheet" href="{{url('public/fontend')}}/css/cateproduct.css">
  <!-- END fancy box -->
 @endsection('header_style')
@section('content')
<!--start cateproduct-->
<div class="cateproduct container-fluid">
    <div class="row">
      <div class="mottram">
        <div class="tieude_item">
              <div class="category_full">
            <div class="tab">
                <span class="dcm">
                  <a href="/danh-muc/so-mi-kieu">{{$cate->cat_name}}</a>
                   <i class="fa fa-caret-right" aria-hidden="true"></i>
                   </span>
                <p class="arrow_cate"></p> 
            </div>        
        </div>
       </div>
        </div>
    </div>
    <div class="row">
      <div class="col-md-3">
        <h3>LỌC SẢN PHẨM</h3>
        <div class="form-group form_tksp">
        <label for="sel1">Theo giá</label>
        <select class="form-control" id="tksptheogia">
          <option value="500000"> Dưới 500.000</option>
          <option value="5001000"> Từ 500.000 - 1000.0000</option>
          <option value="1000000">Trên 1.000.000</option>
        </select>
        </div>
        <div class="form-group form_tksp">
        <label for="sel1">Theo Kích thước</label>
        <select class="form-control" id="tksptheokichthuoc">
          <option value="M"> Size M</option>
          <option value="S"> Size S</option>
          <option value="XL">Size XL</option>
          <option value="XXL">Size XXL</option>
          <option value="28">Size 28</option>
          <option value="29">Size 29</option>
          <option value="30">Size 30</option>
          <option value="31">Size 31</option>
          <option value="32">Size 32</option>
        </select>
        </div>
        <div class="form-group form_tksp">
        <label for="sel1">Theo Màu sắc</label>
        <select class="form-control" id="tksptheomausac">
          <option value="Trắng"> Trắng</option>
          <option value="Đỏ"> Đỏ</option>
          <option value="Xanh">Xanh</option>
          <option value="Cam">Cam</option>
          <option value="Vàng">Vàng</option>
          <option value="Hồng">Hồng</option>
          <option value="Tím">Tím</option>
          <option value="Nâu">Nâu</option>
          <option value="Ghi">Ghi</option>
        </select>
        </div>





      </div>
      <div class="col-md-9" id="nhandulieutravetuajax">
        @foreach($list_cate_pro as $val)
        <div class="ba_hai">
             <div class="item item_nha">
            <div class="img">
                 <a href="{{url("$cate->cat_slug/$val->pro_slug.html")}}"><img class="hvr-bob" src="{{url('public/backend/product')}}/{{$val->pro_img}}" alt=""></a>
            </div>
            <div class="content">
              <h4> <a href="{{url("$cate->cat_slug/$val->pro_slug.html")}}">{{$val->pro_name}}</a> </h4>
            </div>
            <div class="click">
              <span class="start">
                 {{number_format($val->pro_price)}} VNĐ
              </span>
              <span class="chitet">
                <a class="text_chitiet" href="{{url("$cate->cat_slug/$val->pro_slug.html")}}">Chi tiết</a>
              </span>
            </div>
            <div class="shopingcart">
              <a href="{{url("cart/add/$val->id")}}">Thêm vào giỏ hàng</a>
            </div>
          </div>
        </div>
        @endforeach

     

      </div>
    </div>
</div>
@endsection
@section('script')
<script>
  $(document).ready(function()
  {
   $('#tksptheogia').change(
    function()
    {
      var gia = $(this).val();
      $.get('http://localhost/fasamy.com/search_gia/'+gia, function(data){ 
          //alert(data); //#sanphamajax chinh la vung se chua du lieu tra ve tren chinh view nay;
          $('#nhandulieutravetuajax').html(data);
       })

   })
   $('#tksptheokichthuoc').change(function(){
    var kichthuoc = $(this).val();
     $.get('http://localhost/fasamy.com/search_kichthuoc/'+kichthuoc, function(data){ 
          //alert(data); //#sanphamajax chinh la vung se chua du lieu tra ve tren chinh view nay;
          $('#nhandulieutravetuajax').html(data);
       })
   })
  
  });
  
</script>

@endsection('script')