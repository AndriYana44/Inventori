<?php
    if(isset($_POST['save']) || isset($_POST['update'])) {
        $dinas = $_POST['dinas'];

        // $validation = $conn->query("SELECT * FROM tb_perlengkapan_kepala WHERE id_dinas = $dinas");
        // if(is_null($validation->fetch_assoc())) {
            $sabhara = ($_POST['sabhara'] == "") ? '0' : $_POST['sabhara'];
            $lantas = ($_POST['lantas'] == "") ? '0' : $_POST['lantas'];
            $jaket_staf_pria = ($_POST['jaket_staf_pria'] == "") ? '0' : $_POST['jaket_staf_pria'];
            $jaket_staf_wanita = ($_POST['jaket_staf_wanita'] == "") ? '0' : $_POST['jaket_staf_wanita'];
            $baju_sabhara_pria = ($_POST['baju_sabhara_pria'] == "") ? '0' : $_POST['baju_sabhara_pria'];
            $baju_sabhara_wanita = ($_POST['baju_sabhara_wanita'] == "") ? '0' : $_POST['baju_sabhara_wanita'];
            $baju_provos_pria = ($_POST['baju_provos_pria'] == "") ? '0' : $_POST['baju_provos_pria'];
            $baju_provos_wanita = ($_POST['baju_provos_wanita'] == "") ? '0' : $_POST['baju_provos_wanita'];

            if(isset($_POST['save'])) {
                $sql = "INSERT INTO tb_perlengkapan_badan SET id_dinas='$dinas', sabhara='$sabhara', lantas='$lantas', jaket_staf_pria='$jaket_staf_pria', jaket_staf_wanita='$jaket_staf_wanita', baju_sabhara_pria='$baju_sabhara_pria', baju_sabhara_wanita='$baju_sabhara_wanita', baju_provos_pria='$baju_provos_pria', baju_provos_wanita='$baju_provos_wanita'";
            }else {
                $id = $_POST['id'];
                $sql = "UPDATE tb_perlengkapan_badan SET id_dinas='$dinas', sabhara='$sabhara', lantas='$lantas', jaket_staf_pria='$jaket_staf_pria', jaket_staf_wanita='$jaket_staf_wanita', baju_sabhara_pria='$baju_sabhara_pria', baju_sabhara_wanita='$baju_sabhara_wanita', baju_provos_pria='$baju_provos_pria', baju_provos_wanita='$baju_provos_wanita' WHERE id=$id";
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
        // }else {
        //     $_SESSION['ERROR'] = time();
        //     $flash_error = 'Data dinas sudah ada!';
        // }
    }

    if(isset($_POST['delete'])) {
        $id = $_POST['id'];
        $sql = "DELETE FROM tb_perlengkapan_badan WHERE id=$id";
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

    $sql_join_table = "SELECT tb_perlengkapan_badan.*, tb_dinas.dinas, tb_dinas.id as dinas_id 
                        FROM tb_perlengkapan_badan 
                        INNER JOIN tb_dinas 
                        ON tb_dinas.id = tb_perlengkapan_badan.id_dinas";

    $data = $conn->query($sql_join_table);
    $dinas = $conn->query("SELECT * FROM tb_dinas");
?>

<div class="row">
    <div class="col-12">
        <div class="card px-3 py-3">
            <h3>List Data Perlengkapan Badan</h3>
            <small>Dashboard / Data Perlengkapan Badan</small>
        </div>
        <div class="card px-3 py-3 shadow">
            <div class="card-header">
                <h4>Data Perlengkapan Badan</h4>
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

                <table class="table table-bordered table-stripped" id="table-dinas">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Dinas</th>
                            <th>Jas Hujan Sabhara</th>
                            <th>Jas Hujan Lantas</th>
                            <th>Jaket Staf Pria</th>
                            <th>Jaket Staf Wanita</th>
                            <th>Baju Sabhara Pria</th>
                            <th>Baju Sabhara Wanita</th>
                            <th>Baju Provos Pria</th>
                            <th>Baju Provos Wanita</th>
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
                            <td><?= $item['sabhara'] ?></td>
                            <td><?= $item['lantas'] ?></td>
                            <td><?= $item['jaket_staf_pria'] ?></td>
                            <td><?= $item['jaket_staf_wanita'] ?></td>
                            <td><?= $item['baju_sabhara_wanita'] ?></td>
                            <td><?= $item['baju_sabhara_pria'] ?></td>
                            <td><?= $item['baju_provos_wanita'] ?></td>
                            <td><?= $item['baju_provos_pria'] ?></td>
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
                        <label for="sabhara">Jas Hujan Sabhara</label>
                        <input type="number" name="sabhara" class="form-control" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="lantas">Jas Hujan Lantas</label>
                        <input type="number" name="lantas" class="form-control" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="jaket_staf_pria">Jaket Staf Pria</label>
                        <input type="number" name="jaket_staf_pria" class="form-control" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="jaket_staf_wanita">Jaket Staf Wanita</label>
                        <input type="number" name="jaket_staf_wanita" class="form-control" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="baju_sabhara_pria">Baju Sabhara Pria</label>
                        <input type="number" name="baju_sabhara_pria" class="form-control" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="baju_sabhara_wanita">Baju Sabhara Wanita</label>
                        <input type="number" name="baju_sabhara_wanita" class="form-control" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="baju_provos_pria">Baju Provos Pria</label>
                        <input type="number" name="baju_provos_pria" class="form-control" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="baju_provos_wanita">Baju Provos Pria</label>
                        <input type="number" name="baju_provos_wanita" class="form-control" autocomplete="off">
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
                            <option value="<?= $val['id'] ?>" <?= $item['id_dinas'] == $val['id'] ? "selected" : "" ?>><?= $val['dinas'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="sabhara">Jas Hujan Sabhara</label>
                        <input type="number" name="sabhara" value="<?= $item['sabhara'] ?>" class="form-control" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="lantas">Jas Hujan Lantas</label>
                        <input type="number" name="lantas" value="<?= $item['lantas'] ?>" class="form-control" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="jaket_staf_pria">Jaket Staf Pria</label>
                        <input type="number" name="jaket_staf_pria" value="<?= $item['jaket_staf_pria'] ?>" class="form-control" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="jaket_staf_wanita">Jaket Staf Wanita</label>
                        <input type="number" name="jaket_staf_wanita" value="<?= $item['jaket_staf_wanita'] ?>" class="form-control" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="baju_sabhara_pria">Baju Sabhara Pria</label>
                        <input type="number" name="baju_sabhara_pria" value="<?= $item['baju_sabhara_pria'] ?>" class="form-control" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="baju_sabhara_wanita">Baju Sabhara Wanita</label>
                        <input type="number" name="baju_sabhara_wanita" value="<?= $item['baju_sabhara_wanita'] ?>" class="form-control" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="baju_provos_pria">Baju Provos Pria</label>
                        <input type="number" name="baju_provos_pria" value="<?= $item['baju_provos_pria'] ?>" class="form-control" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="baju_provos_wanita">Baju Provos Pria</label>
                        <input type="number" name="baju_provos_wanita" value="<?= $item['baju_provos_wanita'] ?>" class="form-control" autocomplete="off">
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
<?php endforeach ?>