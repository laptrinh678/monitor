@extends('backend.master.index')
@section('header_style')
<link rel="stylesheet" type="text/css" href="vendors/select2/css/select2.min.css" />
<link rel="stylesheet" type="text/css" href="vendors/select2/css/select2-bootstrap.css" />
<link rel="stylesheet" type="text/css" href="vendors/datatables/css/dataTables.bootstrap.css">
<link href="css/pages/tables.css" rel="stylesheet" type="text/css">
<link href="vendors/modal/css/component.css" rel="stylesheet" />
<link href="css/pages/advmodals.css" rel="stylesheet" />
 @endsection('header_style')
@section('content')

            <!-- Content Header (Page header) -->
            <section class="content-header">
                <!--section starts-->
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
                    <li class="active">All</li>
                </ol>   
                </h3> 
            </section>
            <!--section ends-->
            <section class="content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-success filterable" style="overflow:auto;">
                               
                            <div class="panel-body table-responsive">
                                <table class="table table-striped table-bordered" id="table1">
                                    <thead>
                                        <tr>
                                            <th>Stt</th>
                                            <th>Hành động</th>
                                            <th>Mức độ CB</th>
                                            <th>Services</th>
                                            <th>Process</th>
                                            <th>Des</th>
                                            <th>Error</th>
                                            <th>Error_name</th>
                                            <th>Value</th>
                                           
                                            <th>Node</th>
                                     
                                             <th>Time</th>
                                             <th>Manage_service</th>
                                             
                                           
                                        </tr>
                                    </thead>
                                    <tbody class="dataCloseWaring">
                                       @foreach($data as $key=>$val) 
                                        <tr class="@if($val->status==1){{'ViewOld2'}}@else
                                                        {{''}}
                                                        @endif" >
                                            <td>{{$key +1}}</td>
                                            <td>
                                                   <span>
                                                     <a href="javascript::voild(0)" class="viewmore" data="{{$val}}" key="{{$key}}">
                                                   <i class="fa fa-search-plus" aria-hidden="true"></i>
                                                     </a>
                                                </span>
                                                <span style="color: #a4a5a3"  class="ViewOld">
                                                    @if($val->status==0)
                                                    <i class="fa fa-eye-slash" aria-hidden="true"></i>
                                                    @else($val->status==1)
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                    @endif
                                                
                                                    <div>
                                                         @if($val->status==1)
                                                        <span class="label label-sm label-success">{{'Đã xem'}}</span>
                                                        @else
                                                        {{''}}
                                                        @endif

                                                        @if($val->TimeViewUser != null)
                                                        <span class="label label-sm label-warning">{{$val->TimeViewUser}}</span>
                                                        @else
                                                        {{''}}
                                                        @endif

                                                        @if($val->userView != null)
                                                        <span class="label label-sm label-info">{{$val->userView}}</span>
                                                        @else
                                                        {{''}}
                                                         @endif
                                                                                                                    
                                                    </div>
                                                    
                                                </span>
                                                 <span>
                                                   <a href="javascript::voild(0)" class="CloseWarring" data2="{{$val}}" key="{{$key}}">
                                                      <i class="fa fa-cog" aria-hidden="true"></i>
                                                     </a>
                                                </span>
                                                  <span>
                                                   <a href="javascript::voild(0)" class="Message">
                                                     <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                                     </a>
                                                </span>
                                               
                                            </td>
                                            <td class="levelWarning">
                                                  @if($val->level==1)
                                                <span style="color: white">
                                                    Warning 
                                                    
                                                </span>
                                                @elseif($val->level==2)
                                                <span style="color: yellow">
                                                    Minor
                                                    
                                                </span>
                                                @elseif($val->level==3)
                                                 <span style="color: red">
                                                 Crical
                                                  
                                                 </span>
                                                @endif

                                               
                                             
                                            </td>
                                            <td>{{$val->service}}</td>
                                            <td>{{$val->process}}</td>
                                             <td>
                                                 {{$val->description}}
                                            </td>
                                            <td>
                                                {{$val->error}}
                                            </td>
                                            <td>
                                            {{$val->error_name}}
                                            </td>
                                             <td>
                                              {{$val->value}}
                                            </td>
                                             
                                             <td>
                                                 {{$val->node}}
                                            </td>
                                           
                                            <td>
                                                  {{date('d-m-Y',strtotime($val->time))}}
                                            </td>
                                            <td>
                                                 {{$val->manage_service}}
                                            </td>
                                            
                                      
                                        </tr>
                                       @endforeach
                                       
                                    </tbody>

                                       <tfoot>
                                        <tr>
                                            <th class="searchHide"></th>
                                            <th class="searchHide"></th>
                                            <th class="searchHide"></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th class="searchHide"></th>
                                            <th class="searchHide"></th>
                                            <th class="searchHide"></th>
                                            <th></th>
                                            <th class="searchHide"></th>
                                        </tr>
                                    </tfoot>
                                   
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Third Basic Table Ends Here-->
            </section>
            <!-- content -->
              <!-- ajax-modal modal-->
                    <div class="modal fade in ajax-modal" tabindex="-1" role="dialog" aria-hidden="false" key="">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <span class="modal-title">
                                    </span>
                                    <span class="clickS">
                                        <a href="javascript::voild(0)" class="closeModal">
                                        <i class="fa fa-times"  aria-hidden="true"></i>
                                    </a>
                                </span>
                                </div>
                                <div class="modal-body">
                                    <ul class="nav nav-tabs">
                                        <li class="active">
                                            <a href="#tab1" data-toggle="tab">
                                                <i class="livicon" data-name="clock" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                                Chi tiết cảnh báo
                                            </a>
                                        </li>
                                        <!-- <li>
                                            <a href="#tab2" data-toggle="tab">Tab 2</a>
                                        </li> -->
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab1">
                                              <!--basic form starts-->
                        <div class="panel panel-primary" id="hidepanel1">
                            
                            <div class="panel-body">
                                <div class="form-horizontal">
                                    <fieldset>
                                        <!-- Name input-->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="name">Mức độ cảnh báo</label>
                                            <div class="col-md-9">
                                                <input id="name" name="name" type="text" placeholder="" class="form-control level" value="">
                                            </div>
                                        </div>
                                       <div class="form-group">
                                            <label class="col-md-3 control-label" for="email">Process</label>
                                            <div class="col-md-9">
                                                <input id="email" name="process" type="text" placeholder="" class="form-control process"></div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="email">Error</label>
                                            <div class="col-md-9">
                                                <input id="Error" name="Error" type="text" placeholder="" class="form-control Error"></div>
                                        </div>
                                         <!-- process input-->
                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="email">Error_name</label>
                                            <div class="col-md-9">
                                                <input id="Error" name="Error_name" type="text" placeholder="" class="form-control Error_name"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="email">Value</label>
                                            <div class="col-md-9">
                                                <input id="Value" name="Value" type="text" placeholder="" class="form-control Value"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="email">
                                            Limited_Value</label>
                                            <div class="col-md-9">
                                                <input id="Value" name="Value" type="text" placeholder="" class="form-control Limited_Value"></div>
                                        </div>
                                        
                                        <!-- Message body -->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="message">Description</label>
                                            <div class="col-md-9">
                                                <textarea class="form-control resize_vertical description" id="message" name="description" placeholder="Please enter your message here..." rows="5"></textarea>
                                            </div>
                                        </div>
                                      
                                        Form actions
                                        <div class="form-group">
                                            <div class="col-md-12 text-center">
                                                <button  class="btn btn-responsive btn-primary btn-sm identification">Xác nhận</button>
                                                 <button type="reset" class="btn btn-responsive btn-danger btn-sm">Hủy bỏ</button>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                                        </div>
                                  
                                    </div>
                                    <!-- dong canh bao-->

                                    <!-- end dong canh bao-->

                                    
                                </div>
                                <div class="modal-footer">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- modal dong canh bao -->
                     <!-- ajax-modal modal-->
                    <div class="modal fade in WarringModal" tabindex="-1" role="dialog" aria-hidden="false" key="">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <span class="modal-title">
                                        Đóng cảnh báo
                                    </span>
                                    <span class="clickS">
                                        <a href="javascript::voild(0)" class="closeModal">
                                        <i class="fa fa-times"  aria-hidden="true"></i>
                                    </a>
                                </span>
                                </div>
                                <div class="modal-body">
                                    <ul class="nav nav-tabs">
                                        <li class="active">
                                            <a href="#tab3" data-toggle="tab">
                                                <i class="livicon" data-name="clock" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                                Chi tiết cảnh báo
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#tab2" data-toggle="tab">Tab 2</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab3">
                                              <!--basic form starts-->
                        <div class="panel panel-primary" id="hidepanel1">
                            
                            <div class="panel-body">
                                <div class="form-horizontal" >
                                    <fieldset>
                                        <!-- Name input-->
                                        <div class="form-group reason">
                                            <label class="col-md-3 control-label" for="message">Nguyên nhân(*)
                                            </label>
                                            <div class="col-md-9">
                                                <select id="select2" class="form-control select2 reasonData" multiple name="reason"  required="">
                                        @foreach($groupReason as $key=>$val)        
                                            <optgroup label="{{$key+1}}:{{$val->name}}">
                                              <?php
                                                $reason = DB::table('reason')->select('name')->where('reasonGroupId',$val->id)->get();
                                                foreach ($reason as $key=>$val)
                                                {
                                                    echo '<option ';
                                                    echo 'value[]';
                                                    echo '=';
                                                    echo $val->name;
                                                    echo '>';
                                                    echo $val->name;
                                                    echo'</option>';
                                                }
                                                                                          
                                               ?>
                                                
                                            </optgroup>
                                        @endforeach 
                                         </select>
                                            </div>
                                        </div>
                                       
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="message">Ảnh hưởng(*)</label>
                                            <div class="col-md-9">
                                                <textarea class="form-control resize_vertical description" id="dataFfect" name="affect"  rows="5" required=""></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="message">Cách khắc phục(*)</label>
                                            <div class="col-md-9">
                                                <textarea class="form-control resize_vertical description" id="idHowtofix" name="howtofix"  rows="5" required=""></textarea>
                                            </div>
                                        </div>
                                        <!-- Message body -->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="message">Ghi chú</label>
                                            <div class="col-md-9">
                                                <textarea class="form-control resize_vertical description" id="Iddescription" name="description"  rows="5" required=""></textarea>
                                            </div>
                                            <input type="hidden" name="data" id="dataWarringModal" value="">
                                        </div>
                                      
                                        <!-- Form actions -->
                                        <div class="form-group">
                                            <div class="col-md-12 text-center">
                                                <button type="submit" class="btn btn-responsive btn-primary btn-sm confirm">Xác nhận</button>
                                                 <button type="reset" class="btn btn-responsive btn-danger btn-sm">Hủy bỏ</button>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                                        </div>
                                       
                                    </div>
                                    
                                </div>
                                <div class="modal-footer">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- gửi tin nhắn thông báo -->
                    <div class="modal fade in MessageModal" tabindex="-1" role="dialog" aria-hidden="false" key="">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <span class="modal-title">
                                        Gửi tin nhắn 
                                    </span>
                                    <span class="clickS">
                                        <a href="javascript::voild(0)" class="closeModal">
                                        <i class="fa fa-times"  aria-hidden="true"></i>
                                    </a>
                                </span>
                                </div>
                                <div class="modal-body">
                                    <ul class="nav nav-tabs">
                                        <li class="active">
                                            <a href="#tab3" data-toggle="tab">
                                                <i class="livicon" data-name="clock" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                                Chi tiết thông tin
                                            </a>
                                        </li>
                                       
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab4">
                                              <!--basic form starts-->
                        <div class="panel panel-primary" id="hidepanel1">
                            
                            <div class="panel-body">
                                <div class="form-horizontal">
                                    <fieldset>
                                        <!-- Name input-->
                                        <div class="form-group reason">
                                            <label class="col-md-3 control-label" for="message">Số điện thoại nhận
                                           
                                            </label>
                                            <div class="col-md-9">
                                               <input type="number" class="form-control" name="phone">
                                            </div>
                                        </div>
                                       
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="message">Nội dung(*)</label>
                                            <div class="col-md-9">
                                                <textarea class="form-control resize_vertical description" id="message" name="description"  rows="5"></textarea>
                                            </div>
                                        </div>

                                       
                                       
                                      
                                        <!-- Form actions -->
                                        <div class="form-group">
                                            <div class="col-md-12 text-center">
                                                <button  class="btn btn-responsive btn-primary btn-sm" id="idconfirm">Xác nhận</button>
                                                 <button type="reset" class="btn btn-responsive btn-danger btn-sm">Hủy bỏ</button>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                                        </div>
                                       
                                    </div>
                                    
                                </div>
                                <div class="modal-footer">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" value="{{url('')}}" id="url">

