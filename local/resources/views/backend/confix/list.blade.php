@extends('backend.master.index')
@section('header_style')
<link href="css/app.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" type="text/css" href="vendors/datatables/css/dataTables.bootstrap.css" />
   <link href="vendors/bootstrap-touchspin/css/jquery.bootstrap-touchspin.css" rel="stylesheet" type="text/css" media="all" />
    <link href="vendors/jquery-spinner/css/bootstrap-spinner.css" rel="stylesheet" />
@endsection('header_style')
@section('content')
            <section class="content-header">
                 <h3 class="service">
                    <ol class="breadcrumb">
                    <li>
                        <a href="{{url('admin/index')}}">
                            <i class="livicon" data-name="home" data-size="14" data-loop="true"></i> Trang chủ
                        </a>
                    </li>
                    <li>
                        <a href="{{url('admin/confix/list')}}">confix</a>
                    </li>
                    <li class="active">Danh sách</li>
                </ol>    
                </h3>     
            </section>
            <!-- Main content -->
            <section class="content paddingleft_right15">
            	 
                <div class="row">
                	 <div class="alertNotification">
                     
                    </div>
                   
                	<div class="col-md-12">
                		 <div class="panel panel-primary ">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                              @if(Auth::user()->level==2)
                              <a href="javascript::voild(0)" data-toggle="modal" data-target="#modalfixError">
                              	<i class="livicon" data-name="pencil" data-size="20" data-c="#fff" data-hc="#fff" data-loop="true">
                              	</i>
                              Tạo Confix
                              </a>
                              @elseif(Auth::user()->level<2)
                               <a href="javascript::voild(0)" data-toggle="modal" onclick="return confirm('Bạn không đủ quyền thực hiện chức năng này ?');">
                                <i class="livicon" data-name="pencil" data-size="20" data-c="#fff" data-hc="#fff" data-loop="true">
                                </i>
                              Tạo lịch
                              </a>
                              @endif
                                                                   
                            </h4>
                        </div>
                        <br />
                        <div class="panel-body">
                            <table class="table table-bordered " id="table">
                                <thead>
                                    <tr class="filters">
                                        <th>Stt</th>
                                        <th>Ip_sour</th>
                                        <th>Ip_dest</th>
                                        <th>Ip_pro/Port_pro</th>
                                        <th>Port_dest</th>
                                        <th>Process</th>
                                        <th>Active/Process</th>
                                        <th>User_pro</th>
                                        <th>Pass_pro</th>
                                        <th>Hành động</th>
                                       
                                    </tr>
                                </thead>
                                <tbody class="bodydata">
                                	@foreach($data as $k=>$v)
                                  <tr>
                                  	<td>{{$k}}</td>
                                    <td>
                                      {{$v->ip_sour}}
                                    </td>
                                 
                                  	<td>{{$v->ip_dest}}</td>
                                   
                                  	<td>
                                      {{$v->ip_pro}}/
                                      {{$v->port_pro}}
                                    </td>
                                  	
                                  	<td>
                                       {{$v->port_dest}}
                                  	</td>
                                     <td>
                                      
                                      {{$v->process_name}}
                                     </td>
                                    <td>
                                        
                                    <button data="{{$v->active}}" class="btn activebt @if($v->active==1){{'btn-success'}}@else{{'btn-danger'}}@endif" dataid="{{$v->id}}" >@if($v->active==1){{'ON'}}@else{{'OFF'}}@endif</button>
                                    </td>
                                    <td>{{$v->user_pro}}</td>
                                    <td>{{$v->pass_pro}}</td>
                                  	<td>
                                  		 <p align="left">
                                        @if(Auth::user()->level==2)
                                        <button class="btn btn-raised btn-warning editdata" 
                                        data='
                                        <?php 
                                        $arr =[];
                                        $arr['id']= $v->id;
                                        $arr['ip_sour']= $v->ip_sour;
                                        $arr['ip_dest']= $v->ip_dest;
                                        $arr['ip_pro']= $v->ip_pro;
                                        $arr['port_dest']= $v->port_dest;
                                        $arr['port_pro']= $v->port_pro;
                                        $arr['user_pro']= $v->user_pro;
                                        $arr['pass_pro']= $v->pass_pro;
                                        $arr['active']= $v->active;
                                        $arr['process_id']= $v->process_id;
                                        $arr['process_name']= $v->process_name;
                                        $a = json_encode($arr);
                                        echo $a;
                                         ?>'
                                        data-toggle="modal" data-target="#editcanender">
                                                  <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                             </button>
                                        @elseif(Auth::user()->level<2)
                                        <button class="btn btn-raised btn-warning"  onclick="return confirm('Bạn không đủ quyền thực hiện chức năng này ?');">
                                                  <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                             </button>
                                        @endif

                                        @if(Auth::user()->level==2)
                                            <button class="btn btn-raised btn-danger deleteitem" dataid="{{$v->id}}">
                                                <i class="fa fa-trash-o" aria-hidden="true"></i> 
                                            </button>
                                         @elseif(Auth::user()->level<2)
                                           <button class="btn btn-raised btn-danger deleteitem" onclick="return confirm('Bạn không đủ quyền thực hiện chức năng này ?');" >
                                                <i class="fa fa-trash-o" aria-hidden="true"></i> 
                                            </button>
                                        @endif
                                               
                                            </p>
                                  	</td>
                                  </tr>
                                  	@endforeach
                                </tbody>
                            </table>  
                        </div>
                    </div>
                	</div>
                   
                </div>
                <!-- row-->
            </section>
             <div class="modal fade in pullDown" id="modalfixError" role="dialog" aria-labelledby="modalLabelnews">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-warning">

                               <b>Tạo Config</b> 
                                   
                            </div>
                            <div class="modal-body bodyfixerror">
                               <div class="form-group">
                                <label for="first_name" class="col-sm-2 control-label">Ip_sour</label>
                                    <div class="col-sm-10">
                                         <input type="text" class="form-control Ip_sour">
                                     
                                    </div>
                                </div>
                                <div class="form-group">
                                <label for="first_name" class="col-sm-2 control-label">Ip_dest</label>
                                    <div class="col-sm-10">
                                        
                                            
                                            <input type="text" class="form-control Ip_dest" />
                                       
                                     
                                    </div>
                                </div>
                                        <div class="form-group">
                                          <label for="first_name" class="col-sm-2 control-label">Ip_pro </label>
                                                <div class="col-sm-10">
                                                   <input type="text" class="form-control Ip_pro">
                                                </div>
                                        </div>
                                 <div class="form-group">
                                          <label for="first_name" class="col-sm-2 control-label">Port_dest</label>
                                                <div class="col-sm-10">
                                                  <div class="input-group spinner" data-trigger="spinner">
                                                    <input type="text" class="form-control Port_dest" value="0" data-rule="percent">
                                                    <div class="input-group-addon">
                                                        <a href="javascript:;" class="spin-up" data-spin="up"><i class="fa fa-chevron-up"></i></a>
                                                        <a href="javascript:;" class="spin-down" data-spin="down"><i class="fa fa-chevron-down"></i></a>
                                                    </div>
                                                </div>
                                                </div>
                                        </div>
                                 <div class="form-group">
                                          <label for="first_name" class="col-sm-2 control-label">Port_pro</label>
                                                <div class="col-sm-10">
                                                  
                                                  <div class="input-group spinner" data-trigger="spinner">
                                            <input type="text" class="form-control Port_pro" value="0" data-rule="quantity">
                                            <div class="input-group-addon pickers_spinners">
                                                <a href="javascript:;" class="spin-up" data-spin="up"><i class="fa fa-chevron-up"></i></a>
                                                <a href="javascript:;" class="spin-down" data-spin="down"><i class="fa fa-chevron-down"></i></a>
                                            </div>
                                        </div>
                                                </div>
                                        </div>
                                 <div class="form-group">
                                          <label for="first_name" class="col-sm-2 control-label">User_pro</label>
                                                <div class="col-sm-10">
                                                   <input type="text" class="form-control User_pro">
                                                </div>
                                        </div>
            <div class="form-group">
              <label for="first_name" class="col-sm-2 control-label">Pass_pro</label>
                    <div class="col-sm-10">
                       <input type="text" class="form-control Pass_pro">
                    </div>
            </div>
              <div class="form-group">
              <label for="first_name" class="col-sm-2 control-label">Process</label>
                    <div class="col-sm-10">
                       <select name="process" id="" class="form-control process">
                         <option value="">Chọn Process code</option>
                         @foreach($process as $v)
                         <option value="{{$v->process_id}}" class="form-control">{{$v->process_name}}</option>
                         @endforeach
                       </select>
                    </div>
            </div>
            <div class="form-group">
                <label for="first_name" class="col-sm-2 control-label">Trạng thái CB</label>
                    <div class="col-sm-1">
                       <input type="checkbox" name="statusmess" value="0" class="statusmess">
                    </div>
                
                </div>
                <div class="form-group">
                    <p align="center">
                             
                      <button class="btn btn-success addItem">
                            <i class="livicon" data-name="plus-alt" data-size="20" data-c="#fff" data-hc="#fff" data-loop="true" >
                            </i>
                           Thêm mới
                          </button>    
                         
                            <button class="btn btn-danger Reset">
                              <i class="livicon" data-name="rotate-left" data-size="20" data-c="#fff" data-hc="#fff" data-loop="true">
                              </i>
                            Reset
                          </button>    
                    </p>  
                </div>
   
                            </div>
                            <div class="modal-footer footerText">
                                <a href="javascript::voild(0)" data-dismiss="modal">Close me!</a>
                               
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" value="{{url('')}}" id="url">

