<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
        @yield('title')
		
		<meta name="description" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<!-- bootstrap & fontawesome -->
		<base href="{{asset('public/backend/josh')}}/">
		<link href="css/app.css" rel="stylesheet" type="text/css" />
		
		@yield('header_style')
        <link href="css/lap.css" rel="stylesheet" type="text/css" />
	</head>
	<body class="skin-josh">
	@include('backend.master.header')
    <div class="wrapper row-offcanvas row-offcanvas-left">
        <aside class="left-side sidebar-offcanvas collapse-left" id="sideLeft">
            <section class="sidebar">
                <div class="page-sidebar  sidebar-nav">
                    <div class="nav_icons">
                        <ul class="sidebar_threeicons">
                            <li>
                                <a href="{{url('admin/index')}}">
                                    <i class="livicon" data-name="table" title="Advanced tables" data-c="#418BCA" data-hc="#418BCA" data-size="25" data-loop="true"></i>
                                </a>
                            </li>
                            <li>
                                <a href="javascript::voild(0)">
                                   <i class="livicon" data-name="gears" data-size="25" data-c="#fff" data-hc="#fff" data-loop="true" id="livicon-107" style="width: 50px; height: 50px;">
                                 
                                </i>
                                </a>
                            </li>
                            <li>
                                <a href="javascript::voild(0)">
                                   <i class="livicon" data-name="folder-flag" data-size="25" data-c="#fff" data-hc="#fff" data-loop="true" id="livicon-398" style="width: 50px; height: 50px;">
                                 
                                </i>
                                </a>
                            </li>
                            <li>
                                <a href="javascript::voild(0)">
                                    <i class="livicon" data-name="users" title="Users List" data-size="25" data-c="#01bc8c" data-hc="#01bc8c" data-loop="true"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                   @include('backend.master.menu')

                </div>
            </section>
             
        </aside>
        
        <!-- right-side -->
        <aside class="right-side strech" id="sideright">
            @yield('content')
        </aside>
    </div>
    <a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" title="Return to top" data-toggle="tooltip" data-placement="left">
        <i class="livicon" data-name="plane-up" data-size="18" data-loop="true" data-c="#fff" data-hc="white"></i>
    </a>
    <!-- global js -->
    <script src="js/app.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            // dieu khien phan an hien tk dang nhap
           $('body').on('click','.riot',function(){
                    $('.navbar-nav > .user-menu > .dropdown-menu').slideToggle(300);
            });

             $('body').on('click','.limenu',function()
             {   
                   $('.listmenu').toggle();            
            });
              $('body').on('click','.limenu2',function()
             {   
                   $('.listmenu2').toggle();            
            }); 


            $('body').on('click','.lisystem',function()
            {   
                   $('.system').toggle();            
            }); 
            $('body').on('click','#clickappendid', function()
            {
                $('.row-offcanvas-left #sideLeft').toggleClass('showmenu'); 
            })   
        })
    </script>
    
   @yield('script')
</body>
</html>
