@foreach($data as $val)
<li class="imformation">
	<div class="left">
		<span>
		<img src="{{url('public/backend/josh/img/authors/avatar.jpg')}}" alt="">
	   </span>
	
</div>
	<div class="right">
		 <p> <b>{{$val->username}}</b></p>
        <p> {{$val->content}}    </p>
        <p> {{date('d-m-Y H:i:s',strtotime($val->created_at))}}</p>
        <div></div>										
	</div>
</li>
@endforeach