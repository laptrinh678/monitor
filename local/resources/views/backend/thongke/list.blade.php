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
                        <a href="{{url('admin/error/list')}}">Lỗi</a>
                    </li>
                    <li class="active">Danh sách lỗi 

            </li>
                    
                </ol>
                    
                </h3>
                
               
            </section>
            <!-- Main content -->
            <section class="content paddingleft_right15">
                <div class="alertNotification">
                     
                </div>
                <div class="row">
                    @include('errors.note')
                    <div class="panel panel-primary ">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                            <a href="javascript::voild(0)" data-toggle="modal" data-target="#adderror">
                                <i class="livicon" data-name="plus" data-size="20" data-c="#fff" data-hc="#fff" data-loop="true" id="livicon-152" style="width: 50px; height: 50px;">  
                                </i>Tạo mới
                            </a> 
                            </h4>
                        </div>
                        <br />
                        <div class="panel-body bodydata">
                            <table class="table table-bordered errortable" id="table">
                                <thead>
                                    <tr class="filters">
                                        <th>Stt</th>
                                        <th>Thời gian</th>
                                       
                                        <th>Dịch vụ ảnh hưởng
                                            <br>
                                            ĐV chịu trách nhiệm
                                        </th>
                                 
                                        <th>
                                            Tình trạng lỗi
                                            <br>
                                             Nguyên nhân gốc
                                        </th>
                                       
                                        <th>
                                            HĐ và hướng XL
                                            <br>GP khắc phục lâu dài
                                        </th>

                                        <th>TG gián đoạn <br>TG khắc phục</th>
                                     
                                        <th>SL giao dịch AH <br> SL khách hàng AH</th>
                                        <th>Giá trị giao dịch AH</th>
                                      
                                        <!-- <th>File xử lý</th> -->
                                     
                                        <th>Hành động</th>
                                     
                                    </tr>
                                </thead>
                                <tbody class="listservice" id="listdatatable">
                                   @foreach($data as $k=>$v)
                                    <tr>
                                        <td>{{$k}}</td>
                                        <td>
                                         <p>TG bắt đầu</p>
                                        {{date('d-m-Y',strtotime($v->starttime))}}
                                         <br>
                                         <p>TG kết thúc</p>
                                         {{date('d-m-Y',strtotime($v->endtime))}}
                                        </td>
                                      
                                        <td> 
                                            <p> DV ảnh hưởng:</p>
                                           {{$v->service_affected}}
                                            <br>
                                            <p>ĐV chịu trách nhiệm</p>
                                              {{$v->responsible_unit}}
                                        </td>
                                       
                                         <td class="errorNa">
                                            <p>Tình trạng lỗi</p>
                                            {{$v->error_status}}
                                           <br>
                                           <p>Nguyên nhân gốc</p>
                                            {{$v->original_cause}}
                                         </td>
                                       
                                        <td>
                                            <p>HĐ và hướng XL</p>
                                            {{$v->action_direction}}
                                            <p>GP khắc phục</p>
                                            {{$v->solutions}}
                                        </td>
                                        <td>
                                        <p>TG Gián đoạn</p>
                                        {{$v->interruption_time}}
                                        <p>TG khắc phục</p>
                                        {{$v->time_overcome}}

                                        </td>
                                       
                                         <td>
                                            <p>SL GD AH</p>
                                             {{$v->customers_affected}}
                                             <p>SL KH AH</p>
                                             {{$v->value_affected}}
                                         </td>
                                         
                                         
                                       
                                       
                                         <!-- <td> {{$v->file}}</td> -->
                                         <td> {{$v->transaction_value}}</td>
                                         <td>
                                             <button  class="btn btn-raised btn-warning editdata" 
                                           data='{{$v}}' data-toggle="modal" data-target="#editerror_im">
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                            </button>
                                             @if(Auth::user()->level==2)

                                            <button class="btn btn-raised btn-danger deleteitem" dataid="{{$v->id}}" error_code="">
                                               <i class="fa fa-trash-o" aria-hidden="true"></i> 
                                           </button>
                                           @elseif(Auth::user()->level==1)
                                           <button class="btn btn-raised btn-danger" onclick="return confirm('Bạn không đủ quyền thực hiện chức năng này ?');">
                                               <i class="fa fa-trash-o" aria-hidden="true"></i> 
                                           </button>
                                            @elseif(Auth::user()->level==0)
                                           <button class="btn btn-raised btn-danger" onclick="return confirm('Bạn không đủ quyền thực hiện chức năng này ?');">
                                               <i class="fa fa-trash-o" aria-hidden="true"></i> 
                                           </button>
                                           @endif
                                         </td>
                                        
                                      </tr>
                                      @endforeach 
                                   
                                </tbody>
                            </table>
                            
                        </div>
                    </div>
                </div>
                <!-- row-->
            </section>
            <!-- modal add -->
            <div class="modal fade stretchLeft" id="adderror" role="dialog" aria-labelledby="modalLabelsidefall1">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-warning">
                                <h4 class="modal-title" id="modalLabelsidefall1">Sửa ReportError</h4>
                            </div>
                            <div class="modal-body">
                                <form method="post" enctype="multipart/form-data" id="upload_form">
                                  <div class="form-horizontal" id="formadd">
                                    <div class="form-group">
                                    <label for="first_name" class="col-sm-3 control-label">Thời gian bắt đầu  </label>
                                        <div class="col-sm-9">
                                            <input type="date" class="form-control starttime" name="starttime">
                                            <span style="color: red">{{$errors->first('starttime')}}</span>
                                          
                                        </div>
                                    </div>

                                    <div class="form-group">
                                    <label for="first_name" class="col-sm-3 control-label">Thời gian kết thúc </label>
                                        <div class="col-sm-9">
                                            
                                           <input type="date" class="form-control endtime" name="endtime">
                                            <span style="color: red">{{$errors->first('endtime')}}</span>

                                        </div> 
                                    </div>

                                    <div class="form-group">
                                    <label for="first_name" class="col-sm-3 control-label">DV ảnh hưởng </label>
                                        <div class="col-sm-9">
                                            <input type="text" class="service_affected form-control" name="service_affected" >
                                           <span style="color: red">{{$errors->first('service_affected')}}</span>
                                           
                                        </div>
                                    </div>
                                     <div class="form-group">
                                    <label for="first_name" class="col-sm-3 control-label">ĐV chịu trách nhiệm </label>
                                        <div class="col-sm-9">
                                            <input type="text" class="responsible_unit form-control" name="responsible_unit">
                                           <span style="color: red">{{$errors->first('responsible_unit')}}</span>
                                           
                                        </div>
                                    </div>
                                    <div class="form-group">
                                    <label for="first_name" class="col-sm-3 control-label">Tình trạng lỗi</label>
                                    
                                        <div class="col-sm-9">
                                           <textarea class="error_status form-control" rows="3" name="error_status" autofocus>
                                               
                                           </textarea>
                                          
                                           <span style="color: red">{{$errors->first('error_status')}}</span>
                                        </div> 
                                    </div>

                                     <div class="form-group">
                                    <label for="first_name" class="col-sm-3 control-label">Nguyên nhân gốc</label>
                                    
                                        <div class="col-sm-9">
                                           <textarea id="addsolve" class="original_cause form-control" rows="3" name="original_cause" autofocus>
                                               
                                           </textarea>
                                          
                                           <span style="color: red">{{$errors->first('original_cause')}}</span>
                                        </div> 
                                    </div>

                                     <div class="form-group">
                                    <label for="first_name" class="col-sm-3 control-label">HĐ và hướng XL</label>
                                    
                                        <div class="col-sm-9">
                                           <textarea id="addsolve" class="action_direction form-control" rows="3" name="action_direction" autofocus>
                                               
                                           </textarea>
                                          
                                           <span style="color: red">{{$errors->first('action_direction')}}</span>
                                        </div> 
                                    </div>
                                    <div class="form-group">
                                    <label for="first_name" class="col-sm-3 control-label">Giải pháp khắc phục lâu dài</label>
                                    
                                        <div class="col-sm-9">
                                           <textarea class="solutions form-control" rows="3" name="solutions" autofocus>
                                               
                                           </textarea>
                                          
                                           <span style="color: red">{{$errors->first('solutions')}}</span>
                                        </div> 
                                    </div>
                                    <div class="form-group">
                                        <label for="first_name" class="col-sm-3 control-label">Upload file <br>Hướng dẫn xử lý</label>
                                        <div class="col-sm-9">
                                            <input type="file" name="file" class="file">
                                        </div>
                                    </div>
                                    
                                     <div class="form-group">
                                    <label for="first_name" class="col-sm-3 control-label">TG gián đoạn</label>
                                        <div class="col-sm-3">
                                           <input type="number" name="interruption_time" class=" form-control interruption_time">
                                        </div>
                                     <label for="first_name" class="col-sm-3 control-label">TG khắc phục</label>
                                        <div class="col-sm-3">
                                           <input type="number" name="time_overcome"  class=" form-control time_overcome" >
                                        </div>
                                    </div>

                                     
                                  


                                    <div class="form-group">
                                    <label for="first_name" class="col-sm-3 control-label">SL giao dịch AH</label>
                                        <div class="col-sm-3">
                                           <input type="number" name="customers_affected" class=" form-control customers_affected">
                                        </div>
                                     <label for="first_name" class="col-sm-3 control-label">SL khách hàng AH</label>
                                        <div class="col-sm-3">
                                           <input type="number" name="value_affected" class=" form-control value_affected" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="first_name" class="col-sm-3 control-label">Giá trị GD AH</label>
                                        <div class="col-sm-9">
                                            <input type="number" name="transaction_value" class="form-control transaction_value">
                                        </div>
                                    </div>
                                    <div class="space-4"></div>
                                    <div class="clearfix form-actions">
                                        <div class="col-md-offset-3 col-md-9">
                                            <button type="submit" class="btn btn-primary" >Thêm mới</button>
                                             &nbsp; &nbsp; &nbsp;
                                            <button class="btn btn-danger" type="reset">Reset</button>    
                                        </div>
                                    </div>
                                    
                                </div>
                                {{csrf_field()}}
                            </form>
                            </div>
                            <div class="modal-footer">
                                <button class="btn" data-dismiss="modal">Close me!</button>
                            </div>
                        </div>
                    </div>
                </div>
                 <!-- modal edit -->
            <div class="modal fade stretchLeft" id="editerror_im" role="dialog" aria-labelledby="modalLabelsidefall1">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-warning">
                                <h4 class="modal-title" id="modalLabelsidefall1">Sửa thông tin lỗi</h4>
                            </div>
                            <div class="modal-body">
                                 <form method="post" enctype="multipart/form-data" id="edit_item">
                                            <div class="form-horizontal" id="formadd">
                                    <div class="form-group">
                                    <label for="first_name" class="col-sm-3 control-label">Thời gian bắt đầu  </label>
                                        <div class="col-sm-9">
                                            <input type="date" class="form-control starttime" name="starttime">
                                            <span style="color: red">{{$errors->first('starttime')}}</span>
                                          
                                        </div>
                                    </div>

                                    <div class="form-group">
                                    <label for="first_name" class="col-sm-3 control-label">Thời gian kết thúc </label>
                                        <div class="col-sm-9">
                                            
                                           <input type="date" class="form-control endtime" name="endtime">
                                            <span style="color: red">{{$errors->first('endtime')}}</span>

                                        </div> 
                                    </div>

                                    <div class="form-group">
                                    <label for="first_name" class="col-sm-3 control-label">DV ảnh hưởng </label>
                                        <div class="col-sm-9">
                                            <input type="text" class="service_affected form-control" name="service_affected" >
                                           <span style="color: red">{{$errors->first('service_affected')}}</span>
                                           
                                        </div>
                                    </div>
                                     <div class="form-group">
                                    <label for="first_name" class="col-sm-3 control-label">ĐV chịu trách nhiệm </label>
                                        <div class="col-sm-9">
                                            <input type="text" class="responsible_unit form-control" name="responsible_unit">
                                           <span style="color: red">{{$errors->first('responsible_unit')}}</span>
                                           
                                        </div>
                                    </div>
                                    <div class="form-group">
                                    <label for="first_name" class="col-sm-3 control-label">Tình trạng lỗi</label>
                                    
                                        <div class="col-sm-9">
                                           <textarea  class="error_status form-control" rows="3" name="error_status" autofocus>
                                               
                                           </textarea>
                                          
                                           <span style="color: red">{{$errors->first('error_status')}}</span>
                                        </div> 
                                    </div>

                                     <div class="form-group">
                                    <label for="first_name" class="col-sm-3 control-label">Nguyên nhân gốc</label>
                                    
                                        <div class="col-sm-9">
                                           <textarea class="original_cause form-control" rows="3" name="original_cause" autofocus>
                                               
                                           </textarea>
                                          
                                           <span style="color: red">{{$errors->first('original_cause')}}</span>
                                        </div> 
                                    </div>

                                     <div class="form-group">
                                    <label for="first_name" class="col-sm-3 control-label">HĐ và hướng XL</label>
                                    
                                        <div class="col-sm-9">
                                           <textarea class="action_direction form-control" rows="3" name="action_direction" autofocus>
                                               
                                           </textarea>
                                          
                                           <span style="color: red">{{$errors->first('action_direction')}}</span>
                                        </div> 
                                    </div>
                                    <div class="form-group">
                                    <label for="first_name" class="col-sm-3 control-label">Giải pháp khắc phục lâu dài</label>
                                    
                                        <div class="col-sm-9">
                                           <textarea class="solutions form-control" rows="3" name="solutions" autofocus>
                                               
                                           </textarea>
                                          
                                           <span style="color: red">{{$errors->first('solutions')}}</span>
                                        </div> 
                                    </div>
                                    <div class="form-group">
                                        <label for="first_name" class="col-sm-3 control-label">Upload file <br>Hướng dẫn xử lý</label>
                                        <div class="col-sm-9">
                                            <input type="file" name="file" class="file">
                                        </div>
                                    </div>
                                    
                                     <div class="form-group">
                                    <label for="first_name" class="col-sm-3 control-label">TG gián đoạn</label>
                                        <div class="col-sm-3">
                                           <input type="number" name="interruption_time" class=" form-control interruption_time">
                                        </div>
                                     <label for="first_name" class="col-sm-3 control-label">TG khắc phục</label>
                                        <div class="col-sm-3">
                                           <input type="number" name="time_overcome"  class=" form-control time_overcome" >
                                        </div>
                                    </div>

                                     
                                  


                                    <div class="form-group">
                                    <label for="first_name" class="col-sm-3 control-label">SL giao dịch AH</label>
                                        <div class="col-sm-3">
                                           <input type="number" name="customers_affected" class=" form-control customers_affected">
                                        </div>
                                     <label for="first_name" class="col-sm-3 control-label">SL khách hàng AH</label>
                                        <div class="col-sm-3">
                                           <input type="number" name="value_affected" class=" form-control value_affected" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="first_name" class="col-sm-3 control-label">Giá trị GD AH</label>
                                        <div class="col-sm-9">
                                            <input type="number" name="transaction_value" class="form-control transaction_value">
                                            <input type="hidden" id="iditemedit" name="idedit">
                                        </div>
                                    </div>
                                    <div class="space-4"></div>
                                    <div class="clearfix form-actions">
                                        <div class="col-md-offset-3 col-md-9">
                                            <button type="submit" class="btn btn-primary" >Sửa thông tin</button>
                                             &nbsp; &nbsp; &nbsp;
                                            <button class="btn btn-danger" type="reset">Reset</button>    
                                        </div>
                                    </div>
                                    
                                </div>
                                {{csrf_field()}}

                               
                                 </form>
                            </div>
                            <div class="modal-footer">
                                <button class="btn" data-dismiss="modal">Close me!</button>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" value="{{url('')}}" id="url">
