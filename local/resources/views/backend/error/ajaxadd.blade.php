@foreach($datanew as $k=>$val)
<tr>
<td>{{$k +1}}</td>
<td>{{$val->error_code}}</td>
<td>    
   {{$val->process_name}}
</td>
<td> 
 {{$val->error_name}}
</td>

 <td class="imformation">
   <p>{{$val->solve}}</p>
  
    @if($val->filename != '')
    <p class="filename"> 
        {{$val->filename}}
        
       </p>
       <p>Dowload: File hướng dẫn
        <a href="{{url('admin/error/dowload')}}/{{$val->filename}}" class="dowload">
            <i class="fa fa-cloud-download" aria-hidden="true"></i>
       </a> 
      </p>   
 
    @else
    {{''}}
    @endif          
</td>
 <td class="errorNa">
    <?php 
     echo substr( $val->phonenumber,0,12 ).'...';
    ?>
    <div class="errorNaChil">

        <div class="turng">
            <div class="turn2"></div>
        </div>
        <?php
          echo str_replace(',','</br>',$val->phonenumber);
         ?>
       
    </div>
   
</td>

<td>
 {{$val->user}}
 <br>
 Ngày tạo:
 {{date('d-m-Y H:i:s',strtotime($val->created_at))}}
</td>

<td>
    <div class="statuserr">
         <button data="{{$val->status}}" class="btn activebt @if($val->status==1){{'btn-success'}}@else{{'btn-danger'}}@endif" dataid="{{$val->id}}" >@if($val->status==1){{'ON'}}@else{{'OFF'}}@endif</button>
    </div>
    <div class="statuserr">
          <button data="{{$val->statusmess}}" class="btn statusMe @if($val->statusmess==1){{'btn-primary'}}@else{{'btn-info'}}@endif" dataid="{{$val->id}}" >@if($val->statusmess==1){{'SEND'}}@else{{'OFF'}}@endif</button>
    </div>      
</td>
<td>
   <button  class="btn btn-raised btn-warning editdata" 
   data='
   <?php
   $arr = [];
   $arr['error_code']= $val->error_code;
   $arr['process_code']= $val->process_code;
   $arr['error_name']= $val->error_name;
   $arr['solve']= $val->solve;
   $arr['status']= $val->status;
   $arr['id']= $val->id;
   $arr['statusmess']= $val->statusmess;
   $arr['phonenumber']= $val->phonenumber;
   $a = json_encode($arr);
    echo $a;
   
    ?>' data-toggle="modal" data-target="#editerror">
    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
    </button>

   @if(Auth::user()->level==2)

    <button class="btn btn-raised btn-danger deleteitem" dataid="{{$val->id}}" error_code="{{$val->error_code}}">
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
@endforeach