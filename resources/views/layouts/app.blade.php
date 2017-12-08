<!DOCTYPE html>
<html lang="ru-RU">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
	<meta name="keywords" content="admin, dashboard, bootstrap, template, flat, modern, theme, responsive, fluid, retina, backend, html5, css, css3">
	<meta name="description" content="">
	<meta name="author" content="ThemeBucket">
	<link rel="shortcut icon" href="#" type="image/png">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Главная страница</title>

	<!--icheck-->
	<link href="{{ asset('js/iCheck/skins/minimal/minimal.css') }}" rel="stylesheet">
	<link href="{{ asset('js/iCheck/skins/square/square.css') }}" rel="stylesheet">
	<link href="{{ asset('js/iCheck/skins/square/red.css') }}" rel="stylesheet">
	<link href="{{ asset('js/iCheck/skins/square/blue.css') }}" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{ url('asset/treeview/css/bootstrap-treeview.css') }}">
	<link href="{{ asset('js/advanced-datatable/css/demo_page.css') }}" rel="stylesheet" />
	<link href="{{ asset('js/advanced-datatable/css/demo_table.css') }}" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="{{ asset('js/bootstrap-datepicker/css/datepicker-custom.css') }}">
	<link rel="stylesheet" href="{{ asset('js/data-tables/DT_bootstrap.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset('asset/select2/select2.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('asset/select2/select2-bootstrap.min.css') }}">
	<!--dashboard calendar-->
	<link href="{{ asset('css/clndr.css') }}" rel="stylesheet">

	<!--common-->
	<link href="{{ asset('css/style.css') }}" rel="stylesheet">
	<link href="{{ asset('css/style-responsive.css') }}" rel="stylesheet">

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->
<script>
	window.Laravel = <?php echo json_encode([
		'csrfToken' => csrf_token(),
		]); ?>
	</script>
</head>

<body class="sticky-header">
	<section>
		<!-- left side start-->
		<div class="left-side sticky-left-side">

			<!--logo and iconic logo start-->
			<div class="logo">
				<a href="{{ url('/') }}"><img src="{{ url('images/logo.png') }}" alt=""></a>
			</div>

			<div class="logo-icon text-center">
				<a href="{{ url('/') }}"><img src="{{ url('images/logo_icon.png') }}" alt=""></a>
			</div>
			<!--logo and iconic logo end-->
			<div class="left-side-inner">
				<!-- visible to small devices only -->
				<div class="visible-xs hidden-sm hidden-md hidden-lg">
					<div class="media logged-user">
						<div class="media-body">
							{{-- {{ Auth::user()->email }} --}}
							<h4><a href="#">{{ Auth::user()->email }}</a></h4>
						</div>
					</div>
					<h5 class="left-nav-title">Информация</h5>
					<ul class="nav nav-pills nav-stacked custom-nav">
						<li><a href="{{ url('/myprofile') }}"><i class="fa fa-user"></i>  Мой профиль</a></li>
						<li>
							<a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
								<i class="fa fa-sign-out"></i> Выйти
							</a>
							<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
								{{ csrf_field() }}
							</form>
						</li>
					</ul>
				</div>
				<!--sidebar nav start-->
				@include('modules.nav')
				<!--sidebar nav end-->
			</div>
		</div>
		<!-- left side end-->
		<!-- main content start-->
		<div class="main-content" >
			<!-- header section start-->
			<div class="header-section">
				<!--toggle button start-->
				<a class="toggle-btn"><i class="fa fa-bars"></i></a>
				<!--toggle button end-->
				<!--search start-->
				<form class="searchform" action="index.html" method="post">
					<input type="text" class="form-control" name="keyword" placeholder="Поиск по заказам..." />
				</form>
				<!--search end-->
				<!--notification menu start -->
				<div class="menu-right">
					<ul class="notification-menu">
						{{-- @include('modules.notification') --}}
						<li>
							<a href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
								{{-- {{ Auth::user()->email }} --}}
								{{ Auth::user()->email }}
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu dropdown-menu-usermenu pull-right">
								<li><a href="{{ url('/myprofile') }}"><i class="fa fa-user"></i>  Мой профиль</a></li>
								<li>
									<a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
										<i class="fa fa-sign-out"></i> Выйти
									</a>
									<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
										{{ csrf_field() }}
									</form>
								</li>
							</ul>
						</li>
					</ul>
				</div>
				<!--notification menu end -->
			</div>
			<!-- header section end-->
			<div class="alert-masseg">
			@if($errors->any())
				<div class="alert alert-success">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					{!! $errors->first() !!}
				</div>
			@endif
			</div>
			@yield('heading')
			<!--body wrapper start-->
			<div class="wrapper" style="min-height: 89vh">
				@yield('content')
			</div>
			<!--body wrapper end-->

			<!--footer section start-->
			<footer>
				2016 &copy; Сервис для Автоателье разработала студия <a href="itdev-studio.ru">ITDev</a>
			</footer>
			<!--footer section end-->
		</div>
		<!-- main content end-->
	</section>

	<!-- Placed js at the end of the document so the pages load faster -->
	<script src="{{ url('js/jquery-1.10.2.min.js') }}"></script>
	<script src="{{ url('js/jquery-ui-1.9.2.custom.min.js') }}"></script>
	<script src="{{ url('js/jquery-migrate-1.2.1.min.js') }}"></script>
	<script src="{{ url('js/bootstrap.min.js') }}"></script>
	<script src="{{ url('js/modernizr.min.js') }}"></script>
	<script src="{{ url('js/jquery.nicescroll.js') }}"></script>

	<!--easy pie chart-->
	<script src="{{ url('js/easypiechart/jquery.easypiechart.js') }}"></script>
	<script src="{{ url('js/easypiechart/easypiechart-init.js') }}"></script>

	<!--Sparkline Chart-->
	<script src="{{ url('js/sparkline/jquery.sparkline.js') }}"></script>
	<script src="{{ url('js/sparkline/sparkline-init.js') }}"></script>

	<!--icheck -->
	<script src="{{ url('js/iCheck/jquery.icheck.js') }}"></script>
	<script src="{{ url('js/icheck-init.js') }}"></script>
	<script src="{{ url('js/lodash.min.js') }}"></script>
	<script src="{{ url('asset/treeview/js/bootstrap-treeview.js') }}"></script>
	<script src="{{ url('js/bootstrap-daterangepicker/moment.min.js') }}"></script>
	<script src="{{ url('js/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
	<script src="{{ url('asset/select2/select2.full.min.js') }}"></script>
	<script src="{{ url('js/bootstrap-inputmask/bootstrap-inputmask.min.js') }}"></script>
	<script src="{{ url('js/advanced-datatable/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ url('js/data-tables/DT_bootstrap.js') }}"></script>
	<!--dynamic table initialization -->
	<script src="{{ url('js/dynamic_table_init.js') }}"></script>
	<!--common scripts for all pages-->
	<script src="{{ url('js/scripts.js') }}"></script>
	<script src="{{ url('js/main.js') }}"></script>
	@yield('script')
	</body>
</html>