<!-- end ban giao canh bao -->
<!-- sua lich truc -->
    <div class="modal fade in pullDown" id="editcanender" role="dialog" aria-labelledby="modalLabelnews">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-warning">
                               <b>Sửa Confix</b>      
                            </div>
                            <div class="modal-body bodyfixerror">
                               <div class="form-group">
                                <label for="first_name" class="col-sm-2 control-label">Ip_sour</label>
                                    <div class="col-sm-10">
                                         <input type="text" class="form-control Ip_sour">
                                     
                                    </div>
                                </div>
                                <div class="form-group">
                                <label for="first_name" class="col-sm-2 control-label">Ip_dest</label>
                                    <div class="col-sm-10">
                                        
                                            
                                            <input type="text" class="form-control Ip_dest" />
                                       
                                     
                                    </div>
                                </div>
                                        <div class="form-group">
                                          <label for="first_name" class="col-sm-2 control-label">Ip_pro </label>
                                                <div class="col-sm-10">
                                                   <input type="text" class="form-control Ip_pro">
                                                </div>
                                        </div>
                                 <div class="form-group">
                                          <label for="first_name" class="col-sm-2 control-label">Port_dest</label>
                                                <div class="col-sm-10">
                                                  <div class="input-group spinner" data-trigger="spinner">
                                                    <input type="text" class="form-control Port_dest" value="1" data-rule="percent">
                                                    <div class="input-group-addon">
                                                        <a href="javascript:;" class="spin-up" data-spin="up"><i class="fa fa-chevron-up"></i></a>
                                                        <a href="javascript:;" class="spin-down" data-spin="down"><i class="fa fa-chevron-down"></i></a>
                                                    </div>
                                                </div>
                                                </div>
                                        </div>
                                 <div class="form-group">
                                          <label for="first_name" class="col-sm-2 control-label">Port_pro</label>
                                                <div class="col-sm-10">
                                                  
                                                  <div class="input-group spinner" data-trigger="spinner">
                                            <input type="text" class="form-control Port_pro"  data-rule="quantity">
                                            <div class="input-group-addon pickers_spinners">
                                                <a href="javascript:;" class="spin-up" data-spin="up"><i class="fa fa-chevron-up"></i></a>
                                                <a href="javascript:;" class="spin-down" data-spin="down"><i class="fa fa-chevron-down"></i></a>
                                            </div>
                                        </div>
                                                </div>
                                        </div>
                                 <div class="form-group">
                                          <label for="first_name" class="col-sm-2 control-label">User_pro</label>
                                                <div class="col-sm-10">
                                                   <input type="text" class="form-control User_pro">
                                                </div>
                                        </div>
            <div class="form-group">
                                          <label for="first_name" class="col-sm-2 control-label">Pass_pro</label>
                                                <div class="col-sm-10">
                                                   <input type="text" class="form-control Pass_pro">
                                                    <input type="hidden" class="form-control" id="iditemedit">
                                                </div>
                                        </div>
                              <div class="form-group">
                          <label for="first_name" class="col-sm-2 control-label">Process</label>
                                <div class="col-sm-10">
                                   <select name="process" id="" class="form-control process">
                                     <option value="">Chọn Process code</option>
                                     @foreach($process as $v)
                                     <option value="{{$v->process_id}}" class="form-control">{{$v->process_name}}</option>
                                     @endforeach
                                   </select>
                                </div>
                        </div>
                                        <div class="form-group">
                <label for="first_name" class="col-sm-2 control-label">Trạng thái CB</label>
                    <div class="col-sm-1">
                       <input type="checkbox" name="statusmess" value="0" class="statusmess">
                    </div>
                
                </div>

                            
         
               
                            <div class="form-group">
                                <p align="center">
                                         
                                  <button class="btn btn-success editItem">
                                        <i class="livicon" data-name="plus-alt" data-size="20" data-c="#fff" data-hc="#fff" data-loop="true" >
                                        </i>
                                       Sửa
                                      </button>    
                                     
                                        <button class="btn btn-danger Reset">
                                          <i class="livicon" data-name="rotate-left" data-size="20" data-c="#fff" data-hc="#fff" data-loop="true">
                                          </i>
                                        Reset
                                      </button>    
                                </p>  
                            </div>
               
                            </div>
                            <div class="modal-footer footerText">
                                <a href="javascript::voild(0)" data-dismiss="modal">Close me!</a>
                               
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" value="{{url('')}}" id="url">
<!-- end sua lich truc -->
@endsection('content')
@section('script')
<script src="js/app.js" type="text/javascript"></script>
 <script type="text/javascript" src="vendors/datatables/js/jquery.dataTables2.js"></script>
