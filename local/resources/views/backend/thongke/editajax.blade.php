@foreach($datanew as $k=>$v)
<tr>
<td>{{$k}}</td>
<td>
<p>TG bắt đầu</p>
{{date('d-m-Y',strtotime($v->starttime))}}
<br>
<p>TG kết thúc</p>
{{date('d-m-Y',strtotime($v->endtime))}}
</td>
<td> 
  <p> DV ảnh hưởng:</p>
 {{$v->service_affected}}
  <br>
  <p>ĐV chịu trách nhiệm</p>
    {{$v->responsible_unit}}
</td>

<td class="errorNa">
  <p>Tình trạng lỗi</p>
  {{$v->error_status}}
 <br>
 <p>Nguyên nhân gốc</p>
  {{$v->original_cause}}
</td>

<td>
  <p>HĐ và hướng XL</p>
  {{$v->action_direction}}
  <p>GP khắc phục</p>
  {{$v->solutions}}
</td>
<td>
<p>TG Gián đoạn</p>
{{$v->interruption_time}}
<p>TG khắc phục</p>
{{$v->time_overcome}}

</td>

<td>
  <p>SL GD AH</p>
   {{$v->customers_affected}}
   <p>SL KH AH</p>
   {{$v->value_affected}}
</td>
<td> {{$v->transaction_value}}</td>
<td>
   <button  class="btn btn-raised btn-warning editdata" 
 data='{{$v}}' data-toggle="modal" data-target="#editerror_im">
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