@endsection('content')
@section('script')
   <script src="js/app.js" type="text/javascript"></script>
    <!-- end of global js -->
    <!-- begining of page level js -->
    <script type="text/javascript" src="vendors/datatables/js/jquery.dataTables2.js"></script>
    <script type="text/javascript" src="vendors/datatables/js/dataTables.bootstrap.js"></script>
    <script>
    $(document).ready(function() {
        /*đoạn này liên quan đến phân trang của datatable*/
         $('#table').dataTable();
         $('body').on('click','.deleteitem', function()
        {
            var id = $(this).attr('dataid');
            var error_code = $(this).attr('error_code');
            var url = $('#url').val();
           $.get(url+'/admin/error/delete/'+id + '/'+ error_code, function(data)
           {
                 $('.listservice').html(data);
                 $('.alertNotification').show(3000);
                 $('.alertNotification').text('Xóa thành công');
                 $('.alertNotification').css({'background':'#e63834'});
                setTimeout(function(){ $('.alertNotification').hide(6000);}, 6000);
           });
        });
         /*chức năng sửa*/
         $('body').on('click','.editdata', function()
         {
                var data = $(this).attr('data');
                var data2 = JSON.parse(data);
                $('#editerror_im .starttime').val(data2.starttime);
                $("#editerror_im .endtime").val(data2.endtime);
                $("#editerror_im .service_affected").val(data2.service_affected );
                $("#editerror_im .responsible_unit ").val(data2.responsible_unit );
                $("#editerror_im .error_status").val(data2.error_status);
                $("#editerror_im .original_cause ").val(data2.original_cause );
                $("#editerror_im .action_direction  ").val(data2.action_direction);
                $("#editerror_im .solutions").val(data2.solutions);
                $("#editerror_im .file ").val(data2.file );
                $("#editerror_im .interruption_time ").val(data2.interruption_time);
                $("#editerror_im .time_overcome ").val(data2.time_overcome );
                $("#editerror_im .customers_affected ").val(data2.customers_affected);
                $("#editerror_im .value_affected ").val(data2.value_affected);
                $("#editerror_im .transaction_value ").val(data2.transaction_value );
                $("#editerror_im #iditemedit").val(data2.id);
         });
          
        /*thêm mới lỗi*/
         $('#upload_form').on('submit', function(event)
         {
            event.preventDefault();
            $.ajax({
             url:"{{ route('errorReport')}}",
             method:"POST",
             data:new FormData(this),
             //dataType:'JSON',
             contentType: false,
             cache: false,
             processData: false,
             success:function(data)
             {
                  
                         $('#listdatatable').html(data);
                         $('#adderror .error_code_e').val('');
                         $('#adderror .process_code').val('');
                         $("#adderror .error_name").val('');
                         $("#addsolve").val('');
                         $('#adderror .statusmess').prop('checked', false);
                         $("#adderror .status").val('');
                         $('.stretchLeft').hide();
                         $('.modal-backdrop').hide();
                         $('.alertNotification').show(3000);
                         $('.alertNotification').text('Thêm thành công');
                         $('.alertNotification').css({'background':'#01bc8c'});
                          setTimeout(function(){ $('.alertNotification').hide(5000);}, 5000);
                    
             }
            })
         });

// edit item

 $('#edit_item').on('submit', function(event)
         {
            event.preventDefault();
            $.ajax({
             url:"{{route('errorReportedit')}}",
             method:"POST",
             data:new FormData(this),
             //dataType:'JSON',
             contentType: false,
             cache: false,
             processData: false,
             success:function(data)
             {
                  $('#listdatatable').html(data);
                  
                $('#editerror_im .starttime').val('');
                $("#editerror_im .endtime").val('');
                $("#editerror_im .service_affected").val('');
                $("#editerror_im .responsible_unit ").val('');
                $("#editerror_im .error_status").val('');
                $("#editerror_im .original_cause ").val('');
                $("#editerror_im .action_direction  ").val('');
                $("#editerror_im .solutions").val('');
                $("#editerror_im .file ").val('');
                $("#editerror_im .interruption_time ").val('');
                $("#editerror_im .time_overcome ").val('');
                $("#editerror_im .customers_affected ").val('');
                $("#editerror_im .value_affected ").val('');
                $("#editerror_im .transaction_value ").val('');
                $("#editerror_im #iditemedit").val('');
                $('.stretchLeft').hide();
                $('.modal-backdrop').hide();
                $('.alertNotification').show(3000);
                $('.alertNotification').text('Sửa thành công');
                $('.alertNotification').css({'background':'#F89A14'});
                  setTimeout(function(){ $('.alertNotification').hide(5000);}, 5000);
             }
            })
         });


       /* $( ".additemerror" ).click(function() 
        {     
              var slove = $(".solve").val().trim();
              var item ={};
              item.error_code = $(".error_code_e").val();
              item.process_code = $(".process_code").val();
              item.error_name = $(".error_name").val();
              item.solve = slove;
              item.statusmess = $('.statusmess').val();
              item.status = $('.status').val();
              if(item.error_code=='' || item.process_code=='' || item.error_name==''||item.solve=='')
              {
                alert('Bạn vui lòng nhập đầy đủ thông tin các phần error_code,process_code,error_name,solve')
              }else
              {
                  var itemJson = JSON.stringify(item);
                  var url = $('#url').val();
                  $.get(url+'/admin/error/add/'+itemJson, function(data)
                  {
                    if(data=='0')
                    {
                        alert('Error_code và Process_code bị trùng Bạn vui lòng sửa lại')
                    }else
                    {     
                         $('#listdatatable').html(data);
                         $('.stretchLeft').hide();
                         $('.modal-backdrop').hide();
                         $('.error_code_e').html('');
                         $('.process_code').val('');
                         $(".error_name").val('');
                         $(".solve").val('');
                         $(".statusmess").val('');
                         $(".status").val('');
                        $('.alertNotification').show(3000);
                        $('.alertNotification').text('Thêm thành công');
                        $('.alertNotification').css({'background':'#01bc8c'});
                          setTimeout(function(){ $('.alertNotification').hide(5000);}, 5000);
                    }
                  });
              }
        });*/





        /*thay doi trang thai nut tat bat canh báo*/
        var ckbox1 = $('.statusmess');
        $('.statusmess').on('click',function () 
        {

                    if (ckbox1.is(':checked')) {
                        $(this).val(1);
                    } else {
                        $(this).val(0);
                    }
        });
        /*end thay doi trang thai nut tat bat canh báo*/
        /*thay doi trang thai*/
         var ckbox = $('#adderror .status');
        $('#adderror .status').on('click',function () {
                    if (ckbox.is(':checked')) {
                        $(this).val(1);
                    } else {
                        $(this).val(0);
                    }
                });
        /*end thay doi trang thai*/
         var ckbox3 = $('#editerror .status');
        $('#editerror .status').on('click',function () {
                    if (ckbox3.is(':checked')) {
                        $(this).val(1);
                    } else {
                        $(this).val(0);
                    }
                });

        /*thay doi trang thai nut tat bat canh báo*/
        var ckbox2 = $('#editerror .statusmess');
        $('#editerror .statusmess').on('click',function () 
        {

                    if (ckbox2.is(':checked')) {
                        $(this).val(1);
                    } else {
                        $(this).val(0);
                    }
        });
        /*sửa thông tin lỗi 18/5/2018 */
       $( ".editItem" ).click(function() 
        {     
              var slove = $("#editerror .solve").val().trim();
              var item ={};
              item.error_code = $("#editerror .error_code_e").val();
              item.process_code = $("#editerror .process_code").val();
              item.error_name = $("#editerror .error_name").val();
              item.solve = slove;
              item.statusmess = $('#editerror .statusmess').val();
              item.status = $('#editerror .status').val();
              var id = $('#iditem').val();
              if(item.error_code=='' || item.process_code=='' || item.error_name==''||item.solve=='')
              {
                alert('Bạn vui lòng nhập đầy đủ thông tin các phần error_code,process_code,error_name,solve')
              }else
              {
                  var itemJson = JSON.stringify(item);
                  var url = $('#url').val();
                  $.get(url+'/admin/error/edit/'+itemJson+'/'+id, function(data)
                  {
                    if(data=='0')
                    {
                        alert('Error_code và Process_code bị trùng Bạn vui lòng sửa lại')
                    }else
                    {
                        //console.log(data);
                         $('#listdatatable').html(data);
                         $('.error_code_e').html('');
                         $('.process_code').val('');
                         $(".error_name").val('');
                         $(".solve").val('');
                         $(".statusmess").val('');
                         $(".status").val('');   
                         $('.stretchLeft').hide();
                        $('.modal-backdrop').hide();
                        $('.alertNotification').show(3000);
                        $('.alertNotification').text('Sửa thành công');
                        $('.alertNotification').css({'background':'#F89A14'});
                          setTimeout(function(){ $('.alertNotification').hide(5000);}, 5000);
                    }
                  });
              }
        });
       /*end sửa thông tin lỗi*/  
       /*ajax thay doi trang thai loi*/

           $('body').on('click','.activebt', function()
        {
           var id = $(this).attr('dataid');
           var active = $(this).attr('data');
           if(active==1)
           {
               var ac=0;
               var url = $('#url').val();
               var thiss = $(this);
               //console.log(ac);
              $.get(url+'/admin/error/status/'+ac +'/'+id, function(data)
               {
                    //console.log(data);
                    thiss.parent().html(data); 
               });
           }else
           {
              var ac = 1;
              var url = $('#url').val();
              var thiss = $(this);
               //console.log(ac);
              $.get(url+'/admin/error/status/'+ac +'/'+id, function(data)
               {
                    thiss.parent().html(data); 
               });
           }
         });
       /*end thay doi trang thai loi*/
        /*thay doi trang thai nút nhận tin nhắn về diện thoại*/

         $('body').on('click','.statusMe ', function()
        {
           var id = $(this).attr('dataid');
           var active = $(this).attr('data');
           if(active==1)
           {
               var ac=0;
               var url = $('#url').val();
               var thiss = $(this);
              $.get(url+'/admin/error/statusMe/'+ac +'/'+id, function(data)
               {
                    thiss.parent().html(data); 
               });
           }else
           {
              var ac = 1;
              var url = $('#url').val();
              var thiss = $(this);
             $.get(url+'/admin/error/statusMe/'+ac +'/'+id, function(data)
               {
                    thiss.parent().html(data); 
               });
           }
         });
        /*end trạng thai nut nhận tin nhắn về điện thoại*/
    });


    </script>
@endsection('script')

