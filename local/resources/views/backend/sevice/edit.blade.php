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
                    <li class="active">Sửa thông tin</li>
                </ol>
                </h1>
               
            </section>
            <br>
            <section class="content">
                <div class="row">

                    <div class="col-md-12">
                        <div class="panel panel-primary">
                           
                            <div class="panel-body">
                                    <form class="form-horizontal" role="form" method="post">
                

                <!--  -->
                <div class="form-group">
                <label for="first_name" class="col-sm-2 control-label">Tên Service</label>
                    <div class="col-sm-6">
                        <input type="text" id="first_name" name="service_name"  class="form-control required" value="{{$data->service_name}}" />
                        <span style="color: red;">{{$errors->first('service_name')}}</span>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1-1">service_management</label>
                        <div class="col-sm-6">
                            <input type="text" name="service_management"  class="form-control required" value="{{$data->service_management}}">
                            <span style="color: red;">{{$errors->first('service_management')}}</span>
                        </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1-1">Số điện thoại</label>
                    <div class="col-sm-6">
                        <input type="number" name="phone_number" class="form-control required" value="{{$data->phone_number}}">
                        <span style="color: red;">{{$errors->first('phone_number')}}</span>
                    </div>
                </div> 
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1-1">service_code</label>
                    <div class="col-sm-6">
                        <input type="text" name="service_code" class="form-control required" value="{{$data->service_code}}">
                        <span style="color: red;">{{$errors->first('service_code')}}</span>
                    </div>
                </div>
   				<div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1-1">channel_region</label>
                    <div class="col-sm-6">
                        <input type="text" name="channel_region" class="form-control required" value="{{$data->channel_region}}">
                        <span style="color: red;">{{$errors->first('channel_region')}}</span>
                    </div>
                </div>


                
                <div class="space-4"></div>
                <div class="clearfix form-actions">
                    <div class="col-md-offset-3 col-md-9">
                        <button class="btn btn-primary" type="submit">
                            <i class="livicon" data-name="credit-card" data-size="20" data-c="#fff" data-hc="#fff" data-loop="true" id="livicon-90" style="width: 20px; height: 50px;">

                           
                            </i>
                        Lưu thông tin</button>
                         &nbsp; &nbsp; &nbsp;
                            <button class="btn btn-danger" type="reset">
                                <i class="livicon" data-name="spinner-seven" data-size="20" data-c="#fff" data-hc="#fff" data-loop="true" id="livicon-326" style="width: 20px; height: 50px;">
                                    
                                
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

	