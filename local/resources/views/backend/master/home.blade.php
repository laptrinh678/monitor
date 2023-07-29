@extends('backend.master.index')
@section('title')
<title>Trang chủ System Monitor</title>
@endsection('title')
@section('header_style')
<link rel="stylesheet" type="text/css" href="vendors/select2/css/select2.min.css" />
<link rel="stylesheet" type="text/css" href="vendors/select2/css/select2-bootstrap.css" />
<link rel="stylesheet" type="text/css" href="vendors/datatables/css/dataTables.bootstrap.css">
<link href="css/pages/tables.css" rel="stylesheet" type="text/css"> 
<link href="vendors/modal/css/component.css" rel="stylesheet" />
<link href="css/pages/advmodals.css" rel="stylesheet" /> 
@endsection('header_style')
@section('content')
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <!--section starts-->
                <h3 class="service">
                    <ol class="breadcrumb">
                    <li>
                        <a href="javascript::voild(0)">
                            <i class="livicon" data-name="home" data-size="14" data-loop="true"></i> Home
                        </a>
                    </li>
                    <li>
                        <a href="javascript::voild(0)">Service</a>
                    </li>
                    <li class="active">All</li>
                   
                   
                   </ol>
                    
                </h3>
                
            </section>
            <!--section ends-->
           <section class="content">
  <ul class="nav nav-tabs homenav">
    <li class="active"><a data-toggle="tab" href="#home">Home</a></li>
    <li><a data-toggle="tab" href="#menu1">Cảnh báo thứ cấp</a></li>
     @if(Auth::user()->level>0)
    <li><a target="_blank" href="http://10.60.99.203:8712/WEB/login.xhtml">Webadmin</a><li><a target="_blank" href="http://10.58.244.203:8080/jenkins/login?from=%2Fjenkins%2F">Jenkin</a></li>
   <li><a target="_blank" href="http://jira.digital.vn/secure/Dashboard.jspa">Jira</a></li>
   <li><a target="_blank" href="http://10.58.244.203:8456/?orgId=1">Grafana</a></li>
   <li><a target="_blank" href="http://10.58.244.167:9000/alerts">GrayLog</a></li>
   <li><a target="_blank" href="http://confluence.digital.vn/pages/viewpage.action?pageId=13239917">Confluence</a></li>
    <li><a target="_blank" href="https://10.60.106.216:8088/v2-homepage.html">Econtack</a></li>
    <li id="sele">
       <select id="select21" class="form-control select2">
                <option value="">Select value...</option>
                  <option value="HI">072000 - Chuyển đổi gói dịch vụ BankPlus</option>
                <option value="AK">610000 -Thanh toán cước viễn thông</option>
              
                <option value="HI">600000 - Lấy mã xác thực</option>
                <option value="HI">641000 - Lấy thông tin CK theo số TK</option>
                <option value="HI">642000 - Lấy mã xác thực và tên người nhận</option>
                <option value="HI">640001 - Chuyển khoản theo số TK</option>
                 <option value="HI">642001 - Chuyển khoản ngoài ngân hàng</option>
                <option value="HI">645000 - Chuyển tiền tại quầy</option>
                <option value="HI">649000  - Chuyển tiền không PIN</option>
                <option value="HI">640000  - Chuyển khoản theo số tài khoản</option>
                <option value="HI">643000  - TB kết quả chuyển tiền ngoài NH</option>
                <option value="HI">311000 - Lấy số dư BankPlus không PIN</option>
                  <option value="HI">300000 - Kích hoạt thẻ</option>
                 <option value="HI">400300 - Nạp tiền vào STK/Số thẻ qua BankNet</option>
                  <option value="HI">821000 - Chuyển tiền theo số thẻ ngoài NH</option>
                <option value="HI">820000 - OTP Chuyen tien theo so the, OTP Smart Link</option>    <option value="HI">770000 - TT dịch vụ kênh ngoài Mobile</option>
                <option value="HI">050000 - Truy vấn thông tin khách hàng</option> 
                <option value="HI">330000 - Xác nhận trả PIN/Thẻ -VCB</option>  
                <option value="HI">300009  - Giao dịch thanh toán qua QRCode</option> 
                <option value="HI">026000  - ĐK Trọn gói vô danh cho Thuê bao mới</option>  
                 <option value="HI">400100  - Nạp tiền vào TK thanh toán</option>                            
        </select>
        
    </li>
   
   
   @endif
    
    <!--<li><a data-toggle="tab" href="#menu3">Menu 3</a></li> -->
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
         <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 listDataHome">
                        <div class="panel panel-success filterable">
                              <div class="panel-body table-responsive">
                                 Show/Hide
                                <div class="btn-group showhide" style="margin:10px 0;">
                                    <button type="button" class=" btn btn-default stt" >Stt</button>
                                    <button type="button" class=" btn btn-default hd" >Hành động</button>
                                    <button type="button" class=" btn btn-default md" >Mức độ CB</button>
                                    <button type="button" class=" btn btn-default se" >Services</button>
                                    <button type="button" class=" btn btn-default pr" >Process</button>

                                    <button type="button" class=" btn btn-default er" >Error_code</button>
                                    <button type="button" class=" btn btn-default ername">ErrorName</button>
                                    <button type="button" class=" btn btn-default al" >alerts_description</button>
                                     <button type="button" class=" btn btn-default vl" >Value/Limited_value</button>
                                     <button type="button" class=" btn btn-default ti" >Time</button>
                                     <button type="button" class=" btn btn-default upti" >UpdateTime</button>
                                     <button type="button" class=" btn btn-default de" >Des -BP khắc phục</button>
                                     <button type="button" class=" btn btn-default mn" >Manage</button>
                                     <button type="button" class=" btn btn-default no">Node</button>
                                </div>
                                <table class="table table-striped table-bordered" id="table1">
                                    <thead>
                                        <tr>
                                            <th class="sttoff">Tt</th>
                                            <th class="hdoff">Actions</th>
                                            <th class="mdoff">Warning level</th>
                                            <th class="seoff">Services</th>
                                            <th class="proff">Process</th>
                                            <th class="eroff">Error_code</th>
                                            <th class="ernameoff">ErrorName</th>
                                            <th class="aloff">Alerts_description</th>
                                            <th class="vloff">Value/Limited_value</th>
                                            <th class="tioff">Time</th>
                                            <th class="uptioff">UpdateTime</th>
                                            <th class="deoff">Des (BP khắc phục)</th>
                                            <th class="mnoff">Manage</th>
                                            <th class="nooff">Node</th>
                                        </tr>
                                    </thead>
                                    <tbody class="dataCloseWaring">
                                       @foreach($data as $key=>$val) 
                                            <tr class=" @if($val->status==1){{'ViewOld2'}}@else{{''}}@endif">
                                            <td class="sttoff">{{$key +1}}</td>
                                            <td class="hdoff">      
                                            <span>
                                            <a href="javascript::voild(0)" class="viewmore" 
                                            data=
                                            '<?php 
                                            $arr=[]; 
                                            $arr['list_mobile'] = $val->list_mobile;
                                            $arr['process'] = $val->process;
                                            $arr['error'] = $val->error;
                                            $arr['error_name'] = $val->error_name;
                                            $arr['value'] = $val->value;
                                            $arr['limited_value'] = $val->limited_value;
                                            $arr['description'] = $val->description;
                                            $arr['id']=$val->id;
                                            $arr['level']=$val->level;
                                            $arr['service']=$val->service;
                                            $a = json_encode($arr);
                                            echo $a;
