<?php
require_once "./connection.php";

$sql_join_table = "SELECT DISTINCT tb_dinas.dinas, tb_dinas.id
    FROM tb_perlengkapan_kaki 
    INNER JOIN tb_dinas ON tb_dinas.id = tb_perlengkapan_kaki.id_dinas
    INNER JOIN tb_perlengkapan_badan ON tb_dinas.id = tb_perlengkapan_badan.id_dinas
    INNER JOIN tb_perlengkapan_kepala ON tb_dinas.id = tb_perlengkapan_kepala.id_dinas";

$dinas = $conn->query($sql_join_table);
$data = $dinas->fetch_array();
?>

<style>
    .form-group .input-group input.form-control {
        z-index: 1;
    }
</style>

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

                            <div class="form-group row">
                                <div class="col-6">
                                    <label for="dinas">Dinas</label>
                                    <select class="select2" name="dinas" id="dinas" data-placeholder="Pilih dinas">
                                        <option value="">Pilih dinas</option>
                                        <?php foreach($dinas as $val) : ?>
                                            <option value="<?= $val['id'] ?>"><?= $val['dinas'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

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
                                <button class="btn btn-primary" type="submit">Sumbit</button>
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
        $('#dinas').change(function () { 
            $.get(`${_url}/page/data-json/barang-keluar.php?dinas=${$(this).val()}`, function(res) {
                const obj = JSON.parse(res);
                // perlengkapan kaki
                $('#pdl_staf').attr('value', `stok: ${obj.pdl_staf}`);
                $('#olahraga').attr('value', `stok: ${obj.olahraga}`);
                $('#kaos_kaki').attr('value', `stok: ${obj.kaos_kaki}`);

                // perlengkapan badan
                $('#sabhara').attr('value', `stok: ${obj.sabhara}`);
                $('#lantas').attr('value', `stok: ${obj.lantas}`);
                $('#jaket_staf_pria').attr('value', `stok: ${obj.jaket_staf_pria}`);
                $('#jaket_staf_wanita').attr('value', `stok: ${obj.jaket_staf_wanita}`);
                $('#baju_sabhara_pria').attr('value', `stok: ${obj.baju_sabhara_pria}`);
                $('#baju_sabhara_wanita').attr('value', `stok: ${obj.baju_sabhara_wanita}`);
                $('#baju_provos_pria').attr('value', `stok: ${obj.baju_provos_pria}`);
                $('#baju_provos_wanita').attr('value', `stok: ${obj.baju_provos_wanita}`);

                // perlengkapan kepala
                $('#jilbab_polwan').attr('value', `stok: ${obj.jilbab_polwan}`);
                $('#jilbab_pns').attr('value', `stok: ${obj.jilbab_pns}`);
                $('#jilbab_reskrim').attr('value', `stok: ${obj.jilbab_reskrim}`);
                $('#topi_gol_1').attr('value', `stok: ${obj.topi_gol_1}`);
                $('#topi_gol_2').attr('value', `stok: ${obj.topi_gol_2}`);
                $('#topi_gol_3').attr('value', `stok: ${obj.topi_gol_3}`);
            });
        });

        function validationValue(el) {
            $(el).keyup(function() {
                let stok = $(this).prev().val();
                let arr = stok.split(' ');
                let max = arr[arr.length - 1];
                let el_validation = $(this).closest('.input-group').next('.text_validation');
                if($(this).val() > parseInt(max)) {
                    el_validation.html('Tidak boleh melebihi stok');
                    el_validation.attr('id', $(this).attr('name'));
                }
                if($(this).val() <= parseInt(max)) {
                    el_validation.html('');
                    el_validation.removeAttr('id');
                    $(this).hasClass('is-invalid') ? $(this).removeClass('is-invalid') : false;
                }
            });
        }

        // jika value lebih besar dari jumlah stok
        (function checkValue() {
            $('#form-barang-keluar').submit(function(e) {
                e.preventDefault();
                $('.text_validation').each(function(idx, res) {
                    if($(this).attr('id') != undefined) {
                        var targetEle = this.hash;
                        var $targetEle = $(`#${$(this).attr('id')}`);
                    
                        $(this).prev().find('input').addClass('is-invalid');
                        $('html, body').stop().animate({
                            'scrollTop': $targetEle.offset().top - ($targetEle.offset().top / 3)
                        }, 500, 'swing', function () {
                            window.location.hash = targetEle;
                        });
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