@foreach($data2 as $k=>$v)
<tr>
<td>{{$k}}</td>
<td>
  {{$v->ip_sour}}
</td>

<td>{{$v->ip_dest}}</td>

<td>
  {{$v->ip_pro}}/
  {{$v->port_pro}}
</td>

<td>
   {{$v->port_dest}}
</td>
 <td>
  
  {{$v->process_name}}
 </td>
<td>
    
<button data="{{$v->active}}" class="btn activebt @if($v->active==1){{'btn-success'}}@else{{'btn-danger'}}@endif" dataid="{{$v->id}}" >@if($v->active==1){{'ON'}}@else{{'OFF'}}@endif</button>
</td>
<td>{{$v->user_pro}}</td>
<td>{{$v->pass_pro}}</td>
<td>
   <p align="left">
    @if(Auth::user()->level==2)
    <button class="btn btn-raised btn-warning editdata" 
    data='
    <?php 
    $arr =[];
    $arr['id']= $v->id;
    $arr['ip_sour']= $v->ip_sour;
    $arr['ip_dest']= $v->ip_dest;
    $arr['ip_pro']= $v->ip_pro;
    $arr['port_dest']= $v->port_dest;
    $arr['port_pro']= $v->port_pro;
    $arr['user_pro']= $v->user_pro;
    $arr['pass_pro']= $v->pass_pro;
    $arr['active']= $v->active;
    $arr['process_id']= $v->process_id;
    $arr['process_name']= $v->process_name;
    $a = json_encode($arr);
    echo $a;
     ?>'
    data-toggle="modal" data-target="#editcanender">
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