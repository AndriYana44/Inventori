<?php 
$sql = "SELECT COUNT(id) as jumlah FROM tb_dinas";
$query = $conn->query($sql);

$data_dinas = $query->fetch_assoc();
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
        <div class="card card-dashboard">
            <div class="stat-widget-two card-body">
                <div class="stat-content">
                    <div class="stat-text">Income Detail</div>
                    <div class="stat-digit"> <i class="fa fa-usd"></i>7800</div>
                </div>
                <div class="progress">
                    <div class="progress-bar progress-bar-primary w-75" role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6">
        <div class="card card-dashboard">
            <div class="stat-widget-two card-body">
                <div class="stat-content">
                    <div class="stat-text">Task Completed</div>
                    <div class="stat-digit"> <i class="fa fa-usd"></i> 500</div>
                </div>
                <div class="progress">
                    <div class="progress-bar progress-bar-warning w-50" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6">
        <div class="card card-dashboard">
            <div class="stat-widget-two card-body">
                <div class="stat-content">
                    <div class="stat-text">Task Completed</div>
                    <div class="stat-digit"> <i class="fa fa-usd"></i>650</div>
                </div>
                <div class="progress">
                    <div class="progress-bar progress-bar-danger w-65" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
        <!-- /# card -->
    </div>
    <!-- /# column -->