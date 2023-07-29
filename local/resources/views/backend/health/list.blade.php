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
                        <a href="{{url('admin/health/list')}}">Health</a>
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
                              @if(Auth::user()->level>=1)
                              <a href="javascript::voild(0)" data-toggle="modal" data-target="#modalfixError">
                              	<i class="livicon" data-name="pencil" data-size="20" data-c="#fff" data-hc="#fff" data-loop="true">
                              	</i>
                              Tạo Health
                              </a>
                              @elseif(Auth::user()->level<1)
                               <a href="javascript::voild(0)" data-toggle="modal" onclick="return confirm('Bạn không đủ quyền thực hiện chức năng này ?');">
                                <i class="livicon" data-name="pencil" data-size="20" data-c="#fff" data-hc="#fff" data-loop="true">
                                </i>
                              Tạo Health
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
                                        <th>Ip_sour <br>Ip_dest <br>port_dest</th>
                                    
                                        <th>mod_time_path <br>mod_time_usage <br>mod_time_flag</th>
                                        <th>cpu_usage /<br>cpu_flag</th>                                      
                                        <th>ram_usage/<br>ram_flag</th>
                                        <th>disk_path/<br>disk_flag</th>

                                        <th>disk_usage</th>
                                        <th>size_flag <br>user_name <br>password</th>
                                        <th>Process</th>
                                        <th>proc_usage <br>proc_flag <br></th>
                                        <th>Người tạo <br>Ngày tạo</th>
                                       
                                        <th>Hành động (Action)</th>
                                       
                                    </tr>
                                </thead>
                                <tbody class="bodydata">
                                	 @foreach($data as $k=>$v)
                                                                    <tr>
                                                                      <td>{{$k}}</td>
                                                                      <td>
                                                                        {{$v->ip_sour}}
                                                                        <br>
                                                                        {{$v->ip_dest}}
                                                                        <br>{{$v->port_dest}}
                                                                      </td>
                                                                      <td class="tdhealth">
                                                                        <div>
                                                                          <?php 
                                                                          if($v->mod_time_path=='')
                                                                          {
                                                                            echo 'null';

                                                                          }else
                                                                          {


                                                                            echo substr($v->mod_time_path, 1,10). '...';
                                                                            echo '<br>';
                                                                            echo '<button class="viewmore">View More</button>';
                                                                          }

                                                                         
                                                                          ?>
                                                                        </div>
                                                                        <div class="showall">
                                                                        
                                                                          <?php
                                                                            echo str_replace(',','<br>',$v->mod_time_path);
                                                                           ?>
                                                                        </div>

                                                                       
                                                                        <br>
                                                                       {{$v->mod_time_usage}}
                                                                        <br>
                                                                       {{$v->mod_time_flag}}
                                                                        <br>
                                                                        
                                                                        
                                                                      </td>
                                                                      <td>
                                                                        {{$v->cpu_usage}}
                                                                        <br>
                                                                        {{$v->cpu_flag}}
                                                                      </td>
                                                                      
                                                                    
                                                                       <td>
                                                                        {{$v->ram_usage}}
                                                                        <br>
                                                                         {{$v->ram_flag}}
                                                                       
                                                                       </td>
                                                                       <td>
                                                                         {{$v->disk_path}}
                                                                        <br>
                                                                         {{$v->disk_flag}}
                                                                       
                                                                       </td>
                                                                       <td>
                                                                         {{$v->disk_usage}}
                                                                       </td>
                                                                       <td>
                                                                         
                                                                         {{$v->size_flag}}
                                                                         <br>
                                                                         {{$v->user_name}}
                                                                         <br>
                                                                         @if($v->password != '')
                                                                         {{'****'}}
                                                                         @else
                                                                         {{'null'}}
                                                                         @endif
                                                                       
                                                                       </td>
                                                                      <td> 
                                                                      {{$v->process_name}}
                                                                      </td>
                                                                      <td>
                                                                        {{$v->proc_usage}}
                                                                        <br>
                                                                        {{$v->proc_flag}}
                                                                      </td>
                                                                      <td>
                                                                        {{date('d-m-Y H:i:s',strtotime($v->created_at))}}
                                                                        <br>
                                                                        <span>Người tạo:</span>
                                                                          <br>
                                                                        <span>{{$v->user}}</span>
                                                                      </td>
                                                                     
                                                                      <td>
                                                                         <p align="left">
                                                                         
                                                                         
                                                                          @if(Auth::user()->level==2)
                                                                              <button class="btn btn-raised btn-warning editdata"  
                                                                              data='
                                                                              <?php
                                                                                $arr=[];
                                                                                $arr['id']=$v->id;
                                                                                $arr['ip_sour']=$v->ip_sour;
                                                                                $arr['ip_dest']=$v->ip_dest;
                                                                                $arr['cpu_usage']=$v->cpu_usage;
                                                                                $arr['ram_usage']=$v->ram_usage;
                                                                                $arr['disk_usage']=$v->disk_usage;
                                                                                $arr['proc_usage']=$v->proc_usage;
                                                                                $arr['proc_flag']=$v->proc_flag;
                                                                                $arr['mod_time_usage']=$v->mod_time_usage;
                                                                               
                                                                                $arr['user_name']=$v->user_name;
                                                                                $arr['password']=$v->password;
                                                                                $arr['port_dest']=$v->port_dest; 
                                                                                $arr['process_name']=$v->process_name;
                                                                                $arr['process_code']=$v->process_code;
                                                                                $a = json_encode($arr);
                                                                                echo $a; 
                                                                              ?>
                                                                              ' data-toggle="modal" data-target="#editcanender"
                                                                              partern=""
                                                                              >
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
             <div class="modal fade in pullDown add" id="modalfixError" role="dialog" aria-labelledby="modalLabelnews">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-warning">

                               <b>Tạo Health</b> 
                                   
                            </div>
                            <div class="modal-body bodyfixerror">
                               <div class="form-group">
                                <label for="first_name" class="col-sm-3 control-label">Ip_sour</label>
                                    <div class="col-sm-9">
                                         <input type="text" class="form-control Ip_sour">
                                     
                                    </div>
                                </div>
                                <div class="form-group">
                                <label for="first_name" class="col-sm-3 control-label">Ip_dest</label>
                                    <div class="col-sm-9">
                                        
                                            
                                            <input type="text" class="form-control Ip_dest" />
                                       
                                     
                                    </div>
                                </div>
                                 <div class="form-group">
                                          <label for="first_name" class="col-sm-3 control-label">port_dest</label>
                                                <div class="col-sm-9">
                                                  
                                                  <div class="input-group spinner" data-trigger="spinner">
                                            <input type="text" class="form-control port_dest" value="0" data-rule="quantity">
                                            <div class="input-group-addon pickers_spinners">
                                                <a href="javascript:;" class="spin-up" data-spin="up"><i class="fa fa-chevron-up"></i></a>
                                                <a href="javascript:;" class="spin-down" data-spin="down"><i class="fa fa-chevron-down"></i></a>
                                            </div>
                                        </div>
                                                </div>
                                        </div>


                                        <div class="form-group cpu_usage">
                                          <label for="first_name" class="col-sm-3 control-label">Cpu_usage </label>
	                                       
	                                          <div class="col-sm-2 cpu_usa">
	                                          	<label for="email">Level 1</label>
	                                          	<input type="number" class="form-control level1">
	                                          </div>
	                                          <div class="col-sm-2 cpu_usa">
	                                          	<label for="email">Level 2</label>
	                                          	<input type="number" class="form-control level2">
	                                          </div>
	                                          <div class="col-sm-2 cpu_usa">
	                                          	<label for="email">Level 3</label>
	                                          	<input type="number" class="form-control level3">
	                                          </div>
	                                           <div class="col-sm-2 cpu_usa">
                                              <label for="email">Cpu_flag</label>
                                              <input type="checkbox" class="cpu_flag" value="0">
                                            </div>
                                          
                                        </div>
                                 <div class="form-group ram_usage">
                                          <label for="first_name" class="col-sm-3 control-label">Ram_usage</label>
                                                <div class="col-sm-2 cpu_usa">
	                                          	<label for="email">Level 1</label>
	                                          	<input type="number" class="form-control level1">
	                                          </div>
	                                          <div class="col-sm-2 cpu_usa">
	                                          	<label for="email">Level 2</label>
	                                          	<input type="number" class="form-control level2">
	                                          </div>
	                                          <div class="col-sm-2 cpu_usa">
	                                          	<label for="email">Level 3</label>
	                                          	<input type="number" class="form-control level3">
	                                          </div>
                                            <div class="col-sm-2 cpu_usa">
                                              <label for="email">Ram_flag</label>
                                              <input type="checkbox" class="Ram_flag"  value="0">
                                            </div>
                                        </div>
                                  <div class="form-group disk_usage">
                                          <label for="first_name" class="col-sm-3 control-label">Disk_usage</label>
                                                <div class="col-sm-2 cpu_usa">
	                                          	<label for="email">Level 1</label>
	                                          	<input type="number" class="form-control level1">
	                                          </div>
	                                          <div class="col-sm-2 cpu_usa">
	                                          	<label for="email">Level 2</label>
	                                          	<input type="number" class="form-control level2">
	                                          </div>
	                                          <div class="col-sm-2 cpu_usa">
	                                          	<label for="email">Level 3</label>
	                                          	<input type="number" class="form-control level3">
	                                          </div>
                                            <div class="col-sm-2 cpu_usa">
                                              <label for="email">Disk_flag</label>
                                              <input type="checkbox" class="Disk_flag"  value="0" >
                                            </div>
                                        </div>
                                   <div class="form-group proc_usage">
                                          <label for="first_name" class="col-sm-3 control-label">Proc_usage</label>
                                                <div class="col-sm-2 ">
                                              <label for="email">Level 1</label>
                                              <input type="number" class="form-control level1">
                                            </div>
                                            <div class="col-sm-2 ">
                                              <label for="email">Level 2</label>
                                              <input type="number" class="form-control level2">
                                            </div>
                                            <div class="col-sm-2 ">
                                              <label for="email">Level 3</label>
                                              <input type="number" class="form-control level3">
                                            </div>
                                            <div class="col-sm-2">
                                              <label for="email">Prog_flag</label>
                                              <input type="checkbox" class="Prog_flag"  value="0">
                                            </div>
                                        </div>
                                        <div class="form-group mod_time_usage">
                                          <label for="first_name" class="col-sm-3 control-label">Mod time-usage</label>
                                            <div class="col-sm-2 cpu_usa">
                                              <label for="email">Level 1</label>
                                              <input type="number" class="form-control level1">
                                            </div>
                                            <div class="col-sm-2 cpu_usa">
                                              <label for="email">Level 2</label>
                                              <input type="number" class="form-control level2">
                                            </div>
                                            <div class="col-sm-2 cpu_usa">
                                              <label for="email">Level 3</label>
                                              <input type="number" class="form-control level3">
                                            </div>
                                            <div class="col-sm-2 cpu_usa">
                                              <label for="email">mod_time_flag</label>
                                              <input type="checkbox" class="mod_time_flag"  value="0" >
                                            </div>
                                        </div>
                                  <div class="form-group">
                                          <label for="first_name" class="col-sm-3 control-label">Disk_path</label>
                                                <div class="col-sm-9">
                                                   <input type="text" class="form-control disk_path">
                                                </div>
                                        </div> 
                                
                                 <div class="form-group">
                                          <label for="first_name" class="col-sm-3 control-label">Mod_time_path</label>
                                                <div class="col-sm-9">
                                                   <input type="text" class="form-control mod_time_path">
                                                </div>
                                        </div> 
                          
                                <!--  <div class="form-group">
                                         <label for="first_name" class="col-sm-3 control-label">partern</label>
                                               <div class="col-sm-9">
                                                  <input type="text" class="form-control partern">
                                                   <p style="color: #a7a7a7;font-style: italic;">Mẫu khai báo: /u01,/u02,/u03 </p>
                                               </div>
                                       </div> -->
                                          <div class="form-group">
                                          <label for="first_name" class="col-sm-3 control-label">user_name</label>
                                                <div class="col-sm-9">
                                                   <input type="text" class="form-control user_name">
                                                </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="first_name" class="col-sm-3 control-label">Pass_pro</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control password">
                                                </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="first_name" class="col-sm-3 control-label">Process</label>
                                                <div class="col-sm-9">
                                                   
                                                     <select name="process" id="" class="form-control process_code">
                                                       <option value="">Chọn Process code</option>
                                                       @foreach($process as $v)
                                                       <option value="{{$v->process_id}}" class="form-control">{{$v->process_name}}</option>
                                                       @endforeach
                                                     </select>
                                                
                                                </div>
                                        </div>

                                       <!--  <div class="form-group">
                                         <label for="first_name" class="col-sm-3 control-label">Trạng thái CB</label>
                                               <div class="col-sm-9">
                                                    
                                                     <input type="checkbox" name="active" value="0" class="statusmess">
                                               </div>
                                       </div> -->

            
            
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
                               <b>Sửa Health</b>      
                            </div>
                            <div class="modal-body bodyfixerror">

                                       <div class="form-group">
                                <label for="first_name" class="col-sm-3 control-label">Ip_sour</label>
                                    <div class="col-sm-9">
                                         <input type="text" class="form-control Ip_sour">
                                     
                                    </div>
                                </div>
                                <div class="form-group">
                                <label for="first_name" class="col-sm-3 control-label">Ip_dest</label>
                                    <div class="col-sm-9">
                                        
                                            
                                            <input type="text" class="form-control Ip_dest" />
                                       
                                     
                                    </div>
                                </div>
                                 <div class="form-group">
                                          <label for="first_name" class="col-sm-3 control-label">port_dest</label>
                                                <div class="col-sm-9">
                                                  
                                                  <div class="input-group spinner" data-trigger="spinner">
                                            <input type="text" class="form-control port_dest" value="0" data-rule="quantity">
                                            <div class="input-group-addon pickers_spinners">
                                                <a href="javascript:;" class="spin-up" data-spin="up"><i class="fa fa-chevron-up"></i></a>
                                                <a href="javascript:;" class="spin-down" data-spin="down"><i class="fa fa-chevron-down"></i></a>
                                            </div>
                                        </div>
                                                </div>
                                        </div>


                                        <div class="form-group cpu_usage">
                                          <label for="first_name" class="col-sm-3 control-label">Cpu_usage </label>
                                         
                                            <div class="col-sm-2 cpu_usa">
                                              <label for="email">Level 1</label>
                                              <input type="number" class="form-control level1">
                                            </div>
                                            <div class="col-sm-2 cpu_usa">
                                              <label for="email">Level 2</label>
                                              <input type="number" class="form-control level2">
                                            </div>
                                            <div class="col-sm-2 cpu_usa">
                                              <label for="email">Level 3</label>
                                              <input type="number" class="form-control level3">
                                            </div>
                                             <div class="col-sm-2 cpu_usa">
                                              <label for="email">Cpu_flag</label>
                                              <input type="checkbox" class="cpu_flag" value="0">
                                            </div>
                                          
                                        </div>
                                 <div class="form-group ram_usage">
                                          <label for="first_name" class="col-sm-3 control-label">Ram_usage</label>
                                                <div class="col-sm-2 cpu_usa">
                                              <label for="email">Level 1</label>
                                              <input type="number" class="form-control level1">
                                            </div>
                                            <div class="col-sm-2 cpu_usa">
                                              <label for="email">Level 2</label>
                                              <input type="number" class="form-control level2">
                                            </div>
                                            <div class="col-sm-2 cpu_usa">
                                              <label for="email">Level 3</label>
                                              <input type="number" class="form-control level3">
                                            </div>
                                            <div class="col-sm-2 cpu_usa">
                                              <label for="email">Ram_flag</label>
                                              <input type="checkbox" class="Ram_flag"  value="0">
                                            </div>
                                        </div>
                                  <div class="form-group disk_usage">
                                          <label for="first_name" class="col-sm-3 control-label">Disk_usage</label>
                                                <div class="col-sm-2 cpu_usa">
                                              <label for="email">Level 1</label>
                                              <input type="number" class="form-control level1">
                                            </div>
                                            <div class="col-sm-2 cpu_usa">
                                              <label for="email">Level 2</label>
                                              <input type="number" class="form-control level2">
                                            </div>
                                            <div class="col-sm-2 cpu_usa">
                                              <label for="email">Level 3</label>
                                              <input type="number" class="form-control level3">
                                            </div>
                                            <div class="col-sm-2 cpu_usa">
                                              <label for="email">Disk_flag</label>
                                              <input type="checkbox" class="Disk_flag"  value="0" >
                                            </div>
                                        </div>
                                   <div class="form-group proc_usage">
                                          <label for="first_name" class="col-sm-3 control-label">Proc_usage</label>
                                                <div class="col-sm-2 ">
                                              <label for="email">Level 1</label>
                                              <input type="number" class="form-control level1">
                                            </div>
                                            <div class="col-sm-2 ">
                                              <label for="email">Level 2</label>
                                              <input type="number" class="form-control level2">
                                            </div>
                                            <div class="col-sm-2 ">
                                              <label for="email">Level 3</label>
                                              <input type="number" class="form-control level3">
                                            </div>
                                            <div class="col-sm-2">
                                              <label for="email">Prog_flag</label>
                                              <input type="checkbox" class="Prog_flag"  value="0">
                                            </div>
                                        </div>
                                        <div class="form-group mod_time_usage">
                                          <label for="first_name" class="col-sm-3 control-label">Mod time-usage</label>
                                            <div class="col-sm-2 cpu_usa">
                                              <label for="email">Level 1</label>
                                              <input type="number" class="form-control level1">
                                            </div>
                                            <div class="col-sm-2 cpu_usa">
                                              <label for="email">Level 2</label>
                                              <input type="number" class="form-control level2">
                                            </div>
                                            <div class="col-sm-2 cpu_usa">
                                              <label for="email">Level 3</label>
                                              <input type="number" class="form-control level3">
                                            </div>
                                            <div class="col-sm-2 cpu_usa">
                                              <label for="email">mod_time_flag</label>
                                              <input type="checkbox" class="mod_time_flag"  value="0" >
                                            </div>
                                        </div>
                                  <div class="form-group">
                                          <label for="first_name" class="col-sm-3 control-label">Disk_path</label>
                                                <div class="col-sm-9">
                                                   <input type="text" class="form-control disk_path">
                                                </div>
                                        </div> 
                                
                                 <div class="form-group">
                                          <label for="first_name" class="col-sm-3 control-label">Mod_time_path</label>
                                                <div class="col-sm-9">
                                                   <input type="text" class="form-control mod_time_path">
                                                </div>
                                        </div> 
                          
                                
                                          <div class="form-group">
                                          <label for="first_name" class="col-sm-3 control-label">user_name</label>
                                                <div class="col-sm-9">
                                                   <input type="text" class="form-control user_name">
                                                </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="first_name" class="col-sm-3 control-label">Pass_pro</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control password">
                                                </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="first_name" class="col-sm-3 control-label">Process</label>
                                                <div class="col-sm-9">
                                                   
                                                     <select name="process" id="" class="form-control process_code">
                                                       <option value="">Chọn Process code</option>
                                                       @foreach($process as $v)
                                                       <option value="{{$v->process_id}}" class="form-control">{{$v->process_name}}</option>
                                                       @endforeach
                                                     </select>
                                                
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
            //console.log(data2);
            var cpu_usage = data2.cpu_usage.split("-",3);
            var cpu_usage_lv1 = cpu_usage[0];
            var cpu_usage_lv2 = cpu_usage[1];
            var cpu_usage_lv3 = cpu_usage[2];
            $("#editcanender .cpu_usage .level1").val(cpu_usage_lv1);
  			    $("#editcanender .cpu_usage .level2").val(cpu_usage_lv2);
            $("#editcanender .cpu_usage .level3").val(cpu_usage_lv3);

            var ram_usage = data2.ram_usage.split("-",3);
            var ram_usage_lv1 = ram_usage[0];
            var ram_usage_lv2 = ram_usage[1];
            var ram_usage_lv3 = ram_usage[2];
            $("#editcanender .ram_usage .level1").val(ram_usage_lv1);
  			    $("#editcanender .ram_usage .level2").val(ram_usage_lv2);
            $("#editcanender .ram_usage .level3").val(ram_usage_lv3);

            var disk_usage = data2.disk_usage.split("-",3);
            var disk_usage_lv1 = disk_usage[0];
            var disk_usage_lv2 = disk_usage[1];
            var disk_usage_lv3 = disk_usage[2];

            var proc_usage = data2.proc_usage.split("-",3);
            var proc_usage_lv1 = proc_usage[0];
            var proc_usage_lv2 = proc_usage[1];
            var proc_usage_lv3 = proc_usage[2];
            $("#editcanender .proc_usage .level1").val(proc_usage_lv1);
            $("#editcanender .proc_usage .level2").val(proc_usage_lv2);
            $("#editcanender .proc_usage .level3").val(proc_usage_lv3);

            var mod_time_usage = data2.mod_time_usage.split("-",3);
            var mod_time_usage_lv1 = mod_time_usage[0];
            var mod_time_usage_lv2 = mod_time_usage[1];
            var mod_time_usage_lv3 = mod_time_usage[2];
            $("#editcanender .mod_time_usage .level1").val(mod_time_usage_lv1);
            $("#editcanender .mod_time_usage .level2").val(mod_time_usage_lv2);
            $("#editcanender .mod_time_usage .level3").val(mod_time_usage_lv3);

            var partern = $(this).attr('partern');
            $("#editcanender .disk_usage .level1").val(disk_usage_lv1);
  			    $("#editcanender .disk_usage .level2").val(disk_usage_lv2);
            $("#editcanender .disk_usage .level3").val(disk_usage_lv3);
            $("#editcanender .Ip_sour").val(data2.ip_sour);
            $("#editcanender .Ip_dest").val(data2.ip_dest);
            $("#editcanender .port_dest").val(data2.port_dest);
            $("#editcanender .max_file_size").val(data2.max_file_size);
            $("#editcanender .partern").val(partern);
            $("#editcanender .user_name").val(data2.user_name);
            $("#editcanender .password").val(data2.password);
            $("#editcanender .password").val(data2.password);
            $("#editcanender .process_code").val(data2.process_code);
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
            var cpu = $("#editcanender .cpu_usage .level1").val()+'-'
          + $("#editcanender .cpu_usage .level2").val() +'-'+ $("#editcanender .cpu_usage .level3").val();
           var ram =  $("#editcanender .ram_usage .level1").val() +'-'+ $("#editcanender .ram_usage .level2").val() +'-'+ $("#editcanender .ram_usage .level3").val();
           var disk_usage =  $("#editcanender .disk_usage .level1").val() +'-'+ $("#editcanender .disk_usage .level2").val() +'-'+ $("#editcanender .disk_usage .level3").val();
            var item ={};
            item.ip_sour = $("#editcanender  .Ip_sour").val();
            item.ip_dest = $("#editcanender  .Ip_dest").val();
            item.port_dest = $("#editcanender  .port_dest").val();
            item.max_file_size = $('#editcanender  .max_file_size').val();
            item.cpu_usage = cpu;
            item.ram_usage  =ram;
            item.disk_usage  =disk_usage;
            item.partern = $('#editcanender .partern').val();
            item.user_name = $("#editcanender .user_name").val();
            item.password = $("#editcanender .password").val();
            item.active = $('#editcanender .statusmess').val();
            item.process_code = $('#editcanender .process_code').val();
            item.id = $('#iditemedit').val();
            //console.log(item);
            var item = JSON.stringify(item);
            var itemjson = btoa(item);
            var url = $('#url').val();
                if(item.Ip_sour==''|| item.Ip_dest==''||item.Port_dest=='')
                {
                  alert('Bạn vui lòng nhập đầy đủ thông tin vào các mục,Ip_sour,Ip_dest,Port_dest');
                }else
                {
                   $.get( url+'/admin/health/update/'+itemjson, function(data)
                   {
                       // console.log(data);
                          $('.bodydata').html(data);

                         $("#editcanender  .Ip_sour").val('');
                         $("#editcanender  .Ip_dest").val('');
                         $("#editcanender  .port_dest").val('');
                         $('#editcanender  .max_file_size').val('');

                          $("#editcanender .cpu_usage .level1").val('');
                          $("#editcanender .cpu_usage .level2").val('');
                          $("#editcanender .cpu_usage .level3").val('');
                          
                          $("#editcanender .ram_usage .level1").val('');
                          $("#editcanender .ram_usage .level2").val('');
                          $("#editcanender .ram_usage .level3").val('');

                          $("#editcanender .disk_usage .level1").val('');
                          $("#editcanender .disk_usage .level2").val('');
                          $("#editcanender .disk_usage .level3").val('');

                          $("#editcanender  .partern").val('');
                          $("#editcanender .user_name").val('');
                          $("#editcanender .password").val('');
                          $('#editcanender .statusmess').val('');
                          $('#editcanender .process_code').val('');


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

        
        /*add item canh bao*/
         $('body').on('click','.addItem', function()
        {   
        	var cpu = $(".cpu_usage .level1").val()+'-'
        	+ $(".cpu_usage .level2").val() +'-'+ $(".cpu_usage .level3").val();

        	var ram =  $(".ram_usage .level1").val() +'-'+ $(".ram_usage .level2").val() +'-'+ $(".ram_usage .level3").val();
			    var disk_usage =  $(".disk_usage .level1").val() +'-'+ $(".disk_usage .level2").val() +'-'+ $(".disk_usage .level3").val();

          var proc_usage = $(".proc_usage .level1").val() +'-'+ $(".proc_usage .level2").val() +'-'+ $(".proc_usage .level3").val();

          var mod_time_usage = $(".mod_time_usage .level1").val() +'-'+ $(".mod_time_usage .level2").val() +'-'+ $(".mod_time_usage .level3").val();
          
          //var partern = encodeURIComponent($(".add .partern").val());
          //console.log(partern);
            var item ={};
            item.ip_sour = $(".add .Ip_sour").val();
            item.ip_dest = $(".add .Ip_dest").val();
            item.port_dest = $(".add .port_dest").val();
            item.max_file_size = $('.add .max_file_size').val();
            item.cpu_usage = cpu;
            item.cpu_flag = $('.add .cpu_flag').val();
            item.ram_usage = ram;
            item.Ram_flag = $('.add .Ram_flag').val();
            item.disk_path = $('.add .disk_path').val();
            item.disk_usage  = disk_usage;
            item.Disk_flag  = $('.add .Disk_flag').val();
            item.proc_usage = proc_usage;
            item.Prog_flag = $('.add .Prog_flag').val();

            item.mod_time_usage = mod_time_usage;
            item.mod_time_flag = $('.add .mod_time_flag').val();
            
            item.mod_time_path = $('.add .mod_time_path').val();
           /* item.partern = $(".add .partern").val();*/
            item.user_name = $(".user_name").val();
            item.password = $(".password").val();
           /* item.active = $('.statusmess').val();*/
            item.process_code = $('.process_code').val();
          
            
            var item = JSON.stringify(item);
             console.log(item);
            var itemjson = btoa(item);
           
            var url = $('#url').val();
                if(item.ip_sour==''|| item.ip_dest==''||item.port_dest=='')
                {
                  alert('Bạn vui lòng nhập đầy đủ thông tin vào các mục,Ip_sour,Ip_dest,Port_dest');
                }else
                {
                   $.get( url+'/admin/health/add/'+itemjson, function(data)
                   {
                          console.log(data);
                          $('.bodydata').html(data);
                          $(".Ip_sour").val('');
                          $(".Ip_dest").val('');
                          $(".port_dest").val('');
                          $(".max_file_size").val('');

                          $(".cpu_usage .level1").val('');
                          $(".cpu_usage .level2").val('');
                          $(".cpu_usage .level3").val('');
                          
                          $(".ram_usage .level1").val('');
                          $(".ram_usage .level2").val('');
                          $(".ram_usage .level3").val('');

                          $(".disk_usage .level1").val('');
                          $(".disk_usage .level2").val('');
                          $(".disk_usage .level3").val('');

                         
                          $(".user_name").val('');
                          $(".password").val('');
                          $('.statusmess').val('');
                          $('.process_code').val('');

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
                $.get( url+'/admin/health/delete/'+id, function(data){ 
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
      /* thay đổi trạng thái cpu_flag*/
       var ckbox2 = $('.cpu_flag');
        $('.cpu_flag').on('click',function () {
                    if (ckbox2.is(':checked')) {
                        $(this).val(1);
                    } else {
                        $(this).val(0);
                    }
                });  

        /* thay đổi trạng thái cpu_flag*/
       var ckbox3 = $('.Ram_flag');
        $('.Ram_flag').on('click',function () {
                    if (ckbox3.is(':checked')) {
                        $(this).val(1);
                    } else {
                        $(this).val(0);
                    }
                });  

         var ckbox4 = $('.Disk_flag');
        $('.Disk_flag').on('click',function () {
                    if (ckbox4.is(':checked')) {
                        $(this).val(1);
                    } else {
                        $(this).val(0);
                    }
                });  
        var ckbox5 = $('.Prog_flag');
        $('.Prog_flag').on('click',function () {
                    if (ckbox5.is(':checked')) {
                        $(this).val(1);
                    } else {
                        $(this).val(0);
                    }
                });
        var ckbox6 = $('.mod_time_flag');
        $('.mod_time_flag').on('click',function () {
                    if (ckbox6.is(':checked')) {
                        $(this).val(1);
                    } else {
                        $(this).val(0);
                    }
                });    


      $('body').on('click','.activebt', function()
      {
           var id = $(this).attr('dataid');
           var active = $(this).attr('data');
           if(active==1)
           {
               var ac=0;
               var url = $('#url').val();
               var thiss = $(this);
               $.get(url+'/admin/health/active/'+ac +'/'+id, function(data)
               {
                    thiss.parent().html(data); 
               });
           }else
           {
              var ac = 1;
              var url = $('#url').val();
              var thiss = $(this);
              $.get(url+'/admin/health/active/'+ac +'/'+id, function(data)
               {
                    thiss.parent().html(data); 
               });
           }
      });

      $('body').on('click','.viewmore', function()
      {
            $(this).parent().next().toggle();
      });

    });

    </script>
@endsection('script')

