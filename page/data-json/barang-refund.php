<?php
require_once "../../connection.php";

$id = $_GET['id'];
$sql_join_table = "SELECT barang_keluar.* FROM barang_keluar WHERE barang_keluar.id = $id";


$dinas = $conn->query($sql_join_table);
$data = $dinas->fetch_array();
echo json_encode($data, JSON_FORCE_OBJECT);