@extends('fontend.master.index')
 @section('title')

 @endsection
 @section('header_style')
    <!-- end of global css -->
    <!--page level css -->
    <link href="{{url('public/fontend')}}/css/app.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{url('public/fontend')}}/vendors/datatables/css/dataTables.bootstrap.css">
    <link rel="stylesheet" type="text/css" href="{{url('public/fontend')}}/vendors/select2/css/select2.min.css" />
    <link rel="stylesheet" type="text/css" href="{{url('public/fontend')}}/vendors/select2/css/select2-bootstrap.css" />
    <link href="{{url('public/fontend')}}/css/pages/tables.css" rel="stylesheet" type="text/css">
 @endsection('header_style')

@section('content')

            <!-- Content Header (Page header) -->
            <section class="content-header">
                <!--section starts-->
                <h1>{{$name->service_name}}</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="index.html">
                            <i class="livicon" data-name="home" data-size="14" data-loop="true"></i> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#">Data Tables</a>
                    </li>
                    <li class="active">Advanced Data Tables2</li>
                </ol>
            </section>
            <!--section ends-->
            <section class="content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-success filterable" style="overflow:auto;">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <i class="livicon" data-name="responsive" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> Dropdown column searching
                                </h3>
                            </div>
                            <div class="panel-body table-responsive">
                                <table class="table table-striped table-bordered" id="table1">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>services</th>
                                            <th>process</th>
                                            <th>error</th>
                                            <th>error_name</th>
                                            <th>value</th>
                                            <th>limited_value</th>
                                            <th>node</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       @foreach($data as $val) 
                                        <tr>
                                            <td>{{$val->id}}</td>
                                            <td>{{$val->service}}</td>
                                            <td>{{$val->error}}</td>
                                            <td>
                                                {{$val->error_name}}
                                            </td>
                                            <td>
                                            {{$val->valude}}
                                            </td>
                                             <td>
                                             {{$val->limited_value}}
                                            </td>
                                             <td>
                                             {{$val->limited_value}}
                                            </td>
                                             <td>
                                                LarrytheBird@test.com
                                            </td>
                                            
                                        </tr>
                                       @endforeach
                                       
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>User Name</th>
                                            <th>User E-mail</th>
                                            <th>User E-mail</th>
                                            <th>User E-mail</th>
                                            <th>User E-mail</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Third Basic Table Ends Here-->
            </section>
            <!-- content -->
@endsection
@section('script')
    <script src="{{url('public/fontend')}}/js/app.js" type="text/javascript"></script>
    <!-- end of global js -->
    <!-- begining of page level js -->
    <script type="text/javascript" src="{{url('public/fontend')}}/vendors/datatables/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="{{url('public/fontend')}}/vendors/datatables/js/dataTables.bootstrap.js"></script>
    <script type="text/javascript" src="{{url('public/fontend')}}/vendors/datatables/js/dataTables.responsive.js"></script>
    <script type="text/javascript" src="{{url('public/fontend')}}/vendors/select2/js/select2.js"></script>
    <script type="text/javascript" src="{{url('public/fontend')}}/js/pages/table-advanced2.js"></script>
@endsection('script')