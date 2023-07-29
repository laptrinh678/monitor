@extends('backend.master.index')
@section('title')
<title>Sửa Process</title>
@endsection('title')
@section('header_style')
<link href="vendors/datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />
@endsection('header_style')
@section('content')
<section class="content-header">
                <h1>
                     <ol class="breadcrumb">
                    <li>
                        <a href="{{url('admin/index')}}">
                            <i class="livicon" data-name="home" data-size="14" data-color="#000"></i> Trang chủ
                        </a>
                    </li>
                    <li>
                        <a href="{{url('admin/process/list')}}">Process</a>
                    </li>
                    <li class="active">Sửa</li>
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
                                    <i class="livicon" data-name="user-add" data-size="18" data-c="#fff" data-hc="#fff" data-loop="true"></i> Sửa thông tin process
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
                        <input type="text" class="form-control" name="process_code"
                         required="" value="{{$data->process_code}}">
                       
                    </div>
                </div>
                <div class="form-group">
                <label for="first_name" class="col-sm-2 control-label">Process_name </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="process_name" value="{{$data->process_name}}" required="">
                       
                    </div>
                </div>
                <div class="form-group">
                <label for="first_name" class="col-sm-2 control-label">service_code</label>
                    <div class="col-sm-6">
                        
                        <select class="form-control" name="service_code" required="">
                            <option >Chọn service_code</option>
                            @foreach($service as $v)
                                <option 
                                value="{{$v->id}}"
                                <?php 
                                if($v->id==$data->service_code)
                                {
                                    echo 'selected';
                                }else
                                {
                                    echo '';
                                }
                                ?>
                                >{{$v->service_name}}</option>
                            @endforeach
                         
                          </select>
                    </div>
                </div>
                <div class="form-group">
                     <label for="first_name" class="col-sm-2 control-label">Phonenumber </label>
                    <div class="col-sm-6">
                        
                       <input type="text" name="phonenumber" class="form-control" 
                       required="" 
                        value="{{$data->phonenumber}}"
                       >
                    </div>
                </div>
                </div>
               
             <!--  <div class="form-group">
               <label for="first_name" class="col-sm-2 control-label">Start_time </label>
                   <div class="col-sm-6">
                     
                         <div class="input-group">
                                           <div class="input-group-addon">
                                               <i class="livicon" data-name="laptop" data-size="14" data-loop="true"></i>
                                           </div>
                                           <input type="date" class="form-control" name="start_time" value="{{$data->start_time}}" />
                                       </div>
                      
                   </div>
               </div>
              <div class="form-group">
               <label for="first_name" class="col-sm-2 control-label">Period_time </label>
                   <div class="col-sm-6">
                   
                     <div class="input-group">
                                           <div class="input-group-addon">
                                               <i class="livicon" data-name="laptop" data-size="14" data-loop="true"></i>
                                           </div>
                               <input type="date" class="form-control" name="period_time" value="{{$data->period_time}}" />
                                       </div>
             
                      
                   </div>
               </div>
               <div class="form-group">
               <label for="first_name" class="col-sm-2 control-label">Tag </label>
                   <div class="col-sm-6">
                       <input type="text" class="form-control" name="tag" value="{{$data->tag}}">
                      
                   </div>
               </div>
               <div class="form-group">
               <label for="first_name" class="col-sm-2 control-label">Process_class </label>
                   <div class="col-sm-6">
                       <input type="text" class="form-control" name="process_class" value="{{$data->process_class}}">
                   </div>
               </div>
               <div class="form-group">
               <label for="first_name" class="col-sm-2 control-label">Process_method</label>
                   <div class="col-sm-6">
                       <input type="text" class="form-control" name="process_method">
                      
                   </div>
               </div>
              -->
              


                <div class="space-4"></div>
                <div class="clearfix form-actions">
                    <div class="col-md-offset-3 col-md-9">
                        <button class="btn btn-primary" type="submit">Sửa thông tin</button>
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
 <script src="vendors/moment/js/moment.min.js" type="text/javascript"></script>
    <script src="vendors/daterangepicker/js/daterangepicker.js" type="text/javascript"></script>
    <script src="vendors/datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
    <script src="vendors/clockface/js/clockface.js" type="text/javascript"></script>
    <script src="vendors/jasny-bootstrap/js/jasny-bootstrap.js" type="text/javascript"></script>
    <script src="js/pages/datepicker.js" type="text/javascript"></script>
@endsection('script')

    