<!doctype html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Doctor</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="<?= base_url('assets/images/doctor-logo'); ?>">
    <link rel="shortcut icon" href="<?= base_url('assets/images/doctor-logo'); ?>">

    <link rel="stylesheet" href="<?= base_url('assets/css/normalize.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/themify-icons.css'); ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/flag-icon.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/cs-skin-elastic.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">
    <link href="<?= base_url('assets/css/chartist.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/jqvmap.min.css'); ?>" rel="stylesheet">

    <link href="<?= base_url('assets/css/weather-icons.css'); ?>" rel="stylesheet" />
    <link href="<?= base_url('assets/css/fullcalendar.min.css'); ?>" rel="stylesheet" />

   <style>
    #weatherWidget .currentDesc {
        color: #ffffff!important;
    }
        .traffic-chart {
            min-height: 335px;
        }
        #flotPie1  {
            height: 150px;
        }
        #flotPie1 td {
            padding:3px;
        }
        #flotPie1 table {
            top: 20px!important;
            right: -10px!important;
        }
        .chart-container {
            display: table;
            min-width: 270px ;
            text-align: left;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        #flotLine5  {
             height: 105px;
        }

        #flotBarChart {
            height: 150px;
        }
        #cellPaiChart{
            height: 160px;
        }

    </style>
</head>

<body>
    <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    
                    <li class="active">
                        <a href="<?= base_url('doctor'); ?>"><i class="menu-icon fa fa-laptop"style="font-size:25px;color:light blue"></i>Dashboard</a>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a  class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-stethoscope" style="font-size:25px;color:light blue"></i> Doctor</a>
                        <ul class="sub-menu children dropdown-menu">
                            <!-- <li><i class="fa fa-user-md" style="font-size:24px;color:black"></i><a href="<?= base_url('doctors'); ?>">Add Doctors</a></li><br> -->
                            <!-- <li><i class="fa fa-user-md" style="font-size:24px;color:black"></i><a href="<?= base_url('doctors/doctorsList'); ?>">Doctors List</a></li><br> -->
                        </ul>
                    </li>
                    <!-- -->
                    <li>
                    <a class="nav-link" href=""><i class="fa fa-gear" style="font-size:16px"></i> Settings</a>
                    </li>
                </ul>
            </div>
        </nav>
    </aside>
    <!-- /#left-panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">
                    <a class="navbar-brand" ><img src="<?= base_url('assets/images/logo'); ?>" alt="Logo"></a>
                    <a class="navbar-brand hidden"><img src="<?= base_url('assets/images/logo2'); ?>" alt=""></a>
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>
            <div class="top-right">
                <div class="header-menu">
                    <div class="user-area dropdown float-right">
                        <a class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="<?= base_url("assets/images/doctor");?>" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="<?= base_url('forgottenpass'); ?>"><i class="fa fa- user"></i>ForgottenPassword</a>
                            <a class="nav-link" href=""><i class="fa fa- user"></i>Notifications <span class="count">13</span></a>
                            <a class="nav-link" href="<?= base_url('login'); ?>"><i class="fa fa-power -off"></i>Logout</a>
                        </div>
                    </div>

                </div>
            </div>
        </header>
        <!-- /#header -->