@extends('backend.master.index')
@section('header_style')
 <link href="css/app.css" rel="stylesheet" type="text/css" />
    <!-- end of global css -->
    <!--page level css -->
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
                             <a href="{{url('admin/fixerror/list')}}">
                                <i class="livicon" data-name="angle-double-right" data-size="15" data-c="#fff" data-hc="#fff" data-loop="true" id="livicon-218" style="width: 50px; height: 50px;"></i>
                            Sang trang Ngưỡng cảnh báo
                        </a> 
                            </h4>
                        </div>
                        <br />
                        <div class="panel-body bodydata">
                            <table class="table table-bordered errortable" id="table">
                                <thead>
                                    <tr class="filters">
                                        <th>Stt</th>
                                        <th>Error_code</th>
                                        <th>
                                          Process_code
                                        </th>
                                        <th>Error_name</th>
                                        <th>Solve <br>(Cách khắc phục)</th>
                                        <th>Phonenumber</th>
                                        <th>
                                            Người tạo <br>Ngày tạo
                                        </th>
                                        <th>Trạng thái /<br>Gửi tin nhắn</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody class="listservice" id="listdatatable">
                                    @foreach($data as $k=>$val)
                                    <tr>
                                        <td>{{$k +1}}</td>
                                        <td>{{$val->error_code}}</td>
                                        <td>    
                                           {{$val->process_name}}
                                        </td>
                                        <td> 
                                         {{$val->error_name}}
                                        </td>
                                        <td class="imformation">
                                           <p>{{$val->solve}}</p>
                                            @if($val->filename != '')
                                            <p class="filename"> 
                                                {{$val->filename}} 
                                               </p>
                                               <p> <span>Dowload</span>: File hướng dẫn
                                                <a href="{{url('admin/error/dowload')}}/{{$val->filename}}" class="dowload">
                                                    <i class="fa fa-cloud-download" aria-hidden="true"></i>
                                               </a> 
                                              </p>   
                                            @else
                                            {{''}}
                                            @endif          
                                        </td>
                                         <td class="errorNa">
                                            <?php 
                                             echo substr( $val->phonenumber,0,12 ).'...';
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
                                         <br>
                                         Ngày tạo:
                                         {{date('d-m-Y H:i:s',strtotime($val->created_at))}}
                                        </td>
                                        <td>
                                            <div class="statuserr">
                                                 <button data="{{$val->status}}" class="btn activebt @if($val->status==1){{'btn-success'}}@else{{'btn-danger'}}@endif" dataid="{{$val->id}}" >@if($val->status==1){{'ON'}}@else{{'OFF'}}@endif</button>
                                            </div>
                                            <div class="statuserr">
                                                  <button data="{{$val->statusmess}}" class="btn statusMe @if($val->statusmess==1){{'btn-primary'}}@else{{'btn-info'}}@endif" dataid="{{$val->id}}" >@if($val->statusmess==1){{'SEND'}}@else{{'OFF'}}@endif</button>
                                            </div>      
                                        </td>
                                        <td>
                                           <button  class="btn btn-raised btn-warning editdata" 
                                           data='
                                           <?php
                                           $arr = [];
                                           $arr['error_code']= $val->error_code;
                                           $arr['process_code']= $val->process_code;
                                           $arr['error_name']= $val->error_name;
                                           $arr['solve']= $val->solve;
                                           $arr['status']= $val->status;
                                           $arr['id']= $val->id;
                                           $arr['statusmess']= $val->statusmess;
                                           $arr['filename']= $val->filename;
                                           $arr['phonenumber']= $val->phonenumber;
                                           
                                           $a = json_encode($arr);
                                            echo $a;
                                           
                                            ?>' data-toggle="modal" data-target="#editerror">
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                            </button>
                                             @if(Auth::user()->level==2)

                                            <button class="btn btn-raised btn-danger deleteitem" dataid="{{$val->id}}" error_code="{{$val->error_code}}">
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
                                <h4 class="modal-title" id="modalLabelsidefall1">Tạo mới lỗi</h4>
                            </div>
                            <div class="modal-body">
                                <form method="post" enctype="multipart/form-data" id="upload_form">
                                  <div class="form-horizontal" id="formadd">
                                    <div class="form-group">
                                    <label for="first_name" class="col-sm-3 control-label">Error_code </label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control error_code_e" name="error_code" placeholder="Vui lòng không sử dụng ký tự / ">
                                            <span style="color: red">{{$errors->first('error_code')}}</span>
                                          
                                        </div>
                                    </div>

                                    <div class="form-group">
                                    <label for="first_name" class="col-sm-3 control-label">Process_code</label>
                                        <div class="col-sm-9">
                                            
                                            <select class="form-control process_code" name="process_code">
                                                <option value="">Chọn process code</option>
                                                @foreach($proce as $v)
                                               <option value="{{$v->process_id}}">{{$v->process_name}}</option>
                                                @endforeach
                                              </select>

                                        </div> 
                                    </div>

                                    <div class="form-group">
                                    <label for="first_name" class="col-sm-3 control-label">Error_Name </label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control error_name" name="error_name" placeholder="Vui lòng không sử dụng ký tự / ">
                                           <span style="color: red">{{$errors->first('error_name')}}</span>
                                           
                                        </div>
                                    </div>
                                     <div class="form-group">
                                    <label for="first_name" class="col-sm-3 control-label">Phonenumber </label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control phone_number" name="phonenumber" placeholder="Vui lòng không sử dụng ký tự / ">
                                           <span style="color: red">{{$errors->first('phonenumber')}}</span>
                                           
                                        </div>
                                    </div>
                                    <div class="form-group">
                                    <label for="first_name" class="col-sm-3 control-label">Solve <br> (Cách khắc phục)</label>
                                    
                                        <div class="col-sm-9">
                                           <textarea id="addsolve" class="md-textarea form-control" rows="3" name="solve" autofocus>
                                               
                                           </textarea>
                                          
                                           <span style="color: red">{{$errors->first('solve')}}</span>
                                        </div> 
                                    </div>
                                    <div class="form-group">
                                        <label for="first_name" class="col-sm-3 control-label">Upload file <br>Hướng dẫn xử lý</label>
                                        <div class="col-sm-9">
                                            <input type="file" name="file">
                                        </div>
                                    </div>


                                    <div class="form-group">
                                    <label for="first_name" class="col-sm-3 control-label">Gửi tin nhắn mỗi lần có log</label>
                                        <div class="col-sm-3">
                                           <input type="checkbox" name="statusmess" value="0" class="statusmess">
                                        </div>
                                     <label for="first_name" class="col-sm-3 control-label">Hiển thị cảnh báo</label>
                                        <div class="col-sm-3">
                                           <input type="checkbox" name="status" value="1" class="status" checked='checked'>
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
            <div class="modal fade stretchLeft" id="editerror" role="dialog" aria-labelledby="modalLabelsidefall1">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-warning">
                                <h4 class="modal-title" id="modalLabelsidefall1">Sửa thông tin lỗi</h4>
                            </div>
                            <div class="modal-body">
                                 <form method="post" enctype="multipart/form-data" id="edit_item">
                                  <div class="form-horizontal" id="formadd">
                                    <div class="form-group">
                                    <label for="first_name" class="col-sm-3 control-label">Error_code </label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control error_code_e" name="error_code"  placeholder="Vui lòng không sử dụng ký tự / ">
                                            <span style="color: red">{{$errors->first('error_code')}}</span>
                                          
                                        </div>
                                    </div>
                                    <div class="form-group">
                                    <label for="first_name" class="col-sm-3 control-label">Process_code</label>
                                        <div class="col-sm-9">
                                            
                                            <select class="form-control process_code" name="process_code">
                                                <option value="">Chọn process code</option>
                                                @foreach($proce as $v)
                                               <option value="{{$v->process_id}}">{{$v->process_name}}</option>
                                                @endforeach
                                              </select>

                                        </div> 
                                    </div>

                                    <div class="form-group">
                                    <label for="first_name" class="col-sm-3 control-label">Error_Name </label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control error_name" name="error_name"  placeholder="Vui lòng không sử dụng ký tự / ">
                                           <span style="color: red">{{$errors->first('error_name')}}</span>
                                           
                                        </div>
                                    </div>
                                    <div class="form-group">
                                    <label for="first_name" class="col-sm-3 control-label">Phonenumber </label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control phone_number" name="phonenumber" placeholder="Vui lòng không sử dụng ký tự / ">
                                           <span style="color: red">{{$errors->first('phonenumber')}}</span>
                                           
                                        </div>
                                    </div>
                                    <div class="form-group">
                                    <label for="first_name" class="col-sm-3 control-label">Solve <br> (Cách khắc phục)</label>
                                        <div class="col-sm-9">
                                           
                                            <textarea rows="4" cols="50" class="form-control lonnhu" name="solve" placeholder="Vui lòng không sử dụng ký tự / ">
                                           
                                            </textarea>
                                           <span style="color: red">{{$errors->first('solve')}}</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="first_name" class="col-sm-3 control-label">Upload file <br>Hướng dẫn xử lý</label>
                                        <div class="col-sm-9">
                                            <input type="file" name="file"  class="filenameedit">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                    <label for="first_name" class="col-sm-3 control-label">Gửi tin nhắn mỗi lần có log</label>
                                        <div class="col-sm-3">
                                           <input type="checkbox" name="statusmess" value="0" class="statusmess">
                                        </div>
                                     <label for="first_name" class="col-sm-3 control-label">Hiển thị cảnh báo</label>
                                        <div class="col-sm-3">
                                           <input type="checkbox" name="status" value="0" class="status">
                                           <input type="hidden" value="" id="iditem" name="idedit">

                                        </div>
                                    </div>
                                    <div class="space-4"></div>
                                    <div class="clearfix form-actions">
                                        <div class="col-md-offset-3 col-md-9">
                                            <button type="submit" class="btn btn-success" >Update</button>
                                             &nbsp; &nbsp; &nbsp;
                                            <button class="btn btn-danger" type="reset">Reset</button>    
                                        </div>
                                    </div>
                                    {{csrf_field()}}
                                </div>
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
                // console.log(data2.solve);
                $('#editerror .error_code_e').val(data2.error_code);
                $("#editerror .process_code").val(data2.process_code);
                $("#editerror .error_name").val(data2.error_name);
                $("#editerror .lonnhu").val(data2.solve);
                $(".phone_number").val(data2.phonenumber);
                //$("#editerror .filenameedit").val(data2.filename);
                $("#iditem").val(data2.id);
                
                if(data2.statusmess==1)
                {
                    $('#editerror .statusmess').val(1);
                    $('#editerror .statusmess').prop('checked',true);
                }else
                {
                      $('#editerror .statusmess').val(0);
                      $('#editerror .statusmess').prop('checked',false);
                }
                 if(data2.status==1)
                {
                    $('#editerror .status').val(1);
                    $('#editerror .status').prop('checked',true);
                }else
                {
                    $('#editerror .status').val(0);
                    $('#editerror .status').prop('checked',false);
                }
                $("#iditem").val(data2.id);

         });
          
        /*thêm mới lỗi*/
         $('#upload_form').on('submit', function(event)
         {
            event.preventDefault();
            $.ajax({
             url:"{{ route('erroradd')}}",
             method:"POST",
             data:new FormData(this),
             //dataType:'JSON',
             contentType: false,
             cache: false,
             processData: false,
             success:function(data)
             {
                   if(data=='0')
                    {
                        alert('Error_code và Process_code bị trùng Bạn vui lòng sửa lại')
                    }else
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
             }
            })
         });

// edit item

 $('#edit_item').on('submit', function(event)
         {
            event.preventDefault();
            $.ajax({
             url:"{{route('erroredit')}}",
             method:"POST",
             data:new FormData(this),
             //dataType:'JSON',
             contentType: false,
             cache: false,
             processData: false,
             success:function(data)
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
                          $('#editerror .statusmess').prop('checked', false);
                         //$(".statusmess").val('');

                         $(".status").val('');   
                         $('.stretchLeft').hide();
                         $('.modal-backdrop').hide();
                        $('.alertNotification').show(3000);
                        $('.alertNotification').text('Sửa thành công');
                        $('.alertNotification').css({'background':'#F89A14'});
                          setTimeout(function(){ $('.alertNotification').hide(5000);}, 5000);
                    }
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