;                                            ?>' 
                                            key="{{$key}}"
                                            dowload='{{$val->filename}}'
                                            url='{{url("")}}'
                                            >
                                            <i class="fa fa-search-plus" aria-hidden="true"></i>
                                            </a>
                                            </span>
                                              <span style="color: #a4a5a3"  class="ViewOld">
                                                    @if($val->status==0)
                                                    <i class="fa fa-eye-slash" aria-hidden="true"></i>
                                                    @else($val->status==1)
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                    @endif  
                                                    <div>
                                                         @if($val->status==1)
                                                        <span class="label label-sm label-success">{{'Đã xem'}}</span>
                                                        @else
                                                        {{''}}
                                                        @endif
                                                        @if($val->TimeViewUser != null)
                                                        <span class="label label-sm label-warning">{{$val->TimeViewUser}}</span>
                                                        @else
                                                        {{''}}
                                                        @endif
                                                        @if($val->userView != null)
                                                        <span class="label label-sm label-info">{{$val->userView}}</span>
                                                        @else
                                                        {{''}}
                                                         @endif                                                         
                                                    </div>
                                                </span>                                              
                                                  <span>
                                                   <a href="javascript::voild(0)" class="Message">
                                                     <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                                     </a>
                                                </span>                                               
                                            </td>
                                            <td class="levelWarning mdoff">
                                                  @if($val->level==1)
                                                <span style="color: white">
                                                    Warning 
                                                    
                                                </span>
                                                @elseif($val->level==2)
                                                <span style="color: yellow">
                                                    Major 
                                                </span>
                                                @elseif($val->level==3)
                                                 <span style="color: red">
                                                Critical
                                                 </span>
                                                @endif
                                            </td>
                                            <td class="seoff">{{$val->service}}</td>
                                            <td class="proff">
                                                {{$val->process}}
                                          
                                            </td>
                                            
                                            <td>
                                                {{$val->error}}
                                            </td>

                                            <td class="eroff errorNa">
                                              
                                                <?php 
                                             echo substr( $val->lap,0,10 ).'...';
                                            ?>
                                            <div class="errorNaChil">

                                                <div class="turng">
                                                    <div class="turn2"></div>
                                                </div>
                                                {!!$val->lap!!}
                                            </div>
                                            </td>
                                            <td class="ernameoff errorNa">
                                            <?php 
                                             echo substr( $val->error_name,0,10 ).'...';
                                            ?>
                                            <div class="errorNaChil">

                                                <div class="turng">
                                                    <div class="turn2"></div>
                                                </div>
                                                {!!$val->error_name!!}
                                            </div>
                                           
                                            </td>
                                            
                                            <td class="aloff">{{$val->value}}/{{$val->limited_value}} -
                                              
                                              <?php 
                                              $a= str_replace('error_','',$val->error);
                                              ?>
                                              <a target="_blank" href="http://10.58.244.203:8456/d/asKu3H4Wz/payment_trans_his_new?orgId=1&from=<?php 
                                              $time= time()-61200; 
                                              echo $time .'000';
                                              ?>&to=<?php 
                                              $time1= time()+28800; 
                                              echo $time1 .'000';
                                              ?>&var-error_code={{$a}}&var-service_code=All&panelId=4&fullscreen">
                                              <i class="fa fa-eye" aria-hidden="true"></i> 
                                                 Grafana
                                              </a>
                                            </td>
                                             <td class="tioff">
                                                   {{date('d-m-Y H:i:s',strtotime($val->time))}}
                                            </td>
                                            <td class="uptioff">                                                  
                                                    {{date('d-m-Y H:i:s',strtotime($val->update_time))}}
                                            </td>
                                             <td class="deoff hometd errorNa">
                                                <?php 
                                                 echo substr( $val->description,0,20 ).'...';
                                                ?>
                                                @if($val->description != '')
                                                <div class="errorNaChil">

                                                <div class="turng">
                                                    <div class="turn2"></div>
                                                </div>
                                                {!!$val->description!!}
                                               </div>
                                               @else
                                               {{''}}
                                               @endif   
                                            @if($val->filename != '')
                                               <p> File HD xử lý
                                                <a href="{{url('admin/error/dowload')}}/{{$val->filename}}" class="dowload">
                                                    <i class="fa fa-cloud-download" aria-hidden="true"></i>
                                               </a> 
                                              </p>   
                                            @else
                                            {{''}}
                                            @endif          
                                            </td>       
                                           
                                            <td class="mnoff">
                                                 {{$val->manage_service}}
                                            </td>
                                             <td class="nooff">
                                                 {{$val->node}}
                                            </td>                                
                                        </tr>
                                       @endforeach
                                    </tbody>
                              
                                </table>
                            </div>
    
                          </div>
                       
                    </div>
                </div>
    </div>
    <div id="menu1" class="tab-pane fade">
        <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 listDataHome">
                        <div class="panel panel-primary filterable">
                          
                            <div class="panel-body table-responsive">
                                Toggle Column:
                                <div class="btn-group showhide" style="margin:10px 0;" id="thucap">
                                     <button type="button" class=" btn btn-default stt" >Stt</button>
                                    <button type="button" class=" btn btn-default hd" >Hành động</button>
                                    <button type="button" class=" btn btn-default md" >Mức độ CB</button>
                                    <button type="button" class=" btn btn-default se" >Services</button>
                                    <button type="button" class=" btn btn-default pr" >Process</button>

                                    <button type="button" class=" btn btn-default er" >Error_code</button>
                                    <button type="button" class=" btn btn-default ername">ErrorName</button>
                                    <button type="button" class=" btn btn-default al" >alerts_description</button>
                                     <button type="button" class=" btn btn-default vl" >Value/Limited_value</button>
                                     <button type="button" class=" btn btn-default ti" >Time</button>
                                     <button type="button" class=" btn btn-default upti" >UpdateTime</button>
                                     <button type="button" class=" btn btn-default de" >Des -BP khắc phục</button>
                                     <button type="button" class=" btn btn-default mn" >Manage</button>
                                     <button type="button" class=" btn btn-default no">Node</button>
                                </div>
                                <table class="table table-striped table-bordered" id="table3">
                                    <thead>
                                        <tr>
                                            <th class="sttoff">Stt</th>
                                            <th class="hdoff">Actions</th>
                                            <th class="mdoff">Warning level</th>
                                            <th class="seoff">Services</th>
                                            <th class="proff">Process</th>
                                            <th class="eroff">Error_code</th>
                                            <th class="ernameoff">ErrorName</th>
                                            <th class="aloff">alerts_description</th>
                                            <th class="vloff">Value/Limited_value</th>
                                            <th class="tioff">Time</th>
                                            <th class="uptioff">UpdateTime</th>
                                            <th class="deoff">Des (BP khắc phục)</th>
                                            <th class="mnoff">Manage</th>
                                            <th class="nooff">Node</th>
                                        </tr>
                                    </thead>
                                           <tbody class="dataCloseWaring2">
                                       @foreach($data2 as $key=>$val) 
                                            <tr class=" @if($val->status==1){{'ViewOld2'}}@else{{''}}@endif">
                                            <td class="sttoff">{{$key +1}}</td>
                                            <td class="hdoff">      
                                            <span>
                                            <a href="javascript::voild(0)" class="viewmore2" 
                                            data=
                                            '<?php 
                                            $arr=[]; 
                                            $arr['list_mobile'] = $val->list_mobile;
                                            $arr['process'] = $val->process;
                                            $arr['error'] = $val->error;
                                            $arr['error_name'] = $val->error_name;
                                            $arr['value'] = $val->value;
                                            $arr['limited_value'] = $val->limited_value;
                                            $arr['description'] = $val->description;
                                            $arr['id']=$val->id;
                                            $arr['level']=$val->level;
                                            $arr['service']=$val->service;
                                            $a = json_encode($arr);
                                            echo $a;
