@extends('backend.master.index')
<title>Thống kê cảnh báo</title>
@section('header_style')
  
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
                        <a href="{{url('admin/fixerror/list')}}">Lịch trực</a>
                    </li>
                    <li class="active">Danh sách</li>
                </ol>
                    
                </h3>
                
               
            </section>
            <!-- Main content -->
            <section class="content paddingleft_right15">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInLeftBig">
                        <!-- Trans label pie charts strats here-->
                        <div class="lightbluebg no-radius">
                            <div class="panel-body squarebox square_boxs">
                                <div class="col-xs-12 pull-left nopadmar">
                                    <div class="row">
                                        <div class="square_box col-xs-7 text-right">
                                            <span>Views Today</span>
                                            <div class="number" id="myTargetElement1"></div>
                                        </div>
                                        <i class="livicon  pull-right" data-name="eye-open" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <small class="stat-label">Last Week</small>
                                            <h4 id="myTargetElement1.1"></h4>
                                        </div>
                                        <div class="col-xs-6 text-right">
                                            <small class="stat-label">Last Month</small>
                                            <h4 id="myTargetElement1.2"></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInUpBig">
                        <!-- Trans label pie charts strats here-->
                        <div class="redbg no-radius">
                            <div class="panel-body squarebox square_boxs">
                                <div class="col-xs-12 pull-left nopadmar">
                                    <div class="row">
                                        <div class="square_box col-xs-7 pull-left">
                                            <span>Today's Sales</span>
                                            <div class="number" id="myTargetElement2"></div>
                                        </div>
                                        <i class="livicon pull-right" data-name="piggybank" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <small class="stat-label">Last Week</small>
                                            <h4 id="myTargetElement2.1"></h4>
                                        </div>
                                        <div class="col-xs-6 text-right">
                                            <small class="stat-label">Last Month</small>
                                            <h4 id="myTargetElement2.2"></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-md-6 margin_10 animated fadeInDownBig">
                        <!-- Trans label pie charts strats here-->
                        <div class="goldbg no-radius">
                            <div class="panel-body squarebox square_boxs">
                                <div class="col-xs-12 pull-left nopadmar">
                                    <div class="row">
                                        <div class="square_box col-xs-7 pull-left">
                                            <span>Subscribers</span>
                                            <div class="number" id="myTargetElement3"></div>
                                        </div>
                                        <i class="livicon pull-right" data-name="archive-add" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <small class="stat-label">Last Week</small>
                                            <h4 id="myTargetElement3.1"></h4>
                                        </div>
                                        <div class="col-xs-6 text-right">
                                            <small class="stat-label">Last Month</small>
                                            <h4 id="myTargetElement3.2"></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInRightBig">
                        <!-- Trans label pie charts strats here-->
                        <div class="palebluecolorbg no-radius">
                            <div class="panel-body squarebox square_boxs">
                                <div class="col-xs-12 pull-left nopadmar">
                                    <div class="row">
                                        <div class="square_box col-xs-7 pull-left">
                                            <span>Registered Users</span>
                                            <div class="number" id="myTargetElement4"></div>
                                        </div>
                                        <i class="livicon pull-right" data-name="users" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <small class="stat-label">Last Week</small>
                                            <h4 id="myTargetElement4.1"></h4>
                                        </div>
                                        <div class="col-xs-6 text-right">
                                            <small class="stat-label">Last Month</small>
                                            <h4 id="myTargetElement4.2"></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
                                         <select class="form-control level" name="users">
                                            <option value="">Chọn người trực</option>
                                            @foreach($data as $v)
                                            <option value="{{$v->name}}">{{$v->name}}</option>
                                            @endforeach
                                        </select>
                                     
                                    </div>
                                </div>
                                   <div class="form-group">
                                    <label for="first_name" class="col-sm-2 control-label">Chọn thứ </label>
                                            <div class="col-sm-10 editDate">
                                    
                                                <label>
                                                  <input class="checkhour" name="date[]" type="checkbox" value="1" id="mot">Chủ nhật
                                                </label>
                                                <label>
                                                  <input class="checkhour" name="date[]" type="checkbox" value="2" id="hai">Thứ hai
                                                </label>
                                                <label>
                                                  <input class="checkhour" name="date[]" type="checkbox" value="3" id="ba">Thứ ba
                                                </label>
                                                <label>
                                                  <input class="checkhour" name="date[]" type="checkbox" value="4" id="bon">Thứ tư
                                                </label>
                                                <label>
                                                  <input class="checkhour" name="date[]" type="checkbox" value="5" id="nam">Thứ năm
                                                </label>
                                                <label>
                                                  <input class="checkhour" name="date[]" type="checkbox" value="6" id="sau">Thứ sáu
                                                </label>
                                                <label>
                                                  <input class="checkhour" name="date[]" type="checkbox" value="7" id="bay">Thứ bảy
                                                </label>
                                                
                                                 <label>
                                                  <input class="checkall"  type="checkbox">All
                                                </label>   
                                        </div>
                                    </div>
                                        <div class="form-group">
                                            <label for="first_name" class="col-sm-2 control-label">Chọn giờ </label>
                                                <div class="col-sm-10">
                                                    <div class="fivety col-sm-6">
                                                                   <label>
                                                                       Từ giờ
                                                                   </label>
						                                        <div class="input-group">
						                                            <div class="input-group-addon">
						                                                <i class="livicon" data-name="alarm" data-size="14" data-loop="true"></i>
						                                            </div>
						                                            <input type="text" class="form-control startTime" id="clockface1" value="2:30 PM" data-format="hh:mm A" />
						                                        </div>

                                                               </div>
                                                               <div class="fivety col-sm-6">
                                                                   <label>
                                                                      Đến giờ
                                                                   </label>
                                                                   <div class="input-group">
						                                            <div class="input-group-addon">
						                                                <i class="livicon" data-name="alarm" data-size="14" data-loop="true"></i>
						                                            </div>
						                                            <input type="text" class="form-control endTime" id="clockface2" value="2:30 PM" data-format="hh:mm A" />
						                                        </div>
                                                                   
                                                               </div>
                                                </div>
                                            </div>
  

                
               
                <div class="form-group">
                    <p align="center">
                             
                      <button class="btn btn-success addItem">
                            <i class="livicon" data-name="plus-alt" data-size="20" data-c="#fff" data-hc="#fff" data-loop="true" id="livicon-153" style="width: 50px; height: 50px;">
                            </i>
                           Thêm mới
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
                <input type="hidden" value="{{url('')}}" id="url">
