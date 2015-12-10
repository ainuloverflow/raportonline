<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="<?php echo $url;?>assets/img/favicon.png">

    <title></title>

    <!-- Bootstrap CSS -->    
    <link href="<?php echo $url;?>assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="<?php echo $url;?>assets/css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="<?php echo $url;?>assets/css/elegant-icons-style.css" rel="stylesheet" />
    <link href="<?php echo $url;?>assets/css/font-awesome.min.css" rel="stylesheet" />    
    <!-- full calendar css-->
    <link href="<?php echo $url;?>assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
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

  <body>
  <!-- container section start -->
  <section id="container" class="">
     
      
      <header class="header dark-bg">
            <div class="toggle-nav">
                <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
            </div>

            <!--logo start-->
            <a href="<?php echo $url;?>wali/home" class="logo">Halaman <span class="lite">Wali Kelas</span></a>
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
                                <img alt="" src="<?php echo $url;?>assets/img/avatar1_small.jpg"">
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
                                <a href="<?php echo $url;?>home/logout"><i class="icon_key_alt"></i> Log Out</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
      </header>      
      <!--header end-->

      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">                
                  <li class="active">
                      <a class="" href="<?php echo $url;?>wali/home">
                          <i class="icon_house_alt"></i>
                          <span>Home</span>
                      </a>
                  </li>
				  <li>                     
                      <a class="" href="chart-chartjs.html">
                          <i class="icon_piechart"></i>
                          <span>Profil</span>
                          
                      </a>       
                  <li>                     
                      </li>
				  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_document_alt"></i>
                          <span>Data Kelas</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">                         
                          <li><a class="" href="form_validation.html">Data Mata Pelajaran</a></li>
                          <li><a class="" href="form_component.html">Data Ekstra kurikuler</a></li>
                          <li><a class="" href="form_component.html">Data Guru Mapel</a></li>
                      </ul>
                  </li> 
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_document_alt"></i>
                          <span>Data Siswa</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="<?php echo $url;?>wali/datasiswa">Data Siswa</a></li>                          
                          <li><a class="" href="form_validation.html">Nilai Siswa</a></li>
                          <li><a class="" href="form_component.html">Rapot</a></li>
                      </ul>
                  </li>  
				  <li>
                      <a class="" href="chart-chartjs.html">
                          <i class="icon_piechart"></i>
                          <span>grafik nilai kelas</span>
						  </a>
						  </li>
				   <li>                     
                      <a class="" href="chart-chartjs.html">
                          <i class="icon_piechart"></i>
                          <span>Format Raport</span>
                          
                      </a>
                                         
                  </li>
				   <li>                     
                      <a class="" href="chart-chartjs.html">
                          <i class="icon_piechart"></i>
                          <span>Petunjuk</span>
                          
                      </a>
                                         
                  </li>
                             
                  </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <!--overview start-->
			<div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="icon_document_alt"></i> <?php echo $namaCTRL;?></h3>
                                </div>
                        </div>
              <!-- project team & activity end -->

              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-primary" href="<?php echo $url;?>wali/tambah_siswa_kelas"><i class="icon_plus_alt2"></i></a>
              <br>
              <br>
              <div class="col-lg-12">
                      <section class="panel">         
                          <table class="table table-striped table-advance table-hover">
                            <tbody>
                              <tr>
                                 <th><i class="icon_profile"></i> ID Siswa</th>
                                 <th><i class="icon_calendar"></i> Nama</th>
                                 <th><i class="icon_pin_alt"></i> Alamat</th>
                                 <th><i class="icon_mobile"></i> Nomor Handphone</th>
                                 <!--<th><i class="icon_cogs"></i> Kelas</th>-->
                                 <th><i class="icon_cogs"></i> Aksi</th>
                              </tr>
                              <tr>
                            <?php if($datasiswa) : ?>
                                <?php foreach ($datasiswa as $datasiswasiswi) :?> 
                                 <td><?php echo $datasiswasiswi->ID_SISWA;?></td>
                                 <td><?php echo $datasiswasiswi->NAMA_SISWA;?></td>
                                 <td><?php echo $datasiswasiswi->ALAMAT;?></td>
                                 <td><?php echo $datasiswasiswi->NO_TELP;?></td>
                                 <td>
                                  <div class="btn-group">
                                      <!--<a class="btn btn-primary" href="#"><i class="icon_plus_alt2"></i></a>-->
                                      <a class="btn btn-success" href="#"><i class="icon_check_alt2"></i></a>
                                      <a class="btn btn-danger" href="#"><i class="icon_close_alt2"></i></a>
                                  </div>
                                  </td>
                              </tr>
                                <?php endforeach;?>
                                <?php else : ?>
                                    <tr><td colspan='7'>Tidak ada data.</td></tr>
                                <?php endif;?>                  
                           </tbody>
                        </table>
                      </section>
                  </div>
          </section>
      </section>
      <!--main content end-->
	  
  </section>

 
    <!-- javascripts -->
  <script src="<?php echo $url;?>assets/js/jquery.js"></script>
	<script src="<?php echo $url;?>assets/js/jquery-ui-1.10.4.min.js"></script>
    <script src="<?php echo $url;?>assets/js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="<?php echo $url;?>assets/js/jquery-ui-1.9.2.custom.min.js"></script>
    <!-- bootstrap -->
    <script src="<?php echo $url;?>assets/js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="<?php echo $url;?>assets/js/jquery.scrollTo.min.js"></script>
    <script src="<?php echo $url;?>assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <!-- charts scripts -->
    <script src="<?php echo $url;?>assets/assets/jquery-knob/js/jquery.knob.js"></script>
    <script src="<?php echo $url;?>assets/js/jquery.sparkline.js" type="text/javascript"></script>
    <script src="<?php echo $url;?>assets/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
    <script src="<?php echo $url;?>assets/js/owl.carousel.js" ></script>
    <!-- jQuery full calendar -->
    <<script src="<?php echo $url;?>assets/js/fullcalendar.min.js"></script> <!-- Full Google Calendar - Calendar -->
	<script src="<?php echo $url;?>assets/assets/fullcalendar/fullcalendar/fullcalendar.js"></script>
    <!--script for this page only-->
    <script src="<?php echo $url;?>assets/js/calendar-custom.js"></script>
	<script src="<?php echo $url;?>assets/js/jquery.rateit.min.js"></script>
    <!-- custom select -->
    <script src="<?php echo $url;?>assets/js/jquery.customSelect.min.js" ></script>
	<script src="<?php echo $url;?>assets/assets/chart-master/Chart.js"></script>
   
    <!--custome script for all page-->
    <script src="<?php echo $url;?>assets/js/scripts.js"></script>
    <!-- custom script for this page-->
    <script src="<?php echo $url;?>assets/js/sparkline-chart.js"></script>
    <script src="<?php echo $url;?>assets/js/easy-pie-chart.js"></script>
    <script src="<?php echo $url;?>assets/js/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="<?php echo $url;?>assets/js/jquery-jvectormap-world-mill-en.js"></script>
    <script src="<?php echo $url;?>assets/js/xcharts.min.js"></script>
    <script src="<?php echo $url;?>assets/js/jquery.autosize.min.js"></script>
    <script src="<?php echo $url;?>assets/js/jquery.placeholder.min.js"></script>
    <script src="<?php echo $url;?>assets/js/gdp-data.js"></script>	
    <script src="<?php echo $url;?>assets/js/morris.min.js"></script>
    <script src="<?php echo $url;?>assets/js/sparklines.js"></script>	
    <script src="<?php echo $url;?>assets/js/charts.js"></script>
    <script src="<?php echo $url;?>assets/js/jquery.slimscroll.min.js"></script>
  <script>

      //knob
      $(function() {
        $(".knob").knob({
          'draw' : function () { 
            $(this.i).val(this.cv + '%')
          }
        })
      });

      //carousel
      $(document).ready(function() {
          $("#owl-slider").owlCarousel({
              navigation : true,
              slideSpeed : 300,
              paginationSpeed : 400,
              singleItem : true

          });
      });

      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });
	  
	  /* ---------- Map ---------- */
	$(function(){
	  $('#map').vectorMap({
	    map: 'world_mill_en',
	    series: {
	      regions: [{
	        values: gdpData,
	        scale: ['#000', '#000'],
	        normalizeFunction: 'polynomial'
	      }]
	    },
		backgroundColor: '#eef3f7',
	    onLabelShow: function(e, el, code){
	      el.html(el.html()+' (GDP - '+gdpData[code]+')');
	    }
	  });
	});



  </script>

  </body>
</html>
