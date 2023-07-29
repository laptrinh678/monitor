@extends('backend.master.index')
@section('header_style')
  <link href="css/app.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="vendors/datatables/css/dataTables.bootstrap.css" />
    <link href="css/pages/tables.css" rel="stylesheet" type="text/css" />
@endsection('header_style')
@section('content')

            <!-- Content Header (Page header) -->
            <section class="content-header list_user">
                <div >
                     <a href="{{url('admin/index')}}">
                            <i class="livicon" data-name="home" data-size="14" data-color="#000"></i> Trang chủ
                            <i class="fa fa-fw fa-angle-double-right"></i>
                    </a>
                     <a href="{{url('admin/member/list')}}">Users</a>
                      @if(Auth::user()->level==2)
                    <a href="{{url('admin/member/add')}}">
                           <i class="fa fa-fw fa-angle-double-right"></i> Add User
                    </a>
                     @elseif(Auth::user()->level==1)
                      <a onclick="return confirm('Bạn không đủ quyền thực hiện chức năng này ?');" >
                           <i class="fa fa-fw fa-angle-double-right"></i>Add User
                    </a>
                     @elseif(Auth::user()->level==0)
                      <a onclick="return confirm('Bạn không đủ quyền thực hiện chức năng này ?');" >
                           <i class="fa fa-fw fa-angle-double-right"></i> Add User
                    </a>
                    @endif

                </div>
            </section>
            <!-- Main content -->
            <section class="content padding left_right15">
                <div class="row">
                    <div class="panel panel-primary ">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                              @if(Auth::user()->level==2)
                                <a href="{{url('admin/member/add')}}">
                                       <i class="fa fa-fw fa-angle-double-right"></i> Add User
                                </a>
                                 @elseif(Auth::user()->level==1)
                                  <a onclick="return confirm('Bạn không đủ quyền thực hiện chức năng này ?');" >
                                       <i class="fa fa-fw fa-angle-double-right"></i>Add User
                                </a>
                                 @elseif(Auth::user()->level==0)
                                  <a onclick="return confirm('Bạn không đủ quyền thực hiện chức năng này ?');" >
                                       <i class="fa fa-fw fa-angle-double-right"></i> Add User
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
                                        <th>Name</th>
                                        <th>Mức nhận CB</th>
                                        
                                        
                                        <th>Phone</th>
                                        <th>
                                        	Level
                                        </th>
                                        <th>Created At</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	@foreach($users as $k=>$ls_user)
                                    <tr>
                                        <td>{{$k+1}}</td>
                                        <td>{{$ls_user->name}}</td>
                                        <td>
                                             @if($ls_user->sms_level==1)
                                               <span style="color: #ef4612">{{'Minor'}}</span> 
                                            @elseif($ls_user->sms_level==2)
                                                
                                                <span style="color: red">{{'Crical'}}</span>
                                            @elseif($ls_user->sms_level==0)
                                                {{'Warning'}}
                                            @endif
                                        </td>
                                        
                                        <td>{{$ls_user->phone_number}}</td>
                                       
                                        <td>
                                           @if($ls_user->level==1)
                                                {{'Admin'}}
                                            @elseif($ls_user->level==2)
                                                {{'Root'}}
                                            @elseif($ls_user->level==0)
                                                {{'User'}}
                                            @endif
                                        </td>
                                        <td>
                                          
                                            {{date('d-m-Y',strtotime($ls_user->created_at))}}
                                        </td>
                                        <td>
                                            @if(Auth::user()->level==2)
                                            <a href="{{url('admin/member/edit')}}/{{$ls_user->id}}">
                                                <i class="livicon" data-name="info" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="view user"></i>
                                            </a>
                                            <a href="{{url('admin/member/delete')}}/{{$ls_user->id}}" onclick="return confirm('Bạn có chắc chắn xóa thành viên này ?');">
                                                <i class="livicon" data-name="user-remove" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="delete user"></i>
                                            </a>
                                            @elseif(Auth::user()->level==1)
                                            <a onclick="return confirm('Bạn không đủ quyền thực hiện chức năng này ?');">
                                                <i class="livicon" data-name="info" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="view user"></i>
                                            </a>
                                            <a onclick="return confirm('Bạn không đủ quyền thực hiện chức năng này ?');" >
                                                <i class="livicon" data-name="user-remove" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="delete user"></i>
                                            </a>
                                            @elseif(Auth::user()->level==0)
                                              <a onclick="return confirm('Bạn không đủ quyền thực hiện chức năng này ?');">
                                                <i class="livicon" data-name="info" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="view user"></i>
                                               </a>
                                                <a onclick="return confirm('Bạn không đủ quyền thực hiện chức năng này ?');" >
                                                    <i class="livicon" data-name="user-remove" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="delete user"></i>
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                   
                                  
                                  
                                  
                                  
                                </tbody>
                            </table>
                            <!-- Modal for showing delete confirmation -->
                            <div class="modal fade" id="delete_confirm" tabindex="-1" role="dialog" aria-labelledby="user_delete_confirm_title" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title" id="user_delete_confirm_title">
                                                Delete User
                                            </h4>
                                        </div>
                                        <div class="modal-body">
                                            Bạn có chắc chắn muốn xóa thành viên này không
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                            <a href="deleted_users.html" class="btn btn-danger">Delete
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- row-->
            </section>

            <!-- modal add -->
             <div class="modal fade" id="addmember" role="dialog">
                <div class="modal-dialog">
                
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Thêm thành viên</h4>
                    </div>
                    <div class="modal-body">
                <form class="form-horizontal" method="post" id="formaddmember">
                

                <!--  -->
                <div class="form-group">
                <label for="first_name" class="col-sm-3">Tên thành viên</label>
                    <div class="col-sm-9">
                        <input type="text" id="id_name" name="name" placeholder="Nhập tên thành viên" class="form-control" />
                        <span style="color: red;"></span>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-sm-3" for="form-field-1-1">Email</label>
                        <div class="col-sm-9">
                            <input type="text" name="email" placeholder="Nhập email thành viên" class="form-control" id="id_email">
                           
                        </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="form-field-1-1">Pass word</label>
                    <div class="col-sm-9">
                        <input type="password" name="password" class="form-control required" placeholder="Nhập pass thành viên" id="id_pass">
                      
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="form-field-1-1">Phone number</label>
                    <div class="col-sm-9">
                        <input type="number" name="phone_number" class="form-control required" placeholder="Nhập số điện thoại thành viên" id="phone">
                       
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3" for="form-field-1-1">Process</label>
                   
                    <div class="col-sm-9 process_user">
                        <div class="form-control savedata">
                                             
                        </div>
                
                        
                    </div>
                </div>
                <div class="form-group">
                <label class="col-sm-3" for="form-field-1-1"> SMS level</label>
                    <div class="col-sm-9">
                        <select name="sms_level" id="id_sms_level" class="form-control required">
                            <option value="">Lựa chọn SMS level</option>
                            <option value="1">Warning</option>
                            <option value="2">Minor</option>
                            <option value="3">Crical</option>
                        </select>
                        <span style="color: red;">{{$errors->first('sms_level')}}</span>
                    </div>
                </div>
                <div class="form-group">
                <label class="col-sm-3" for="form-field-1-1"> Quyền truy cập</label>
                    <div class="col-sm-9">
                        <select name="level" id="level_id" class="form-control">
                            <option value="">Lựa chọn quyền truy cập</option>
                            <option value="2">Root</option>
                            <option value="1">Admin</option>
                            <option value="0">User</option>
                        </select>
                        <span style="color: red;">{{$errors->first('member_level')}}</span>
                    </div>
                </div>
                <div class="space-4"></div>
                <div class="clearfix form-actions">
                    <div class="col-md-offset-3 col-md-9">
                        <button class="btn btn-primary" type="submit">Thêm thành viên</button>
                         &nbsp; &nbsp; &nbsp;
                        <button class="btn btn-danger" type="reset">Reset</button>
                       
                            
                    </div>
                </div>
                {{csrf_field()}}
                
            </form>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                  
                </div>
              </div>
            <!-- end modal add -->
            <input type="hidden" value="{{url('')}}" id="url">
