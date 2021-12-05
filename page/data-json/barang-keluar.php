<?php
require_once "../../connection.php";

$id_dinas = $_GET['dinas'];
$sql_join_table = "SELECT tb_perlengkapan_kaki.*, tb_perlengkapan_badan.*, tb_perlengkapan_kepala.*, tb_dinas.dinas, tb_dinas.id as dinas_id 
    FROM tb_perlengkapan_kaki 
    INNER JOIN tb_dinas ON tb_dinas.id = tb_perlengkapan_kaki.id_dinas
    INNER JOIN tb_perlengkapan_badan ON tb_dinas.id = tb_perlengkapan_badan.id_dinas
    INNER JOIN tb_perlengkapan_kepala ON tb_dinas.id = tb_perlengkapan_kepala.id_dinas
    WHERE tb_dinas.id = $id_dinas";

$dinas = $conn->query($sql_join_table);
$data = $dinas->fetch_array();
echo json_encode($data, JSON_FORCE_OBJECT);