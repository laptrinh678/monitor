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
    <th class="deoff">Des(BP khắc phục)</th>
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
    
    <td class="aloff">
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