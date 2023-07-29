@extends('backend.master.index')
@section('header_style')
<title>Sửa thành viên</title>
 <link href="vendors/bootstrap-multiselect/css/bootstrap-multiselect.css" rel="stylesheet" type="text/css">
    <link href="vendors/select2/css/select2.min.css" rel="stylesheet" type="text/css">
    <link href="vendors/select2/css/select2-bootstrap.css" rel="stylesheet" type="text/css">
@endsection('header_style')
@section('content')
<section class="content-header">
                <h1>
                     <ol class="breadcrumb">
                    <li>
                        <a href="{{url('admin/index')}}">
                            <i class="livicon" data-name="home" data-size="14" data-color="#000"></i> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="{{url('admin/member/list')}}">Users</a>
                    </li>
                    <li class="active">Add New User</li>
                </ol>
                </h1>

               
            </section>
            <br>
            <section class="content">
                <div class="row">

                    <div class="col-md-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <i class="livicon" data-name="user-add" data-size="18" data-c="#fff" data-hc="#fff" data-loop="true"></i>Sửa thông tin thành viên
                                </h3>
                                <span class="pull-right clickable">
                                    <i class="glyphicon glyphicon-chevron-up"></i>
                                </span>
                            </div>
                           
                            <div class="panel-body">
               <form class="form-horizontal" role="form" method="post">
				@foreach($users as $ls_user)
                <div class="form-group">
                <label for="first_name" class="col-sm-2 control-label">Tên thành viên</label>
                    <div class="col-sm-6">
                        <input type="text" id="first_name" name="member_name" placeholder="Nhập tên thành viên" class="form-control required" value="{{$ls_user->name}}" />
                        <span style="color: red;">{{$errors->first('member_name')}}</span>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1-1">Email</label>
                        <div class="col-sm-6">
                            <input type="text" name="member_mail" placeholder="Nhập email thành viên" class="form-control required" value="{{$ls_user->email}}">
                            <span style="color: red;">{{$errors->first('member_mail')}}</span>
                        </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1-1">Password</label>
                    <div class="col-sm-6">
                        <input type="password" name="member_pass" class="form-control" value="">
                        
                    </div>
                </div>
                <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right" for="form-field-1-1"> Quyền truy cập</label>
                    <div class="col-sm-6">
                        <select name="member_level" id="" class="form-control required">
                             @if($ls_user->level==1)
                             <option value="1">Admin</option>
                             @elseif($ls_user->level==0)
                              <option value="0">User</option>
                             @elseif($ls_user->level==2)
                             <option value="2">Root</option>
                             @endif
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
                        <button class="btn btn-primary" type="submit">Sửa thành viên</button>
                         &nbsp; &nbsp; &nbsp;
                            <button class="btn btn-danger" type="reset">Reset</button>
                       
                            
                    </div>
                </div>
                @endforeach
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

	
	