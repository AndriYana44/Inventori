<?php 
$sql1 = "SELECT COUNT(id) as jumlah FROM tb_dinas";
$sql2 = "SELECT COUNT(id) as jumlah FROM tb_perlengkapan_kaki";
$sql3 = "SELECT COUNT(id) as jumlah FROM tb_perlengkapan_badan";
$sql4 = "SELECT COUNT(id) as jumlah FROM tb_perlengkapan_kepala";

$query1 = $conn->query($sql1);
$query2 = $conn->query($sql2);
$query3 = $conn->query($sql3);
$query4 = $conn->query($sql4);

$data_dinas = $query1->fetch_assoc();
$data_perlengkapan_kaki = $query2->fetch_assoc();
$data_perlengkapan_badan = $query3->fetch_assoc();
$data_perlengkapan_kepala = $query4->fetch_assoc();
?>

<div class="row">
    <div class="col-lg-3 col-sm-6">
        <div class="card card-dashboard" data-target="?page=data-dinas">
            <div class="stat-widget-two card-body">
                <div class="stat-content">
                    <div class="stat-text"><i class="fa fa-area-chart"></i> Jumlah Dinas</div>
                    <div class="stat-digit"><?= $data_dinas['jumlah'] ?></div>
                </div>
                <div class="progress">
                    <div class="progress-bar progress-bar-success w-<?= $data_dinas['jumlah'] ?>" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6">
        <div class="card card-dashboard" data-target="?page=data-perlengkapan-kaki">
            <div class="stat-widget-two card-body">
                <div class="stat-content">
                    <div class="stat-text"><i class="fa fa-area-chart"></i> Perlengkapan Kaki</div>
                    <div class="stat-digit"><?= $data_perlengkapan_kaki['jumlah'] ?></div>
                </div>
                <div class="progress">
                    <div class="progress-bar progress-bar-primary w-<?= $data_perlengkapan_kaki['jumlah'] ?>" role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6">
        <div class="card card-dashboard" data-target="?page=data-perlengkapan-badan">
            <div class="stat-widget-two card-body">
                <div class="stat-content">
                    <div class="stat-text"><i class="fa fa-area-chart"></i> Perlengkapan Badan</div>
                    <div class="stat-digit"><?= $data_perlengkapan_badan['jumlah'] ?></div>
                </div>
                <div class="progress">
                    <div class="progress-bar progress-bar-warning w-<?= $data_perlengkapan_badan['jumlah'] ?>" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6">
        <div class="card card-dashboard" data-target="?page=data-perlengkapan-kepala">
            <div class="stat-widget-two card-body">
                <div class="stat-content">
                    <div class="stat-text"><i class="fa fa-area-chart"></i> Perlengkapan Kepala</div>
                    <div class="stat-digit"><?= $data_perlengkapan_kepala['jumlah'] ?></div>
                </div>
                <div class="progress">
                    <div class="progress-bar progress-bar-danger w-<?= $data_perlengkapan_kepala['jumlah'] ?>" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
        <!-- /# card -->
    </div>
    <!-- /# column -->