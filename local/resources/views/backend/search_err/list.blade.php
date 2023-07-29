@extends('backend.master.index')
@section('header_style')
  <link rel="stylesheet" type="text/css" href="vendors/datatables/css/dataTables.bootstrap.css" />
  <link href="css/pages/tables.css" rel="stylesheet" type="text/css" />
  <link href="vendors/daterangepicker/css/daterangepicker.css" rel="stylesheet" type="text/css" />
    <link href="vendors/datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />
   <link href="vendors/clockface/css/clockface.css" rel="stylesheet" type="text/css" />
  <link href="vendors/jasny-bootstrap/css/jasny-bootstrap.css" rel="stylesheet" type="text/css" />
@endsection('header_style')
@section('content')

            <!-- Content Header (Page header) -->
            <section class="content-header">
                 <h3 class="service">
                    <ol class="breadcrumb">
                    <li>
                        <a href="{{url('admin/index')}}">
                            <i class="livicon" data-name="home" data-size="14" data-loop="true"></i> Trang chủ
                        </a>
                    </li>
                    <li>
                        <a href="{{url('admin/fixerror/list')}}">Tìm kiếm</a>
                    </li>
                    <li class="active">Tìm kiếm lỗi</li> 
                </ol>
                    
                </h3>
                
               
            </section>
            <!-- Main content -->
            <section class="content paddingleft_right15">
            	 
                <div class="row">
                  <div class="alertNotification">
                     
                  </div>
                	<div class="col-md-6">
                    <div class="panel panel-primary ">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                              @if(Auth::user()->level==2)
                              <a href="javascript::voild(0)" data-toggle="modal" data-target="#modalfixError">
                                <i class="livicon" data-name="pencil" data-size="20" data-c="#fff" data-hc="#fff" data-loop="true">
                                </i>
                              Search Error to log_elasticsearch
                              </a>
                              @elseif(Auth::user()->level<2)
                               <a href="javascript::voild(0)" data-toggle="modal" onclick="return confirm('Bạn không đủ quyền thực hiện chức năng này ?');">
                                <i class="livicon" data-name="pencil" data-size="20" data-c="#fff" data-hc="#fff" data-loop="true">
                                </i>
                              log_elasticsearch
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
                                        <th>Ngày trực</th>
                                    
                                        <th>Ca trực</th>
                                        <th>Người trực</th>
                                        
                                        <th>Người tạo <br>Ngày tạo</th>
                                        <th>Hành động</th>
                                       
                                    </tr>
                                </thead>
                                <tbody class="bodydata">
                               hhhhhh
                                </tbody>
                            </table>  
                        </div>
                    </div>
                        



                    </div>
                   
                   
                	

                	<div class="col-md-6">

                      <div class="panel panel-primary ">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                              @if(Auth::user()->level==2)
                              <a href="javascript::voild(0)" data-toggle="modal" data-target="#report">
                                <i class="livicon" data-name="pencil" data-size="20" data-c="#fff" data-hc="#fff" data-loop="true">
                                </i>
                              Search Error to History_error
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
                        <div class="panel-body" id="table2">
                           
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

                               <b>Tạo lịch trực </b> 
                                   
                            </div>
                            <div class="modal-body bodyfixerror">
                               <div class="form-group">
                                <label for="first_name" class="col-sm-2 control-label">Người trực</label>
                                    <div class="col-sm-10">
                                         <select class="form-control level" name="users" >
                                          <option value="">Chọn người trực</option>
                                            @foreach($data as $v)
                                            <option value="{{$v->name}}">{{$v->name}}</option>
                                            @endforeach
                                        </select>
                                     
                                    </div>
                                </div>
                                <div class="form-group">
                                <label for="first_name" class="col-sm-2 control-label">Ngày trực</label>
                                    <div class="col-sm-10">
                                         <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="livicon" data-name="laptop" data-size="14" data-loop="true"></i>
                                            </div>
                                            <input type="date" class="form-control" id="datetime" />
                                        </div>
                                     
                                    </div>
                                </div>
                                        <div class="form-group">
                                            <label for="first_name" class="col-sm-2 control-label">Ca trực </label>
                                                <div class="col-sm-10">
                                                   <select name="shift" id="" class="form-control shift" >
                                                    <option value="">
                                                       Chọn ca
                                                     </option>
                                                    <option value="Sáng(từ 8h-12h)">
                                                       Sáng (từ 8h -12h)
                                                     </option>
                                                     <option value="Chiều(từ 13h30-17h30)"> Chiều(từ 13h30-17h30)</option>
                                                     <option value="Tối(từ 18h-24h)"> Tối(từ 18h-24h)</option>
                                                   </select>
                                                   <input type="hidden" id="iditem" value="">
                                                    
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
                <!-- report báo cáo thống kê -->
                    <div class="modal fade in pullDown" id="report" role="dialog" aria-labelledby="modalLabelnews">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-warning">
                               <b>Search Error</b>         
                            </div>
                            <div class="modal-body report">
                               <div class="form-group">
                                  <div class="col-sm-4">
                                     <label for="email">Loại lỗi</label>
                                     <select class="form-control"  id="typereport">
                                            <option value="">Chọn loại lỗi </option>  
                                            <option value="1">Theo thời gian</option>  
                                            <option value="2">Theo tên lỗi</option>  
                                     </select>
                                   </div>
                                   <div class="col-sm-8" id="htmldata">
                                        <div class="motram" id="errortime">
                                                <div class="col-sm-6 date">
                                        <label for="email">Từ ngày</label>
                                         <input type="date" class="form-control startdate">
                                        </div>
                                        <div class="col-sm-6 date">
                                            <label for="email">Đến ngày</label>
                                         <input type="date" class="form-control enddate">
                                        </div>
                                        <div class="col-sm-12">
                                          <p align="center"> 
                                            <br>
                                        <button class="btn btn-success search">
                                              <i class="livicon" data-name="plus-alt" data-size="20" data-c="#fff" data-hc="#fff" data-loop="true" >
                                              </i>
                                             Search
                                            </button>    
                                           
                                              <button class="btn btn-danger Reset">
                                                <i class="livicon" data-name="rotate-left" data-size="20" data-c="#fff" data-hc="#fff" data-loop="true">
                                                </i>
                                              Reset
                                            </button>    
                                         </p>  
                                        </div>
                                       
                                        </div>
                                        <div class="mottram" id="texttime">
                                          <div class="col-sm-12">
                                        <label for="email">Tìm  kiếm theo tên</label>
                                         <input type="text" class="form-control nameer">
                                        </div>
                                        <div class="col-sm-12">
                                          <p align="center">
                                             <br>
                   
                                            <button class="btn btn-success searchname">
                                              <i class="livicon" data-name="plus-alt" data-size="15" data-c="#fff" data-hc="#fff" data-loop="true" >
                                              </i>
                                             Search
                                            </button>    
                                          </p>
                                         
                                        </div>
                                        </div>
                                   
                                   </div>
                                    

                                </div>
                              
                                <div class="form-group" id="searchtime">
                                    <p align="center"> 
                                      <button class="btn btn-success search">
                                            <i class="livicon" data-name="plus-alt" data-size="20" data-c="#fff" data-hc="#fff" data-loop="true" >
                                            </i>
                                           Search
                                          </button>    
                                         
                                            <button class="btn btn-danger Reset">
                                              <i class="livicon" data-name="rotate-left" data-size="20" data-c="#fff" data-hc="#fff" data-loop="true">
                                              </i>
                                            Reset
                                          </button>    
                                    </p>  
                                </div>
                                <div class="form-group">
                                    
                                </div>
   
                            </div>
                            <div class="modal-footer footerText">
                                <a href="javascript::voild(0)" data-dismiss="modal">Close me!</a>
                               
                            </div>
                        </div>
                    </div>
                </div>

                <!-- end report báo cáo thống kê -->
                
    


                <input type="hidden" value="{{url('')}}" id="url">
