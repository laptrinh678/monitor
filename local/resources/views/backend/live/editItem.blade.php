@foreach($data2 as $k=>$v)
<tr>
	
	<td>{{$k}}</td>
  <td>
   {{date('d-m-Y',strtotime($v->datetime))}}
    </td>
	<td>{{$v->shipt}}</td>
	<td>{{$v->user}}</td>

	
	<td>
    Người tạo:{{$v->useradd}} <br>
                                       Ngày tạo: <br>
                                       {{date('d-m-Y H:i:s',strtotime($v->created_at))}}
  </td>
	<td>
		 <p align="left">
             <a class="btn btn-raised btn-warning editdata" data="{{$v}}" data-toggle="modal" data-target="#editcanender">
              <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
         </a>
              
        <button class="btn btn-raised btn-danger deleteitem" dataid="{{$v->id}}">
            <i class="fa fa-trash-o" aria-hidden="true"></i> 
        </button>
           
        </p>
	</td>

	

</tr>
@endforeach