<?php 
require_once "./connection.php";
$query1 = $conn->query("SELECT barang_refund.*, tb_dinas.dinas FROM barang_refund 
    INNER JOIN barang_keluar ON barang_keluar.id = barang_refund.id_barang_keluar
    INNER JOIN tb_dinas ON tb_dinas.id = barang_keluar.id_dinas");
$data = $query1->fetch_assoc();

if(isset($_GET['delete'])) {
    $id_delete = $_GET['delete'];
    $sql_delete = "DELETE FROM barang_refund WHERE id = $id_delete";
    $query_delete = $conn->query($sql_delete);
    
    if($query_delete) {
        $_SESSION['SUCCESS'] = time();
        $_SESSION['message'] = 'Data berhasil dihapus';
        echo "<script>
                window.location.href = '?page=barang-refund';
              </script>";
    }
}

if (isset($_SESSION['SUCCESS']) && (time() - $_SESSION['SUCCESS'] > 3)) {
    unset($_SESSION['SUCCESS']);
}
?>

<style>
    .switch {
        display: flex;
        width: 100%;
        justify-content: space-evenly;
        align-items: center;
        background-color: #343957;
        margin-bottom: -10px;
    }
    .switch span {
        color: #FFF;
        width: 33.3%;
        padding: 10px 20px;
        text-align: center;
        cursor: pointer;
        transition: .3s;
    }
    .switch span:hover, .switch span.active {
        background-color: #555;
        box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px inset, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px inset;
    }
    .switch span:nth-child(-n+2) {
        border-right: 1px solid #aaa;
    }
</style>
<div class="row">
    <div class="col-12">
        <div class="card px-3 py-3">
            <h3>List Barang Refund</h3>
            <small>Dashboard / Barang Refund</small>
        </div>
        <div class="card px-3 py-3 shadow">
            <div class="card-header">
                <h4>Barang Refund</h4>
            </div>
            <div class="card-body">
            
            <div class="switch">
                <span class="switch-button active" data-target="kaki">Perlengkapan Kaki</span>
                <span class="switch-button" data-target="badan">Perlengkapan Badan</span>
                <span class="switch-button" data-target="kepala">Perlengkapan Kepala</span>
            </div>
            <hr>

            <!-- flash messages -->
            <?php if(isset($_SESSION['SUCCESS'])) { ?>
            <div class="alert alert-success text-dark flash" role="alert">
                <?= $_SESSION['message'] ?>
            </div>
            <?php } ?>
            <?php if(isset($_SESSION['ERROR'])) { ?>
            <div class="alert alert-danger text-dark flash" role="alert">
                <?= $flash_error ?>
            </div>
            <?php } ?>
            <!-- end flash -->

                <div class="container">
                    <div class="table-wrapper show" data-id="kaki">
                        <table class="table table-bordered table-stripped" id="table-kaki" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Dinas</th>
                                    <th>Sepatu Pdl Staf</th>
                                    <th>Sepatu Olahraga</th>
                                    <th>Kaos Kaki</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no = 1;
                                    foreach($query1 as $item) :
                                ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $item['dinas'] ?></td>
                                    <td><?= $item['pdl_staf'] ?></td>
                                    <td><?= $item['olahraga'] ?></td>
                                    <td><?= $item['kaos_kaki'] ?></td>
                                    <td>
                                        <a onclick="return confirm('Lanjukan menghapus data?')" href="?page=barang-refund&&delete=<?= $item['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                                <?php
                                    endforeach;
                                ?>
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="table-wrapper" data-id="badan">
                        <table class="table table-bordered table-stripped" id="table-badan" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Dinas</th>
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
                                    foreach($query1 as $item) :
                                ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $item['dinas'] ?></td>
                                    <td><?= $item['sabhara'] ?></td>
                                    <td><?= $item['lantas'] ?></td>
                                    <td><?= $item['jaket_staf_pria'] ?></td>
                                    <td><?= $item['jaket_staf_wanita'] ?></td>
                                    <td><?= $item['baju_sabhara_pria'] ?></td>
                                    <td><?= $item['baju_sabhara_wanita'] ?></td>
                                    <td><?= $item['baju_provos_pria'] ?></td>
                                    <td><?= $item['baju_provos_wanita'] ?></td>
                                    <td>
                                        <a onclick="return confirm('Lanjukan menghapus data?')" href="?page=barang-refund&&delete=<?= $item['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                                <?php
                                    endforeach;
                                ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="table-wrapper" data-id="kepala">
                        <table class="table table-bordered table-stripped" id="table-kepala" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Dinas</th>
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
                                    foreach($query1 as $item) :
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
                                        <a onclick="return confirm('Lanjukan menghapus data?')" href="?page=barang-refund&&delete=<?= $item['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
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
    </div>
</div>

<script>
    $(function() {
        $('#table-badan').DataTable({
            'scrollX': true,
        })
        $('#table-kaki').DataTable({
            'scrollX': true,
        })
        $('#table-kepala').DataTable({
            'scrollX': true,
        })

        $('.table-wrapper').each((idx, res) => $(res).hide());
        $('.show').show();
        $(document).click(function(e) {
            if($(e.target).hasClass('switch-button')) {
                $('.switch-button').each((idx, res) => $(res).removeClass('active'));
                $(e.target).addClass('active');

                let target = $(e.target).data('target');
                $('.table-wrapper').each((idx, res) => $(res).hide());
                $('.table-wrapper').each((idx, res) => $(res).data('id') == target ? $(res).fadeIn('slow') : $(res).fadeOut());
            }
        });
    });
</script>