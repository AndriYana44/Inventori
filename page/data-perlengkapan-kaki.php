<?php
    if(isset($_POST['save']) || isset($_POST['update'])) {
        $dinas = $_POST['dinas'];

        $validation = $conn->query("SELECT * FROM tb_perlengkapan_kaki WHERE id_dinas = $dinas");
        if(is_null($validation->fetch_assoc())) {
            $pdl_staf = ($_POST['pdl_staf'] == "") ? '0' : $_POST['pdl_staf'];
            $olahraga = ($_POST['olahraga'] == "") ? '0' : $_POST['olahraga'];
            $kaos_kaki = ($_POST['kaos_kaki'] == "") ? '0' : $_POST['kaos_kaki'];

            if(isset($_POST['save'])) {
                $sql = "INSERT INTO tb_perlengkapan_kaki SET id_dinas='$dinas', pdl_staf='$pdl_staf', olahraga='$olahraga', kaos_kaki='$kaos_kaki'";
            }else {
                $id = $_POST['id'];
                $sql = "UPDATE tb_perlengkapan_kaki SET id_dinas='$dinas', pdl_staf='$pdl_staf', olahraga='$olahraga', kaos_kaki='$kaos_kaki' WHERE id=$id";
            }

            $query = $conn->query($sql);

            if($query) {
                if(isset($_POST['save'])) {
                    $_SESSION['SUCCESS'] = time();
                    $flash_success = "Data berhasil ditambahkan";
                }else{
                    $_SESSION['SUCCESS'] = time();
                    $flash_success = "Data berhasil diubah";
                }
            }
        }else {
            $_SESSION['ERROR'] = time();
            $flash_error = 'Data dinas sudah ada!';
        }
    }

    if(isset($_POST['delete'])) {
        $id = $_POST['id'];
        $sql = "DELETE FROM tb_perlengkapan_kaki WHERE id=$id";
        $query = $conn->query($sql);

        if($query) {
            $_SESSION['SUCCESS'] = time();
            $flash_success = "Data berhasil dihapus";
        }
    }

    if (isset($_SESSION['SUCCESS']) && (time() - $_SESSION['SUCCESS'] > 3)) {
        unset($_SESSION['SUCCESS']);
    }
    if (isset($_SESSION['ERROR']) && (time() - $_SESSION['ERROR'] > 3)) {
        unset($_SESSION['ERROR']);
    }

    $sql_join_table = "SELECT tb_perlengkapan_kaki.*, tb_dinas.dinas, tb_dinas.id as dinas_id 
                        FROM tb_perlengkapan_kaki 
                        INNER JOIN tb_dinas 
                        ON tb_dinas.id = tb_perlengkapan_kaki.id_dinas";

    $data = $conn->query($sql_join_table);
    $dinas = $conn->query("SELECT * FROM tb_dinas");
?>

<div class="row">
    <div class="col-12">
        <div class="card px-3 py-3">
            <h3>List Data Perlengkapan Kaki</h3>
            <small>Dashboard / Data Perlengkapan Kaki</small>
        </div>
        <div class="card px-3 py-3 shadow">
            <div class="card-header">
                <h4>Data Perlengkapan Kaki</h4>
                <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                    <i class="fa fa-plus"></i> Tambah Data</button>
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
                            <th>Dinas</th>
                            <th>Jumlah Sepatu PDL STAF</th>
                            <th>Jumlah Sepatu Olahraga</th>
                            <th>Jumlah Kaos Kaki</th>
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
                            <td><?= $item['pdl_staf'] ?></td>
                            <td><?= $item['olahraga'] ?></td>
                            <td><?= $item['kaos_kaki'] ?></td>
                            <td>
                                <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalEdit<?= $item['id'] ?>">Edit</button>
                                <form action="" method="post" class="d-inline">
                                    <input type="number" name="id" value="<?= $item['id'] ?>" hidden>
                                    <button type="submit" name="delete" class="btn btn-danger btn-sm">Delete</button>
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
                        <label for="dinas">Dinas</label>
                        <select class="select2" name="dinas" data-placeholder="Pilih dinas">
                            <option value="">Pilih dinas</option>
                            <?php foreach($dinas as $val) : ?>
                            <option value="<?= $val['id'] ?>"><?= $val['dinas'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="pdl_staf">Jumlah Sepatu PDL Staf</label>
                        <input type="number" name="pdl_staf" class="form-control" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="olahraga">Jumlah Sepatu Olahraga</label>
                        <input type="number" name="olahraga" class="form-control" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="kaos_kaki">Jumlah Kaos Kaki</label>
                        <input type="number" name="kaos_kaki" class="form-control" autocomplete="off">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                    <button type="submit" name="save" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal edit-->
<?php foreach($data as $item) : ?>
    <div class="modal fade" id="modalEdit<?= $item['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                        <label for="dinas">Dinas</label>
                        <select class="select2" name="dinas" data-placeholder="Pilih dinas">
                            <option value=""></option>
                            <?php foreach($dinas as $val) : ?>
                            <option value="<?= $val['id'] ?>" <?= $val['id'] == $item['id_dinas'] ? "selected" : "" ?>><?= $val['dinas'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="pdl_staf">Jumlah Sepatu PDL Staf</label>
                        <input type="number" name="pdl_staf" value="<?= $item['pdl_staf'] ?>" class="form-control" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="olahraga">Jumlah Sepatu Olahraga</label>
                        <input type="number" name="olahraga" value="<?= $item['olahraga'] ?>" class="form-control" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="kaos_kaki">Jumlah Kaos Kaki</label>
                        <input type="number" name="kaos_kaki" value="<?= $item['kaos_kaki'] ?>" class="form-control" autocomplete="off">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                    <button type="submit" name="update" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach ?>