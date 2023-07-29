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
                        <a href="{{url('admin/fixerror/list')}}">Lịch trực</a>
                    </li>
                    <li class="active">Danh sách</li>
                </ol>
                    
                </h3>
                
               
            </section>
            <!-- Main content -->
            <section class="content paddingleft_right15">
            	 
                 <div class="container">
				  
				   <div class="alert" id="message" style="display: none"></div>
				   <form method="post" id="upload_form" enctype="multipart/form-data">
				    {{ csrf_field() }}
				    <div class="form-group">
				    	<label for="">Tên</label>
						<input type="text" name="name" id="select_name" class="form-control" />
				     
				    </div>
				    <div class="form-group">
				    	<label for="">Ảnh</label>
						<input type="file" name="select_file" id="select_file" class="form-control" />
				     
				    </div>
				    <div class="form-group">
				    	<input type="submit" name="upload" id="upload" class="btn btn-primary" value="Upload">
				    </div>
				   </form>
				    <table class="table table-bordered " id="table">
                                <thead>
                                    <tr class="filters">
                                        <th>Stt</th>
                                        <th>Tên</th>
                                    
                                        <th>Ảnh</th>
                                        
                                        <th>Hành động</th>
                                       
                                    </tr>
                                </thead>
                                <tbody class="bodydata">
                                	@foreach($data as $k=>$v)
                                  <tr>
                                  	<td>{{$k}}</td>
                                    <td>
                                     {{$v->name}}
                                    </td>
                                 
                                  	<td>
                                  		<img src="{{url('public/backend/product')}}/{{$v->image}}" alt=""
                                  		width="50px" height="50px">
                                  	</td>
                                  	
                                  	<td>
                                  		 <p align="left">
                                        @if(Auth::user()->level==2)
                                            <button class="btn btn-raised btn-warning editdata" data="{{$v}}" data-toggle="modal" data-target="#edituser">
                                                  <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                             </button>
                                        @elseif(Auth::user()->level<2)
                                        <button class="btn btn-raised btn-warning"  onclick="return confirm('Bạn không đủ quyền thực hiện chức năng này ?');">
                                                  <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                             </button>
                                        @endif

                                        @if(Auth::user()->level==2)
                                            <button class="btn btn-raised btn-danger deleteitem" dataid="">
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
            </section>
<!-- sua thong tin -->
 <div class="modal fade in pullDown" id="edituser" role="dialog" aria-labelledby="modalLabelnews">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-warning">
                               <b>Sửa user </b>      
                            </div>
                            <form method="post" id="edit_form" enctype="multipart/form-data">
                              {{ csrf_field() }}
                            <div class="modal-body bodyfixerror">
                               <div class="form-group">
                                <label for="first_name" class="col-sm-3 control-label">Tên</label>
                                    <input type="text" name="name" class="form-control itemname">
                                </div>
                                <div class="form-group">
                                <label for="first_name" class="col-sm-3 control-label">Ảnh</label>
                                 <input type="file" name="file_edit"  class="form-control">
                                 <input type="hidden" name="iditem" class="idedit" value="">
                                    </div>
                            </div>                  
			                <div class="form-group">
			                    <p align="center">
			                             
			                           <input type="submit" value="Sửa">
			                         
			                            <button class="btn btn-danger Reset">
			                              <i class="livicon" data-name="rotate-left" data-size="20" data-c="#fff" data-hc="#fff" data-loop="true">
			                              </i>
			                            Reset
			                          </button>    
			                    </p>  
			                </div>
			                </form>
   
                            </div>
                            <div class="modal-footer footerText">
                                <a href="javascript::voild(0)" data-dismiss="modal">Close me!</a>
                               
                            </div>
                        </div>
                    </div>
                </div>
<!-- end sua thong tin -->
      
                <input type="hidden" value="{{url('')}}" id="url">
<!-- ban giao canh bao -->

@endsection('content')
@section('script')
<script src="js/app.js" type="text/javascript"></script>
<script type="text/javascript" src="vendors/datatables/js/jquery.dataTables2.js"></script>
<script type="text/javascript" src="vendors/datatables/js/dataTables.bootstrap.js"></script>
<script>
$(document).ready(function(){

 $('#upload_form').on('submit', function(event){
  event.preventDefault();
  $.ajax({
   url:"{{ route('ajaxupload')}}",
   method:"POST",
   data:new FormData(this),
   //dataType:'JSON',
   contentType: false,
   cache: false,
   processData: false,
   success:function(data)
   {
   		console.log(data);
    	$('.bodydata').html(data);
   }
  })
 });

 $('.editdata').click(function()
 {
 	var data = $(this).attr('data');
 	var datajson = JSON.parse(data);
 	//console.log(datajson);
 	$('.itemname').val(datajson.name);
 	$('.idedit').val(datajson.id);
 });

 $('#edit_form').on('submit', function(event){
  event.preventDefault();
  $.ajax({
   url:"{{ route('ajaxedit')}}",
   method:"POST",
   data:new FormData(this),
   //dataType:'JSON',
   contentType: false,
   cache: false,
   processData: false,
   success:function(data)
   {
   		console.log(data);
    	$('.bodydata').html(data);
      $('.pullDown').hide();
      $('.modal-backdrop').hide();
   }
  })
 });





});
</script>
@endsection('script')

