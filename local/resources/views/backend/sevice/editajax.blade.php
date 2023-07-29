@foreach($datanew as $k=>$v)
<tr>
    <td>{{$k+1}}</td>
    <td>{{$v->service_name}}</td>
    <td>
        {{$v->service_management}}
    </td>
    <td>
      {{$v->phone_number}}
    </td>
    <td>
      
       {{$v->service_code}}
    </td>
    <td>
    	{{$v->channel_region}}
    </td>
    <td>
        <button class="btn btn-raised btn-warning editdata" data-toggle="modal" data-target="#modal-6" data="{{$v}}">
             <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
        </button>
         <button class="btn btn-raised btn-danger " dataid="{{$v->id}}">
            <i class="fa fa-trash-o" aria-hidden="true"></i> 
        </button>
       
    </td>
</tr>
@endforeach