@extends('backend.master.index')
@section('header_style')
<link rel="stylesheet" type="text/css" href="vendors/select2/css/select2.min.css" />
<link rel="stylesheet" type="text/css" href="vendors/select2/css/select2-bootstrap.css" />
<link rel="stylesheet" type="text/css" href="vendors/datatables/css/dataTables.bootstrap.css">
<link href="css/pages/tables.css" rel="stylesheet" type="text/css">
<link href="vendors/modal/css/component.css" rel="stylesheet" />
<link href="css/pages/advmodals.css" rel="stylesheet" />
<link href="css/lap.css" rel="stylesheet" type="text/css" />
 @endsection('header_style')
@section('content')
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
                    <li class="active">{{$name->service_name}}</li>
                </ol>
                    
                </h3>
                
            </section>
            <section class="content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-success filterable">
                            
                            <div class="panel-body table-responsive">
                                <table class="table table-striped table-bordered" id="table1">
                                    <thead>
                                        <tr>
                                            <th>Tt</th>
                                            <th>Actions</th>
                                            <th>Warning level</th>
                                            <th>Services</th>
                                            <th>Process</th>
                                            <th>Error_code</th>
                                            <th>ErrorName</th>
                                             <th>alerts_description</th>
                                            <th>Value/Limited_value</th>
                                            <th>Time</th>
                                            <th>UpdateTime</th>
                                            <th>Des (BP khắc phục)</th>
                                            <th>Manage</th>
                                            <th>Node</th>
                                        </tr>
                                    </thead>
                                    <tbody class="dataCloseWaringList">
                                       @foreach($data as $key=>$val) 
                                            <tr class="@if($val->status==1){{'ViewOld2'}}@else{{''}}@endif">
                                            <td>{{$key +1}}</td>
                                            <td>      
                                            <span>
                                            <a href="javascript::voild(0)" class="viewmore" 
                                            data=
                                            '<?php 
                                            $arr=[]; 
                                            $arr['list_mobile'] = $val->list_mobile;
                                            $arr['process'] = $val->process;
                                            $arr['error'] = $val->error;
                                            $arr['error_name'] = $val->error_name;
                                            $arr['value'] = $val->value;
                                            $arr['limited_value'] = $val->limited_value;
                                            $arr['description'] = $val->description;
                                            $arr['id']=$val->id;
                                            $arr['level']=$val->level;
                                            $arr['service']=$val->service;
                                            $arr['id_Service']=$val->id_Service;
                                            $a = json_encode($arr);
                                            echo $a;
