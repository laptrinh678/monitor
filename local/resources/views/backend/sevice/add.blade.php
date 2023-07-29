@extends('backend.master.index')
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
                        <a href="{{url('admin/service/listService')}}">Service</a>
                    </li>
                    <li class="active">Thêm mới</li>
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
                                    <i class="livicon" data-name="user-add" data-size="18" data-c="#fff" data-hc="#fff" data-loop="true"></i>Tạo mới Service
                                </h3>
                                <span class="pull-right clickable">
                                    <i class="glyphicon glyphicon-chevron-up"></i>
                                </span>
                            </div>
                           
                            <div class="panel-body">
                                    <form class="form-horizontal" role="form" method="post">
                

                <!--  -->
                <div class="form-group">
                <label for="first_name" class="col-sm-2 control-label">Tên Service</label>
                    <div class="col-sm-6">
                        <input type="text" id="first_name" name="service_name" placeholder="Nhập tên service" class="form-control" required="" />
                        <span style="color: red;">{{$errors->first('service_name')}}</span>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1-1">service_management</label>
                        <div class="col-sm-6">
                            <input type="text" name="service_management" placeholder="Nhập service management" class="form-control" required="">
                            <span style="color: red;">{{$errors->first('service_management')}}</span>
                        </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1-1">Số điện thoại</label>
                    <div class="col-sm-6">
                        <input type="text" name="phone_number" class="form-control" placeholder="Nhập số điện thoại" required="">
                        <span style="color: red;">{{$errors->first('phone_number')}}</span>
                    </div>
                </div> 
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1-1">service_code</label>
                    <div class="col-sm-6">
                        <input type="text" name="service_code" class="form-control" placeholder="Nhập service code" required="">
                        <span style="color: red;">{{$errors->first('service_code')}}</span>
                    </div>
                </div>
   				<div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1-1">channel_region</label>
                    <div class="col-sm-6">
                        <input type="text" name="channel_region" class="form-control" placeholder="Nhập channel region" required="">
                        <span style="color: red;">{{$errors->first('channel_region')}}</span>
                    </div>
                </div>
                <div class="space-4"></div>
                <div class="clearfix form-actions">
                    <div class="col-md-offset-3 col-md-9">
                        <button class="btn btn-primary" type="submit">
                            <i class="livicon" data-name="plus-alt" data-size="20" data-c="#fff" data-hc="#fff" data-loop="true" id="livicon-153" style="width: 50px; height: 50px;">   

                            </i>
                        Thêm mới
                    </button>
                         &nbsp; &nbsp; &nbsp;
                            <button class="btn btn-danger" type="reset">
                                <i class="livicon" data-name="rotate-left" data-size="20" data-c="#fff" data-hc="#fff" data-loop="true" id="livicon-254" style="width: 50px; height: 50px;">
                                   
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

	