@endsection('content')
@section('script')
  <script src="js/app.js" type="text/javascript"></script>
<script type="text/javascript" src="vendors/datatables/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="vendors/datatables/js/dataTables.bootstrap.js"></script>
<script src="vendors/moment/js/moment.min.js" type="text/javascript"></script> 
 <script src="vendors/daterangepicker/js/daterangepicker.js" type="text/javascript"></script>

   <script src="vendors/datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
   <script src="vendors/clockface/js/clockface.js" type="text/javascript"></script>
   <script src="vendors/jasny-bootstrap/js/jasny-bootstrap.js" type="text/javascript"></script> 
    <script src="js/pages/datepicker.js" type="text/javascript"></script> 
    <script>
    $(document).ready(function() {
        $('#table').dataTable();

        $('.clickappend').click(function()
        {
            $('#sideLeft').toggleClass('collapse-left');
            $('#sideright').toggleClass('strech');
        });
        
         $('body').on('click','.editdata', function()
        {
           	$(".modal-header>b").html('Sửa lịch trực');
            var data = $(this).attr("data");
            //console.log('start',data.starttime);
            //var start = $(this).attr("start");
            //var end = Number($(this).attr("end"));*/*/

            /*var cars = $(this).attr("day");
             for (i = 0; i < cars.length; i++) { 
                   if(cars[i]==1)
                   {
                     $('#mot').prop( "checked", true );
                   }
                   if(cars[i]==2)
                   {
                     $('#hai').prop( "checked", true );
                   }
                   if(cars[i]==3)
                   {
                     $('#ba').prop( "checked", true );
                   }
                    if(cars[i]==4)
                   {
                     $('#bon').prop( "checked", true );
                   }
                    if(cars[i]==5)
                   {
                     $('#nam').prop( "checked", true );
                   }
                    if(cars[i]==6)
                   {
                     $('#sau').prop( "checked", true );
                   }
                    if(cars[i]==7)
                   {
                     $('#bay').prop( "checked", true );
                   }
                }*/
           
            var data2 = JSON.parse(data);
            console.log(data2.startTime);
            $('.startTime ').val(data2.startTime );
            $('.endTime ').text(data2.endtime );
           
           
        });

        $('body').on('click','.update', function()
        {
                var date = $(".checkhour:checked").map(function(){return $(this).val();}).get();
                var Ds = date.toString();
                var sT = $('.startTime').val();
                var En = $('.End').val();
                var li = $('.limited_value').val();
                var le = $('.level').val();
                var id = $('.idItem').val();
                var url = $('#url').val();
                if(Ds==''|| sT==''|| En==''|| li==''||le=='')
                {
                  alert('Bạn vui lòng nhập đầy đủ thông tin vào các mục');
                }else
                {
                     $.get( url+'/admin/fixerror/edit/'+id+'/'+Ds+'/'+sT+'/'+En+'/'+li+'/'+le, function(data){   
                         
                        $('.bodydata').html(data);
                        $('#modalLabelnews').html('');
                        $('.error_code').text('');
                        $('.limited_value').val('');
                        $('.leveldef').val('');
                        $('.leveldef').html('');
                        $('.idItem').val('');
                        $('.startTime').val('');
                      var checkboxes = document.getElementsByName('date[]');
                      for (var i = 0; i < checkboxes.length; i++){
                          checkboxes[i].checked = false;
                      }
                        $('.End').val('');
                        $('.pullDown').hide();
                        $('.modal-backdrop').hide();
                    });
                }
            
        })

        /*add item canh bao*/
         $('body').on('click','.addItem', function()
        {     //$("input[name='service_management']").val('');
             var users = $("select[name='users']").val();
             //console.log('user',users);
             var date = $(".checkhour:checked").map(function(){return $(this).val();}).get();
             //console.log(date);
             var Ds = JSON.stringify(date);
             console.log(Ds);
             var sT = $('.startTime').val();
             var En = $('.endTime ').val();
             //console.log(users,Ds,sT,En);

            var url = $('#url').val();
                if(users==''||Ds==''|| sT==''|| En =='')
                {
                  alert('Bạn vui lòng nhập đầy đủ thông tin vào các mục');
                }else
                {
                   $.get( url+'/admin/live/add/'+users+'/'+Ds+'/'+sT+'/'+En, function(data){
                          $('.bodydata').html(data);
                        $('.startTime').val('');
                        $('.endTime').val('');
                        $("select[name='users']").val('');
                        var checkboxes = document.getElementsByName('date[]');
                      for (var i = 0; i < checkboxes.length; i++){
                          checkboxes[i].checked = false;
                      }
                        $('.pullDown').hide();
                        $('.modal-backdrop').hide();
                    });
                }

            
        })
         /*endadditemcanhbao*/
         /*nut Reset*/
         $('body').on('click','.Reset', function()
         {

                        $('.error_code').val('');
                        $('.limited_value').val('');
                        $('.leveldef').val('');
                        $('.leveldef').html('');
                        $('.idItem').val('');
                        $('.startTime').val('');
                        $('.End').val('');
                    var checkboxes = document.getElementsByName('date[]');
                      for (var i = 0; i < checkboxes.length; i++){
                          checkboxes[i].checked = false;
                      }

         });

        $('body').on('click','.DeleteCb', function()
         {
                var id = $(this).attr('dataid');
                var url = $('#url').val();
                $.get( url+'/admin/fixerror/delete/'+id, function(data){
                         console.log(data);   
                        $('.bodydata').html(data);  
                    });

         });

       
         var clicked = false;
          $(".checkall").on("click", function() {
            $(".checkhour").prop("checked", !clicked);
            clicked = !clicked;
          });
    });

    </script>
@endsection('script')

