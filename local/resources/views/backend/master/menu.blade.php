<!-- BEGIN SIDEBAR MENU -->
<ul id="menu" class="page-sidebar-menu">
  <li class="lisystem">
      <p>
              <i class="livicon" data-name="medal" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>
              <span class="title">Hệ thống</span>
              <span class="fa arrow"></span>
          </p>
    <ul class="sub-menu system">
       @foreach($service as $val)
        <li class="active">
            <a href="{{url('admin/service')}}/{{$val->id}}">
                 <i class="livicon" data-name="move" data-c="#EF6F6C" data-hc="#EF6F6C" data-size="18" data-loop="true"></i>
                <span class="title">{{$val->service_name}}</span>
            </a>
        </li>
        @endforeach
    </ul>
  </li>
   
    
    @if(Auth::user()->level>0)
       <li class="limenu">
          <p>
              <i class="livicon" data-name="medal" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>
              <span class="title">Khai báo</span>
              <span class="fa arrow"></span>
          </p>
        <ul class="sub-menu listmenu">
            <li>
                <a href="{{url('admin/service/listService')}}">
                   <i class="fa fa-angle-double-right"></i>
                   <span class="title">Khai báo Service</span>
                </a>
            </li>
             <li>
                <a href="{{url('admin/reason/list')}}">
                   <i class="fa fa-angle-double-right"></i>
                   <span class="title">Khai báo Nguyên nhân</span>
                </a>
            </li>
            <li>
                <a href="{{url('admin/error/list')}}">
                  <i class="fa fa-angle-double-right"></i>
                
                
                   <span class="title">Danh sách lỗi</span>
                </a>
            </li>
            
            <li>
                <a href="{{url('admin/process/list')}}">
                    <i class="fa fa-angle-double-right"></i>
                   <span class="title">Danh sách Process</span>
                </a>
            </li>
             <li>
                <a href="{{url('admin/fixerror/list')}}">
                    <i class="fa fa-angle-double-right"></i>
                   <span class="title">Ngưỡng Cảnh báo</span>
                </a>
            </li>
            <li>
                <a href="{{url('admin/confix/list')}}">
                    <i class="fa fa-angle-double-right"></i>
                   <span class="title">Config</span>
                </a>
            </li>
              <li>
                <a href="{{url('admin/health/list')}}">
                    <i class="fa fa-angle-double-right"></i>
                   <span class="title">Health</span>
                </a>
            </li>


             <li>
                <a href="{{url('admin/member/list')}}">
                    <i class="fa fa-angle-double-right"></i>
                   <span class="title">Danh sách user</span>
                </a>
            </li>
           <!--  <li>
              <a href="{{url('admin/live/ajax_upload')}}">
                  <i class="fa fa-angle-double-right"></i>
                 <span class="title">Upload</span>
              </a>
                      </li> -->
         
        </ul>
    </li>
  @else{{''}}
  @endif

      <li class="limenu2">
          <p>
              <i class="livicon" data-name="medal" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>
              <span class="title">View Grafana</span>
              <span class="fa arrow"></span>
          </p>
        <ul class="sub-menu listmenu2">
            <li>
                <a href="{{url('admin/grafana/tpp_trans_daily_his')}}">
                   <i class="fa fa-angle-double-right"></i>
                   <span class="title">Tpp_trans_daily_his</span>
                </a>
            </li>
             <li>
                <a href="{{url('admin/grafana/paymentTranHis')}}">
                   <i class="fa fa-angle-double-right"></i>
                   <span class="title">Payment_trans_his_new</span>
                </a>
            </li>
            <li>
                <a href="{{url('admin/grafana/mobile_service')}}">
                  <i class="fa fa-angle-double-right"></i>
                
                
                   <span class="title">Mobile_service</span>
                </a>
            </li>
            
            <li>
                <a href="{{url('admin/grafana/trans-gateway-egate')}}">
                    <i class="fa fa-angle-double-right"></i>
                   <span class="title">Trans-gateway-egate</span>
                </a>
            </li>
             <li>
                <a href="{{url('admin/grafana/trans-gateway-error')}}">
                    <i class="fa fa-angle-double-right"></i>
                   <span class="title">Trans-gateway-error</span>
                </a>
            </li>
            


        </ul>
    </li>
 
   <!--  <li class="active">
      <a href="{{url('admin/guimail/mail')}}">
         <i class="livicon" data-name="mail-alt" data-size="20" data-c="#FAAC58" data-hc="#FAAC58" data-loop="true" id="livicon-135" style="width: 10px; height: 10px;"></i>
    
          <span class="title">Gửi Email User </span>
      </a>
      </li>  -->
       <li class="active">
        <a href="{{url('admin/errorReport/list')}}">
         <i class="livicon" data-name="dashboard" data-size="20" data-c="#F4FA58" data-hc="#F4FA58" data-loop="true" id="livicon-92" style="width: 10px; height: 10px;">
         

        </i>

            <span class="title">Error-Report</span>
        </a>
    </li>
    <li class="active">
        <a href="{{url('admin/chatbox/list')}}">
          <i class="livicon" data-name="spinner-one" data-size="20" data-c="#F4FA58" data-hc="#F4FA58" data-loop="true" id="livicon-320" style="width: 10px; height: 10px;">
          </i>

            <span class="title">Chat- Báo cáo cv</span>
        </a>
    </li>
     <li class="active">
        <a href="{{url('admin/live/list')}}">
         <i class="livicon" data-name="unlink" data-size="20" data-c="#F4FA58" data-hc="#F4FA58" data-loop="true" id="livicon-433">
          
        </i>

            <span class="title">Thống kê-Trực cảnh báo</span>
        </a>
          
    </li>
   <!--  <li class="active">
      <a href="{{url('admin/search/list')}}">
       <i class="livicon" data-name="zoom-in" data-size="20" data-c="#F4FA58" data-hc="#F4FA58" data-loop="true" id="livicon-210">
        
      </i>
   
          <span class="title">Search Error</span>
      </a>
        
       </li> -->
    
</ul>