;                                            ?>' 
                                            key="{{$key}}"
                                            dowload='{{$val->filename}}'
                                            url='{{url("")}}'
                                            >
                                            <i class="fa fa-search-plus" aria-hidden="true"></i>
                                            </a>
                                            </span>
                                                <span style="color: #a4a5a3"  class="ViewOld">
                                                    @if($val->status==0)
                                                    <i class="fa fa-eye-slash" aria-hidden="true"></i>
                                                    @else($val->status==1)
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                    @endif  
                                                    <div>
                                                         @if($val->status==1)
                                                        <span class="label label-sm label-success">{{'Đã xem'}}</span>
                                                        @else
                                                        {{''}}
                                                        @endif
                                                        @if($val->TimeViewUser != null)
                                                        <span class="label label-sm label-warning">{{$val->TimeViewUser}}</span>
                                                        @else
                                                        {{''}}
                                                        @endif
                                                        @if($val->userView != null)
                                                        <span class="label label-sm label-info">{{$val->userView}}</span>
                                                        @else
                                                        {{''}}
                                                         @endif                                                         
                                                    </div>
                                                </span>                                              
                                                  <span>
                                                   <a href="javascript::voild(0)" class="Message">
                                                     <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                                     </a>
                                                </span>                                               
                                            </td>
                                            <td class="mdoff levelWarning">
                                                  @if($val->level==1)
                                                <span style="color: white">
                                                    Warning 
                                                    
                                                </span>
                                                @elseif($val->level==2)
                                                <span style="color: yellow">
                                                    Minor
                                                    
                                                </span>
                                                @elseif($val->level==3)
                                                 <span style="color: red">
                                                 Crical
                                                  
                                                 </span>
                                                @endif
                                            </td>
                                            <td class="seoff">{{$val->service}}</td>
                                            <td class="proff">
                                                {{$val->process}}
                                          
                                            </td>
                                            
                                            <td class="eroff">
                                                {{$val->error}}
                                            </td>

                                            <td class="ernameoff">
                                                {{$val->lap}}
                                            </td>
                                            <td class="aloff errorNa">
                                            <?php 
                                             echo substr( $val->error_name,0,10 ).'...';
                                            ?>
                                            <div class="errorNaChil">

                                                <div class="turng">
                                                    <div class="turn2"></div>
                                                </div>
                                                {!!$val->error_name!!}
                                            </div>
                                           
                                            </td>
                                            
                                            <td class="vloff">
                                              {{$val->value}}/{{$val->limited_value}}
                                               <?php 
                                              $a= str_replace('error_','',$val->error);
                                              ?>
                                              <a target="_blank" href="http://10.58.244.203:8456/d/asKu3H4Wz/payment_trans_his_new?orgId=1&from=<?php 
                                              $time= time()-61200; 
                                              echo $time .'000';
                                              ?>&to=<?php 
                                              $time1= time()+28800; 
                                              echo $time1 .'000';
                                              ?>&var-error_code={{$a}}&var-service_code=All&panelId=4&fullscreen">
                                              <i class="fa fa-eye" aria-hidden="true"></i> 
                                                 Grafana
                                              </a>
                                            </td>
                                             <td class="tioff">
                                                   {{date('d-m-Y H:i:s',strtotime($val->time))}}
                                            </td>
                                            <td class="uptioff">                                                  
                                                    {{date('d-m-Y H:i:s',strtotime($val->update_time))}}
                                            </td>
                                             <td class="deoff hometd errorNa">
                                                  <?php 

                                                 echo substr( $val->description,0,20 ).'...';
                                                ?>
                                                @if($val->description != '')
                                                <div class="errorNaChil">

                                                <div class="turng">
                                                    <div class="turn2"></div>
                                                </div>
                                                {!!$val->description!!}
                                               </div>
                                               @else
                                               {{''}}
                                               @endif   
                                            @if($val->filename != '')
                                               <p> File HD xử lý
                                                <a href="{{url('admin/error/dowload')}}/{{$val->filename}}" class="dowload">
                                                    <i class="fa fa-cloud-download" aria-hidden="true"></i>
                                               </a> 
                                              </p>   
                                            @else
                                            {{''}}
                                            @endif 
                                            </td>       
                                           
                                            <td class="mnoff">
                                                 {{$val->manage_service}}
                                            </td>
                                             <td class="nooff">
                                                 {{$val->node}}
                                            </td>                                
                                        </tr>
                                       @endforeach
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
    </div>
    <div id="menu2" class="tab-pane fade">
      <h3>Menu 2</h3>
      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
    </div>
    <div id="menu3" class="tab-pane fade">
      <h3>Menu 3</h3>
      <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
    </div>
  </div>
