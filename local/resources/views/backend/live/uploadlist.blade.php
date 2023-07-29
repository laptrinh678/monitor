@foreach($data2 as $k=>$v)
  <tr>
  	<td>{{$k}}</td>
    <td>
     {{$v->name}}
    </td>
  	<td>
  		<img src="{{url('public/backend/product')}}/{{$v->image}}" alt=""
  		width="50px" height="50px">
  	</td>
  	<td>
  		 <p align="left">
        @if(Auth::user()->level==2)
            <button class="btn btn-raised btn-warning editdata" data="" data-toggle="modal" data-target="#editcanender">
                  <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
             </button>
        @elseif(Auth::user()->level<2)
        <button class="btn btn-raised btn-warning"  onclick="return confirm('Bạn không đủ quyền thực hiện chức năng này ?');">
                  <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
             </button>
        @endif
        @if(Auth::user()->level==2)
            <button class="btn btn-raised btn-danger deleteitem" dataid="">
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