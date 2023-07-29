@foreach($data2 as $k=>$v)
  <tr>
    <td>{{$k}}</td>
    <td>
      {{$v->ip_sour}}
    </td>
    <td>{{$v->ip_dest}}:{{$v->port_dest}}</td>
    <td>
      {{$v->cpu_usage}}/
      {{$v->ram_usage}}
    </td>
    
  
     <td>
      {{$v->max_file_size}}
     
     </td>
    <td> 
    {{$v->process_name}}
    </td>
    <td>
      <br>
      {{$v->partern}}
      <br>{{$v->disk_usage}}
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
        <span>
            <button data="{{$v->active}}" class="btn activebt @if($v->active==1){{'btn-success'}}@else{{'btn-danger'}}@endif" dataid="{{$v->id}}" >@if($v->active==1){{'ON'}}@else{{'OFF'}}@endif
           </button>
        </span>
       
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
                $arr['max_file_size']=$v->max_file_size;
                $arr['active']=$v->active;
                $arr['user_name']=$v->user_name;
                $arr['password']=$v->password;
                $arr['port_dest']=$v->port_dest;
                $arr['partern']=$v->partern;
                $arr['process_name']=$v->process_name;
                $arr['process_code']=$v->process_code;
                $a = json_encode($arr);
                echo $a;

             ?>' data-toggle="modal" data-target="#editcanender"
            partern="{{$v->partern}}"
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