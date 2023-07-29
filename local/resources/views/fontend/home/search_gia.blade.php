@extends('fontend.master.index')
@section('content')
<script type="text/javascript">
  $(document).ready(function(){
    var next = ('.xemthem');
    var total = 4;
    $('.xemthem').click(function(){

      $.ajax({
        url: "",
        type: "GET",
        data: {total: total}
      }).done(function(data){
        total += 4;
        if(data == ""){
          return alert("Hết sản phẩm");
        }
        $(".product_list").append(data);
      });

      
    });
  });
</script>
 <div id="cour1"  style="width: 100%; float: left; background: white;">
    <div class="container"> 
            <div class="row">
              <div class="product_list">
                     @include('fontend.paginate.product')
              </div>
               <div class="col-md-12">
                <p style="margin-top: 10px;" align="center"> <button class="xemthem">Xem Thêm</button></p>
               </div>
           </div>
    </div>
</div>
@endsection
