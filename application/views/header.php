<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Pemetaan Tenaga Medis</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url() ?>assets/css/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="<?php echo base_url() ?>assets/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->

    <style type="text/css">
        .navbar-brand {
            margin-right: 50px;
        }

        .navbar-collapse li {
            margin-right: 20px;
        }

        .dropdown-menu {
            padding: 0;
        }

        .dropdown-menu {
            margin: 0;
        }

        .dropdown-menu li a {
            line-height: 40px;
            vertical-align: middle;
            margin: 0;
        }

        .navbar-inverse {
            background-color: #E62F17;
            border-color: #E62F17;
        }

        .navbar-inverse .navbar-brand, .navbar-inverse .navbar-nav li a {
            color: #fff;
        }

        .navbar-inverse .navbar-nav .open a, .navbar-inverse .navbar-nav .open a:hover,
        .navbar-inverse .navbar-nav .open a:focus {
            background-color: #FF4B33;
            color: #FFF;
        }

        .navbar-inverse .navbar-nav .open .dropdown-menu a,
        .navbar-inverse .navbar-nav .open .dropdown-menu a:focus {
            background-color: white;
            color: black;
        }

        .navbar-inverse .navbar-nav .open .dropdown-menu a:hover
        {
            background-color: #FF4B33;
            color: white;
        }

        body {
            background-image: url('<?php echo base_url()?>assets/img/page-background3.png');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100%;
            background-opacity: 0.5
        }
    </style>

    <!-- DataTables Responsive CSS -->
    <link href="<?php echo base_url() ?>assets/css/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url() ?>assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- jQuery -->
    <script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>

</head>

<body>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-static-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="<?=site_url("beranda")?>" class="navbar-brand">Pemetaan Tenaga Medis</a>
            </div>
            
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="<?=site_url("beranda")?>">
                        <i class="fa fa-home fa-fw"></i> Beranda
                    </a></li>
					<li><a href="<?=site_url("compute")?>">
                        <i class="fa fa-search fa-fw"></i> Feasible
                    </a></li>
					<li><a href="<?=site_url("solution")?>">
                        <i class="fa fa-ambulance fa-fw"></i> Penugasan
                    </a></li>
                    <?php if($this->session->userdata('privilege') == 'administrator')
                    {
                        echo '
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-database"></i> &nbsp;Pengelolaan Data Master <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="dropdown-menu-item"><a href="'.site_url("kab_kota").'">
                                        <i class="fa fa-hospital-o fa-fw"></i> Kabupaten/Kota
                                    </a></li>
                                    <li><a href="'.site_url("bencana").'">
                                        <i class="fa fa-life-ring fa-fw"></i> Bencana
                                    </a></li>
                                    <li><a href="'.site_url("tenaga_medis").'">
                                        <i class="fa fa-user-md fa-fw"></i> Tenaga Medis
                                    </a></li>
                                    <li><a href="'.site_url("biaya").'">
                                        <i class="fa fa-money fa-fw"></i> Biaya
                                    </a></li>
                                    <li><a href="'.site_url("pusat_sdm_medis").'">
                                        <i class="fa fa-plus-square fa-fw"></i> Pusat SDM Medis
                                    </a></li>
                                    <li><a href="'.site_url("keahlian").'">
                                        <i class="fa fa-stethoscope fa-fw"></i> Keahlian
                                    </a></li>
                                </ul>
                            </li>
                        ';
                    }?>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> <?=$this->session->userdata('username')?> <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <!-- <li><a href="#"><i class="fa fa-gear fa-fw"></i> Ubah Password</a></li> -->
                            <li><a href="<?php echo site_url("login/logout") ?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>