</section>

            <section class="content" id="printlap">
             
            </section>
            <!-- content -->
              <!-- ajax-modal modal-->
                    <div class="modal fade in ajax-modal" tabindex="-1" role="dialog" aria-hidden="false" key="">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <span>
                                        <i class="livicon" data-name="sun" data-size="20" data-c="#fff" data-hc="#fff" data-loop="true" id="livicon-188">
                                        </i>
                                    </span>
                                    <span class="modal-title">
                                    </span>
                                    <span class="clickS">
                                        <a href="javascript::voild(0)" class="closeModal">
                                        <i class="fa fa-times"  aria-hidden="true"></i>
                                    </a>
                                </span>
                                </div>
                                <div class="modal-body">
                                    <ul class="nav nav-tabs">
                                        <li class="active">
                                            <a href="#tab1" data-toggle="tab">
                                               <i class="livicon" data-name="notebook" data-size="16" data-c="#fff" data-hc="#fff" data-loop="true" id="livicon-143" style="width: 50px; height: 50px;">
                                              </i>
                                                Chi tiết cảnh báo
                                            </a>
                                        </li>
                                       <li>
                                           <a href="#CloseWarningAll" data-toggle="tab">
                                             <i class="livicon" data-name="plane-down" data-size="16" data-c="#fff" data-hc="#fff" data-loop="true" id="livicon-150" style="width: 50px; height: 50px;">
                                          
                                           </i>
                                           Đóng cảnh báo
                                          </a>
                                       </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab1">
                        <div class="panel panel-primary" id="hidepanel1">
                            <div class="panel-body">
                                <div class="form-horizontal">
                                    <fieldset>
                                     
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="name">Mức độ cảnh báo</label>
                                            <div class="col-md-9">
                                                <input id="name" name="name" type="text" placeholder="" class="form-control level" value="">
                                            </div>
                                        </div>
                                       <div class="form-group">
                                            <label class="col-md-3 control-label" for="email">Process</label>
                                            <div class="col-md-9">
                                                <input id="email" name="process" type="text" placeholder="" class="form-control process"></div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="email">Error</label>
                                            <div class="col-md-9">
                                                <input id="Error" name="Error" type="text" placeholder="" class="form-control Error"></div>
                                        </div>
                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="email">Error_name</label>
                                            <div class="col-md-9">
                                                

                                                <textarea class="form-control resize_vertical description Error_name" id="Error" name="Error_name" placeholder="Please enter your message here..." rows="5"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="email">Value</label>
                                            <div class="col-md-9">
                                                <input id="Value" name="Value" type="text" placeholder="" class="form-control Value"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="email">
                                            Limited_Value</label>
                                            <div class="col-md-9">
                                                <input id="Value" name="Value" type="text" placeholder="" class="form-control Limited_Value"></div>
                                        </div>
                                        
                                            <div class="form-group">
                                            <label class="col-md-3 control-label" for="message">Description
                                                <br>(Biện pháp khắc phục)
                                            </label>
                                            <div class="col-md-9">
                                                <textarea class="form-control resize_vertical description" id="message" name="description" placeholder="Please enter your message here..." rows="5"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group"> 
                                                <label class="col-md-3 control-label" for="message">File hướng dẫn xử lý
                                            </label>   
                                              <div class="col-md-9">
                                                    <span class="filename" style="color: red">  </span>
                                                    <a href="{{url('admin/error/dowloaderror')}}" class="btn btn-success solve_dow">Dowload File</a>     
                                              </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12 text-center">
                                                <button  class="btn btn-responsive btn-primary btn-sm identification">
                                                    <i class="livicon" data-name="pencil" data-size="15" data-c="#fff" data-hc="#fff" data-loop="true" id="livicon-146" style="width: 50px; height: 50px;">
                                                       
                                                    </i>
                                                Xác nhận
                                              </button>
                                                 <button class="btn btn-responsive btn-danger btn-sm Cancel">
                                                     <i class="livicon" data-name="printer" data-size="16" data-c="#fff" data-hc="#fff" data-loop="true" id="livicon-155" style="width: 50px; height: 50px;">
                                                       
                                                    </i>
                                                 Hủy bỏ
                                             </button>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                                        </div>
                                <div class="tab-pane" id="CloseWarningAll">
                                <div class="panel panel-primary" id="hidepanel1">
                            
                                <div class="panel-body">
                                <div class="form-horizontal" >
                                    <fieldset>
                                        <div class="form-group reason">
                                            <label class="col-md-3 control-label" for="message">Nguyên nhân(*)
                                            </label>
                                            <div class="col-md-9">
                                                <div class="form-control savedata">
                                             
                                                 </div>
                                            <div class="form-control listreason">
                                                     
                                                <ul class="ulParent">
                                                      @foreach($groupReason as $key=>$val) 
                                                  <li>
                                                    <p class="show3">
                                                         <a href="javascript::voild(0)" class="show2">
                                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                                         </a>
                                                         <a href="javascript::voild(0)" class="hide2">
                                                            <i class="fa fa-minus" aria-hidden="true"></i>
                                                         </a> 
                                                         {{$key+1}}:{{$val->name}}
                                                    </p>
                                                        <ul class="liChider">
                                                            <?php 
                                                             $reason = DB::table('reasonGroup')->select('name')->where('parentId',$val->id)->get();
                                                             foreach($reason as $k=>$v)
                                                             {
                                                                echo '<li>';
                                                                echo $key+1;
                                                                echo '.';
                                                                echo $k+1;
                                                                echo $v->name;
                                                                echo '</li>';
                                                             }
                                                             
                                                            ?> 
                                                        </ul>
                                                  </li>
                                                  @endforeach
                                               
                                                </ul>
                                            </div> 
                                             
                                            </div>
                                        </div>
                                       
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="message">Ảnh hưởng(*)</label>
                                            <div class="col-md-9">
                                                <textarea class="form-control resize_vertical description" id="dataFfect" name="affect"  rows="5" required=""></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="message">Cách khắc phục(*)</label>
                                            <div class="col-md-9">
                                                <textarea class="form-control resize_vertical description" id="idHowtofix" name="howtofix"  rows="5" required=""></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="message">Ghi chú</label>
                                            <div class="col-md-9">
                                                <textarea class="form-control resize_vertical description" id="Iddescription" name="description"  rows="5" required=""></textarea>
                                            </div>
                                            <input type="hidden" name="data" id="dataWarringModal" value="">
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12 text-center">
                                                <button type="submit" class="btn btn-responsive btn-primary btn-sm confirm">
                                                    <i class="livicon" data-name="legal" data-size="15" data-c="#fff" data-hc="#fff" data-loop="true" id="livicon-126" style="width: 50px; height: 50px;"> 
                                                    </i>
                                                Xác nhận
                                               </button>
                                                 <button class="btn btn-responsive btn-danger btn-sm deleteHome">
                                                    <i class="livicon" data-name="trash" data-size="15" data-c="#fff" data-hc="#fff" data-loop="true" id="livicon-197" style="width: 50px; height: 50px;">
                                                    </i>
                                                 Hủy bỏ
                                             </button>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                                        </div>
                                  
                                    </div>
                                    
                                </div>
                                <div class="modal-footer">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                   
                    <!-- end Close Wanring -->
                    <!-- gửi tin nhắn thông báo -->
                    <div class="modal fade in MessageModal" tabindex="-1" role="dialog" aria-hidden="false" key="">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <span class="modal-title">
                                        Gửi tin nhắn 
                                    </span>
                                    <span class="clickS">
                                        <a href="javascript::voild(0)" class="closeModal">
                                        <i class="fa fa-times"  aria-hidden="true"></i>
                                    </a>
                                </span>
                                </div>
                                <div class="modal-body">
                                    <ul class="nav nav-tabs">
                                        <li class="active">
                                            <a href="#tab3" data-toggle="tab">
                                                <i class="livicon" data-name="clock" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                                Chi tiết thông tin
                                            </a>
                                        </li>
                                       
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab4">
                                              <!--basic form starts-->
                        <div class="panel panel-primary" id="hidepanel1">
                            
                            <div class="panel-body">
                                <div class="form-horizontal">
                                    <fieldset>
                                        <!-- Name input-->
                                        <div class="form-group reason">
                                            <label class="col-md-3 control-label" for="message">Số điện thoại nhận
                                           
                                            </label>
                                            <div class="col-md-9">
                                               <input type="number" class="form-control phonenumber" name="phone">
                                            </div>
                                        </div>
                                       
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="message">Nội dung(*)</label>
                                            <div class="col-md-9">
                                                <textarea class="form-control resize_vertical contentmessage" id="message" name="description"  rows="5"></textarea>
                                            </div>
                                        </div>

                                        <!-- Form actions -->
                                        <div class="form-group">
                                            <div class="col-md-12 text-center">
                                                <button  class="btn btn-responsive btn-primary btn-sm" id="idconfirm">Xác nhận</button>
                                                 <button type="reset" class="btn btn-responsive btn-danger btn-sm ">Hủy bỏ</button>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                                        </div>
                                       
                                    </div>
                                    
                                </div>
                                <div class="modal-footer">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
