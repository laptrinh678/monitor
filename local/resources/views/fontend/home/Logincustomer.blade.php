@extends('fontend.master.index')
 @section('title')
 	{{'Đăng nhập thành viên'}}
 @endsection
 @section('header_style')
   
 @endsection('header_style')

@section('content')
@include('fontend.master.slider')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12 titleLogin">
			<h3>Trang chủ <i class="fa fa-angle-double-right" aria-hidden="true"></i> <span>Đăng nhập</span></h3>
		<p>Đăng ký để FASAMY có thể phục vụ bạn tốt hơn thông qua các chương trình chăm sóc khánh hàng và các khuyến mại đặc biệt dành riêng cho khách hàng mua online.</p>
			@include('errors.note')
		</div>
    <div class="col-md-6">
      <h3>Đăng nhập nhanh qua mạng xã hội và Gmail</h3>
      <div class="form-group">
            <div class="nammuoi">
              <button class="btn btn-danger"> <i class="fa fa-envelope-o" aria-hidden="true"></i>Đăng nhập với Gmail</button>
            </div>
             <div class="nammuoi">
              <button class="btn btn-primary"><i class="fa fa-facebook-official" aria-hidden="true"></i>Đăng nhập với Facebook</button>
            </div>
          </div>
    </div>
		
		<div class="col-md-6">
			<form action="" method="post" >
      <div class="modal-body">
            <div class="form-group">
            <label for="usr">Tên đăng nhập</label>
            <input type="text" class="form-control" id="usr" name="name">
            <span style="color:red">{{$errors->first('name')}}</span>
          </div>
          <div class="form-group">
            <label for="pwd">Mật khẩu</label>
            <input type="password" class="form-control" id="pwd" name="pass">
             <span style="color:red">{{$errors->first('pass')}}</span>
          </div>
           
          <div class="form-group">
            <button class="btn btn-danger" type="reset">Trở lại</button>
            <button class="btn btn-success" type="submit">Đăng nhập</button>
          </div>
           
      </div>
      {{csrf_field()}}
      </form>
		</div>
		
	</div>
</div>
 
 
@endsection
@section('script')
    
@endsection('script')