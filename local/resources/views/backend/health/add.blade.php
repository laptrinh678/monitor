@foreach($data2 as $k=>$v)
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