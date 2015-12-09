<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Welcome</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo $this->uri->baseUri;?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo $this->uri->baseUri;?>assets/dist/css/sb-admin-2.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="<?php echo $this->uri->baseUri;?>assets/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
    <script src="<?php echo $this->uri->baseUri;?>assets/bower_components/jquery/dist/jquery.js"></script>
</head>
<body>
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo $this->uri->baseUri;?>home/editprofil">Edit Profil</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i><span> <?php echo $uname;?> </span> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="<?php echo $this->uri->baseUri;?>home/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

             <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="<?php echo $this->uri->baseUri;?>home"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="<?php echo $this->uri->baseUri;?>home/editprofil"><i class="fa fa-user fa-fw"></i> Edit Profil</a>
                        </li>
                        <li>
                            <a href="<?php echo $this->uri->baseUri;?>home/ubahsandi"><i class="fa fa-lock fa-fw"></i> Ganti Password</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
     <!-- /#wrapper -->
      <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Profil</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" form action="<?php echo $this->uri->baseUri;?>home/profilbaru" method="post">                        
                                            <input id="id" name="id" value="<?php echo $edit->id;?>" type="hidden">
                                            <div class="form-group">
                                                <label>Nama Lengkap</label>
                                                <input id="nama" name="nama" value="<?php echo $edit->nama;?>" type="text" class="form-control" placeholder="Nama Lengkap">
                                            </div>

                                            <div class="form-group">
                                                <label>Email</label>
                                                <input id="emailup" name="emailup" value="<?php echo $edit->email;?>" type="text" class="form-control" placeholder="Email">
                                            </div>

                                            <div class="form-group">
                                                <label>Nomor HP</label>
                                                <input id="no_telpup" name="no_telpup" value="<?php echo intval($edit->no_telp);?>" type="text" class="form-control" placeholder="Nomor HP">
                                            </div>
                                              
                                        <button type="submit" value="Submit" class="btn btn-primary">Submit</button>
                                        <a href="<?php echo $this->uri->baseUri;?>home" class="btn btn-info">Kembali</a>
                                    </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- jQuery -->
    <script src="<?php echo $this->uri->baseUri;?>assets/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo $this->uri->baseUri;?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="<?php echo $this->uri->baseUri;?>assets/dist/js/sb-admin-2.js"></script>
</body>

</html>
