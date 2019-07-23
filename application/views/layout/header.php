<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Nutritech - Members Portal</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Website Icon -->
	<link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/images/favicon.ico" />
	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/font-awesome/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/Ionicons/css/ionicons.min.css">
	<!-- jvectormap -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/jvectormap/jquery-jvectormap.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">
	<!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

	<!-- Google Font -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://github.com/pipwerks/PDFObject/blob/master/pdfobject.min.js"></script>
	
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

	<header class="main-header">

		<!-- Logo -->
		<a href="" class="logo">
			<!-- mini logo for sidebar mini 50x50 pixels -->
			<span class="logo-mini"><img src="<?php echo base_url(); ?>assets/images/logo.png" class="img-thumbnail" style="border: 0px; border-radius: 0px"></span>
			<!-- logo for regular state and mobile devices -->
			<span class="logo-lg" style="font-family: Garamond; font-size: 35px;"><i>Nutri</i>&hairsp;&hairsp;<b>TECH</b></span>
		</a>

		<!-- Header Navbar: style can be found in header.less -->
		<nav class="navbar navbar-static-top">
			<!-- Sidebar toggle button-->
			<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
				<span class="sr-only">Toggle navigation</span>
			</a>
			<!-- Navbar Right Menu -->
			<div class="navbar-custom-menu">
				<ul class="nav navbar-nav">
					<!-- User Account: style can be found in dropdown.less -->
					<li class="dropdown user user-menu">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<img src="<?php echo base_url();?>assets/images/no_image.jpg" class="user-image" alt="User Image">
							<span class="hidden-xs">
								<?= ucwords(strtolower($distributor->first_name) . ' ' . strtolower($distributor->last_name)); ?>	
							</span>
						</a>
						<ul class="dropdown-menu">
							<!-- User image -->
							<li class="user-header">
								<img src="<?php echo base_url();?>assets/images/no_image.jpg" class="img-circle" alt="User Image">

								<p>
									<?= ucwords(strtolower($distributor->first_name) . ' ' . strtolower($distributor->last_name)); ?><br>
									<?= $distributor->rank; ?>
									<small><?= $distributor->team_area; ?></small>
									<small>Member since <?= date("F j, Y", strtotime($distributor->date_joined)); ?></small>
								</p>
							</li>
							<!-- Menu Body -->
							<li class="user-body">
								<div class="row">
									<div class="col-xs-4 text-center" style="padding-right: 0px">
										<a href="<?php echo base_url();?>genealogy"><i class="fa fa-tree"></i> Geneology</a>
									</div>
									<div class="col-xs-4 text-center">
										<a href="#"><i class="ion ion-trophy"></i> Awards</a>
									</div>
									<div class="col-xs-4 text-center">
										<a href="#"><i class="ion ion-ios-gear"></i> Settings</a>
									</div>
								</div>
								<!-- /.row -->
							</li>
							<!-- Menu Footer-->
							<li class="user-footer">
								<div class="pull-left">
									<a href="<?php echo base_url(); ?>profile" class="btn btn-default btn-flat">Profile</a>
								</div>
								<div class="pull-right">
									<a href="<?php base_url(); ?>logout" class="btn btn-default btn-flat"><i class="ion ion-power"></i> Sign out</a>
								</div>
							</li>
						</ul>
					</li>
					<!-- Control Sidebar Toggle Button -->
					<li>
						<a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
					</li>
				</ul>
			</div>

		</nav>
	</header>
	<!-- Left side column. contains the logo and sidebar -->
	<aside class="main-sidebar">
		<!-- sidebar: style can be found in sidebar.less -->
		<section class="sidebar">
			<!-- Sidebar user panel -->
			<div class="user-panel">
				<div class="pull-left image">
					<img src="<?php echo base_url();?>assets/images/no_image.jpg" class="img-circle" alt="User Image">
				</div>
				<div class="pull-left info">
					<p><?= ucwords(strtolower($distributor->first_name) . ' ' . strtolower($distributor->last_name)); ?></p>
					<a href="#"><i class="fa fa-circle text-success"></i> Active</a>
				</div>
			</div>

			<!-- sidebar menu: : style can be found in sidebar.less -->
			<ul class="sidebar-menu" data-widget="tree">
				<li class="header">MAIN NAVIGATION</li>
				<li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard text-aqua"></i> <span>Dashboard</span></a></li>
				<li class="treeview">
					<a href="#">
						<i class="fa fa-child text-yellow"></i> <span>Race To the Top</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li><a href=""><i class="fa fa-circle-o"></i> Personal Sales</a></li>
						<li><a href=""><i class="fa fa-circle-o"></i> Personal Recruits</a></li>
						<li><a href=""><i class="fa fa-circle-o"></i> Regional Area Manager</a></li>
						<li><a href=""><i class="fa fa-circle-o"></i> SwaTeam</a></li>
						<li><a href=""><i class="fa fa-circle-o"></i> Manager of the Month</a></li>
						<li><a href=""><i class="fa fa-circle-o"></i> Regional Team Topnotch</a></li>
					</ul>
				</li>
				<li class="treeview">
					<a href="#">
						<i class="fa fa-industry text-red"></i> <span>Year to Date</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li><a href=""><i class="fa fa-circle-o"></i> SwaTeam</a></li>
						<li><a href=""><i class="fa fa-circle-o"></i> Rookie in P.Sales</a></li>
						<li><a href=""><i class="fa fa-circle-o"></i> Rookie in P.Recruits</a></li>
						<li><a href=""><i class="fa fa-circle-o"></i> Personal Sales</a></li>
						<li><a href=""><i class="fa fa-circle-o"></i> Personal Recruits</a></li>
						<li><a href=""><i class="fa fa-circle-o"></i> Regional Area Manager</a></li>
						<li><a href=""><i class="fa fa-circle-o"></i> Best Manager</a></li>
						<li><a href=""><i class="fa fa-circle-o"></i> Nutritechian of the Year</a></li>
						<li><a href=""><i class="fa fa-circle-o"></i> Regional Team Topnotch</a></li>
					</ul>
				</li>
				<li class="treeview">
					<a href="#">
						<i class="fa fa-trophy text-primary text-yellow"></i> <span class='text-yellow'>Eagle Awardee</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li><a href=""><i class="fa fa-circle-o"></i> Personal Eagle</a></li>
						<li><a href=""><i class="fa fa-circle-o"></i> Personal Re-Eagle</a></li>
						<li><a href=""><i class="fa fa-circle-o"></i> Manager Eagle</a></li>
						<li><a href=""><i class="fa fa-circle-o"></i> Manager Re-Eagle</a></li>
						<li><a href=""><i class="fa fa-circle-o"></i> EZM</a></li>
					</ul>
				</li>
				<li class="treeview">
					<a href="#">
						<i class="fa fa-files-o text-green"></i> <span>Other Reports</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li><a href=""><i class="ion ion-bag"></i> All Sales</a></li>
						<li><a href=""><i class="ion ion-ios-people-outline"></i> All Recruits</a></li>
						<li><a href="<?php echo base_url();?>soa"><i class="fa fa-tree"></i> Statement of Accounts</a></li>
						<li><a href="<?php echo base_url();?>genealogy"><i class="fa fa-tree"></i> Geneology</a></li>
					</ul>
				</li>
				<li class="treeview">
					<a href="#">
						<i class="fa fa-thumb-tack text-blue"></i> <span class='text-blue'>Training Modules</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li><a href="<?php echo base_url();?>videotraining"><i class="fa fa-video-camera text-blue"></i> <span class='text-blue'>Videos</span></a></li>
						<li><a href="<?php echo base_url();?>pdftraining"><i class="fa fa-file-pdf-o text-blue"></i> <span class='text-blue'>PDF Files</span></a></li>
					</ul>
				</li>
			</ul>
		</section>
		<!-- /.sidebar -->
	</aside>

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">