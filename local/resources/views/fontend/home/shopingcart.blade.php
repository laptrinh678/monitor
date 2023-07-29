 @extends('fontend.master.index')
 @section('title','home')
 @section('content')
 @include('fontend.master.slider')
 <style>
 
 </style>
 <div class="content">
  <div class="container">
    <div class="row">
 
    <div class="product_show">
      <h4 class="tieude_item">
        <a href=""><span class="span">DANH MỤC SẢN PHẨM BÊ TÔNG</span></a>
      </h4>
      @foreach($productvl_betong as $val)
       <div class="col-md-3 " style=" margin-bottom: 10px;">
          <div class="nhom_da">
            
        	<a href="{{url("chi-tiet-be-tong/$val->pro_slug.html")}}"><img class="img_nhomvl" src="{{url('public/backend/product')}}/{{$val->pro_img}}"></a>
        	<p style="font-size: 20px; padding-top: 10px;text-align:left "><a class="title_da" href="{{url("chi-tiet-be-tong/$val->pro_slug.html")}}">{{$val->pro_name}}</a></p>
          </div>
       </div>
      @endforeach()
        
    </div>
    </div>
  </div>
</div>
<script>
      var owl = $('.slide_product_0');
      owl.owlCarousel({
        margin: 10,
        loop: true,
        autoplay: true,
        autoplayTimeout:3000,
        autoplayHoverPause: false,
        responsive: {
          0: {
            items: 1
          },
          600: {
            items: 2
          },
          1000: {
            items: 3
          },
           1300: {
            items: 4
          }


        }
      })
    </script>
    <script>
      var owl = $('.slide_product_1');
      owl.owlCarousel({
        margin: 10,
        loop: true,
        autoplay: true,
        autoplayTimeout:3000,
        autoplayHoverPause: false,
        responsive: {
          0: {
            items: 1
          },
          600: {
            items: 2
          },
          1000: {
            items: 3
          },
           1300: {
            items: 4
          }


        }
      })
    </script>
    <script>
      var owl = $('.slide_product_2');
      owl.owlCarousel({
        margin: 10,
        loop: true,
        autoplay: true,
        autoplayTimeout:3000,
        autoplayHoverPause: false,
        responsive: {
          0: {
            items: 1
          },
          600: {
            items: 2
          },
          1000: {
            items: 3
          },
           1300: {
            items: 4
          }


        }
      })
    </script>
    <script>
      var owl = $('.slide_product_3');
      owl.owlCarousel({
        margin: 10,
        loop: true,
        autoplay: true,
        autoplayTimeout:3500,
        autoplayHoverPause: false,
        responsive: {
          0: {
            items: 1
          },
          600: {
            items: 2
          },
          1000: {
            items: 3
          },
           1300: {
            items: 4
          }


        }
      })
    </script>
    <script>
      var owl = $('.slide_product_4');
      owl.owlCarousel({
        margin: 10,
        loop: true,
        autoplay: false,
        autoplayTimeout:3000,
        autoplayHoverPause: false,
        responsive: {
          0: {
            items: 1
          },
          600: {
            items: 2
          },
          1000: {
            items: 3
          },
           1300: {
            items: 4
          }


        }
      })
    </script>

@endsection