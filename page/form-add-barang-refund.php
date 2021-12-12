<?php
require_once "./connection.php";

$sql_join_table = "SELECT DISTINCT tb_dinas.dinas, tb_dinas.id
    FROM tb_perlengkapan_kaki 
    INNER JOIN tb_dinas ON tb_dinas.id = tb_perlengkapan_kaki.id_dinas
    INNER JOIN tb_perlengkapan_badan ON tb_dinas.id = tb_perlengkapan_badan.id_dinas
    INNER JOIN tb_perlengkapan_kepala ON tb_dinas.id = tb_perlengkapan_kepala.id_dinas";


$dinas = $conn->query($sql_join_table);
$data = $dinas->fetch_array();

$id_barang_keluar = $_GET['id'];

if(isset($_POST['submit'])) {
    // perlengkapan kaki
    $pdl_staf = $_POST['pdl_staf'];
    $olahraga = $_POST['olahraga'];  
    $kaos_kaki = $_POST['kaos_kaki'];
    
    // perlengkapan badan
    $sabhara = $_POST['sabhara'];  
    $lantas = $_POST['lantas'];
    $jaket_staf_pria = $_POST['jaket_staf_pria'];
    $jaket_staf_wanita = $_POST['jaket_staf_wanita'];
    $baju_sabhara_pria = $_POST['baju_sabhara_pria'];
    $baju_sabhara_wanita = $_POST['baju_sabhara_wanita'];
    $baju_provos_pria = $_POST['baju_provos_pria'];
    $baju_provos_wanita = $_POST['baju_provos_wanita'];

    // perlengkapan kepala
    $jilbab_polwan = $_POST['jilbab_polwan'];
    $jilbab_pns = $_POST['jilbab_pns'];
    $jilbab_reskrim = $_POST['jilbab_reskrim'];
    $topi_gol_1 = $_POST['topi_gol_1'];
    $topi_gol_2 = $_POST['topi_gol_2'];
    $topi_gol_3 = $_POST['topi_gol_3'];

    // insert into barang keluar
    $sql_insert = "INSERT INTO barang_refund SET 
        id_barang_keluar='$id_barang_keluar', 
        pdl_staf='$pdl_staf', 
        olahraga='$olahraga', 
        kaos_kaki='$kaos_kaki',
        sabhara='$sabhara', 
        lantas='$lantas', 
        jaket_staf_pria='$jaket_staf_pria', 
        jaket_staf_wanita='$jaket_staf_wanita', 
        baju_sabhara_pria='$baju_sabhara_pria', 
        baju_sabhara_wanita='$baju_sabhara_wanita', 
        baju_provos_pria='$baju_provos_pria', 
        baju_provos_wanita='$baju_provos_wanita',
        jilbab_polwan='$jilbab_polwan', 
        jilbab_pns='$jilbab_pns', 
        jilbab_reskrim='$jilbab_reskrim', 
        topi_gol_1='$topi_gol_1', 
        topi_gol_2='$topi_gol_2', 
        topi_gol_3='$topi_gol_3'";
    $query_insert = $conn->query($sql_insert);


    $query = $conn->query("SELECT * FROM barang_keluar WHERE id = $id_barang_keluar");
    $data_update = $query->fetch_assoc();

    $pdl_staf_update = $data_update['pdl_staf'] - $pdl_staf;
    $olahraga_update = $data_update['olahraga'] - $olahraga;
    $kaos_kaki_update = $data_update['kaos_kaki'] - $kaos_kaki;
    $sabhara_update = $data_update['sabhara'] - $sabhara;
    $lantas_update = $data_update['lantas'] - $lantas;
    $jaket_staf_pria_update = $data_update['jaket_staf_pria'] - $jaket_staf_pria;
    $jaket_staf_wanita_update = $data_update['jaket_staf_wanita'] - $jaket_staf_wanita;
    $baju_sabhara_pria_update = $data_update['baju_sabhara_pria'] - $baju_sabhara_pria;
    $baju_sabhara_wanita_update = $data_update['baju_sabhara_wanita'] - $baju_sabhara_wanita;
    $baju_provos_pria_update = $data_update['baju_provos_pria'] - $baju_provos_pria;
    $baju_provos_wanita_update = $data_update['baju_provos_wanita'] - $baju_provos_wanita;
    $jilbab_polwan_update = $data_update['jilbab_polwan'] - $jilbab_polwan;
    $jilbab_pns_update = $data_update['jilbab_pns'] - $jilbab_pns;
    $jilbab_reskrim_update = $data_update['jilbab_reskrim'] - $jilbab_reskrim;
    $topi_gol_1_update = $data_update['topi_gol_1'] - $topi_gol_1;
    $topi_gol_2_update = $data_update['topi_gol_2'] - $topi_gol_2;
    $topi_gol_3_update = $data_update['topi_gol_3'] - $topi_gol_3;

    $sql_update = "UPDATE barang_keluar SET 
        pdl_staf='$pdl_staf_update', 
        olahraga='$olahraga_update', 
        kaos_kaki='$kaos_kaki_update',
        sabhara='$sabhara_update', 
        lantas='$lantas_update', 
        jaket_staf_pria='$jaket_staf_pria_update', 
        jaket_staf_wanita='$jaket_staf_wanita_update', 
        baju_sabhara_pria='$baju_sabhara_pria_update', 
        baju_sabhara_wanita='$baju_sabhara_wanita_update', 
        baju_provos_pria='$baju_provos_pria_update', 
        baju_provos_wanita='$baju_provos_wanita_update',
        jilbab_polwan='$jilbab_polwan_update', 
        jilbab_pns='$jilbab_pns_update', 
        jilbab_reskrim='$jilbab_reskrim_update', 
        topi_gol_1='$topi_gol_1_update', 
        topi_gol_2='$topi_gol_2_update', 
        topi_gol_3='$topi_gol_3_update'
        WHERE id = $id_barang_keluar";
    $query_insert = $conn->query($sql_update);

    if($query_insert) {
        $_SESSION['SUCCESS'] = time();
        $_SESSION['message'] = 'Data berhasil ditambahkan';
        echo "<script>
                window.location.href = '?page=barang-refund';
              </script>";
    }
}
?>

