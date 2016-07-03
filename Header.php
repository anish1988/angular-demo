<!DOCTYPE html>
<html>
<head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Talkiedo</title>
    <link href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/datatables/css/dataTables.bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet">
	
	 <!-- Custom CSS -->
    <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">
    <!-- image cropping css-->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/imgareaselect.css">
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300ita‌​lic,400italic,500,500italic,700,700italic,900italic,900' rel='stylesheet' type='text/css'>
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    \\\
    <![endif]-->
	
    <style>
    .form-group.required .control-label:after {
      content:"*";
      color:red;
  }
  </style>
</head> 
<body>
     <div id="wrapper">
    <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><img src="<?php echo base_url();?>images/talkido_logo.png" alt="" /></a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo isset($this->session->userdata['logged_in']['portal_user_name'])?$this->session->userdata['logged_in']['portal_user_name']:'';?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="<?php echo base_url();?>producer/logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
				
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="#"><i class="fa fa-fw fa-home"></i> Home</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-video-camera "></i> My Movie/Star <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="<?php echo base_url();?>Add_Movie">Add Movie/Star</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url();?>Add_Movie/upcomingMoviesView">Upcoming Release</a>
                            </li>
							<li>
                                <a href="#">Add Promo</a>
                            </li>
							<li>
                                <a href="#">Review</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-fw fa-file"></i> Report</a>
                    </li>
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>