<script type="text/javascript" src="vendors/datatables/js/dataTables.bootstrap.js"></script> 
<script src="vendors/bootstrap-touchspin/js/jquery.bootstrap-touchspin.js"></script>
<script src="vendors/jquery-spinner/js/jquery.spinner.min.js"></script> 
<script src="js/pages/pickers.js"></script> 

    <script>
    $(document).ready(function() {

        $('#table').dataTable(); 
         $('body').on('click','.editdata', function()
        {
           	//$(".modal-header>b").html('Sửa lịch trực');
            var data = $(this).attr("data");
            var data2 = JSON.parse(data);
           // console.log(data2);
            $("#editcanender .Ip_sour").val(data2.ip_sour);
            $("#editcanender .Ip_dest").val(data2.ip_dest);
            $("#editcanender .Ip_pro").val(data2.ip_pro);
            $("#editcanender .Port_dest").val(data2.port_dest);
            $("#editcanender .Port_pro").val(data2.port_pro);
            $("#editcanender .User_pro").val(data2.user_pro);
            $("#editcanender .Pass_pro").val(data2.pass_pro);
            $("#editcanender .process").val(data2.process_id);
            $('#iditemedit').val(data2.id);
            var active = data2.active;
            if(active==1)
            {
              $('#editcanender .statusmess').val(1);
              $('#editcanender .statusmess').attr('checked','checked');
            }else
            {
              $('#editcanender .statusmess').val(0);

            }
        });

        $('body').on('click','.editItem', function()
        {
            var item ={};
            item.id= $('#iditemedit').val();
            item.Ip_sour = $("#editcanender .Ip_sour").val();
            item.Ip_dest = $("#editcanender .Ip_dest").val();
            item.Ip_pro = $("#editcanender .Ip_pro").val();
            item.Port_dest = $("#editcanender .Port_dest").val();
            item.Port_pro = $("#editcanender .Port_pro").val();
            item.User_pro = $("#editcanender .User_pro").val();
            item.Pass_pro = $("#editcanender .Pass_pro").val();
            item.statusmess = $('#editcanender .statusmess').val();
            item.process_id = $('#editcanender .process').val();
            
            var itemjson = JSON.stringify(item);
            var url = $('#url').val();
            if(item.Ip_sour==''|| item.Ip_dest==''|| item.Port_dest=='')
                {
                  alert('Bạn vui lòng nhập đầy đủ thông tin vào các mục,Ip_sour,Ip_dest,Port_dest');
                }else
                {
                     $.get( url+'/admin/confix/update/'+itemjson, function(data){   
                        //console.log(data);
                        $('.bodydata').html(data);
                        $("#editcanender .Ip_sour").val("");
                        $("#editcanender .Ip_dest").val('');
                        $("#editcanender .Ip_pro").val('');
                        $("#editcanender .Port_dest").val('');
                        $("#editcanender .Port_pro").val('');
                        $("#editcanender .User_pro").val('');
                        $("#editcanender .Pass_pro").val('');
                        $('#editcanender .statusmess').val(0);
                        
                        $('.alertNotification').show(2000);
                        $('.alertNotification').text('Sửa thành công');
                        $('.alertNotification').css({'background':'#F89A14'});
                          setTimeout(function(){ $('.alertNotification').hide(4000);}, 4000);
                        $('.pullDown').hide();
                        $('.modal-backdrop').hide();
                    });
                }
            
        })

        /*add item canh bao*/
         $('body').on('click','.addItem', function()
        {   
            var item ={};
            item.Ip_sour = $(".Ip_sour").val();
            item.Ip_dest = $(".Ip_dest").val();
            item.Ip_pro = $(".Ip_pro").val();
            item.Port_dest = $(".Port_dest").val();
            item.Port_pro = $(".Port_pro").val();
            item.User_pro = $(".User_pro").val();
            item.Pass_pro = $(".Pass_pro").val();
            item.statusmess = $('.statusmess').val();
            item.process = $('.process').val();
            //console.log(item);
            var itemjson = JSON.stringify(item);
            //console.log(itemjson);
            var url = $('#url').val();
                if(item.Ip_sour==''|| item.Ip_dest==''||item.Port_dest=='')
                {
                  alert('Bạn vui lòng nhập đầy đủ thông tin vào các mục,Ip_sour,Ip_dest,Port_dest');
                }else
                {
                   $.get( url+'/admin/confix/add/'+itemjson, function(data)
                   {
                          $('.bodydata').html(data);
                          $(".Ip_sour").val('');
                          $(".Ip_dest").val('');
                          $(".Ip_pro").val('');
                          $(".Port_dest").val('');
                          $(".Port_pro").val('');
                          $(".User_pro").val('');
                          $(".Pass_pro").val('');
                          $('#modalfixError .statusmess').val(0);
                          $('.alertNotification').show(2000);
                          $('.alertNotification').text('Thêm thành công');
                          $('.alertNotification').css({'background':'#01bc8c'});
                          setTimeout(function(){ $('.alertNotification').hide(4000);}, 4000);
                        $('.pullDown').hide();
                        $('.modal-backdrop').hide();
                    });
                }

            
        })
         /*endadditemcanhbao*/
         /*nut Reset*/
         $('body').on('click','.Reset', function()
         {

                        $("select[name='users']").val('');
                        $('#datetime').val('');
                        $('.shift').val('');

         });

        $('body').on('click','.deleteitem', function()
         {
                var id = $(this).attr('dataid');
                var url = $('#url').val();
                $.get( url+'/admin/confix/delete/'+id, function(data){
                         //console.log(data);   
                        $('.bodydata').html(data);
                        
                        $('.alertNotification').show(2000);
                        $('.alertNotification').text('Xóa thành công');
                        $('.alertNotification').css({'background':'#e63834'});
                          setTimeout(function(){ $('.alertNotification').hide(4000);}, 4000);  
                    });

         });
        
        /*end handover*/
         var clicked = false;
          $(".checkall").on("click", function() {
            $(".checkhour").prop("checked", !clicked);
            clicked = !clicked;
          });

      /*thay doi trang thai nut tat bat canh báo*/
        var ckbox = $('.statusmess');
        $('.statusmess').on('click',function () {
                    if (ckbox.is(':checked')) {
                        $(this).val(1);
                    } else {
                        $(this).val(0);
                    }
                });
      /*thay doi trang thai nut tat bat canh bao trang list*/
      $('body').on('click','.activebt', function()
      {
           var id = $(this).attr('dataid');
           var active = $(this).attr('data');
           if(active==1)
           {
               var ac=0;
               var url = $('#url').val();
               var thiss = $(this);
               $.get(url+'/admin/confix/active/'+ac +'/'+id, function(data)
               {
                    thiss.parent().html(data); 
               });
           }else
           {
              var ac = 1;
              var url = $('#url').val();
              var thiss = $(this);
              $.get(url+'/admin/confix/active/'+ac +'/'+id, function(data)
               {
                    thiss.parent().html(data); 

               });
           }
      });

    });

    </script>
@endsection('script')

