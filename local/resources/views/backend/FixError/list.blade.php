@extends('backend.master.index')
@section('header_style')
  <link rel="stylesheet" type="text/css" href="vendors/datatables/css/dataTables.bootstrap.css" />
  <link href="css/pages/tables.css" rel="stylesheet" type="text/css" />
  <link href="vendors/modal/css/component.css" rel="stylesheet" />
<link href="css/pages/advmodals.css" rel="stylesheet" /> 
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
                        <a href="{{url('admin/fixerror/list')}}">Ngưỡng cảnh báo</a>
                    </li>
                    <li class="active">Danh sách</li>

                </ol>
                    
                </h3>
                
               
            </section>
            <!-- Main content -->
            <section class="content paddingleft_right15">
                <div class="row" >
                   <div class="alertNotification">
                     
                    </div>
                    <div class="panel panel-primary ">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                               <i class="livicon" data-name="list-ol" data-size="20" data-c="#fff" data-hc="#fff" data-loop="true" id="livicon-266" style="width: 50px; height: 50px;">
                              
                              </i>
                                
                                Danh sách 
                                 <a href="{{url('admin/error/list')}}">
                                <i class="livicon" data-name="angle-double-right" data-size="15" data-c="#fff" data-hc="#fff" data-loop="true" id="livicon-218" style="width: 50px; height: 50px;"></i>
                            Sang trang list error
                        </a> 

                                
                            </h4>
                        </div>
                        <br />
                        <div class="panel-body error_ng">
                            <table class="table table-bordered " id="table">
                                <thead>
                                    <tr class="filters">
                                        <th id="stt">Stt</th>
                                        <th id="error_code">error_code</th>
                                      
                                        <th id="day_of_week">day_of_week</th>
                                        <th id="hour_of_day">hour_of_day</th>
                                        <th id="limited_value">limited_value</th>
                                      
                                        <th id="level">level</th>
                                        <th id="time">Người tạo/Thời gian tạo</th>
                                        
                                        <th id="action">Hành động</th>
                                       
                                    </tr>
                                </thead>
                                <tbody class="bodydata">
                                    @foreach($data as $k=>$val)
                                    <tr>
                                        <td>{{$k +1}}</td>
                                        <td>{{$val->error_code}}</td>
                                        <td> 
                                        <?php 
                                            
                                            
                                      $day = str_replace(","," ",$val->day_of_week); 
                                      $dayE = (explode(' ', $day));

                                              if(isset($dayE))
                                          {
                                            foreach($dayE as $v)
                                            {
                                                if($v==1)
                                                {
                                                    echo 'Chủ nhật<br>';
                                                }
                                                if($v==2)
                                                {
                                                    echo 'Thứ hai<br>';
                                                }
                                                if($v==3)
                                                {
                                                    echo 'Thứ ba<br>';
                                                }
                                                if($v==4)
                                                {
                                                    echo 'Thứ tư<br>';
                                                }
                                                if($v==5)
                                                {
                                                    echo 'Thứ năm<br>';
                                                }
                                                if($v==6)
                                                {
                                                    echo 'Thứ sáu <br>';
                                                }
                                                if($v==7)
                                                {
                                                    echo 'Thứ bảy';
                                                }

                                            }
                                          }else
                                          {
                                            echo 'null';
                                          }
                                           
                                        ?>

                                        </td>
                                        <td>  
											
                                            <?php 
                                              $d2Ex = explode("-", $val->hour_of_day); 
                                              $daoArr = array_reverse($d2Ex);
                                              echo 'Từ '.$d2Ex[0].'h';
                                              echo "-";
                                              echo  $daoArr[0] .'h';
                                            ?>

                                        </td>
                                       <td>  {{$val->limited_value}}</td>
                                       <td>  {{$val->level}}</td>
                                       <td>  
                                        <span>User:{{$val->user}}</span>
                                        <br>
                                        <span>Time:{{date('d-m-Y H:i:s',strtotime($val->time))}}</span>
                                      </td>
                                        <td>
                                            <p align="left">
                                                
                                                <button class="btn btn-warning btnedit" data-toggle="modal" data-target="#modalfixError" data ="{{$val}}" 
                                                  start ="<?php 
                                                  $d2Ex = explode("-", $val->hour_of_day); 
                                                  echo $d2Ex[0];  
                                                  ?>" 
                                                  end="<?php 
                                                  $d2Ex = explode("-", $val->hour_of_day); 
                                                  $daoArr = array_reverse($d2Ex);
                                                  echo  $daoArr[0];
                                                  ?>"
                                                  day="<?php 
                                                  $day = str_replace(","," ",$val->day_of_week); 
                                                  
                                                  $dayE = (explode(' ', $day));
                                                  print_r($dayE);
                                                  ?>"
                                                   >
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                  </button>
                                                  @if(Auth::user()->level==2)
                                                 <button  class="btn btn-danger DeleteCb" dataid ="{{$val->id}}">
                                                 <i class="fa fa-trash-o" aria-hidden="true"></i>  
                                                </button> 
                                                @elseif(Auth::user()->level==1)
                                                 <button  class="btn btn-danger"  onclick="return confirm('Bạn không đủ quyền thực hiện chức năng này ?');">
                                                 <i class="fa fa-trash-o" aria-hidden="true"></i>  
                                                </button>
                                                @elseif(Auth::user()->level==1)
                                                 <button  class="btn btn-danger" onclick="return confirm('Bạn không đủ quyền thực hiện chức năng này ?');">
                                                 <i class="fa fa-trash-o" aria-hidden="true"></i>  
                                                </button>
                                                @endif
                                             
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
             <div class="modal fade in pullDown" id="modalfixError" role="dialog" aria-labelledby="modalLabelnews">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-warning">

                                <h4 class="modal-title" >
                                    <i class="livicon" data-name="hand-right" data-size="20" data-c="#fff" data-hc="#fff" data-loop="true" id="livicon-241" style="width: 50px; height: 50px;">
                                      <span id="modalLabelnews">
                                        
                                      </span>
                                   
                                </i>
                                </h4>
                            </div>
                            <div class="modal-body bodyfixerror">
                               <div class="form-group">
                                <label for="first_name" class="col-sm-2 control-label">Error_code </label>
                                    <div class="col-sm-10">
                                        <div class="form-group error_code"></div>
                                     
                                    </div>
                                </div>
                                   <div class="form-group">
                                    <label for="first_name" class="col-sm-2 control-label">Chọn ngày </label>
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
                                                                   <div class="input-group setTime">
                                                                       <div class="IconTime">
                                                                          <i class="fa fa-clock-o" aria-hidden="true"></i>
                                                                       </div>
                                                                       <input name="startTime" value="" type="number" class="form-control startTime" required="" />
                                                                   </div>

                                                               </div>
                                                               <div class="fivety col-sm-6">
                                                                   <label>
                                                                      Đến giờ
                                                                   </label>
                                                                   <div class="input-group setTime">
                                                                       <div class="IconTime">
                                                                         <i class="fa fa-clock-o" aria-hidden="true"></i>
                                                                       </div>
                                                                       <input name="endTime" value="" type="number" class="form-control End" required="" />
                                                                   </div>
                                                               </div>
                                                </div>
                                            </div>
  

                <div class="form-group ">
                <label for="first_name" class="col-sm-2 control-label">Limited_value</label>
                    <div class="col-sm-10 mg10">
                        <input type="number" class="form-control limited_value" name="limited_value" value="" required="">
                    </div>
                </div>
                 <div class="form-group mg10">
                <label for="first_name" class="col-sm-2 control-label">Level</label>
                    <div class="col-sm-10 mg10">
                        <select class="form-control level" name="level" required="">
                                            <option value="" class="leveldef"></option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            
                                        </select>
                        <input type="hidden" value="" class="idItem">
                        
                    </div>
                </div>
                <div class="form-group">
                    <p align="center">
                              <button class="btn btn-primary update" >
                          <i class="livicon" data-name="mail" data-size="20" data-c="#fff" data-hc="#fff" data-loop="true" id="livicon-134" style="width: 50px; height: 50px;">
                     
                          </i>
                        Update
                      </button>
                      <button class="btn btn-success addItem">
                            <i class="livicon" data-name="plus-alt" data-size="20" data-c="#fff" data-hc="#fff" data-loop="true" id="livicon-153" style="width: 50px; height: 50px;">
                            </i>
                            Add
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
<script type="text/javascript" src="vendors/datatables/js/jquery.dataTables2.js"></script>
<script type="text/javascript" src="vendors/datatables/js/dataTables.bootstrap.js"></script>
  <script src="vendors/iCheck/js/icheck.js"></script>
    <script>
    $(document).ready(function() {
        $('#table').dataTable();
         $('body').on('click','.btnedit', function()
        {
            var data = $(this).attr("data");
            var start = $(this).attr("start");
            var end = Number($(this).attr("end"));

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
            $('#modalLabelnews').html(data2.error_code);
            $('.error_code').text(data2.error_code);
            $('.limited_value').val(data2.limited_value);
            $('.leveldef').val(data2.level);
            $('.leveldef').html(data2.level);
            $('.idItem').val(data2.id);
            $('.startTime').val(start);
            $('.End').val(end);
           
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
                        $('.alertNotification').show(1000);
                        $('.alertNotification').text('Sửa thành công');
                        $('.alertNotification').css({'background':'#01bc8c'});
                          setTimeout(function(){ $('.alertNotification').hide(3000);}, 4000);


                        $('.pullDown').hide();
                        $('.modal-backdrop').hide();
                    });
                }
            
        })

        /*add item canh bao*/
         $('body').on('click','.addItem', function()
        {
             var er = $('.error_code').text();
             var date = $(".checkhour:checked").map(function(){return $(this).val();}).get();
                var Ds = date.toString();
                var sT = $('.startTime').val();
                var En = $('.End').val();
                var li = $('.limited_value').val();
                var le = $('.level').val();
                var id = $('.idItem').val();
                var url = $('#url').val();
                if(Ds==''||sT==''|| En==''|| li ==''||le=='')
                {
                  alert('Bạn vui lòng nhập đầy đủ thông tin vào các mục');
                }else
                {
                   $.get( url+'/admin/fixerror/add/'+er+'/'+Ds+'/'+sT+'/'+En+'/'+li+'/'+le, function(data){   
                        $('.bodydata').html(data);
                        $('#modalLabelnews').html('');
                        $('.error_code').text('');
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

                        $('.alertNotification').show(1000);
                        $('.alertNotification').text('Thêm thành công');
                        $('.alertNotification').css({'background':'#01bc8c'});
                          setTimeout(function(){ $('.alertNotification').hide(1000);}, 2000);






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
                         //console.log(data);   
                        $('.bodydata').html(data); 
                        $('.alertNotification').show(1000);
                        $('.alertNotification').text('Xóa thành công');
                        $('.alertNotification').css({'background':'#e63834'});
                          setTimeout(function(){ $('.alertNotification').hide(3000);}, 4000); 
                    });

         });

       
         var clicked = false;
          $(".checkall").on("click", function() {
            $(".checkhour").prop("checked", !clicked);
            clicked = !clicked;
          });

          $(".checkhour").prop("checked", 'checked');
    });

    </script>
@endsection('script')

