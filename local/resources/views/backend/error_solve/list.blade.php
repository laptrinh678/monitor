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
                        <a href="{{url('admin/error/list')}}">Lỗi và cách khắc phục</a>
                    </li>
                    <li class="active">Danh sách </li>
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
                                        <th>Error_code</th>
                                        <th>
                                          Cách xử lý
                                        </th>
                                        <th>File hướng dẫn</th>
                                        
                                        <th>
                                            Người tạo <br>Ngày tạo
                                        </th>
                                        
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody class="listservice" id="listdatatable">
                                    
                                   <tr>
                                       <td></td>
                                       <td></td>
                                       <td>    
                                          
                                       </td>
                                      
                                   
                                       <td></td>
                                   
                                       <td>
                                     
                                        <br>
                                       
                                       </td>
                                   
                                      
                                       <td>
                                          <button  class="btn btn-raised btn-warning editdata" 
                                          data-toggle="modal" data-target="#editerror">
                                           <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                           </button>    
                                           <button class="btn btn-raised btn-danger deleteitem" dataid="">
                                              <i class="fa fa-trash-o" aria-hidden="true"></i> 
                                          </button>     
                                       </td>
                                     
                                   
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
                                <h4 class="modal-title" id="modalLabelsidefall1">Tạo mới cách xử lý lỗi</h4>
                            </div>
                            <div class="modal-body">
                                  <div class="form-horizontal" id="formadd">
                                    
                                    <div class="form-group">
                                    <label for="first_name" class="col-sm-3 control-label">errorss_code(Mã lỗi)</label>
                                        <div class="col-sm-9">
                                            
                                            <select class="form-control errorss_code" name="errorss_code">
                                                <option value="">Chọn mã lỗi</option>
                                                @foreach($error as $v)
                                               <option value="{{$v->id}}">{{$v->error_code}}</option>
                                                @endforeach
                                              </select>

                                        </div> 
                                    </div>
                                    <div class="form-group">
                                    <label for="first_name" class="col-sm-3 control-label">Solve <br> (Cách khắc phục)</label>
                                        <div class="col-sm-9">
                                            <textarea rows="4" cols="50" class="form-control solve" name="solve" placeholder="Vui lòng không sử dụng ký tự / " form="usrform">
                                           
                                            </textarea>
                                            <!-- <input type="text" > -->
                                           <span style="color: red">{{$errors->first('solve')}}</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                    <label for="first_name" class="col-sm-3 control-label">File hướng dẫn xử lý </label>
                                        <div class="col-sm-9">
                                            <input type="file" class="form-control">
                                        </div>
                                     
                                    </div>
                                    <div class="space-4"></div>
                                    <div class="clearfix form-actions">
                                        <div class="col-md-offset-3 col-md-9">
                                            <button class="btn btn-primary additemerror" >Thêm mới</button>
                                             &nbsp; &nbsp; &nbsp;
                                            <button class="btn btn-danger" type="reset">Reset</button>    
                                        </div>
                                    </div>
                                    
                                </div>
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
                                  <div class="form-horizontal" id="formadd">
                                    <div class="form-group">
                                    <label for="first_name" class="col-sm-3 control-label">Error_code </label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control error_code_e" name="error_code"  placeholder="Vui lòng không sử dụng ký tự / ">
                                            <span style="color: red">{{$errors->first('error_code')}}</span>
                                          
                                        </div>
                                    </div>
                                    <div class="form-group">
                                    <label for="first_name" class="col-sm-3 control-label">errorss_code</label>
                                        <div class="col-sm-9">
                                            
                                            <select class="form-control errorss_code" name="errorss_code">
                                                <option value="">Chọn errorss code</option>
                                                @foreach($error as $v)
                                               <option value="{{$v->id}}">{{$v->error_code}}</option>
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
                                    <label for="first_name" class="col-sm-3 control-label">Solve <br> (Cách khắc phục)</label>
                                        <div class="col-sm-9">
                                            <!-- <input type="text" class="form-control solve" name="solve"  placeholder="Vui lòng không sử dụng ký tự / "> -->
                                            <textarea rows="4" cols="50" class="form-control solve" name="solve" placeholder="Vui lòng không sử dụng ký tự / " form="usrform">
                                           
                                            </textarea>
                                           <span style="color: red">{{$errors->first('solve')}}</span>
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
                                           <input type="hidden" value="" id="iditem">

                                        </div>
                                    </div>
                                    <div class="space-4"></div>
                                    <div class="clearfix form-actions">
                                        <div class="col-md-offset-3 col-md-9">
                                            <button class="btn btn-success editItem" >Update</button>
                                             &nbsp; &nbsp; &nbsp;
                                            <button class="btn btn-danger" type="reset">Reset</button>    
                                        </div>
                                    </div>
                                    {{csrf_field()}}
                                </div>
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
            var url = $('#url').val();
           $.get(url+'/admin/error/delete/'+id, function(data)
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
                $('#editerror .error_code_e').val(data2.error_code);
                $("#editerror .errorss_code").val(data2.errorss_code);
                $("#editerror .error_name").val(data2.error_name);
                $("#editerror .solve").val(data2.solve);
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
        $( ".additemerror" ).click(function() 
        {     
              var slove = $(".solve").val().trim();
              var item ={};
              item.error_code = $(".error_code_e").val();
              item.errorss_code = $(".errorss_code").val();
              item.error_name = $(".error_name").val();
              item.solve = slove;
              item.statusmess = $('.statusmess').val();
              item.status = $('.status').val();
              if(item.error_code=='' || item.errorss_code=='' || item.error_name==''||item.solve=='')
              {
                alert('Bạn vui lòng nhập đầy đủ thông tin các phần error_code,errorss_code,error_name,solve')
              }else
              {
                  var itemJson = JSON.stringify(item);
                  var url = $('#url').val();
                  $.get(url+'/admin/error/add/'+itemJson, function(data)
                  {
                    if(data=='0')
                    {
                        alert('Error_code và errorss_code bị trùng Bạn vui lòng sửa lại')
                    }else
                    {     
                         $('#listdatatable').html(data);
                         $('.stretchLeft').hide();
                         $('.modal-backdrop').hide();
                         $('.error_code_e').html('');
                         $('.errorss_code').val('');
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
        });

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
              item.errorss_code = $("#editerror .errorss_code").val();
              item.error_name = $("#editerror .error_name").val();
              item.solve = slove;
              item.statusmess = $('#editerror .statusmess').val();
              item.status = $('#editerror .status').val();
              var id = $('#iditem').val();
              if(item.error_code=='' || item.errorss_code=='' || item.error_name==''||item.solve=='')
              {
                alert('Bạn vui lòng nhập đầy đủ thông tin các phần error_code,errorss_code,error_name,solve')
              }else
              {
                  var itemJson = JSON.stringify(item);
                  var url = $('#url').val();
                  $.get(url+'/admin/error/edit/'+itemJson+'/'+id, function(data)
                  {
                    if(data=='0')
                    {
                        alert('Error_code và errorss_code bị trùng Bạn vui lòng sửa lại')
                    }else
                    {
                        //console.log(data);
                         $('#listdatatable').html(data);
                         $('.error_code_e').html('');
                         $('.errorss_code').val('');
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