@endsection('content')
@section('script')
 <script src="js/app.js" type="text/javascript"></script>
    <!-- end of global js -->
    <!-- begining of page level js -->
    <script type="text/javascript" src="vendors/datatables/js/jquery.dataTables2.js"></script>
    <script type="text/javascript" src="vendors/datatables/js/dataTables.bootstrap.js"></script>
    <script>
    $(document).ready(function() 
    {
        $('#table').dataTable();

    });
    $('.savedata').click( function()
            {
                $('.ulParent').toggle();
            });
    $('.ulParent>li').click(function()
                {
                
                    var data = $(this).attr('dataid');
                   
                    var name = $(this).text();
                    $('.savedata').append('<span>'+name+ '<span class="id">'+data +','+'<span>'+'<a class="delete" href="javascript::voild(0)" ><i class="fa fa-times-circle-o" aria-hidden="true"></i></a>'+'</span>');
                    $('.ulParent>li').addClass('off');
                    $('.ulParent').hide();
                });
    $('body').on('click','.delete', function()
                {
                    $(this).parent().parent().parent().remove();
                });

    /*$('body').on('click','#submember', function()
    {
        var url  = $('#url').val();
        var item = {};
        item.name = $('#id_name').val();
        item.email = $('#id_email').val();
        item.pass = $('#id_pass').val();
        item.phone = $('#phone').val();
        item.sms_level = $('#id_sms_level').val();
        item.level = $('#level_id').val();
        item.process = $('.savedata .id').text();
        var itemJson = JSON.stringify(item);
        console.log(itemJson);
        $.get(url+'/admin/member/add/'+itemJson, function(data)
        {
            console.log(data);
        });

    });*/
    $('#formaddmember').on('submit', function(event)
         {
            event.preventDefault();
            $.ajax({
             url:"{{route('addmember')}}",
             method:"POST",
             data:new FormData(this),
             //dataType:'JSON',
             contentType: false,
             cache: false,
             processData: false,
             success:function(data)
             {
                console.log(data);
                 /* if(data=='0')
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
                    }*/
             }
            })
         });

 
    </script>

@endsection('script')

