<?php 
require_once "./connection.php";
$query1 = $conn->query("SELECT * FROM barang_keluar");
$data = $query1->fetch_assoc();
?>

<div class="row">
    <div class="col-12">
        <div class="card px-3 py-3">
            <h3>List Barang Keluar</h3>
            <small>Dashboard / Barang Keluar</small>
        </div>
        <div class="card px-3 py-3 shadow">
            <div class="card-header">
                <h4>Barang Keluar</h4>
                <a class="btn btn-primary" href="?page=form-add-barang-keluar">
                    <i class="fa fa-plus"></i> Tambah Data</a>
            </div>
            <div class="card-body">

            <!-- flash messages -->
            <?php if(isset($_SESSION['SUCCESS'])) { ?>
            <div class="alert alert-success text-dark flash" role="alert">
                <?= $flash_success ?>
            </div>
            <?php } ?>
            <?php if(isset($_SESSION['ERROR'])) { ?>
            <div class="alert alert-danger text-dark flash" role="alert">
                <?= $flash_error ?>
            </div>
            <?php } ?>
            <!-- end flash -->

                <table class="table table-bordered table-stripped" id="table-dinas" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Dinas</th>
                            <th>Jumlah Polri</th>
                            <th>Jumlah PNS</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;
                            foreach($data as $item) :
                        ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $item['dinas'] ?></td>
                            <td><?= $item['jml_polri'] ?></td>
                            <td><?= $item['jml_pns'] ?></td>
                            <td>
                                <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#dinasEdit<?= $item['id'] ?>">Edit</button>
                                <form action="" method="post" class="d-inline">
                                    <input type="number" name="id" value="<?= $item['id'] ?>" hidden>
                                    <button type="submit" name="delete-dinas" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                        <?php
                            endforeach;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>