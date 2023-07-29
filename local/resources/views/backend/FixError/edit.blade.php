@extends('backend.master.index')
@section('header_style')
    <link href="vendors/jasny-bootstrap/css/jasny-bootstrap.css" rel="stylesheet" />
    <link href="vendors/iCheck/css/all.css" rel="stylesheet" type="text/css" />
@endsection('header_style')

@section('content')
<section class="content-header">
                <h1>
                     <ol class="breadcrumb">
                    <li>
                        <a href="{{url('admin/index')}}">
                            <i class="livicon" data-name="home" data-size="14" data-color="#000"></i> Trang chủ
                        </a>
                    </li>
                    <li>
                        <a href="{{url('admin/error/list')}}">Ngưỡng cảnh báo</a>
                    </li>
                    <li class="active">Sửa</li>
                </ol>
                </h1>
               
            </section>
            <br>
            <section class="content">
            	     <div class="row">

                    <div class="col-md-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <i class="livicon" data-name="wrench" data-size="20" data-c="#fff" data-hc="#fff" data-loop="true" id="livicon-209" style="width: 50px; height: 50px;">
                                    
                                    </i>
                                    Sửa ngưỡng cảnh báo
                                </h3>
                                <span class="pull-right clickable">
                                    <i class="glyphicon glyphicon-chevron-up"></i>
                                </span>
                            </div>
                           
                            <div class="panel-body">
                                    <form class="form-horizontal" role="form" method="post">
                <!--  -->
                <div class="form-group">
                <label for="first_name" class="col-sm-2 control-label">Error_code </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="error_code" required="" value="{{$data->error_code}}">
                       
                    </div>
                </div>
                 <div class="form-group">
                <label for="first_name" class="col-sm-2 control-label">Chọn ngày </label>
                    <div class="col-sm-6 editDate">
                            
                                    
                                             <label>
                                                  <input class="checkhour" name="date[]" type="checkbox" value="1">Chủ nhật
                                                </label>
                                                <label>
                                                  <input class="checkhour" name="date[]" type="checkbox" value="2">Thứ hai
                                                </label>
                                                <label>
                                                  <input class="checkhour" name="date[]" type="checkbox" value="3">Thứ ba
                                                </label>
                                                <label>
                                                  <input class="checkhour" name="date[]" type="checkbox" value="4">Thứ tư
                                                </label>
                                                <label>
                                                  <input class="checkhour" name="date[]" type="checkbox" value="5">Thứ năm
                                                </label>
                                                <label>
                                                  <input class="checkhour" name="date[]" type="checkbox" value="6">Thứ sáu
                                                </label>
                                                <label>
                                                  <input class="checkhour" name="date[]" type="checkbox" value="7">Thứ bảy
                                                </label>
                                                
                                                 <label>
                                                  <input class="checkall"  type="checkbox">All
                                                </label>   
                    </div>
                </div>
                <div class="form-group">
                <label for="first_name" class="col-sm-2 control-label">Chọn giờ </label>
                    <div class="col-sm-7">
                         	 <div class="form-group col-sm-6 chooseTime">
                                       <label>
                                           Từ giờ
                                       </label>
                                       <div class="input-group">
                                           <div class="input-group-addon">
                                               <i class="livicon" data-name="alarm" data-size="14" data-loop="true"></i>
                                           </div>
                                           <input name="startTime" value="{{$timeDecode['startTime']}}" type="number" class="form-control" required="" />
                                       </div>

                                   </div>
                                   <div class="form-group col-sm-5">
                                       <label>
                                          Đến giờ
                                       </label>
                                       <div class="input-group">
                                           <div class="input-group-addon">
                                              <i class="livicon" data-name="alarm" data-size="14" data-loop="true"></i>
                                           </div>
                                           <div class="input-append">
                                               <input type="number" name="endtime" class="form-control input-small" value="{{$timeDecode['endtime']}}" required="">
                                           </div>
                                       </div>
                                   </div>
                    </div>
                </div>

                

                <div class="form-group">
                <label for="first_name" class="col-sm-2 control-label">Limited_value</label>
                    <div class="col-sm-6">
                    	<input type="text" class="form-control" name="limited_value" value="{{$data->limited_value}}" required="">
                        
                       
                    </div>
                </div>
                 <div class="form-group">
                <label for="first_name" class="col-sm-2 control-label">Level</label>
                    <div class="col-sm-6">
                    
                     
                        <select class="form-control" name="level" required="">
                        					<option value="{{$data->level}}">{{$data->level}}</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            
                                        </select>
                        
                    </div>
                </div>

              
                <div class="space-4"></div>
                <div class="clearfix form-actions">
                    <div class="col-md-offset-3 col-md-9">
                        <button class="btn btn-primary" type="submit">
                          <i class="livicon" data-name="mail" data-size="20" data-c="#fff" data-hc="#fff" data-loop="true" id="livicon-134" style="width: 50px; height: 50px;">
                     
                          </i>
                        Lưu
                      </button>
                         &nbsp; &nbsp; &nbsp;
                            <button class="btn btn-danger" type="reset">
                              <i class="livicon" data-name="rotate-left" data-size="20" data-c="#fff" data-hc="#fff" data-loop="true" id="livicon-254" style="width: 50px; height: 50px;">
                              </i>
                            Reset
                          </button>    
                    </div>
                </div>
                {{csrf_field()}}
            </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--row end-->
            	 
            </section>
                 <div class="modal fade pullDown" id="modal-4" role="dialog" aria-labelledby="modalLabelnews">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-warning">
                                <h4 class="modal-title" id="modalLabelnews">Pulldown</h4>
                            </div>
                            <div class="modal-body">
                                <p>
                                    This is a modal window. You can do the following things with it:
                                </p>
                                <ul>
                                    <li>
                                        <strong>Read:</strong> modal windows will probably tell you something important so don't forget to read what they say.
                                    </li>
                                    <li>
                                        <strong>Look:</strong> a modal window enjoys a certain kind of attention; just look at it and appreciate its presence.
                                    </li>
                                    <li>
                                        <strong>Close:</strong> click on the button below to close the modal.
                                    </li>
                                </ul>
                            </div>
                            <div class="modal-footer">
                                <button class="btn  btn-warning" data-dismiss="modal">Close me!</button>
                            </div>
                        </div>
                    </div>
                </div>
@endsection('content')
@section('script')
    <script src="vendors/jasny-bootstrap/js/jasny-bootstrap.js"></script>
    <script src="vendors/iCheck/js/icheck.js"></script>
    <script src="js/pages/form_examples.js"></script>
    <script>
    	$(document).ready(function()
    	{
    		
    		 var clicked = false;
          $(".checkall").on("click", function() {
            $(".checkhour").prop("checked", !clicked);
            clicked = !clicked;
          });
    	})
    </script>
@endsection('script')

    