@endsection
@section('script')
   
    <script src="vendors/jquery.easy-pie-chart/js/easypiechart.min.js"></script>
    <script src="vendors/jquery.easy-pie-chart/js/jquery.easypiechart.min.js"></script>
    <script src="js/jquery.easingpie.js"></script>
    <script type="text/javascript" src="vendors/datatables/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="vendors/datatables/js/dataTables.bootstrap.js"></script>
    <script type="text/javascript" src="vendors/datatables/js/dataTables.responsive.js"></script>
    <script type="text/javascript" src="vendors/select2/js/select2.js"></script>
    <script type="text/javascript" src="js/pages/table-advanced2.js"></script>
    <script type="text/javascript">
        
        $(document).ready(function()      
        {
            $('body').on('click', '.viewmore', function() 
            {
                var data = $(this).attr("data");
                $(this).parent().parent().parent().addClass('ViewOld2');
                var data2 = JSON.parse(data);
                //console.log(data2);
                var key  = data2.id;
                $('.ajax-modal').attr('key',key);
                var service = data2.service;
                $('.ajax-modal .modal-title').html(service);
                var level = data2.level;
                
                if(level==1)
                {
                    $('.ajax-modal .form-horizontal .level').val('Warning');
                }else if(level==2)
                {
                    $('.ajax-modal .form-horizontal .level').val('Minor');
                }else if(level==3)
                {
                    $('.ajax-modal .form-horizontal .level').val('Crical');
                }
                var process = data2.process;
                //console.log('process',process);
                $('.ajax-modal .form-horizontal .process').val(process);
                var error = data2.error;
                $('.ajax-modal .form-horizontal .Error').val(error);
                var Error_name = data2.error_name;
                $('.ajax-modal .form-horizontal .Error_name').val(Error_name);
                var value = data2.value;
                $('.ajax-modal .form-horizontal .Value').val(value);
                var Limited_Value = data2.limited_value;
                $('.ajax-modal .form-horizontal .Limited_Value').val(Limited_Value);
                var description = data2.description;
                $('.ajax-modal .form-horizontal .description').val(description);
                $('.ajax-modal').toggle();

                var view = 1;
                //console.log('view', view);
                var thiss = $(this);
                var url = $('#url').val();
                $.get( url+'/admin/sevice/ajax/'+view+'/'+key, function(data){
                      // thiss.parent().next().
                       thiss.parent().next().html(data);
                       //console.log(data);                                               
                    });

            });
          
            $('.closeModal').click(function()
            {
                $(this).parent().parent().parent().parent().parent().hide();

            });

            $('.identification').click( function()
            {
                $('.ajax-modal').hide();
            });

            $('body').on('click', '.CloseWarring', function() 
            {
                var data = $(this).attr("data2");
                var dataJonnPares = JSON.parse(data);
                var id = dataJonnPares.id;
                $('#dataWarringModal').val(id);
                $('.WarringModal').toggle();
            });
           

            $('body').on('click', '.confirm', function() 
            {
                 var reasonData = $('.reasonData').val();
                 var reason = reasonData.toString();
                 var DFfect = $('#dataFfect').val();
                 var idHfix = $('#idHowtofix').val();
                 var Des = $('#Iddescription').val();
                 var Idhis = $('#dataWarringModal').val();
                 var url = $('#url').val();
            $.get(url+'/admin/sevice/reason/'+reason+'/'+DFfect+'/'+idHfix + '/' + Des +'/'+Idhis, function(data){
                     $('.dataCloseWaring').html(data);
                     $('.select2-selection__rendered').html('');
                     $('#idHowtofix').val('');
                     $('#dataFfect').val('');
                     $('#Iddescription').val('');
                     $('#dataWarringModal').val('');
                                                                   
                    });
                 $('.WarringModal').hide();
                 
            });

            $('body').on('click','.Message', function()
            {
                 $('.MessageModal').toggle();
            });

             $('#idconfirm').click(function()
            {
                 $('.MessageModal').hide();
            });
            
            $('.searchHide').html('');

        });
    </script>
@endsection('script')