;                                            ?>' 
                                            key="{{$key}}"
                                            dowload='{{$val->filename}}'
                                            url='{{url("")}}'
                                            >
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
                                            <td>
                                                {{$val->process}}
                                          
                                            </td>
                                            
                                            <td>
                                                {{$val->error}}
                                            </td>
                                            <td class="errorNa">
                                                  <?php 
                                             echo substr( $val->lap,0,10 ).'...';
                                            ?>
                                            <div class="errorNaChil">

                                                <div class="turng">
                                                    <div class="turn2"></div>
                                                </div>
                                                {!!$val->lap!!}
                                            </div>
                                            </td>
                                            <td class="errorNa">
                                            <?php 
                                             echo substr( $val->error_name,0,10 ).'...';
                                            ?>
                                            <div class="errorNaChil">

                                                <div class="turng">
                                                    <div class="turn2"></div>
                                                </div>
                                                {!!$val->error_name!!}
                                            </div>
                                           
                                            </td>
                                            
                                            <td class="aloff">
                                                {{$val->value}}/{{$val->limited_value}}
                                                 <?php 
                                              $a= str_replace('error_','',$val->error);
                                              ?>
                                              <a target="_blank" href="http://10.58.244.203:8456/d/asKu3H4Wz/payment_trans_his_new?orgId=1&from=<?php 
                                              $time= time()-61200; 
                                              echo $time .'000';
                                              ?>&to=<?php 
                                              $time1= time()+28800; 
                                              echo $time1 .'000';
                                              ?>&var-error_code={{$a}}&var-service_code=All&panelId=4&fullscreen">
                                              <i class="fa fa-eye" aria-hidden="true"></i> 
                                                 Grafana
                                              </a>
                                            </td>
                                            </td>
                                             <td>
                                                   {{date('d-m-Y H:i:s',strtotime($val->time))}}
                                            </td>
                                            <td>                                                  
                                                    {{date('d-m-Y H:i:s',strtotime($val->update_time))}}
                                            </td>
                                             <td class="hometd errorNa">
                                                 <?php 

                                                 echo substr( $val->description,0,40 ).'...';
                                                ?>
                                                @if($val->description != '')
                                                <div class="errorNaChil">

                                                <div class="turng">
                                                    <div class="turn2"></div>
                                                </div>
                                                {!!$val->description!!}
                                               </div>
                                               @else
                                               {{''}}
                                               @endif   
                                            @if($val->filename != '')
                                               <p> File HD xử lý
                                                <a href="{{url('admin/error/dowload')}}/{{$val->filename}}" class="dowload">
                                                    <i class="fa fa-cloud-download" aria-hidden="true"></i>
                                               </a> 
                                              </p>   
                                            @else
                                            {{''}}
                                            @endif 
                                            </td>       
                                           
                                            <td>
                                                 {{$val->manage_service}}
                                            </td>
                                             <td>
                                                 {{$val->node}}
                                            </td>                                
                                        </tr>
                                       @endforeach
                                       
                                    </tbody>
                                       <!-- <tfoot>
                                        <tr>
                                            <th class="searchHide"></th>
                                            <th class="searchHide"></th>
                                            <th class="searchHide"></th>
                                            <th></th>
                                            <th class="fixSele"></th>
                                            <th class="fixSele"></th>
                                            <th class="searchHide"></th>
                                            <th class="searchHide" ></th>
                                            <th></th>
                                            <th></th>
                                            <th></th> 
                                            <th></th>
                                            <th></th>
                                        </tr>
                                                                           </tfoot> -->
                                   
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
                                              <i class="livicon" data-name="notebook" data-size="16" data-c="#fff" data-hc="#fff" data-loop="true" id="livicon-143" style="width: 50px; height: 50px;">
                                              </i>

                                                Chi tiết cảnh báo
                                            </a>
                                        </li>
                                        <li>
                                           <a href="#CloseWranList" data-toggle="tab">
                                            
                                           <i class="livicon" data-name="plane-down" data-size="16" data-c="#fff" data-hc="#fff" data-loop="true" id="livicon-150" style="width: 50px; height: 50px;">
                                          
                                           </i>
                                             
                                       
                                           Đóng cảnh báo
                                           </a>
                                       </li> 
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab1">
                        <div class="panel panel-primary" id="hidepanel1">
                            <div class="panel-body">
                                <div class="form-horizontal">
                                    <fieldset>
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
                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="email">Error_name</label>
                                            <div class="col-md-9">
                                                <textarea class="form-control resize_vertical Error_name" id="Error" name="Error_name" placeholder="Please enter your message here..." rows="5">
                                                    
                                                </textarea>

                                               </div>
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
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="message">Description</label>
                                            <div class="col-md-9">
                                                <textarea class="form-control resize_vertical description" id="message" name="description" placeholder="Please enter your message here..." rows="5"></textarea>
                                            </div>
                                            <input type="hidden" name="" value="" id="viewWarning">
                                            
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-12 text-center">
                                                <button  class="btn btn-responsive btn-primary btn-sm identification">
                                                    <i class="livicon" data-name="pen" data-size="16" data-c="#fff" data-hc="#fff" data-loop="true" id="livicon-145">
                                                     
                                                    </i>
                                                    Xác nhận
                                                </button>
                                                 <button type="reset" class="btn btn-responsive btn-danger btn-sm Cancel">

                                                    <i class="livicon" data-name="printer" data-size="16" data-c="#fff" data-hc="#fff" data-loop="true" id="livicon-155" style="width: 50px; height: 50px;">
                                                       
                                                    </i>
                                                 Hủy bỏ
                                             </button>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                                        </div>
                                        <!-- dong canh bao-->
                                        <div class="tab-pane " id="CloseWranList">
                                            <div class="panel panel-primary" id="hidepanel1">
                           
                           <div class="panel-body">
                               <div class="form-horizontal" >
                                   <fieldset>
                                      
                                       <div class="form-group reason">
                                           <label class="col-md-3 control-label" for="message">Nguyên nhân(*)
                                           </label>
                                           <div class="col-md-9">
                                            <div class="form-control savedata">
                                             
                                            </div>
                                            <div class="form-control listreason">
                                                     
                                                <ul class="ulParent">
                                                      @foreach($groupReason as $key=>$val) 
                                                  <li>
                                                    <p>
                                                         <a href="javascript::voild(0)" class="show2">
                                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                                         </a>
                                                         <a href="javascript::voild(0)" class="hide2">
                                                            <i class="fa fa-minus" aria-hidden="true"></i>
                                                         </a> 
                                                         {{$key+1}}:{{$val->name}}
                                                    </p>
                                                    

                                                     
                                                        <ul class="liChider">
                                                            <?php 
                                                             $reason = DB::table('reasonGroup')->select('name')->where('parentId',$val->id)->get();
                                                             foreach($reason as $k=>$v)
                                                             {
                                                                echo '<li>';
                                                                echo $key+1;
                                                                echo '.';
                                                                echo $k+1;

                                                                echo $v->name;
                                                                echo '</li>';
                                                             }
                                                             
                                                            ?>
                                                            
                                                           
                                                        </ul>
                                                  </li>
                                                  @endforeach
                                               
                                                </ul>
                                            </div>  

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
                                      
                                       <div class="form-group">
                                           <label class="col-md-3 control-label" for="message">Ghi chú</label>
                                           <div class="col-md-9">
                                               <textarea class="form-control resize_vertical description" id="Iddescription" name="description"  rows="5" required=""></textarea>
                                           </div>
                                           <input type="hidden" name="data" id="dataWarringModal" value="">
                                           <input type="hidden" name="aa" id="serviceIdlap" value="">
                                       </div>
                                     
                                       <div class="form-group">
                                           <div class="col-md-12 text-center">
                                               <button type="submit" class="btn btn-responsive btn-primary  btn-sm confirmList">

                                                <i class="livicon" data-name="disconnect" data-size="15" data-c="#fff" data-hc="#fff" data-loop="true" id="livicon-358">
                                                  
                                                </i>
                                               Đóng cảnh báo
                                           </button>
                                                <button  class="btn btn-responsive btn-danger btn-sm Cancel">
                                                    <i class="livicon" data-name="camera-alt" data-size="15" data-c="#fff" data-hc="#fff" data-loop="true" id="livicon-65" style="width: 50px; height: 50px;">
                                                      
                                                    </i>
                                                Hủy bỏ
                                               </button>
                                           </div>
                                       </div>
                                   </fieldset>
                               </div>
                           </div>
                       </div>
                                        </div>
                                         <!-- end dong canh bao-->
                                  
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
    <!-- <script type="text/javascript" src="vendors/datatables/js/dataTables.responsive.js"></script> -->
    <script type="text/javascript" src="vendors/select2/js/select2.js"></script>
    <script type="text/javascript" src="js/pages/table-advanced2.js"></script>
    <script type="text/javascript">
        
        $(document).ready(function()      
        {
            $('body').on('click', '.viewmore', function()    
            {   
                $(this).parent().parent().parent().addClass('ViewOld2');
                var data = $(this).attr("data");
                var data2 = JSON.parse(data);
                $(this).parent().next().addClass('Newview');
                var key  = data2.id;

                $('#dataWarringModal').val(key);
                $('#serviceIdlap').val(data2.id_Service);
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
                $('.ajax-modal .form-horizontal #message').val(description);
                $('.ajax-modal #viewWarning').val(key);
                $('.ajax-modal').toggle();
            });
          
            $('.closeModal').click(function()
            {
                $(this).parent().parent().parent().parent().parent().hide();
                $(this).parent().parent().next().find('.savedata').html('');
            });

            $('.identification').click( function()
            {
                 var view = 1;
                 var key = $('#viewWarning').val();
                 var url = $('#url').val();
                $.get( url+'/admin/service/ajax/'+view+'/'+key, function(data){
                    
                       $('.Newview').html(data);
                       console.log(data);                                           
                    });
                $('.ajax-modal').hide();
            });
            $('body').on('click', '.CloseWarring', function() 
            {
                var data = $(this).attr("data2");
                var dataJonnPares = JSON.parse(data);
                var id = dataJonnPares.id;
                var serviceId = dataJonnPares.id_Service;
                $('#serviceIdlap').val(serviceId);
                $('#dataWarringModal').val(id);
                $('.WarringModal').toggle();
            });



             $('body').on('click','.Cancel', function()
            {    
                   $('#idHowtofix').val('');
                     $('#dataFfect').val('');
                     $('#Iddescription').val('');
                     $('#dataWarringModal').val('');
                     $('.savedata').html('');
                 $('.ajax-modal').hide();
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
            $('.savedata').click( function()
            {
                $('.ulParent').toggle();
            });

            /*show list nguyen nhan*/
            $('.show2').click(function()
                {   
                    //alert('kkk');
                    $(this).parent().next().show();
                    $(this).next().show();
                    $(this).hide();
                });
                $('.hide2').click(function()
                {
                    $(this).parent().next().hide();
                    $(this).prev().show();
                    $(this).hide();
                });
                $('.liChider>li').click(function()
                {
                    $('.savedata').empty();
                   
                         var data = $(this).text();
                            $('.savedata').append('<span>'+data+ '<a class="delete" href="javascript::voild(0)" ><i class="fa fa-times-circle-o" aria-hidden="true"></i></a>'+'</span>');
                            //$(this).hide();
                            $('.liChider>li').addClass('off');
                            $('.ulParent').hide(); 
                });

                $('body').on('click','.delete', function()
                {
                    $(this).parent().remove();
                })
                    /*end nguyen nhan*/
                /*ajax dong canh bao*/
                 $('body').on('click', '.confirmList', function() 
            {
                 var reasonData = $('.savedata').text();
                 var reason = reasonData.toString();
                 var DFfect = $('#dataFfect').val();
                 var idHfix = $('#idHowtofix').val();
                 var Des = $('#Iddescription').val();
                 var Idhis = $('#dataWarringModal').val();
                 var idSer = $('#serviceIdlap').val();

                  if(reasonData==''|| DFfect==''||idHfix==''|| Des=='')
                {
                     alert('Bạn vui lòng nhập đầy đủ thông tin vào các mục');
                }else
                {
                     var url = $('#url').val();
                   $.get( url+'/admin/service/list/'+reason+'/'+DFfect+'/'+idHfix +'/' + Des +'/'+Idhis + '/' + idSer, function(data){
                     $('.dataCloseWaringList').html(data);
                     $('.select2-selection__rendered').html('');
                     $('#idHowtofix').val('');
                     $('#dataFfect').val('');
                     $('#Iddescription').val('');
                     $('#dataWarringModal').val('');   
                     $('.savedata').html('');  
                                                          
                    });
                 $('.ajax-modal').hide();
                }


       
                
            });
                /*end ajax dong canh bao*/
                 var width = window.innerWidth;
             console.log(width);
             $('#table1').css({"width":width});
                 
                });
    </script>
@endsection('script')