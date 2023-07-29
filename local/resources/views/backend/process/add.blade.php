@extends('backend.master.index')
@section('title')
<title>Tạo mới Process</title>
@endsection('title')

@section('header_style')
<link href="vendors/datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />
@endsection('header_style')

@section('content')
<section class="content-header list_user">
              <!--   <h1>
                   <ol class="breadcrumb">
                  <li>
                      <a href="{{url('admin/index')}}">
                          <i class="livicon" data-name="home" data-size="14" data-color="#000"></i> Trang chủ
                      </a>
                  </li>
                  <li>
                      <a href="{{url('admin/process/list')}}">Process</a>
                  </li>
                  <li class="active">Tạo mới</li>
              </ol>
              </h1> -->
               <div >
                    <a href="{{url('admin/index')}}">
                           <i class="livicon" data-name="home" data-size="14" data-color="#000"></i> Trang chủ
                           <i class="fa fa-fw fa-angle-double-right"></i>
                   </a>
                    <a href="{{url('admin/process/list')}}">Process</a>
                     @if(Auth::user()->level==2)
                   <a href="{{url('admin/process/add')}}">
                          <i class="fa fa-fw fa-angle-double-right"></i> Thêm mới
                   </a>
                    @elseif(Auth::user()->level==1)
                     <a onclick="return confirm('Bạn không đủ quyền thực hiện chức năng này ?');" >
                          <i class="fa fa-fw fa-angle-double-right"></i>Thêm mới
                   </a>
                    @elseif(Auth::user()->level==0)
                     <a onclick="return confirm('Bạn không đủ quyền thực hiện chức năng này ?');" >
                          <i class="fa fa-fw fa-angle-double-right"></i> Thêm mới
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
                                    <i class="livicon" data-name="user-add" data-size="18" data-c="#fff" data-hc="#fff" data-loop="true"></i> Tạo mới process
                                </h3>
                                <span class="pull-right clickable">
                                    <i class="glyphicon glyphicon-chevron-up"></i>
                                </span>
                            </div>
                           
                            <div class="panel-body">
                            <form class="form-horizontal" role="form" method="post">
                <!--  -->
                <div class="form-group">
                <label for="first_name" class="col-sm-2 control-label">Process_code </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="process_code">
                        <span style="color:red">{{$errors->first('process_code')}}</span>
                       
                    </div>
                </div>
                <div class="form-group">
                <label for="first_name" class="col-sm-2 control-label">Process_name </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="process_name">
                        <span style="color:red">{{$errors->first('process_name')}}</span>
                    </div>
                </div>
                 <div class="form-group">
                <label for="first_name" class="col-sm-2 control-label">service_code</label>
                    <div class="col-sm-6">
                        
                        <select class="form-control" name="service_code" >
                            <option value="0">Chọn service_code</option>
                            @foreach($service as $v)
                                <option value="{{$v->id}}">{{$v->service_name}}</option>
                            @endforeach
                         
                          </select>
                    </div>
                </div>
                 <div class="form-group">
                <label for="first_name" class="col-sm-2 control-label">Phonenumber</label>
                    <div class="col-sm-6">
                        
                       <input type="text" name="phonenumber" class="form-control" placeholder="Bạn vui lòng nhập số điện thoại người nhận CB" required="">
                    </div>
                </div>
             <!--  <div class="form-group">
               <label for="first_name" class="col-sm-2 control-label">Start_time </label>
                   <div class="col-sm-6">
                   
                        <div class="input-group">
                               <div class="input-group-addon">
                                   <i class="livicon" data-name="laptop" data-size="14" data-loop="true"></i>
                               </div>
                               <input type="date" class="form-control" name="start_time" />
                           </div>
                        <span style="color:red">{{$errors->first('start_time')}}</span>
                      
                   </div>
               </div> -->
             <!--   <div class="form-group">
              <label for="first_name" class="col-sm-2 control-label">Period_time </label>
                  <div class="col-sm-6">
                    
                      <div class="input-group">
                                          <div class="input-group-addon">
                                              <i class="livicon" data-name="laptop" data-size="14" data-loop="true"></i>
                                          </div>
                                          <input type="date" class="form-control" name="period_time" />
                                      </div>
                       <span style="color:red">{{$errors->first('period_time')}}</span>
                     
                  </div>
              </div> -->
               <!--  <div class="form-group">
               <label for="first_name" class="col-sm-2 control-label">Tag </label>
                   <div class="col-sm-6">
                       <input type="text" class="form-control" name="tag" >
                        <span style="color:red">{{$errors->first('tag')}}</span>
                      
                   </div>
               </div> -->
               <!--  <div class="form-group">
               <label for="first_name" class="col-sm-2 control-label">Process_class </label>
                   <div class="col-sm-6">
                       <input type="text" class="form-control" name="process_class" >
                        <span style="color:red">{{$errors->first('process_class')}}</span>
                   </div>
               </div> -->
                <!-- <div class="form-group">
                <label for="first_name" class="col-sm-2 control-label">Process_method</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="process_method">
                         <span style="color:red">{{$errors->first('process_method')}}</span>
                       
                    </div>
                </div> -->

             

                <div class="space-4"></div>
                <div class="clearfix form-actions">
                    <div class="col-md-offset-3 col-md-9">
                        <button class="btn btn-primary" type="submit">
                            <i class="livicon" data-name="folder-add" data-size="20" data-c="#fff" data-hc="#fff" data-loop="true" id="livicon-397" style="width: 50px; height: 50px;">
                               
                            </i>
                        Thêm mới
                    </button>
                         &nbsp; &nbsp; &nbsp;
                    <button class="btn btn-danger" type="reset">
                        <i class="livicon" data-name="refresh" data-size="20" data-c="#fff" data-hc="#fff" data-loop="true" id="livicon-245" style="width: 50px; height: 50px;">
                         
                        </i>
                            Reset
                        </button>    
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
 <script src="vendors/moment/js/moment.min.js" type="text/javascript"></script>
    <script src="vendors/daterangepicker/js/daterangepicker.js" type="text/javascript"></script>
    <script src="vendors/datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
    <script src="vendors/clockface/js/clockface.js" type="text/javascript"></script>
    <script src="vendors/jasny-bootstrap/js/jasny-bootstrap.js" type="text/javascript"></script>
    <script src="js/pages/datepicker.js" type="text/javascript"></script>
@endsection('script')


	