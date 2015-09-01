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

    <!-- DataTables Responsive CSS -->
    <link href="<?php echo base_url() ?>assets/css/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url() ?>assets/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url() ?>assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

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
                <a class="navbar-brand">Pemetaan Tenaga Medis</a>
            </div>
            <!-- /.navbar-header -->

            <!-- <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> username <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Ubah Password</a>
                        </li>
                        <li><a href="<?php //echo site_url("logout") ?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                </li>
            </ul> -->
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="<?php echo site_url("main/index") ?>"><i class="fa fa-table fa-fw"></i> Pemetaan</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-hospital-o fa-fw"></i> Kabupaten/Kota<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo site_url("main/daftar_kab_kota") ?>">Daftar Kabupaten/Kota</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url("main/tambah_kab_kota") ?>">Tambah Kabupaten/Kota</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-life-ring fa-fw"></i> Jenis Bencana<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo site_url("main/daftar_bencana") ?>">Daftar Jenis Bencana</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url("main/tambah_bencana") ?>">Tambah Jenis Bencana</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-user-md fa-fw"></i> Tenaga Medis<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo site_url("main/daftar_tenaga_medis") ?>">Daftar Tenaga Medis</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url("main/tambah_tenaga_medis") ?>">Tambah Tenaga Medis</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url("main/daftar_data_biaya") ?>">Daftar Data Biaya</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url("main/tambah_data_biaya") ?>">Tambah Data Biaya</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-plus-square fa-fw"></i> Pusat SDM Medis<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo site_url("main/daftar_pusat_sdm_medis") ?>">Daftar Pusat SDM Medis</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url("main/tambah_pusat_sdm_medis") ?>">Tambah Pusat SDM Medis</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-stethoscope fa-fw"></i> Keahlian<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo site_url("main/daftar_keahlian") ?>">Daftar Keahlian</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url("main/tambah_keahlian") ?>">Tambah Keahlian</a>
                                </li>
                            </ul>
                        </li>
						<li>
                            <a href="#"><i class="fa fa-calculator fa-fw"></i> Tugaskan Dokter</span></a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>