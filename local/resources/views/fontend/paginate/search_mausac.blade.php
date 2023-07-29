 @foreach($data_mausacsp as $val)
     <div class="grid__item product--loop product--grid-item large--one-third medium--one-half small--one-half">
        <div class="inner">
          <div class="a-product">
            <div class="image-product img-resize">
              <a href="{{url("chi-tiet-san-pham/$val->id/$val->pro_slug.html")}}">
                <img src="{{url('public/backend/product')}}/{{$val->pro_img }}" alt="">
              </a>
              <div class="sold-out">
                   @if($val->pro_trangthai==0)
                    <span class="deal-clock">Hết hàng</span>
                   @endif
              </div>
              <div class="product--loop__info_in_image">
                <!--  -->
                <div class="product--loop__actions medium-down--hide">
          
                  <div id="product-select-watch" class="select-swatch">

                    <div id="variant-swatch-1" class="swatch swatch-product-single clearfix" data-option="option2" data-option-index="1">
                      <div class="select-swap">
                          <ul class="kichthuocsp">
                            {!!$val->kichthuoc!!}
                          </ul>
                      </div>
                    </div>
                    <div class="themvaogiohang">
                        <p><a href="{{url('cart/add')}}/{{$val->id}}">Thêm vào giỏ hàng </a></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
             <div class="product--loop__info">
              <a href="{{url("chi-tiet-san-pham/$val->id/$val->pro_slug.html")}}" class="product-name">
                <h2>
                  {{$val->pro_name}}   
                </h2>
              </a>
              <div class="price">
                <span class="current-price ">{{number_format($val->pro_price)}}VNĐ</span>  
              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach