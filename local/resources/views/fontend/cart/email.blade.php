<style>
	.tr_title>td{border: 1px solid black; margin: 10px;}
</style>
<section class="container-fluid">
  <div class="container">
      <div class="row">
      	<div class="col-md-12">
      		 <h3 class="title_gh"> Người mua hàng <span style="color: red">{{$infor['name']}} </span></h3>
     		 <h3 class="title_gh"> Email <span style="color: red">{{$infor['email']}} </span></h3>
     		 <h3 class="title_gh"> Số điện thoại <span style="color: red"> {{$infor['phone']}}</span></h3>
     		 <h3 class="title_gh"> Địa chỉ <span style="color: red"> {{$infor['adress']}}</span></h3>
      	</div>
            <h3 class="title_gh"> <span> THÔNG TIN ĐƠN HÀNG</span></h3>
      	<table class="table_shop" style="border: 1px solid black">
      		<tr class="tr_title" style="border: 1px solid black">
      			<td style="border: 1px solid black;margin: 10px; color: #0000FF">Tên sản phẩm</td>
      			<td style="border: 1px solid black;margin: 10px;color: #0000FF">Số lượng</td>
      			<td style="border: 1px solid black;margin: 10px;color: #0000FF">Đơn Giá</td>
      			<td style="border: 1px solid black;margin: 10px;color: #0000FF">Thành tiền</td>
      		</tr>
      		@foreach($content as $val)
      		<tr class="tr_content">
      			<td style="border: 1px solid black; margin: 10px;">{{$val->name}}</td>
      			<td style="border: 1px solid black;margin: 10px;">{{$val->qty}}</td>
      			<td style="border: 1px solid black;margin: 10px;">{{number_format($val->price)}}</td>
      			<td style="border: 1px solid black;margin: 10px;">{{number_format($val->price*$val->qty)}}</td>
      		</tr>
      		@endforeach
      	</table>
      	<br>
      	 <div class="col-md-12">
      	 	<h3 class="title_gh"> Tổng thanh toán <span style="color: red"> {{$total}} VNĐ</span></h3>
                 
            </div>
      </div>
    </div>
</section>