<!-- modal xu ly nut viewmore2 -->
 <!-- ajax-modal modal-->
                    <div class="modal fade in ajax-modal2" tabindex="-1" role="dialog" aria-hidden="false" key="">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <span>
                                       <i class="livicon" data-name="magic" data-size="18" data-c="#fff" data-hc="#fff" data-loop="true" id="livicon-131" style="width: 8px; height: 8px;">
                                       </i>
                                    </span>
                                    <span class="modal-title">
                                    </span>
                                    <span class="clickS">
                                        <a href="javascript::voild(0)" class="closeModal">
                                        <i class="fa fa-times"  aria-hidden="true"></i>
                                    </a>
                                </span>
                                </div>
                                <div class="modal-body">
                                    <ul class="nav nav-tabs">
                                        <li class="active">
                                            <a href="#tab1" data-toggle="tab">
                                              <i class="livicon" data-name="address-book" data-size="18" data-c="#fff" data-hc="#fff" data-loop="true" id="livicon-384" style="width: 8px; height: 8px;"></i>
                                                Chi tiết cảnh báo
                                            </a>
                                        </li>
                                       <li>
                                           <a href="#CloseWarningAll2" data-toggle="tab">
                                             <i class="livicon" data-name="adjust" data-size="18" data-c="#fff" data-hc="#fff" data-loop="true" id="livicon-47" style="width: 8px; height: 8px;">
                                           
                                            </i>
                                           Đóng cảnh báo
                                          </a>
                                       </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab1">
                        <div class="panel panel-primary" id="hidepanel1">
                            <div class="panel-body">
                                <div class="form-horizontal">
                                    <fieldset>
                                     
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="name">Mức độ cảnh báo</label>
                                            <div class="col-md-9">
                                                <input id="name" name="name" type="text" placeholder="" class="form-control level" value="">
                                            </div>
                                        </div>
                                       <div class="form-group">
                                            <label class="col-md-3 control-label" for="email">Process</label>
                                            <div class="col-md-9">
                                                <input id="email" name="process" type="text" placeholder="" class="form-control process"></div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="email">Error</label>
                                            <div class="col-md-9">
                                                <input id="Error" name="Error" type="text" placeholder="" class="form-control Error"></div>
                                        </div>
                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="email">Error_name</label>
                                            <div class="col-md-9">
                                                

                                                <textarea class="form-control resize_vertical description Error_name" id="Error" name="Error_name" placeholder="Please enter your message here..." rows="5"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="email">Value</label>
                                            <div class="col-md-9">
                                                <input id="Value" name="Value" type="text" placeholder="" class="form-control Value"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="email">
                                            Limited_Value</label>
                                            <div class="col-md-9">
                                                <input id="Value" name="Value" type="text" placeholder="" class="form-control Limited_Value"></div>
                                        </div>
                                        
                                            <div class="form-group">
                                            <label class="col-md-3 control-label" for="message">Description
                                                <br>(Biện pháp khắc phục)
                                            </label>
                                            <div class="col-md-9">
                                                <textarea class="form-control resize_vertical description" id="message" name="description" placeholder="Please enter your message here..." rows="5"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group"> 
                                                <label class="col-md-3 control-label" for="message">File hướng dẫn xử lý
                                            </label>   
                                              <div class="col-md-9">
                                                    <span class="filename" style="color: red">  </span>
                                                    <a href="{{url('admin/error/dowloaderror')}}" class="btn btn-success solve_dow">Dowload File</a>     
                                              </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12 text-center">
                                                <button  class="btn btn-responsive btn-primary btn-sm identification">
                                                   
                                                Xác nhận
                                              </button>
                                                 <button class="btn btn-responsive btn-danger btn-sm Cancel">
                                                    
                                                 Hủy bỏ
                                             </button>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                                        </div>
                                <div class="tab-pane" id="CloseWarningAll2">
                                <div class="panel panel-primary" id="hidepanel1">
                            
                                <div class="panel-body">
                                <div class="form-horizontal" >
                                    <fieldset>
                                        <div class="form-group reason">
                                            <label class="col-md-3 control-label" for="message">Nguyên nhân(*)
                                            </label>
                                            <div class="col-md-9">
                                                <div class="form-control savedata">
                                             
                                            </div>
                                            <div class="form-control listreason">
                                                     
                                                <ul class="ulParent">
                                                      @foreach($groupReason as $key=>$val) 
                                                  <li>
                                                    <p class="show3">
                                                         <a href="javascript::voild(0)" class="show2">
                                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                                         </a>
                                                         <a href="javascript::voild(0)" class="hide2">
                                                            <i class="fa fa-minus" aria-hidden="true"></i>
                                                         </a> 
                                                         {{$key+1}}:{{$val->name}}
                                                    </p>
                                                        <ul class="liChider">
                                                            <?php 
                                                             $reason = DB::table('reasonGroup')->select('name')->where('parentId',$val->id)->get();
                                                             foreach($reason as $k=>$v)
                                                             {
                                                                echo '<li>';
                                                                echo $key+1;
                                                                echo '.';
                                                                echo $k+1;
                                                                echo $v->name;
                                                                echo '</li>';
                                                             }
                                                             
                                                            ?> 
                                                        </ul>
                                                  </li>
                                                  @endforeach
                                               
                                                </ul>
                                            </div> 
                                             
                                            </div>
                                        </div>
                                       
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="message">Ảnh hưởng(*)</label>
                                            <div class="col-md-9">
                                                <textarea class="form-control resize_vertical description" id="dataFfect2" name="affect"  rows="5" required=""></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="message">Cách khắc phục(*)</label>
                                            <div class="col-md-9">
                                                <textarea class="form-control resize_vertical description" id="idHowtofix2" name="howtofix"  rows="5" required=""></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="message">Ghi chú</label>
                                            <div class="col-md-9">
                                                <textarea class="form-control resize_vertical description" id="Iddescription2" name="description"  rows="5" required=""></textarea>
                                            </div>
                                            <input type="hidden" name="data" id="dataWarringModal2" value="">
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12 text-center">
                                                <button type="submit" class="btn btn-responsive btn-primary btn-sm confirm2">
                                                Xác nhận
                                               </button>
                                                 <button class="btn btn-responsive btn-danger btn-sm deleteHome">
                                                   
                                                 Hủy bỏ
                                             </button>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                                        </div>
                                  
                                    </div>
                                    
                                </div>
                                <div class="modal-footer">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                   