<!-- ban giao canh bao -->
 <div class="modal fade in pullDown" id="handover" role="dialog" aria-labelledby="modalLabelnews">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-warning">
                               <b>Bàn giao cảnh báo</b>            
                            </div>
                            <div class="modal-body bodyfixerror">
                               <div class="form-group">
                                <label for="first_name" class="col-sm-3 control-label">Người bàn giao</label>
                                    <div class="col-sm-9">
                                        <div class="form-control username" data="{{Auth::user()->name}}">
                                            	{{Auth::user()->name}}
                                         </div>
                                     
                                    </div>
                                </div>
                                   <div class="form-group">
                                    <label for="first_name" class="col-sm-3 control-label">Thông tin cảnh báo</label>
                                            <div class="col-sm-9">
                                    	<div class="form-control mesage" data="Tổng số :{{$total}} Đã xem :{{$oldview}} Đã đóng :{{$close}} Tồn lại :{{$inventory}}">
                                    		Tổng số :{{$total}} Đã xem :{{$oldview}} Đã đóng :{{$close}} Tồn lại :{{$inventory}}
                                    	</div>
                                            	
                                            	                               
                                            </div>
                                    </div>
                                    <div class="form-group">
                                    <label for="first_name" class="col-sm-3 control-label">Ghi chú</label>
                                            <div class="col-sm-9">
                                         <textarea name="note" id="" cols="10" rows="5" class="form-control">
                                            		
                                            	</textarea>
                                    
                                                
                                            </div>
                                    </div>
                                       
         
               
                <div class="form-group">
                    <p align="center">        
                      <button class="btn btn-success handover">
                            <i class="livicon" data-name="plus-alt" data-size="20" data-c="#fff" data-hc="#fff" data-loop="true" id="livicon-153" style="width: 50px; height: 50px;">
                            </i>
                           Bàn giao
                          </button>    
                            <button class="btn btn-danger Reset">
                              <i class="livicon" data-name="rotate-left" data-size="20" data-c="#fff" data-hc="#fff" data-loop="true" id="livicon-254" style="width: 50px; height: 50px;">
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
<!-- end ban giao canh bao -->
<!-- sua lich truc -->
    <div class="modal fade in pullDown" id="editcanender" role="dialog" aria-labelledby="modalLabelnews">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-warning">
                               <b>Sửa lịch trực </b>      
                            </div>
                            <div class="modal-body bodyfixerror">
                               <div class="form-group">
                                <label for="first_name" class="col-sm-3 control-label">Người trực</label>
                                    <div class="col-sm-9">
                                         <select class="form-control level" name="users" >
                                          <option value="">Chọn người trực</option>
                                            @foreach($data as $v)
                                            <option value="{{$v->name}}">{{$v->name}}</option>
                                            @endforeach
                                        </select>
                                     
                                    </div>
                                </div>
                                <div class="form-group">
                                <label for="first_name" class="col-sm-3 control-label">Ngày trực</label>
                                    <div class="col-sm-9">
                                         <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="livicon" data-name="laptop" data-size="14" data-loop="true"></i>
                                            </div>
                                            <input type="date" class="form-control" id="datetime" />
                                        </div>
                                     
                                    </div>
                                </div>
                                  
                                        <div class="form-group">
                                            <label for="first_name" class="col-sm-3 control-label">Ca trực </label>
                                                <div class="col-sm-9">
                                                   <select name="shift" id="" class="form-control shift" >
                                                    <option value="">
                                                       Chọn ca
                                                     </option>
                                                    <option value="Sáng(từ 8h-12h)">
                                                       Sáng (từ 8h -12h)
                                                     </option>
                                                     <option value="Chiều(từ 13h30-17h30)"> Chiều(từ 13h30-17h30)</option>
                                                     <option value="Tối(từ 18h-24h)"> Tối(từ 18h-24h)</option>
                                                   </select>
                                                   <input type="hidden" id="iditem" value="">
                                                    
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
<script src="vendors/moment/js/moment.min.js" type="text/javascript"></script> 
<script src="vendors/daterangepicker/js/daterangepicker.js" type="text/javascript"></script>
<script src="vendors/datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
<script src="vendors/clockface/js/clockface.js" type="text/javascript"></script>
<script src="vendors/jasny-bootstrap/js/jasny-bootstrap.js" type="text/javascript"></script> 
<script src="js/pages/table2excel.js" type="text/javascript"></script> 
    <script>
    $(document).ready(function() {
        $('#table').dataTable();       
         $('body').on('click','.editdata', function()
        {
           	//$(".modal-header>b").html('Sửa lịch trực');
            var data = $(this).attr("data");
            var data2 = JSON.parse(data);
           $("#editcanender select[name='users']").val(data2.user);
           $('#editcanender #datetime').val(data2.datetime);
           $('#editcanender .shift').val(data2.shipt);
           $('#editcanender #iditem').val(data2.id);
        });

        $('body').on('click','.editItem', function()
        {
            var id = $('#editcanender #iditem').val();
            var users = $("#editcanender select[name='users']").val();
            var date2 = $('#editcanender #datetime').val();
            var sT = $('#editcanender .shift').val();
            var url = $('#url').val();

                if(users==''|| sT==''|| date2=='')
                {
                  alert('Bạn vui lòng nhập đầy đủ thông tin vào các mục');
                }else
                {
                     $.get( url+'/admin/live/update/'+ id +'/'+users+'/'+date2+'/'+sT, function(data){   
                         //console.log(data);
                        $('.bodydata').html(data);
                        $('.alertNotification').show(2000);
                        $('.alertNotification').text('Sửa thành công');
                        $('.alertNotification').css({'background':'#F89A14'});
                          setTimeout(function(){ $('.alertNotification').hide(5000);}, 5000);
                        $('.pullDown').hide();
                        $('.modal-backdrop').hide();
                    });
                }
        })

        /*add item canh bao*/
         $('body').on('click','.addItem', function()
        {     //$("input[name='service_management']").val('');
            var users = $("select[name='users']").val();
            var date2 = $('#datetime').val();
            var sT = $('.shift').val();
            var url = $('#url').val();
                if(users==''|| sT==''|| date2=='')
                {
                  alert('Bạn vui lòng nhập đầy đủ thông tin vào các mục');
                }else
                {
                   $.get( url+'/admin/live/add/'+users+'/'+sT+'/'+date2, function(data)
                   {
                        $('.bodydata').html(data);
                        $("select[name='users']").val('');
                        $('#datetime').val('');
                        $('.shift').val('');
                         $('.alertNotification').show(2000);
                          $('.alertNotification').text('Thêm thành công');
                          $('.alertNotification').css({'background':'#01bc8c'});
                          setTimeout(function(){ $('.alertNotification').hide(5000);}, 5000);
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
                $.get( url+'/admin/live/delete/'+id, function(data){
                         //console.log(data);   
                        $('.bodydata').html(data);
                         $('.alertNotification').show(2000);
                        $('.alertNotification').text('Xóa thành công');
                        $('.alertNotification').css({'background':'#e63834'});
                          setTimeout(function(){ $('.alertNotification').hide(5000);}, 5000);    
                    });

         });
        /*nut handover*/
        $('body').on('click','.handover',function()
        {
        	var item={};
        	item.name = $('.username').attr("data");
        	item.mesage = $('.mesage').attr("data");
        	var note = $("textarea[name='note']").val().trim();
        	item.note = note;
        	var itemjson = JSON.stringify(item);
        	var url = $('#url').val();
        	$.get(url+'/admin/live/handover/'+itemjson, function(data)
        	{
        		    //console.log(data);
               $('.boyhandover').html(data);
                 $('.alertNotification').show(2000);
                $('.alertNotification').text('Bàn giao thành công');
                $('.alertNotification').css({'background':'#01bc8c'});
                setTimeout(function(){ $('.alertNotification').hide(5000);}, 5000);
               $('.pullDown').hide();
               $('.modal-backdrop').hide();

        	});

        });

         /*xu ly show time phan bao cao theo ngay*/
            $('#typereport').on('change', function() 
            {

                 if(this.value==1)
                  {
                    $('#errortime').show();
                     $('#texttime').hide();
                  }
                  if(this.value==2)
                  {
                    $('#texttime').show();
                    $('#errortime').hide();
                  }
            });
        /*end handover*/
        /*search*/
        $('.search').click(function()
        {
          var startdate = $('.startdate').val();
          var enddate = $('.enddate').val();
          var url = $('#url').val();
          $.get(url+'/admin/live/searchdate/'+startdate +'/'+ enddate, function(data)
          {
             $('#table2').html(data);
             $('#report').hide();
             $('.modal-backdrop').hide();
          });

        });

        /*end search*/

         /*search error name*/
        $('.searchname').click(function()
        {
          var nameer = $('.nameer').val();
          //var enddate = $('.enddate').val();
          var url = $('#url').val();
          $.get(url+'/admin/live/searchname/'+startdate +'/'+ enddate, function(data)
          {
             $('#table2').html(data);
          });

        });

        /*end search*/
         var clicked = false;
          $(".checkall").on("click", function() {
            $(".checkhour").prop("checked", !clicked);
            clicked = !clicked;
          });

    });

    </script>
    <script>
      $(function() {

        $('body').on('click','.exportToExcel', function()
        {
             var table = $(this).prev('.table2excel');
          if(table && table.length){
            var preserveColors = (table.hasClass('table2excel_with_colors') ? true : false);
            $(table).table2excel({
              exclude: ".noExl",
              name: "Excel Document Name",
              filename: "myFileName" + new Date().toISOString().replace(/[\-\:\.]/g, "") + ".xls",
              fileext: ".xls",
              exclude_img: true,
              exclude_links: true,
              exclude_inputs: true,
              preserveColors: preserveColors
            });
          }
        })
        


        
      });
    </script>
@endsection('script')

