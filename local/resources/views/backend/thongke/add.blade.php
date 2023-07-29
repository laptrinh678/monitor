@foreach($datanew as $k=>$v)
<tr>
<td>{{$k}}</td>
<td>{{$v->starttime}}</td>
<td>    
   {{$v->endtime}}
</td>
<td> 
    {{$v->service_affected}}
</td>
<td class="imformation">
     {{$v->responsible_unit}}
</td>
 <td class="errorNa">
   {{$v->error_status}}
   
 </td>
<td>
        {{$v->original_cause}}
</td>
<td>
    {{$v->action_direction}}
</td>
<td>
  
    {{$v->solutions}}

</td>

 <td>
     {{$v->time_overcome}}/{{$v->transactions_affected}}
 </td>
  <td>
    {{$v->interruption_time}}/{{$v->time_overcome}}
 </td>
 
 <td>
    
 </td>
 <td> {{$v->value_affected}}</td>
 <!-- <td> {{$v->file}}</td> -->
 <td> {{$v->transaction_value}}</td>
 <td>
     <button  class="btn btn-raised btn-warning editdata" 
   data='' data-toggle="modal" data-target="#editerror">
    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
    </button>
     @if(Auth::user()->level==2)

    <button class="btn btn-raised btn-danger deleteitem" dataid="{{$v->id}}" error_code="">
       <i class="fa fa-trash-o" aria-hidden="true"></i> 
   </button>
   @elseif(Auth::user()->level==1)
   <button class="btn btn-raised btn-danger" onclick="return confirm('Bạn không đủ quyền thực hiện chức năng này ?');">
       <i class="fa fa-trash-o" aria-hidden="true"></i> 
   </button>
    @elseif(Auth::user()->level==0)
   <button class="btn btn-raised btn-danger" onclick="return confirm('Bạn không đủ quyền thực hiện chức năng này ?');">
       <i class="fa fa-trash-o" aria-hidden="true"></i> 
   </button>
   @endif
 </td>
</tr>
@endforeach 