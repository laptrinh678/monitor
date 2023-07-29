@foreach($data2 as $k=>$v)
<tr>
    <td>{{$k}}</td>
    <td>{{$v->name}}</td>
    <td>{{$v->mesage}}</td>
    <td>{{$v->note}}</td>
    <td>
       {{$v->created_at}}
    </td>
</tr>
@endforeach()