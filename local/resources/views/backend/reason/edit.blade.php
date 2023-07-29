@extends('backend.master.index')
@section('title')
<title>Sửa Nguyên nhân</title>
@endsection('title')
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
                        <a href="{{url('admin/reason/list')}}">Nguyên nhân</a>
                    </li>
                    <li class="active">Sửa</li>
                </ol>
                </h1>
               
            </section>
            <br>
            <section class="content">
                <div class="row">

                    <div class="col-md-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <i class="livicon" data-name="user-add" data-size="18" data-c="#fff" data-hc="#fff" data-loop="true"></i>Sửa nguyên nhân
                                </h3>
                                <span class="pull-right clickable">
                                    <i class="glyphicon glyphicon-chevron-up"></i>
                                </span>
                            </div>
                            <div class="panel-body">
                 <form class="form-horizontal" role="form" method="post">
                

                <!--  -->
                <div class="form-group">
                <label for="first_name" class="col-sm-2 control-label">Reason Group</label>
                    <div class="col-sm-6">
                        
                        <select class="form-control" name="parentId">
						    <option value="{{$data->parentId}}">
                                @if($data->parentId !='')
                                    <?php 
                                        $name = DB::table('reasonGroup')->select('name')->where('id',$data->parentId)->first();
                                        echo $name->name;
                                     ?>
                                @endif
                                
                            </option>
                           @foreach($listdata as $v)
                                @if($v->parentId==0)
                                <option value="{{$v->id}}"><b>{{$v->name}}</b></option>
                                 <?php 
                                  $datacon = DB::table('reasonGroup')->where('parentId', $v->id)->get();
                                  foreach($datacon as $vl)
                                  {
                                   echo '<option';
                                    echo ' value=';
                                    echo '"';
                                    echo $vl->id;
                                    echo '">';
                                    echo '--';
                                    echo $vl->name;
                                    echo '</option>';  
                                  }
                                 ?>
                               
                                @endif
                            @endforeach 
						  </select>
                    </div>
                </div>

                <div class="form-group">
                <label for="first_name" class="col-sm-2 control-label">Reason </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="name" value="{{$data->name}}">
                       
                    </div>
                </div>


                <div class="space-4"></div>
                <div class="clearfix form-actions">
                    <div class="col-md-offset-3 col-md-9">
                        <button class="btn btn-primary" type="submit">
                            <i class="livicon" data-name="credit-card" data-size="20" data-c="#fff" data-hc="#fff" data-loop="true" id="livicon-90" style="width: 50px; height: 50px;">
                           
                            </i>
                        Lưu lại
                    </button>
                         &nbsp; &nbsp; &nbsp;
                            <button class="btn btn-danger" type="reset">
                                <i class="livicon" data-name="spinner-seven" data-size="20" data-c="#fff" data-hc="#fff" data-loop="true" id="livicon-326" style="width: 50px; height: 50px;">
                                
                                </i>
                            Reset
                        </button>
                       
                            
                    </div>
                </div>
                {{csrf_field()}}
            </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--row end-->
            </section>
@endsection('content')

	