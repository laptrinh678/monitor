@extends('backend.master.index')
@section('header_style')
  <link href="css/app.css" rel="stylesheet" type="text/css" />
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
                        <a href="{{url('admin/service/listService')}}">Service</a>
                    </li>
                    <li class="active">List</li>
                </ol>
                    
                </h3>
                 @include('errors.note')
                <!-- <h1>Users  
                    @if(Auth::user()->level==2)
                    <a href="{{url('admin/member/add')}}">
                           <i class="fa fa-fw fa-angle-double-right"></i> Add User
                    </a>
                     @elseif(Auth::user()->level==1)
                      <a onclick="return confirm('Bạn không đủ quyền thực hiện chức năng này ?');" >
                           <i class="fa fa-fw fa-angle-double-right"></i> Add User
                    </a>
                     @elseif(Auth::user()->level==0)
                      <a onclick="return confirm('Bạn không đủ quyền thực hiện chức năng này ?');" >
                           <i class="fa fa-fw fa-angle-double-right"></i> Add User
                    </a>
                    @endif
                </h1> -->
               
            </section>
            <!-- Main content -->
            <section class="content paddingleft_right15">
                <div class="row">
                    <div class="panel panel-primary ">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a href="{{url('admin/service/add')}}"><i class="livicon" data-name="plus" data-size="20" data-c="#fff" data-hc="#fff" data-loop="true" id="livicon-152" style="width: 50px; height: 50px;">
                                
                                </i>Thêm mới Service</a>
                                <a href="{{url('admin/process/list')}}">
                                <i class="livicon" data-name="angle-double-right" data-size="15" data-c="#fff" data-hc="#fff" data-loop="true" id="livicon-218" style="width: 50px; height: 50px;"></i>
                            Sang trang Process
                              </a> 
                            </h4>
                        </div>
                        <br />
                        <div class="panel-body">
                            <table class="table table-bordered process" id="table">
                                <thead>
                                    <tr class="filters">
                                        <th>Stt</th>
                                        <th>Tên Service</th>
                                        <th>
                                          Management
                                        </th>
                                        <th class="phone">
                                        	Phone
                                        </th>
                                        <th>Service_code</th>
                                        <th>Channel_region</th>
                                        <th>Hành động(Action)</th>
                                    </tr>
                                </thead>
                                <tbody class="listservice">
                                	@foreach($data as $k=>$v)
                                    <tr>
                                        <td>{{$k+1}}</td>
                                        <td>{{$v->service_name}}</td>
                                        <td>
                                            {{$v->service_management}}
                                        </td>

                                       
                                         <td class="errorNa">
                                            <?php 
                                             echo substr( $v->phone_number,0,20 ).'...';
                                            ?>
                                            <div class="errorNaChil">

                                                <div class="turng">
                                                    <div class="turn2"></div>
                                                </div>
                                                <?php
                                                  echo str_replace(',','</br>',$v->phone_number);
                                                 ?>
                                               
                                            </div>
                                           
                                      </td>

                                        <td>
                                          
                                           {{$v->service_code}}
                                        </td>
                                        <td>
                                        	{{$v->channel_region}}
                                        </td>
                                        <td>
                                            <button class="btn btn-raised btn-warning editdata" data-toggle="modal" data-target="#modal-6" data="{{$v}}">
                                                 <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                            </button>
                                      @if(Auth::user()->level==2)
                                    <button class="btn btn-raised btn-danger deleteitem" dataid="{{$v->id}}">
                                                <i class="fa fa-trash-o" aria-hidden="true"></i> 
                                    </button>
                                    @elseif(Auth::user()->level<2)
                                    <button class="btn btn-raised btn-danger deleteitem" onclick="return confirm('Bạn không đủ quyền thực hiện chức năng này ?');" >
                                                <i class="fa fa-trash-o" aria-hidden="true"></i> 
                                    </button>
                                    @endif
                                             
                                        </td>
                                    </tr>
                                    @endforeach
                                   
                                </tbody>
                            </table>
                            <!-- Modal for showing delete confirmation -->
                            
                        </div>
                    </div>
                </div>
                <!-- row-->
            </section>
            <!-- modal -->
            <div class="modal fade in ajax-modal modallistservice" id="modal-6" role="dialog" aria-labelledby="modalLabelsidefall1">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-warning">
                                <h4 class="modal-title" id="modalLabelsidefall1">Stretch Left</h4>
                            </div>
                            <div class="modal-body">
                <form class="form-horizontal" role="form" method="get">
                <!--  -->
                <div class="form-group">
                <label for="first_name" class="col-sm-3 control-label">Tên Service</label>
                    <div class="col-sm-9">
                        <input type="text" id="first_name" name="service_name" placeholder="Nhập tên service" class="form-control required" />
                       
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">service_management</label>
                        <div class="col-sm-9">
                            <input type="text" name="service_management" placeholder="Nhập service management" class="form-control required">
                           
                        </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Số điện thoại</label>
                    <div class="col-sm-9">
                   <!--  <input type="number" name="phone_number" class="form-control required" id="IDphone_number" placeholder="Nhập số điện thoại" value=""> -->
                    <input type="text" name="phone_number" class="form-control" id="IDphone_number" placeholder="Nhập số điện thoại" value=""> 
                      
                    </div>
                </div> 
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">service_code</label>
                    <div class="col-sm-9">
                        <input type="text" name="service_code" class="form-control required" placeholder="Nhập service code">
                       
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">channel_region</label>
                    <div class="col-sm-9">
                        <input type="text" name="channel_region" class="form-control required" placeholder="Nhập channel region">
                        <input type="hidden"  id="id" value="" required="">
                        
                    </div>
                </div>
                <div class="space-4"></div>
                <div class="clearfix form-actions">
                    <div class="col-md-offset-3 col-md-9">
                        <button class="btn btn-primary" type="submit">
                            <i class="livicon" data-name="plus-alt" data-size="20" data-c="#fff" data-hc="#fff" data-loop="true" id="livicon-153" style="width: 50px; height: 50px;">
                               
                            </i>
                        Sửa thông tin
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
                            <div class="modal-footer">
                                <a style="color: white; font-size: 14px;" href="javascript::voild(0)" data-dismiss="modal">Close me!</a>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- end modal 6 -->
              <input type="hidden" value="{{url('')}}" id="url">
