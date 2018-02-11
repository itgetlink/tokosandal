<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="<?php echo base_url();?>aset/admin/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url();?>aset/admin/dist/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>aset/admin/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url();?>aset/admin/dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url();?>aset/admin/plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo base_url();?>aset/admin/plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url();?>aset/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url();?>aset/admin/plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url();?>aset/admin/plugins/daterangepicker/daterangepicker-bs3.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url();?>aset/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <!--------DATATABLE---------------------------->
  <link rel="stylesheet" href="<?php echo base_url();?>aset/admin/plugins/datatables/dataTables.bootstrap.css">
  
  <script src="<?php echo base_url();?>aset/admin/dist/js/jquery.min.js"></script>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  
  <style>
    .example-modal .modal {
      position: relative;
      top: auto;
      bottom: auto;
      right: auto;
      left: auto;
      display: block;
      z-index: 1;
    }

    .example-modal .modal {
      background: transparent !important;
    }
  </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels --> 
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
           
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="<?php echo base_url().'index.php/admin/home/logout'?>">
              <span class="hidden-xs">Logout</span>
            </a>
            
          </li>
          <!-- Control Sidebar Toggle Button -->
          
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
          <img src="<?php echo base_url();?>aset/admin/dist/img/avatar5.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $username?></p> 
        </div>
      </div>
      <!-- search form --> 
      <!-- sidebar menu: : style can be found in sidebar.less -->
	  <?php 
		$controller = $this->router->fetch_class(); 
		$method=$this->router->fetch_method(); 
	?>
      <ul class="sidebar-menu">
        <li class="header">Menu</li>
       
        <li class="<?php echo $controller=='home'?'active':'';?>"><a href="<?php echo base_url().'index.php/admin/home'?>"><i class="fa fa-home"></i> <span>Home</span></a></li> 
        <li class="<?php echo $controller=='produk'?'active':'';?>"><a href="<?php echo base_url().'index.php/admin/produk'?>"><i class="fa fa-home"></i> <span>Produk</span></a></li>
		<li class="<?php echo $controller=='customer'?'active':'';?>"><a href="<?php echo base_url().'index.php/admin/customer'?>"><i class="fa fa-home"></i> <span>Customer</span></a></li> 
		<li class="<?php echo $controller=='contact'?'active':'';?>"><a href="<?php echo base_url().'index.php/admin/contact'?>"><i class="fa fa-home"></i> <span>Contact</span></a></li> 
		<li class="<?php echo $controller=='transaksi'?'active':'';?>"><a href="<?php echo base_url().'index.php/admin/transaksi'?>"><i class="fa fa-home"></i> <span>Transaksi</span></a></li>
		<li class="<?php echo $controller=='about'?'active':'';?>"><a href="<?php echo base_url() .'index.php/admin/about'?>"><i class="fa fa-home"></i> <span>About</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	<!-- Content Header (Page header) -->
     
    <!-- Main content -->
    <section class="content">
		<?php echo $this->load->view($content);?>
		
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.4.0
    </div>
    <strong>Copyright &copy; 2016 <a href="#">APRL</a>.</strong> All rights
    reserved.
  </footer>

  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.0
<script src="<?php echo base_url();?>aset/admin/plugins/jQuery/jQuery-2.2.0.min.js"></script> -->
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url();?>aset/admin/dist/js/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.5 -->
<script src="<?php echo base_url();?>aset/admin/bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="<?php echo base_url();?>aset/admin/dist/js/raphael-min.js"></script>
<script src="<?php echo base_url();?>aset/admin/plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url();?>aset/admin/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo base_url();?>aset/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url();?>aset/admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url();?>aset/admin/plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url();?>aset/admin/dist/js/moment.min.js"></script>
<script src="<?php echo base_url();?>aset/admin/plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url();?>aset/admin/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url();?>aset/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url();?>aset/admin/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>aset/admin/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>aset/admin/dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes)
<script src="<?php echo base_url();?>aset/admin/dist/js/pages/dashboard.js"></script> -->
<!-- AdminLTE for demo purposes
<script src="<?php echo base_url();?>aset/admin/dist/js/demo.js"></script> -->
<!-----box alert------------->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url();?>aset/admin/plugins/iCheck/icheck.min.js"></script>
<!----------DATATABLE---------------------------->
<!-- DataTables -->
<script src="<?php echo base_url();?>aset/admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>aset/admin/plugins/datatables/dataTables.bootstrap.min.js"></script>
</body>
</html>