<!-- end modal xu ly nut viewmore2 -->
                    <input type="hidden" value="{{url('')}}" id="url">

 <!-- bao cao tong hop -->

<!-- end bao cao tong hop -->

@endsection
@section('script')
   <script src="vendors/jquery.easy-pie-chart/js/easypiechart.min.js"></script>
       <script src="vendors/jquery.easy-pie-chart/js/jquery.easypiechart.min.js"></script>
       <script src="js/jquery.easingpie.js"></script>
      <script type="text/javascript" src="vendors/datatables/js/jquery.dataTables.js"></script> 
      <script type="text/javascript" src="vendors/datatables/js/dataTables.bootstrap.js"></script> 
       <script type="text/javascript" src="vendors/select2/js/select2.js"></script>
      <script type="text/javascript" src="js/pages/table-advanced2.js"></script>  
    <script type="text/javascript">
        
        $(document).ready(function()      
        {
           setInterval(function()
           {
              var url = $('#url').val();
              $.get( url+'/admin/ajaxdata', function(data)
                    {
                        $('#table1').html(data);                                       
                    });
            },10000);

           setInterval(function()
           {
              var url = $('#url').val();
              $.get( url+'/admin/different', function(data)
                    {
                        $('#table3').html(data);                                       
                    });
            },10000);

            $('body').on('click', '.viewmore', function() 
            {
                var data = $(this).attr("data");
                var dowload1 = $(this).attr("dowload");
                var dowload = $(this).attr("url")+'/admin/error/dowload/'+ dowload1;  
                var dowload3 = $(this).attr("url")+'/admin/error/dowloaderror';
                $(".filename").text(dowload1);
                if(dowload1 == '')
                    {
                        $(".solve_dow").hide();
                    }else
                    {  
                         $(".solve_dow").attr('href',dowload);
                    }
                $(this).parent().parent().parent().addClass('ViewOld2');
                var data2 = JSON.parse(data);
                var key  = data2.id;
                $('.ajax-modal').attr('key',key);
                var service = data2.service;
                $('.ajax-modal .modal-title').html(service);
                $('#dataWarringModal').val(key);
                var level = data2.level;
                if(level==1)
                {
                    $('.ajax-modal .form-horizontal .level').val('Warning');
                }else if(level==2)
                {
                    $('.ajax-modal .form-horizontal .level').val('Minor');
                }else if(level==3)
                {
                    $('.ajax-modal .form-horizontal .level').val('Crical');
                }
                var process = data2.process;
                $('.ajax-modal .form-horizontal .process').val(process);
                var error = data2.error;
                $('.ajax-modal .form-horizontal .Error').val(error);
                var Error_name = data2.error_name;
                $('.ajax-modal .form-horizontal .Error_name').val(Error_name);
                var value = data2.value;
                $('.ajax-modal .form-horizontal .Value').val(value);
                var Limited_Value = data2.limited_value;
                $('.ajax-modal .form-horizontal .Limited_Value').val(Limited_Value);
                var description = data2.description;
                $('.ajax-modal .form-horizontal #message').val(description);
                $('.ajax-modal').toggle();
                var view = 1;
                var thiss = $(this);
                var url = $('#url').val();
                $.get( url+'/admin/service/ajax/'+view+'/'+key, function(data){
                    //console.log(data);
                       thiss.parent().next().html(data);            
                    });
            });

            /*view more2*/
             $('body').on('click', '.viewmore2', function() 
            {
                var data = $(this).attr("data");
                var dowload1 = $(this).attr("dowload");
                var dowload = $(this).attr("url")+'/admin/error/dowload/'+ dowload1;  
                var dowload3 = $(this).attr("url")+'/admin/error/dowloaderror';
                $(".filename").text(dowload1);
                if(dowload1 == '')
                    {
                        $(".solve_dow").hide();
                    }else
                    {  
                         $(".solve_dow").attr('href',dowload);
                    }
                $(this).parent().parent().parent().addClass('ViewOld2');
                var data2 = JSON.parse(data);
                var key  = data2.id;
                $('.ajax-modal2').attr('key',key);
                var service = data2.service;
                $('.ajax-modal2 .modal-title').html(service);
                $('#dataWarringModal2').val(key);
                var level = data2.level;
                if(level==1)
                {
                    $('.ajax-modal2 .form-horizontal .level').val('Warning');
                }else if(level==2)
                {
                    $('.ajax-modal2 .form-horizontal .level').val('Minor');
                }else if(level==3)
                {
                    $('.ajax-modal2 .form-horizontal .level').val('Crical');
                }
                var process = data2.process;
                $('.ajax-modal2 .form-horizontal .process').val(process);
                var error = data2.error;
                $('.ajax-modal2 .form-horizontal .Error').val(error);
                var Error_name = data2.error_name;
                $('.ajax-modal2 .form-horizontal .Error_name').val(Error_name);
                var value = data2.value;
                $('.ajax-modal2 .form-horizontal .Value').val(value);
                var Limited_Value = data2.limited_value;
                $('.ajax-modal2 .form-horizontal .Limited_Value').val(Limited_Value);
                var description = data2.description;
                $('.ajax-modal2 .form-horizontal #message').val(description);

                $('.ajax-modal2').toggle();
                var view = 1;
                var thiss = $(this);
                var url = $('#url').val();
                $.get( url+'/admin/service/ajax/'+view+'/'+key, function(data){
                    //console.log(data);
                       thiss.parent().next().html(data);            
                    });
            });
            /*end viewmore2*/

            $('.closeModal').click(function()
            {
                $(this).parent().parent().parent().parent().parent().hide();
            });
            $('.identification').click( function()
            {
                $('.ajax-modal').hide();
            });

            $('body').on('click', '.confirm', function() 
            {   
                     var reasonData = $('.savedata').text();
                     var reason = reasonData.toString();
                     var DFfect = $('#dataFfect').val();
                     var idHfix = $('#idHowtofix').val();
                     var Des = $('#Iddescription').val();

                if(reasonData==''|| DFfect==''||idHfix==''|| Des=='')
                {
                     alert('Bạn vui lòng nhập đầy đủ thông tin vào các mục');
                }
                else
                {
                    var Idhis = $('#dataWarringModal').val();
                    var url = $('#url').val();
                $.get(url+'/admin/service/reason/'+reason+'/'+DFfect+'/'+idHfix +'/'+ Des+'/'+Idhis, function(data){
                         $('.dataCloseWaring').html(data);
                         $('#idHowtofix').val('');
                         $('#dataFfect').val('');
                         $('#Iddescription').val('');
                         $('#dataWarringModal').val('');
                         $('.savedata').html('');                                                 
                        });
                     $('.ajax-modal').hide();
                }    
                 
            });

            /*confirm2*/
             $('body').on('click', '.confirm2', function() 
            {   
                     var reasonData = $('.ajax-modal2 .savedata').text();
                     var reason = reasonData.toString();
                     var DFfect = $('#dataFfect2').val();
                     var idHfix = $('#idHowtofix2').val();
                     var Des = $('#Iddescription2').val();
                if(reasonData==''|| DFfect==''||idHfix==''|| Des=='')
                {
                     alert('Bạn vui lòng nhập đầy đủ thông tin vào các mục');
                }
                else
                {
                    var Idhis = $('#dataWarringModal2').val();
                    var url = $('#url').val();
                $.get(url+'/admin/service/reason2/'+reason+'/'+DFfect+'/'+idHfix +'/'+ Des+'/'+Idhis, function(data)
                {
                  console.log(data);
                         $('.dataCloseWaring2').html(data);
                         $('#idHowtofix2').val('');
                         $('#dataFfect2').val('');
                         $('#Iddescription2').val('');
                         $('#dataWarringModal2').val('');
                         $('.savedata').html('');                                                 
                });
                     $('.ajax-modal2').hide();
                }    
                 
            });
            /*endconfirm2*/



            $('body').on('click','.Message', function()
            {
                 $('.MessageModal').toggle();
            });
            
            $('body').on('click','.Cancel', function()
            {
                 $('.ajax-modal').hide();
            });

             $('#idconfirm').click(function()
            {
                 var item  ={};
                 item.phone = $('.phonenumber').val();
                 item.mess= $('.contentmessage').val();
                 $('.MessageModal').hide();
            });
            $('.searchHide').html('');
            /*show list nguyen nhan*/
             $('.savedata').click( function()
            {
                $('.ulParent').toggle();
            });
            $('.show2').click(function()
                {   
                    $(this).parent().next().toggle();
                    $(this).next().show();
                    $(this).hide();
                });
                $('.hide2').click(function()
                {
                    $(this).parent().next().hide();
                    $(this).prev().show();
                    $(this).hide();
                });
                
                $('.liChider>li').click(function()
                {
                    $('.savedata').empty();
                    var data = $(this).text();
                    $('.savedata').append('<span>'+data+ '<a class="delete" href="javascript::voild(0)" ><i class="fa fa-times-circle-o" aria-hidden="true"></i></a>'+'</span>');
                    $('.liChider>li').addClass('off');
                    $('.ulParent').hide();
                });

                $('body').on('click','.delete', function()
                {
                    $(this).parent().remove();
                })
            /*end nguyen nhan*/
            /*nut deleteHome*/
            $('.deleteHome').click(function()
            {
                     $('#idHowtofix').val('');
                     $('#dataFfect').val('');
                     $('#Iddescription').val('');
                     $('#dataWarringModal').val('');
                     $('.savedata').html('');
                     $('.ajax-modal').hide();
            });
            /*end deleteHome*/
            $('body').on('click','.stt', function()
            {
                 $('.sttoff').toggle();
                 $(this).toggleClass("red2");
            });
             $('body').on('click','.hd', function()
            {
                 $('.hdoff').toggle();
                  $(this).toggleClass("red2");
            });

             $('body').on('click','.md', function()
            {
                 $('.mdoff').toggle();
                  $(this).toggleClass("red2");
            });
             $('body').on('click','.se', function()
            {
                 $('.seoff').toggle();
                  $(this).toggleClass("red2");
            });
             $('body').on('click','.pr', function()
            {
                 $('.proff').toggle();
                  $(this).toggleClass("red2");
            });
            $('body').on('click','.er', function()
            {
                 $('.eroff').toggle();
                  $(this).toggleClass("red2");
            });
             $('body').on('click','.ername', function()
            {
                 $('.ernameoff').toggle();
                  $(this).toggleClass("red2");
            });
             $('body').on('click','.al', function()
            {
                 $('.aloff').toggle();
                  $(this).toggleClass("red2");
            });
             $('body').on('click','.vl', function()
            {
                 $('.vloff').toggle();
                  $(this).toggleClass("red2");
            });
            $('body').on('click','.upti', function()
            {
                 $('.uptioff').toggle();
                  $(this).toggleClass("red2");
            });
             $('body').on('click','.ti', function()
            {
                 $('.tioff').toggle();
                  $(this).toggleClass("red2");
            });
             $('body').on('click','.de', function()
            {
                 $('.deoff').toggle();
                  $(this).toggleClass("red2");
            });
            $('body').on('click','.mn', function()
            {
                 $('.mnoff').toggle();
                  $(this).toggleClass("red2");
            });
            $('body').on('click','.no', function()
            {
                 $('.nooff').toggle();
                  $(this).toggleClass("red2");
            });

            /*xu ly cho phan cb thu cap*/

                 $('body').on('click','#thucap.stt', function()
            {
                 $('#table3.sttoff').toggle();
                  $(this).toggleClass("red2");
            });
             $('body').on('click','#thucap.hd', function()
            {
                 $('#table3.hdoff').toggle();
                  $(this).toggleClass("red2");
            });

             $('body').on('click','#thucap.md', function()
            {
                 $('#table3.mdoff').toggle();
                  $(this).toggleClass("red2");
                // alert('kk');
                // $('#thucap.md').toggleClass("red");
            });
             $('body').on('click','#thucap.se', function()
            {
                 $('#table3.seoff').toggle();
                  $(this).toggleClass("red2");
            });
             $('body').on('click','#thucap.pr', function()
            {
                 $('#table3.proff').toggle();
                  $(this).toggleClass("red2");
            });
            $('body').on('click','#thucap.er', function()
            {
                 $('#table3.eroff').toggle();
                  $(this).toggleClass("red2");
            });
             $('body').on('click','#thucap.ername', function()
            {
                 $('#table3.ernameoff').toggle();
                  $(this).toggleClass("red2");
            });
             $('body').on('click','#thucap.al', function()
            {
                 $('#table3.aloff').toggle();
                  $(this).toggleClass("red2");
            });
             $('body').on('click','#thucap.vl', function()
            {
                 $('#table3.vloff').toggle();
                  $(this).toggleClass("red2");
            });
            $('body').on('click','#thucap.upti', function()
            {
                 $('#table3.uptioff').toggle();
                  $(this).toggleClass("red2");
            });
             $('body').on('click','#thucap.ti', function()
            {
                 $('#table3.tioff').toggle();
                  $(this).toggleClass("red2");
            });
             $('body').on('click','#thucap.de', function()
            {
                 $('#table3.deoff').toggle();
                  $(this).toggleClass("red2");
            });
            $('body').on('click','#thucap.mn', function()
            {
                 $('#table3.mnoff').toggle();
                  $(this).toggleClass("red2");
            });
            $('body').on('click','#thucap.no', function()
            {
                 $('#table3.nooff').toggle();
                  $(this).toggleClass("red2");
            });

            $('#sele .selection>span').removeClass('select2-selection--single');
            $('#sele .selection>span').css({padding:8});
            $('#sele .select2-selection__placeholder').text('Tìm kiếm Process');

            $('#sele2 .selection>span').removeClass('select2-selection--single');
            $('#sele2 .selection>span').css({padding:8});
            $('#sele2 .select2-selection__placeholder').text('Tìm cp_name');

            /*end canh bao thu cap*/
            /* xu ly kich thuoc man hinh fix with table*/
             var width = window.innerWidth;
              $('#table1').css({"width":width+300});
             $('#table3').css({"width":width});
        });
    </script>
@endsection('script')