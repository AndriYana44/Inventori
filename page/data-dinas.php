<?php
    if(isset($_POST['save-dinas']) || isset($_POST['update-dinas'])) {
        $dinas      = $_POST['dinas'];
        $jml_polri  = $_POST['polri'];
        $jml_pns    = $_POST['pns'];

        if(isset($_POST['save-dinas'])) {
            $sql = "INSERT INTO tb_dinas SET dinas='$dinas', jml_polri='$jml_polri', jml_pns='$jml_pns'";
        }else {
            $id = $_POST['id'];
            $sql = "UPDATE tb_dinas SET dinas='$dinas', jml_polri='$jml_polri', jml_pns='$jml_pns' WHERE id=$id";
        }

        $query = $conn->query($sql);

        if($query) {
            if(isset($_POST['save-dinas'])) {
                $_SESSION['SUCCESS'] = time();
                $flash_success = "Data berhasil ditambahkan";
            }else{
                $_SESSION['SUCCESS'] = time();
                $flash_success = "Data berhasil diubah";
            }
        }
    }

    if(isset($_POST['delete-dinas'])) {
        $id = $_POST['id'];
        $sql = "DELETE FROM tb_dinas WHERE id=$id";
        $query = $conn->query($sql);

        if($query) {
            $_SESSION['SUCCESS'] = time();
            $flash_success = "Data berhasil dihapus";
        }
    }

    if (isset($_SESSION['SUCCESS']) && (time() - $_SESSION['SUCCESS'] > 3)) {
        unset($_SESSION['SUCCESS']);
    }

    $data = $conn->query("SELECT * FROM tb_dinas");
?>

<div class="row">
    <div class="col-12">
        <div class="card px-3 py-3">
            <h3>List Data Dinas</h3>
            <small>Dashboard / Data dinas</small>
        </div>
        <div class="card px-3 py-3 shadow">
            <div class="card-header">
                <h4>Data dinas</h4>
                <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                    <i class="fa fa-plus"></i> Tambah Data</button>
            </div>
            <div class="card-body">
            <?php if(isset($_SESSION['SUCCESS'])) { ?>
            <div class="alert alert-success text-dark flash" role="alert">
                <?= $flash_success ?>
            </div>
            <?php } ?>
                <table class="table table-bordered table-stripped" id="table-dinas">
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

<!-- Modal add-->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="dinas">Nama Dinas</label>
                        <input type="text" name="dinas" class="form-control" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="polri">Jumlah Polri</label>
                        <input type="text" name="polri" class="form-control" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="pns">Jumlah PNS</label>
                        <input type="text" name="pns" class="form-control" autocomplete="off">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                    <button type="submit" name="save-dinas" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal edit-->
<?php foreach($data as $item) : ?>
<div class="modal fade" id="dinasEdit<?= $item['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="" method="post">
                <input type="number" name="id" value="<?= $item['id'] ?>" hidden>
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="dinas">Nama Dinas</label>
                        <input type="text" name="dinas" class="form-control" value="<?= $item['dinas'] ?>" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="polri">Jumlah Polri</label>
                        <input type="text" name="polri" class="form-control" value="<?= $item['jml_polri'] ?>" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="pns">Jumlah PNS</label>
                        <input type="text" name="pns" class="form-control" value="<?= $item['jml_pns'] ?>" autocomplete="off">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                    <button type="submit" name="update-dinas" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach ?>