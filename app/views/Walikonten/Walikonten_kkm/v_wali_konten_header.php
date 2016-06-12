<head>    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="<?php echo $url;?>assets/img/favicon.png">

    <title><?php echo $title;?></title>

    <!-- Bootstrap CSS -->    
    <link href="<?php echo $url;?>assets/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- bootstrap theme -->
    <link href="<?php echo $url;?>assets/css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <link href="<?php echo $url;?>assets/dist/css/select2.min.css" rel="stylesheet">
    <!-- font icon -->
    <link href="<?php echo $url;?>assets/css/elegant-icons-style.css" rel="stylesheet" />
    <link href="<?php echo $url;?>assets/css/font-awesome.min.css" rel="stylesheet" />    
    <!-- full calendar css-->
    <!--<link href="<?php echo $url;?>assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
	<link href="<?php echo $url;?>assets/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" />
    <!-- easy pie chart-->
    <link href="<?php echo $url;?>assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
    <!-- owl carousel -->
    <link rel="<?php echo $url;?>assets/stylesheet" href="css/owl.carousel.css" type="text/css">
    <link href="<?php echo $url;?>assets/css/jquery-jvectormap-1.2.2.css" rel="stylesheet">
    <!-- Custom styles -->
    <link rel="<?php echo $url;?>assets/stylesheet" href="css/fullcalendar.css">
    <link href="<?php echo $url;?>assets/css/widgets.css" rel="stylesheet">
    <link href="<?php echo $url;?>assets/css/style.css" rel="stylesheet">
    <link href="<?php echo $url;?>assets/css/style-responsive.css" rel="stylesheet" />
    <link href="<?php echo $url;?>assets/css/xcharts.min.css" rel=" stylesheet">
    
    <link href="<?php echo $url;?>assets/css/jquery-ui-1.10.4.min.css" rel="stylesheet">
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
      <script src="js/lte-ie7.js"></script>
    <![endif]-->
</head>

  <!-- container section start -->
  <section id="container" class="">
     
      
      <header class="header dark-bg">
            <div class="toggle-nav">
                <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
            </div>

            <!--logo start-->
            <a href="<?php echo $url;?>dashboard_wali" class="logo">Dashboard <span class="lite">Wali Kelas</span></a>
            <!--logo end-->

            <div class="nav search-row" id="top_menu">
                <!--  search form start -->
                <ul class="nav top-menu">                    
                    <li>
                        <form class="navbar-form">
                            <input class="form-control" placeholder="Search" type="text">
                        </form>
                    </li>                    
                </ul>
                <!--  search form end -->                
            </div>

            <div class="top-nav notification-row">                
                <!-- notificatoin dropdown start-->
                <ul class="nav pull-right top-menu">
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                                <img alt="" src="<?php echo $url;?>assets/img/avatar1_small.jpg">
                            </span>
                            <span class="username"><?php echo $nama;?></span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                            <li class="eborder-top">
                                <a href="#"><i class="icon_profile"></i> Profil</a>
                            </li>
                            <li>
                                <a href="<?php echo $url;?>logout"><i class="icon_key_alt"></i> Log Out</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
      </header>      
      <!--header end-->