@extends('backend.master.index')
@section('title')
<title>Danh sách nguyên nhân</title>
@endsection('title')
@section('header_style')
<link href="css/app.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="vendors/datatables/css/dataTables.bootstrap.css" />
<link href="css/pages/tables.css" rel="stylesheet" type="text/css" />
@endsection('header_style')
@section('content')
            <section class="content-header">
                 <h3 class="service">
                    <ol class="breadcrumb">
                    <li>
                        <a href="{{url('admin/index')}}">
                            <i class="livicon" data-name="home" data-size="14" data-loop="true"></i> Home
                        </a>
                    </li>
                    <li>
                        <a href="{{url('admin/reason/list')}}">Nguyên nhân</a>
                    </li>
                    <li class="active">Danh sách nguyên nhân</li>
                </ol>   
                </h3>
            </section>
            <!-- Main content -->
            <section class="content paddingleft_right15">
                <div class="row">
                    <div class="panel panel-primary ">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a href="{{url('admin/reason/add')}}"><i class="livicon" data-name="plus" data-size="20" data-c="#fff" data-hc="#fff" data-loop="true" id="livicon-152" style="width: 50px; height: 50px;">
                                </i>Thêm mới nguyên nhân</a>
                            </h4>
                        </div>
                        <br />
                        <div class="panel-body">
                            <table class="table table-bordered " id="table">
                                <thead>
                                    <tr class="filters">
                                        <th>Stt</th>
                                        <th>Tên</th>
                                        <th>
                                          Danh mục 
                                        </th>
                                        <th>
                                            Người tạo
                                        </th>
                                        <th>Ngày tạo</th>
                                        <th>Hành động</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $k=>$val)
                                    <tr>
                                        <td>{{$k +1}}</td>
                                        <td>{{$val->name}}</td>
                                        <td>
                                            
                                            <?php
                                                if($val->parentId !=0)
                                                {
                                                    $data = DB::table('reasonGroup')->select('name')->where('parentId',$val->parentId)->first();
                                                    echo $data->name;
                                                }else
                                                {
                                                    echo 'Null';
                                                }
                                             ?>
                                        </td>
                                        <td>
                                         {{$val->user}}
                                        </td>
                                        <td>
                                            {{date('d-m-Y H:i:s',strtotime($val->created_at))}}
                                        </td>
                                        <td>
                                            <p align="left">
                                                  <a href="{{url('admin/reason/edit')}}/{{$val->id}}"><i class="livicon" data-name="edit" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="update blog"></i></a>
                                                <a href="{{url('admin/reason/delete')}}/{{$val->id}}" data-toggle="modal" onclick="return confirm('Bạn có muốn xóa nguyên nhân này không ?');">
                                                    <i class="livicon" data-name="remove-alt" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="Delete blog category"></i>
                                                </a>
                                            </p>
                                            
                                        </td>
                                        @endforeach
                                   

                                  
                                </tbody>
                            </table>
                            
                        </div>
                    </div>
                </div>
                <!-- row-->
            </section>
@endsection('content')
@section('script')
   <script src="js/app.js" type="text/javascript"></script>
    <!-- end of global js -->
    <!-- begining of page level js -->
   <script type="text/javascript" src="vendors/datatables/js/jquery.dataTables2.js"></script> 
    <script type="text/javascript" src="vendors/datatables/js/dataTables.bootstrap.js"></script>  
    <script>
    $(document).ready(function() {
        $('#table').dataTable();

        
    });

    </script>
@endsection('script')