@endsection('content')
@section('script')
<script src="js/app.js" type="text/javascript"></script>
    <script type="text/javascript" src="vendors/datatables/js/jquery.dataTables2.js"></script>
    <script type="text/javascript" src="vendors/datatables/js/dataTables.bootstrap.js"></script>
     <script>
    $(document).ready(function() {
        $('#table').dataTable();
        $('.editdata').click(function()
        {
            var data = $(this).attr('data');
            var data2 = JSON.parse(data);
            console.log(data2.phone_number);
            $('#modalLabelsidefall1').html(data2.service_name);
            $('#first_name').val(data2.service_name);
            $("input[name='service_management']").val(data2.service_management);

            $("#IDphone_number").val(data2.phone_number);

            $("input[name='service_code']").val(data2.service_code);
            $("input[name='channel_region']").val(data2.channel_region);
            $("#id").val(data2.id);
        });
        /*submit*/
        $( "form" ).submit(function(event) 
        {     
              event.preventDefault();
              var id = $('#id').val();
              var item ={};
              item.id = id;
              item.service_name = $('#first_name').val();
              item.service_management = $("input[name='service_management']").val();
              item.phone_number = $("input[name='phone_number']").val();
              item.service_code = $("input[name='service_code']").val();
              item.channel_region = $("input[name='channel_region']").val();
              var itemJson = JSON.stringify(item);
              var url = $('#url').val();
              $.get(url+'/admin/service/edit/'+itemJson, function(data)
              {
                $('.listservice').html(data);
                $('#modalLabelsidefall1').html('');
                $('#first_name').val('');
                $("input[name='service_management']").val('');
                $("input[name='phone_number']").val('');
                $("input[name='service_code']").val('');
                $("input[name='channel_region']").val('');
                $("#id").val('');
                $('.modal-backdrop').hide();
                $('.ajax-modal').hide();
              });

        });
        $('body').on('click','.deleteitem', function()
        {
            var id = $(this).attr('dataid');
            var url = $('#url').val();
           $.get(url+'/admin/service/delete/'+id, function(data)
           {
                 $('.listservice').html(data);
           });
        });

        $('body').on('click','.viewmore', function()
        {
            $(this).next().toggle();
           // alert('kk');
        })
    });
    </script>
  

@endsection('script')

