@extends('backend.master.index')
@section('title')
<title>Danh sách Process</title>
@endsection('title')
@section('header_style')
<link rel="stylesheet" type="text/css" href="vendors/datatables/css/dataTables.bootstrap.css" />
<link href="css/pages/tables.css" rel="stylesheet" type="text/css" />
@endsection('header_style')
@section('content')

            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h3 class="service">
                   <ol class="breadcrumb">
                   <li>
                       <a href="{{url('admin/index')}}">
                           <i class="livicon" data-name="home" data-size="14" data-loop="true"></i> Home
                       </a>
                   </li>
                   <li>
                       <a href="{{url('admin/process/list')}}">Process</a>
                   </li>
                   <li class="active">Danh sách process</li>
                                </ol>
                   
                                </h3> 
                
              <!--  <div >
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
              
               </div> -->
            </section>
            <!-- Main content -->
            <section class="content paddingleft_right15">
                <div class="row">
                    <div class="panel panel-primary ">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a href="{{url('admin/process/add')}}"><i class="livicon" data-name="plus" data-size="20" data-c="#fff" data-hc="#fff" data-loop="true" id="livicon-152" style="width: 50px; height: 50px;">
                                
                                </i>Tạo mới</a>
                                <a href="{{url('admin/service/listService')}}">
                                <i class="livicon" data-name="angle-double-right" data-size="15" data-c="#fff" data-hc="#fff" data-loop="true" id="livicon-218" style="width: 50px; height: 50px;"></i>
                            Sang trang Service
                              </a> 

                                
                            </h4>
                        </div>
                        <br />
                        <div class="panel-body">
                            <table class="table table-bordered process" id="table">
                                <thead>
                                    <tr class="filters">
                                        <th>Stt</th>
                                        <th>process_code</th>
                                        <th>
                                          process_name
                                        </th>
                                       <!--  <th>start_time</th>
                                       <th>period_time</th>
                                       <th>tag</th>
                                       <th>process_class</th>
                                       <th>process_method</th> -->
                                        <th>service_code</th>
                                        <th>PhoneNumber</th>
                                        
                                        <th>
                                            Người tạo
                                        </th>
                                        <th>Ngày tạo</th>
                                        <th>Hành động</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $k=>$val)
                                    <tr>
                                        <td>{{$k +1}}</td>
                                        <td>{{$val->process_code}} <br>Id:{{$val->process_id}}</td>
                                        <td>
                                            {{$val->process_name}}
                                        </td>
                                       <!--  <td>  {{$val->start_time}}</td>
                                       <td>  {{$val->period_time}}</td>
                                       <td>  {{$val->tag}}</td>
                                       <td>  {{$val->process_class}}</td>
                                       <td>  {{$val->process_method}}</td> -->

                                       <td>  
                                       
                                        <?php
                                        if($val->service_code != null)
                                        {
                                             $ser_name = DB::table('service')->select('service_name','id')->where('id',$val->service_code)->first();
                                             echo $ser_name->service_name;
                                             echo '<br>';
                                             echo 'Id:';
                                             echo $ser_name->id;
                                        }else
                                        {
                                            echo 'NULL';
                                        }
                                       
                                         ?>
                                       </td>
                                      
                                        <td class="errorNa">
                                            <?php 
                                             echo substr( $val->phonenumber,0,20 ).'...';
                                            ?>
                                            <div class="errorNaChil">

                                                <div class="turng">
                                                    <div class="turn2"></div>
                                                </div>
                                                <?php
                                                  echo str_replace(',','</br>',$val->phonenumber);
                                                 ?>
                                               
                                            </div>
                                           
                                      </td>
                                      
                                        <td>
                                         {{$val->user}}
                                        </td>
                                        <td>
                                            {{date('d-m-Y H:i:s',strtotime($val->created_at))}}
                                        </td>
                                        <td>
                                            <p align="left">
                                                  <a class="btn btn-raised btn-warning " href="{{url('admin/process/edit')}}/{{$val->process_id}}">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                  </a> 
                                                <a class="btn btn-raised btn-danger" href="{{url('admin/process/delete')}}/{{$val->process_id}}" data-toggle="modal" onclick="return confirm('Bạn có muốn xóa Process này không ?');">
                                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                </a>
                                            </p>
                                            
                                        </td>
                                        @endforeach
                                   
                                  
                                </tbody>
                            </table>
                            
                        </div>
                    </div>
                </div>
                <!-- row-->
            </section>
@endsection('content')
@section('script')
    <script type="text/javascript" src="vendors/datatables/js/jquery.dataTables2.js"></script>
    <script type="text/javascript" src="vendors/datatables/js/dataTables.bootstrap.js"></script>
    <script>
    $(document).ready(function() {
        $('#table').dataTable();
        /*$('.clickappend').click(function()
        {
            $('#sideLeft').toggleClass('collapse-left');
            $('#sideright').toggleClass('strech');
        });*/
        
            
    });

    </script>
@endsection('script')

