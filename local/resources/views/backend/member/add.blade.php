@extends('backend.master.index')
@section('header_style')
<title>Thêm thành viên</title>
 <link href="vendors/bootstrap-multiselect/css/bootstrap-multiselect.css" rel="stylesheet" type="text/css">
    <link href="vendors/select2/css/select2.min.css" rel="stylesheet" type="text/css">
    <link href="vendors/select2/css/select2-bootstrap.css" rel="stylesheet" type="text/css">
@endsection('header_style')
@section('content')
<section class="content-header list_user">
               
                 <div >
                     <a href="{{url('admin/index')}}">
                            <i class="livicon" data-name="home" data-size="14" data-color="#000"></i> Trang chủ
                            <i class="fa fa-fw fa-angle-double-right"></i>
                    </a>
                     <a href="{{url('admin/member/list')}}">Users</a>
                      @if(Auth::user()->level==2)
                     <a href="{{url('admin/member/add')}}">
                           <i class="fa fa-fw fa-angle-double-right"></i> Add New User
                    </a>    
                    @endif

                </div>

            </section>
            <br>
            <section class="content">
                <div class="row">

                    <div class="col-md-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <i class="livicon" data-name="user-add" data-size="18" data-c="#fff" data-hc="#fff" data-loop="true"></i>Thêm mới thành viên
                                </h3>
                                <span class="pull-right clickable">
                                    <i class="glyphicon glyphicon-chevron-up"></i>
                                </span>
                            </div>
                           
                            <div class="panel-body">
                <form class="form-horizontal" role="form" method="post">
                

                <!--  -->
                <div class="form-group">
                <label for="first_name" class="col-sm-2 control-label">Tên thành viên</label>
                    <div class="col-sm-6">
                        <input type="text" id="first_name" name="member_name" placeholder="Nhập tên thành viên" class="form-control required" />
                        <span style="color: red;">{{$errors->first('member_name')}}</span>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1-1">Email</label>
                        <div class="col-sm-6">
                            <input type="text" name="member_mail" placeholder="Nhập email thành viên" class="form-control required">
                            <span style="color: red;">{{$errors->first('member_mail')}}</span>
                        </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1-1">Pass word</label>
                    <div class="col-sm-6">
                        <input type="password" name="member_pass" class="form-control required" placeholder="Nhập pass thành viên">
                        <span style="color: red;">{{$errors->first('member_pass')}}</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1-1">Phone number</label>
                    <div class="col-sm-6">
                        <input type="number" name="phonenumber" class="form-control required" placeholder="Nhập số điện thoại thành viên">
                        <span style="color: red;">{{$errors->first('phonenumber')}}</span>
                    </div>
                </div>

                <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right" for="form-field-1-1"> Quyền truy cập</label>
                    <div class="col-sm-6">
                        <select name="member_level" id="" class="form-control required">
                            <option value="">Lựa chọn quyền truy cập</option>
                            <option value="2">Root</option>
                            <option value="1">Admin</option>
                            <option value="0">User</option>
                        </select>
                        <span style="color: red;">{{$errors->first('member_level')}}</span>
                    </div>
                </div>
                 <div class="form-group">
                   <label class="col-sm-2 control-label no-padding-right" for="form-field-1-1"> Process</label>
                   <div class="col-sm-6">
                          <select id="select22" class="form-control select2" multiple name="process_id[]">
                                        @foreach($process as $key=>$v) 
                                            <option value="{{$v->process_id}}">{{$v->process_code}}</option>
                                        @endforeach
                                    
                                    </select>
                   </div>
                
                   
                </div>
                 <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1-1"> SMS level</label>
               
                    <div class="col-sm-6">
                        <select name="sms_level" id="id_sms_level" class="form-control required">
                            <option value="">Lựa chọn SMS level</option>
                            <option value="0">Warning</option>
                            <option value="1">Minor</option>
                            <option value="2">Crical</option>
                        </select>
                        <span style="color: red;">{{$errors->first('sms_level')}}</span>
                    </div>
                </div>


                <div class="space-4"></div>
                <div class="clearfix form-actions">
                    <div class="col-md-offset-3 col-md-9">
                        <button class="btn btn-primary" type="submit">Thêm thành viên</button>
                         &nbsp; &nbsp; &nbsp;
                            <button class="btn btn-danger" type="reset">Reset</button>
                       
                            
                    </div>
                </div>
                {{csrf_field()}}
            </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--row end-->
            </section>

@endsection('content')
@section('script')
 <script src="js/app.js" type="text/javascript"></script>
    <!-- end of global js -->
    <!-- begining of page level js -->
    <!--color picker-->
    <script src="vendors/bootstrap-multiselect/js/bootstrap-multiselect.js" type="text/javascript"></script>
    <script src="vendors/select2/js/select2.js" type="text/javascript"></script>
    <script src="vendors/selectize/js/standalone/selectize.min.js" type="text/javascript"></script>
    <script src="vendors/iCheck/js/icheck.js" type="text/javascript"></script>
    <script src="vendors/bootstrap-switch/js/bootstrap-switch.js" type="text/javascript"></script>
    <script src="vendors/switchery/js/switchery.js" type="text/javascript"></script>
    <script src="js/pages/custom_elements.js" type="text/javascript"></script>
<script>
    $(document).ready(function()
    {
        $('.savedata').click( function()
            {
                $('.ulParent').toggle();
            });
        $('.ulParent>li').click(function()
                {
                
                    var data = $(this).attr('dataid');
                   
                    var name = $(this).text();
                    $('.savedata').append(
                        "<input type ='text'/>");
                    $('.ulParent>li').addClass('off');
                    $('.ulParent').hide();
                });
    })
</script>
@endsection('script')

	