<style>.form-group .input-group input.form-control { z-index: 1 }</style>
<div class="row">
    <div class="col-12">
        <div class="card px-3 py-3">
            <h3>Form Barang Keluar</h3>
            <small>Dashboard / Barang Keluar / Tambah</small>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body ml-4">
                        <form action="" id="form-barang-keluar" method="post">
                            <div class="form-group">
                                
                            </div>

                            <input type="text" name="id" value="<?= $id_barang_keluar ?>" hidden>

                            <!-- check box kaki -->
                            <div class="input-group py-2">
                                <input class="type mt-2" type="checkbox" id="pk" data-target="perlengkapan_kaki">
                                <label class="ml-2 mt-2" for="pk" style="font-weight:900; color:#777;">Perlengkapan Kaki</label>
                            </div>
                            <div id="perlengkapan_kaki" class="row perlengkapan-wrapper">
                                <div class="col-6 ml-3">
                                    <div class="form-group">
                                        <label for="pdl_staf">Jumlah Sepatu PDL Staf</label>
                                        <div class="input-group">
                                            <input type="text" id="pdl_staf" disabled class="mr-2 py-1 px-2 mb-1">
                                            <input type="number" name="pdl_staf" class="form-control" autocomplete="off">
                                        </div>
                                        <small class="text_validation text-danger"></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="olahraga">Jumlah Sepatu Olahraga</label>
                                        <div class="input-group">
                                            <input type="text" id="olahraga" disabled class="mr-2 py-1 px-2 mb-1">
                                            <input type="number" name="olahraga" class="form-control" autocomplete="off">
                                        </div>
                                        <small class="text_validation text-danger"></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="kaos_kaki">Jumlah Kaos Kaki</label>
                                        <div class="input-group">
                                            <input type="text" id="kaos_kaki" disabled class="mr-2 py-1 px-2 mb-1">
                                            <input type="number" name="kaos_kaki" class="form-control" autocomplete="off">
                                        </div>
                                        <small class="text_validation text-danger"></small>
                                    </div>
                                    <hr>
                                </div>
                            </div>

                            <!-- checkbox badan -->
                            <div class="input-group py-2">
                                <input class="type mt-2" type="checkbox" id="pb" data-target="perlengkapan_badan">
                                <label class="ml-2 mt-2" for="pb" style="font-weight:900; color:#777;">Perlengkapan Badan</label>
                            </div>
                            <div id="perlengkapan_badan" class="row perlengkapan-wrapper">
                                <div class="col-6 ml-3">
                                    <div class="form-group">
                                        <label for="sabhara">Jas Hujan Sabhara</label>
                                        <div class="input-group">
                                            <input type="text" id="sabhara" disabled class="mr-2 py-1 px-2 mb-1">
                                            <input type="number" name="sabhara" class="form-control" autocomplete="off">
                                        </div>
                                        <small class="text_validation text-danger"></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="lantas">Jas Hujan Lantas</label>
                                        <div class="input-group">
                                            <input type="text" id="lantas" disabled class="mr-2 py-1 px-2 mb-1">
                                            <input type="number" name="lantas" class="form-control" autocomplete="off">
                                        </div>
                                        <small class="text_validation text-danger"></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="jaket_staf_pria">Jaket Staf Pria</label>
                                        <div class="input-group">
                                            <input type="text" id="jaket_staf_pria" disabled class="mr-2 py-1 px-2 mb-1">
                                            <input type="number" name="jaket_staf_pria" class="form-control" autocomplete="off">
                                        </div>
                                        <small class="text_validation text-danger"></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="jaket_staf_wanita">Jaket Staf Wanita</label>
                                        <div class="input-group">
                                            <input type="text" id="jaket_staf_wanita" disabled class="mr-2 py-1 px-2 mb-1">
                                            <input type="number" name="jaket_staf_wanita" class="form-control" autocomplete="off">
                                        </div>
                                        <small class="text_validation text-danger"></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="baju_sabhara_pria">Baju Sabhara Pria</label>
                                        <div class="input-group">
                                            <input type="text" id="baju_sabhara_pria" disabled class="mr-2 py-1 px-2 mb-1">
                                            <input type="number" name="baju_sabhara_pria" class="form-control" autocomplete="off">
                                        </div>
                                        <small class="text_validation text-danger"></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="baju_sabhara_wanita">Baju Sabhara Wanita</label>
                                        <div class="input-group">
                                            <input type="text" id="baju_sabhara_wanita" disabled class="mr-2 py-1 px-2 mb-1">
                                            <input type="number" name="baju_sabhara_wanita" class="form-control" autocomplete="off">
                                        </div>
                                        <small class="text_validation text-danger"></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="baju_provos_pria">Baju Provos Pria</label>
                                        <div class="input-group">
                                            <input type="text" id="baju_provos_pria" disabled class="mr-2 py-1 px-2 mb-1">
                                            <input type="number" name="baju_provos_pria" class="form-control" autocomplete="off">
                                        </div>
                                        <small class="text_validation text-danger"></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="baju_provos_wanita">Baju Provos Wanita</label>
                                        <div class="input-group">
                                            <input type="text" id="baju_provos_wanita" disabled class="mr-2 py-1 px-2 mb-1">
                                            <input type="number" name="baju_provos_wanita" class="form-control" autocomplete="off">
                                        </div>
                                        <small class="text_validation text-danger"></small>
                                    </div>
                                    <hr>
                                </div>
                            </div>

                            <!-- checkbox kepala -->
                            <div class="input-group py-2">
                                <input class="type mt-2" type="checkbox" id="pkp" data-target="perlengkapan_kepala">
                                <label class="ml-2 mt-2" for="pkp" style="font-weight:900; color:#777;">Perlengkapan Kepala</label>
                            </div>
                            <div id="perlengkapan_kepala" class="row perlengkapan-wrapper">
                                <div class="col-6 ml-3">
                                    <div class="form-group">
                                        <label for="jilbab_polwan">Jilbab Polwan</label>
                                        <div class="input-group">
                                            <input type="text" id="jilbab_polwan" disabled class="mr-2 py-1 px-2 mb-1">
                                            <input type="number" name="jilbab_polwan" class="form-control" autocomplete="off">
                                        </div>
                                        <small class="text_validation text-danger"></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="jilbab_pns">Jilbab PNS</label>
                                        <div class="input-group">
                                            <input type="text" id="jilbab_pns" disabled class="mr-2 py-1 px-2 mb-1">
                                            <input type="number" name="jilbab_pns" class="form-control" autocomplete="off">
                                        </div>
                                        <small class="text_validation text-danger"></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="jilbab_reskrim">Jilbab Reskrim</label>
                                        <div class="input-group">
                                            <input type="text" id="jilbab_reskrim" disabled class="mr-2 py-1 px-2 mb-1">
                                            <input type="number" name="jilbab_reskrim" class="form-control" autocomplete="off">
                                        </div>
                                        <small class="text_validation text-danger"></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="topi_gol_1">Topi PNS Gol 1</label>
                                        <div class="input-group">
                                            <input type="text" id="topi_gol_1" disabled class="mr-2 py-1 px-2 mb-1">
                                            <input type="number" name="topi_gol_1" class="form-control" autocomplete="off">
                                        </div>
                                        <small class="text_validation text-danger"></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="topi_gol_2">Topi PNS Gol 2</label>
                                        <div class="input-group">
                                            <input type="text" id="topi_gol_2" disabled class="mr-2 py-1 px-2 mb-1">
                                            <input type="number" name="topi_gol_2" class="form-control" autocomplete="off">
                                        </div>
                                        <small class="text_validation text-danger"></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="topi_gol_3">Topi PNS Gol 3</label>
                                        <div class="input-group">
                                            <input type="text" id="topi_gol_3" disabled class="mr-2 py-1 px-2 mb-1">
                                            <input type="number" name="topi_gol_3" class="form-control" autocomplete="off">
                                        </div>
                                        <small class="text_validation text-danger"></small>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-4 ml-3">
                                <button class="btn btn-primary" name="submit" type="submit">Sumbit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(function() {
        const _url = window.location.protocol + "//" + window.location.host;
        let id = $('input[name=id]').val();
        getData(id);

        function getData(id) {
            $('input[type=number]').each((idx, res) => $(res).attr('value', 0));
            $.get(`${_url}/page/data-json/barang-refund.php?id=${id}`, function(res) {
                const obj = JSON.parse(res);
                console.log(obj)
                // perlengkapan kaki
                $('#pdl_staf').attr('value', `Barang Keluar: ${obj.pdl_staf}`);
                $('#olahraga').attr('value', `Barang Keluar: ${obj.olahraga}`);
                $('#kaos_kaki').attr('value', `Barang Keluar: ${obj.kaos_kaki}`);

                // perlengkapan badan
                $('#sabhara').attr('value', `Barang Keluar: ${obj.sabhara}`);
                $('#lantas').attr('value', `Barang Keluar: ${obj.lantas}`);
                $('#jaket_staf_pria').attr('value', `Barang Keluar: ${obj.jaket_staf_pria}`);
                $('#jaket_staf_wanita').attr('value', `Barang Keluar: ${obj.jaket_staf_wanita}`);
                $('#baju_sabhara_pria').attr('value', `Barang Keluar: ${obj.baju_sabhara_pria}`);
                $('#baju_sabhara_wanita').attr('value', `Barang Keluar: ${obj.baju_sabhara_wanita}`);
                $('#baju_provos_pria').attr('value', `Barang Keluar: ${obj.baju_provos_pria}`);
                $('#baju_provos_wanita').attr('value', `Barang Keluar: ${obj.baju_provos_wanita}`);

                // perlengkapan kepala
                $('#jilbab_polwan').attr('value', `Barang Keluar: ${obj.jilbab_polwan}`);
                $('#jilbab_pns').attr('value', `Barang Keluar: ${obj.jilbab_pns}`);
                $('#jilbab_reskrim').attr('value', `Barang Keluar: ${obj.jilbab_reskrim}`);
                $('#topi_gol_1').attr('value', `Barang Keluar: ${obj.topi_gol_1}`);
                $('#topi_gol_2').attr('value', `Barang Keluar: ${obj.topi_gol_2}`);
                $('#topi_gol_3').attr('value', `Barang Keluar: ${obj.topi_gol_3}`);
            });
        }

        function validationValue(el) {
            $(el).keyup(function() {
                let stok = $(this).prev().val();
                let arr = stok.split(' ');
                let max = arr[arr.length - 1];
                let el_validation = $(this).closest('.input-group').next('.text_validation');
                if($(this).val() > parseInt(max)) {
                    el_validation.html('Tidak boleh melebihi Barang Keluar');
                    el_validation.attr('id', $(this).attr('name'));
                }
                if($(this).val() <= parseInt(max)) {
                    el_validation.html('');
                    el_validation.removeAttr('id');
                    $(this).hasClass('is-invalid') ? $(this).removeClass('is-invalid') : false;
                }
            });
        }

        // dinas remove validate
        $('#dinas').change(function() {
            $('.validate-dinas').html('');
        });

        // jika value lebih besar dari jumlah stok
        (function checkValue() {
            $('#form-barang-keluar').submit(function(e) {
                // jika value == ''? maka akan di set ke nol (0)
                $('input[type=number]').each((idx, res) => {
                    if($(res).val() == '') {
                        $(res).attr('value', 0);
                    }
                });

                // jika value lebih besar dari stok, maka akan divalidasi
                $('.text_validation').each(function(idx, res) {
                    if($(this).attr('id') != undefined) {
                        e.preventDefault();

                        var targetEle = this.hash;
                        var $targetEle = $(`#${$(this).attr('id')}`);
                    
                        $(this).prev().find('input').addClass('is-invalid');
                        $('html, body').stop().animate({
                            'scrollTop': $targetEle.offset().top - ($targetEle.offset().top / 3)
                        }, 500, 'swing', function () {
                            window.location.hash = targetEle;
                        });
                    }else if($('#dinas').val() == '') {
                        e.preventDefault();
                        $('.validate-dinas').html('Dinas tidak boleh kosong!');
                    }
                });
            });
        })();

        (function checkType() {
            $('.perlengkapan-wrapper').each((idx, res) => $(res).hide());
            $('.type').each(function(idx, res) {
                $(res).click(function() {
                    let target = $(res).data('target');
                    if($(res).prop('checked') == true) {
                        $(`#${target}`).removeAttr('hidden').slideDown(300);
                    }
                    if($(res).prop('checked') == false) {
                        $(`#${target}`).slideUp(300);
                    }
                });
            });
        })();

        $('input[type=number]').each((idx, res) => validationValue($(res)));
    });
</script>