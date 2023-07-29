@extends('backend.master.index')
@section('title')
<title>Mobile_service</title>
@endsection('title')
@section('header_style')
<link rel="stylesheet" type="text/css" href="vendors/datatables/css/dataTables.bootstrap.css" />
<link href="css/pages/tables.css" rel="stylesheet" type="text/css" />
@endsection('header_style')
@section('content')

            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h3 class="service">
                   <ol class="breadcrumb">
                   <li>
                       <a href="{{url('admin/index')}}">
                           <i class="livicon" data-name="home" data-size="14" data-loop="true"></i> Home
                       </a>
                   </li>
                   <li>
                       <a href="javascript::voild(0)">Mobile_service</a>
                   </li>
                   <li class="active">View</li>
                                </ol>
                   
                                </h3> 
                
              <!--  <div >
                    <a href="{{url('admin/index')}}">
                           <i class="livicon" data-name="home" data-size="14" data-color="#000"></i> Trang chủ
                           <i class="fa fa-fw fa-angle-double-right"></i>
                   </a>
                    <a href="{{url('admin/process/list')}}">Process</a>
                     @if(Auth::user()->level==2)
                   <a href="{{url('admin/process/add')}}">
                          <i class="fa fa-fw fa-angle-double-right"></i> Thêm mới
                   </a>
                    @elseif(Auth::user()->level==1)
                     <a onclick="return confirm('Bạn không đủ quyền thực hiện chức năng này ?');" >
                          <i class="fa fa-fw fa-angle-double-right"></i>Thêm mới
                   </a>
                    @elseif(Auth::user()->level==0)
                     <a onclick="return confirm('Bạn không đủ quyền thực hiện chức năng này ?');" >
                          <i class="fa fa-fw fa-angle-double-right"></i> Thêm mới
                   </a>
                   @endif
              
               </div> -->
            </section>
            <!-- Main content -->
            <section class="content paddingleft_right15">
                <div class="row">
                    <div class="panel panel-primary ">
                        
                        <div class="panel-body">
                          <iframe src="http://10.58.244.203:8456/d/eu9KJnnZz/mobile_service" width="100%" height="1000" frameborder="0"></iframe>
                            
                        </div>
                    </div>
                </div>
                <!-- row-->
            </section>
@endsection('content')
@section('script')
    <script type="text/javascript" src="vendors/datatables/js/jquery.dataTables2.js"></script>
    <script type="text/javascript" src="vendors/datatables/js/dataTables.bootstrap.js"></script>
    <script>
    $(document).ready(function() {
        $('#table').dataTable();
            
    });

    </script>
@endsection('script')

