<?php
    if(isset($_POST['save']) || isset($_POST['update'])) {
        $dinas     = $_POST['dinas'];
        $jilbab_polwan  = $_POST['jilbab_polwan'];
        $jilbab_pns  = $_POST['jilbab_pns'];
        $jilbab_reskrim = $_POST['jilbab_reskrim'];
        $topi_gol_1 = $_POST['topi_gol_1'];
        $topi_gol_2 = $_POST['topi_gol_2'];
        $topi_gol_3 = $_POST['topi_gol_3'];

        if(isset($_POST['save'])) {
            $sql = "INSERT INTO tb_perlengkapan_kepala SET id_dinas='$dinas', jilbab_polwan='$jilbab_polwan', jilbab_pns='$jilbab_pns', jilbab_reskrim='$jilbab_reskrim', topi_gol_1='$topi_gol_1', topi_gol_2='$topi_gol_2', topi_gol_3='$topi_gol_3'";
        }else {
            $id = $_POST['id'];
            var_dump($id);
            $sql = "UPDATE tb_perlengkapan_kepala SET id_dinas='$dinas', jilbab_polwan='$jilbab_polwan', jilbab_pns='$jilbab_pns', jilbab_reskrim='$jilbab_reskrim', topi_gol_1='$topi_gol_1', topi_gol_2='$topi_gol_2', topi_gol_3='$topi_gol_3' WHERE id=$id";
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
    }

    if(isset($_POST['delete'])) {
        $id = $_POST['id'];
        $sql = "DELETE FROM tb_perlengkapan_kepala WHERE id=$id";
        $query = $conn->query($sql);

        if($query) {
            $_SESSION['SUCCESS'] = time();
            $flash_success = "Data berhasil dihapus";
        }
    }

    if (isset($_SESSION['SUCCESS']) && (time() - $_SESSION['SUCCESS'] > 3)) {
        unset($_SESSION['SUCCESS']);
    }

    $sql_join_table = "SELECT tb_perlengkapan_kepala.*, tb_dinas.dinas, tb_dinas.id as dinas_id 
                        FROM tb_perlengkapan_kepala 
                        INNER JOIN tb_dinas 
                        ON tb_dinas.id = tb_perlengkapan_kepala.id_dinas";

    $data = $conn->query($sql_join_table);
    $dinas = $conn->query("SELECT * FROM tb_dinas");
?>

<div class="row">
    <div class="col-12">
        <div class="card px-3 py-3">
            <h3>List Data Perlengkapan Kepala</h3>
            <small>Dashboard / Data Perlengkapan Kepala</small>
        </div>
        <div class="card px-3 py-3 shadow">
            <div class="card-header">
                <h4>Data Perlengkapan Kepala</h4>
                <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                    <i class="fa fa-plus"></i> Tambah Data</button>
            </div>
            <div class="card-body">
            <?php if(isset($_SESSION['SUCCESS'])) { ?>
            <div class="alert alert-success text-dark flash" role="alert">
                <?= $flash_success ?>
            </div>
            <?php } ?>
                <table class="table table-bordered table-stripped" id="table-dinas" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Dinas</th>
                            <th>Jilbab Polwan</th>
                            <th>Jilbab PNS</th>
                            <th>Jilbab Reskrim</th>
                            <th>Topi PNS Gol 1</th>
                            <th>Topi PNS Gol 2</th>
                            <th>Topi PNS Gol 3</th>
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
                            <td><?= $item['jilbab_polwan'] ?></td>
                            <td><?= $item['jilbab_pns'] ?></td>
                            <td><?= $item['jilbab_reskrim'] ?></td>
                            <td><?= $item['topi_gol_1'] ?></td>
                            <td><?= $item['topi_gol_2'] ?></td>
                            <td><?= $item['topi_gol_3'] ?></td>
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
                        <label for="jilbab_polwan">Jilbab Polwan</label>
                        <input type="number" name="jilbab_polwan" class="form-control" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="jilbab_pns">Jilbab PNS</label>
                        <input type="number" name="jilbab_pns" class="form-control" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="jilbab_reskrim">Jilbab Reskrim</label>
                        <input type="number" name="jilbab_reskrim" class="form-control" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="topi_gol_1">Topi PNS Gol 1</label>
                        <input type="number" name="topi_gol_1" class="form-control" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="topi_gol_2">Topi PNS Gol 2</label>
                        <input type="number" name="topi_gol_2" class="form-control" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="topi_gol_3">Topi PNS Gol 3</label>
                        <input type="number" name="topi_gol_3" class="form-control" autocomplete="off">
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
                            <option value="">Pilih dinas</option>
                            <?php foreach($dinas as $val) : ?>
                            <option value="<?= $val['id'] ?>" <?= $item['id_dinas'] == $val['id'] ? "selected" : "" ?>><?= $val['dinas'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jilbab_polwan">Jilbab Polwan</label>
                        <input type="number" name="jilbab_polwan" value="<?= $item['jilbab_polwan'] ?>" class="form-control" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="jilbab_pns">Jilbab PNS</label>
                        <input type="number" name="jilbab_pns" value="<?= $item['jilbab_pns'] ?>" class="form-control" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="jilbab_reskrim">Jilbab Reskrim</label>
                        <input type="number" name="jilbab_reskrim" value="<?= $item['jilbab_reskrim'] ?>" class="form-control" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="topi_gol_1">Topi PNS Gol 1</label>
                        <input type="number" name="topi_gol_1" value="<?= $item['topi_gol_1'] ?>" class="form-control" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="topi_gol_2">Topi PNS Gol 2</label>
                        <input type="number" name="topi_gol_2" value="<?= $item['topi_gol_2'] ?>" class="form-control" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="topi_gol_3">Topi PNS Gol 3</label>
                        <input type="number" name="topi_gol_3" value="<?= $item['topi_gol_3'] ?>" class="form-control" autocomplete="off">
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