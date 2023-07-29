@extends('backend.master.index')
@section('header_style')
<title>Chat-Bc/cv</title>
@endsection('header_style')
@section('content')
<section class="content-header">
                <h1>
                     <ol class="breadcrumb">
                    <li>
                        <a href="{{url('admin/index')}}">
                            <i class="livicon" data-name="home" data-size="14" data-color="#000"></i> Trang chủ
                        </a>
                    </li>
                    <li>
                        <a href="{{url('admin/chatbox/list')}}">Chat</a>
                    </li>
                    <li class="active">List Chat</li>
                </ol>
                </h1>
               
            </section>
            <br>
            <section class="content">

                <div class="row">
                    <div class="col-md-3">
                         <div class="portlet box primary">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="livicon" data-name="camera" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> Danh sách user
                                </div>
                            </div>
                            <div class="portlet-body">
                            <div class="table-scrollable" style="min-height: 500px;">
                                  <ul class="listUser">
                                    @foreach($users as $v)
                                      <li>
                                        
                                        <a href="javascript::voild(0)">
                                             <i class="livicon" data-name="user-flag" data-size="20" data-c="#FAAC58" data-hc="#FAAC58" data-loop="true"></i>
                                             @if($v->status==1)
                                             <span>
                                            <i class="livicon" data-name="medal" data-size="20" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>
                                            </span>
                                            @else
                                             <i class="livicon" data-name="medal" data-size="20" data-c="#ececec" data-hc="#ececec" data-loop="true"></i>
                                            </span>
                                            @endif
                                        {{$v->name}}</a>
                                      </li>
                                    @endforeach 
                                  </ul>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group formchat">
                            <div class="contentChat">
                                                        <ul id="contentChatid">
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
                                                                        <p>
                                                                           
                                                                              {{date('d-m-Y H:i:s',strtotime($val->created_at))}}
                                                                        </p>
                                                                        <div></div>
                                                                                                              
                                                                    </div>
                                                                </li>
                                                                @endforeach
                                                        </ul>
                                                </div>
                                                
                        </div>
                        <div class="form-group formchat">
                            <div class="inputsend">
                                 <input type="text" name="text" class="form-control inputcha" placeholder="" id="textchat" >
                                                     <button class="btn btn-success" id="sendChat">
                                                        <i class="livicon" data-name="rocket" data-size="20" data-c="#fff" data-hc="#fff" data-loop="true" id="livicon-166" style="width: 50px; height: 50px;">
                                                </i>
                                                     Send</button>
                                                     <input type="hidden" name="name" id="UserNaCha" value="{{Auth::user()->name}}">
                                                    <input type="hidden" value="{{url('')}}" id="url">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                         <div class="portlet box warning">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="livicon" data-name="film" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> Lịch trực cảnh báo
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="table-scrollable"  style="min-height: 500px;">
                                
                                </div>
                            </div>
                        </div>
                    </div>
                 
                
                   
              
                </div>
                
            </section>

@endsection('content')
@section('script')
<script>
	$(document).ready(function()
	{

         setInterval(function()
           {
              var url = $('#url').val();
              $.get( url+'/admin/chatbox/ajaxdata', function(data)
                    {   //console.log(data);
                        $('#contentChatid').html(data);                                       
                    });

            },1000);  


		$('#sendChat').click(function()
		{
			var text = $('#textchat').val();
		    var user = $('#UserNaCha').val();
             var url = $('#url').val();
		    $.get(url+'/admin/chatbox/report/'+text +'/'+ user, function(data)
		        {
		        	$('#contentChatid').html(data);
                    $('#textchat').val('');
		        });
		});

         $(document).keypress(function(event){
                var keycode = (event.keyCode ? event.keyCode : event.which);
                if(keycode == '13'){
                    
                    var text = $('#textchat').val();
                    var user = $('#UserNaCha').val();
                    var url = $('#url').val();
                    $.get(url+'/admin/chatbox/report/'+text +'/'+ user, function(data)
                        {
                            $('#contentChatid').html(data);
                            $('#textchat').val('');
                        });   
                }
            });

	});
</script>
@endsection('script')

	