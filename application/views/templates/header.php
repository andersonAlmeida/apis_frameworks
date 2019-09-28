<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Bootstrap Dashboard by Bootstrapious.com</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="robots" content="all,follow">
	<!-- Bootstrap CSS-->
	<link rel="stylesheet" href="<?php echo base_url(); ?>_assets/theme/vendor/bootstrap/css/bootstrap.min.css">
	<!-- Font Awesome CSS-->
	<link rel="stylesheet" href="<?php echo base_url(); ?>_assets/theme/vendor/font-awesome/css/font-awesome.min.css">
	<!-- Fontastic Custom icon font-->
	<link rel="stylesheet" href="<?php echo base_url(); ?>_assets/theme/css/fontastic.css">
	<!-- Google fonts - Roboto -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
	<!-- Custom Scrollbar-->
	<link rel="stylesheet" href="<?php echo base_url(); ?>_assets/theme/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
	<!-- theme stylesheet-->
	<link rel="stylesheet" href="<?php echo base_url(); ?>_assets/theme/css/style.default.css" id="theme-stylesheet">

	<link rel="stylesheet" href="<?php echo base_url(); ?>_assets/custom/css/custom.css">

	<!-- Favicon-->
	<link rel="shortcut icon" href="<?php echo base_url(); ?>_assets/theme/img/favicon.ico">
</head>

<body>
	<?php
	$currentURL = uri_string();
	?>
	<!-- Side Navbar -->
	<nav class="side-navbar">
		<div class="side-navbar-wrapper">
			<!-- Sidebar Header    -->
			<div class="sidenav-header d-flex align-items-center justify-content-center">
				<!-- User Info-->
				<div class="sidenav-header-inner text-center"><img src="<?php echo base_url(); ?>_assets/theme/img/avatar-7.jpg" alt="person" class="img-fluid rounded-circle">
					<h2 class="h5"><?php echo $_SESSION['nome']; ?></h2><span>Web Developer</span>
				</div>
				<!-- Small Brand information, appears on minimized sidebar-->
				<div class="sidenav-header-logo"><a href="index.html" class="brand-small text-center"> <strong>B</strong><strong class="text-primary">D</strong></a></div>
			</div>
			<!-- Sidebar Navigation Menus-->
			<div class="main-menu">
				<h5 class="sidenav-heading">Menu</h5>
				<ul id="side-main-menu" class="side-menu list-unstyled">
					<li><a href="<?php echo site_url()?>"> <i class="icon-home"></i>Home </a></li>
					<li><a href="#produtos" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Produtos </a>
						<ul id="produtos" class="collapse list-unstyled ">
							<li><a href="#">Categorias</a></li>
							<li><a href="#">Listar Produtos</a></li>
						</ul>
					</li>
					<li><a href="#admin" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Administração </a>
						<ul id="admin" class="collapse list-unstyled ">
							<li><a href="<?php echo site_url()?>administrador/">Usuários</a></li>
							<li><a href="<?php echo site_url()?>funcao/">Funções</a></li>
							<li><a href="<?php echo site_url()?>fornecedor/">Fornecedores</a></li>
							<li><a href="<?php echo site_url()?>marca/">Marcas</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<div class="page">
		<!-- navbar-->
		<header class="header">
			<nav class="navbar">
				<div class="container-fluid">
					<div class="navbar-holder d-flex align-items-center justify-content-between">
						<div class="navbar-header"><a id="toggle-btn" href="#" class="menu-btn"><i class="icon-bars"> </i></a><a href="index.html" class="navbar-brand">
								<div class="brand-text d-none d-md-inline-block"><span>Bootstrap </span><strong class="text-primary">Dashboard</strong></div>
							</a></div>
						<ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
							<!-- Log out-->
							<li class="nav-item"><a href="<?php echo base_url() ?>login/logout" class="nav-link logout"> <span class="d-none d-sm-inline-block">Sair</span><i class="fa fa-sign-out"></i></a></li>
						</ul>
					</div>
				</div>
			</nav>
		</header>

		<section class="section-padding">
			<div class="container-fluid">
				<h2><?php echo $title; ?></h2>
