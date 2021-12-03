<?php
session_start();
require_once "./connection.php";

if($_SESSION['login'] != 'login') {
    return header('location: ./login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Logistik Polres</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="asset/mages/favicon.png">
    <link rel="stylesheet" href="./asset/vendor/owl-carousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="./asset/vendor/owl-carousel/css/owl.theme.default.min.css">
    <link href="./asset/vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
    <link href="./asset/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="asset/vendor/datatables/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="./fontawesome/css/all.min.csss">
    <link rel="stylesheet" href="./select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="./asset/css/app.css">
</head>

<body>
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>

    <div id="main-wrapper">
        <div class="nav-header text-center">
            <a href="?page=dashboard" class="brand-logo">
                <img class="logo-abbr" src="./asset/images/logo-polres.png" alt="logo">
                <span>&nbsp; Logistik Polres</span> 
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>

        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left"></div>
                        <ul class="navbar-nav header-right">
                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    <i class="mdi mdi-account"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="?page=profile" class="dropdown-item py-3">
                                        <i class="icon-user"></i>
                                        <span class="ml-2">Profile </span>
                                    </a>
                                    <a href="./logout.php" class="dropdown-item py-3">
                                        <i class="icon-key"></i>
                                        <span class="ml-2">Logout </span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>

        <div class="quixnav">
            <div class="quixnav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label first">Main Menu</li>
                    <li>
                        <a href="?page=dashboard">
                            <i class="icon icon-single-04"></i>
                            <span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="?page=data-dinas" aria-expanded="false">
                            <i class="icon icon-app-store"></i>
                            <span class="nav-text">Data Dinas</span>
                        </a>
                    </li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="icon icon-app-store"></i><span class="nav-text">Data Perlengkapan</span></a>
                        <ul aria-expanded="false">
                            <li><a href="?page=data-perlengkapan-kaki">Perlengkapan Kaki</a></li>
                            <li><a href="?page=data-perlengkapan-badan">Perlengkapan Badan</a></li>
                            <li><a href="?page=data-perlengkapan-kepala">Perlengkapan Kepala</a></li>
                        </ul>
                    </li>
                    </li>
                    <li class="nav-label">Laporan</li>
                    <li>
                        <a href="./laporan/laporan-pdf.php" target="_blank" aria-expanded="false">
                            <i class="icon icon-app-store"></i>
                            <span class="nav-text">Laporan PDF</span>
                        </a>
                    </li>
                    <li>
                        <a href="./laporan/laporan-excel.php" aria-expanded="false">
                            <i class="icon icon-app-store"></i>
                            <span class="nav-text">Laporan Excel</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">
                <?php
                    if(!is_null($_GET['page'])) {
                        error_reporting(0);

                        $page = $_GET['page'];
                        require_once "./page/$page.php";
                    }
                ?>
            </div>
        </div>
    </div>
    <script src="./asset/vendor/global/global.min.js"></script>
    <script src="./asset/js/quixnav-init.js"></script>
    <script src="./asset/js/custom.min.js"></script>


    <!-- Vectormap -->
    <script src="./asset/vendor/raphael/raphael.min.js"></script>
    <script src="./asset/vendor/morris/morris.min.js"></script>


    <script src="./asset/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="./asset/vendor/chart.js/Chart.bundle.min.js"></script>

    <script src="./asset/vendor/gaugeJS/dist/gauge.min.js"></script>

    <!--  flot-chart js -->
    <script src="./asset/vendor/flot/jquery.flot.js"></script>
    <script src="./asset/vendor/flot/jquery.flot.resize.js"></script>

    <!-- Owl Carousel -->
    <script src="./asset/vendor/owl-carousel/js/owl.carousel.min.js"></script>

    <!-- Counter Up -->
    <script src="./asset/vendor/jqvmap/js/jquery.vmap.min.js"></script>
    <script src="./asset/vendor/jqvmap/js/jquery.vmap.usa.js"></script>
    <script src="./asset/vendor/jquery.counterup/jquery.counterup.min.js"></script>
    
    <script src="asset/vendor/datatables/js/jquery.dataTables.min.js"></script>

    <script src="./asset/js/dashboard/dashboard-1.js"></script>
    <script src="./asset/js/app.js"></script>
    <script src="./select2/dist/js/select2.min.js"></script>
</body>

</html>