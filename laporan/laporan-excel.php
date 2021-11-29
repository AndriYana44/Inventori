<?php

require_once '../vendor/autoload.php';
require_once '../connection.php';

use PhpOffice\PhpSpreadsheet\Reader\Html;
use PhpOffice\PhpSpreadsheet\IOFactory;

$sql = "SELECT * FROM `tb_dinas` INNER JOIN tb_perlengkapan_kepala ON tb_perlengkapan_kepala.id_dinas = tb_dinas.id 
    INNER JOIN tb_perlengkapan_kaki ON tb_perlengkapan_kaki.id_dinas = tb_dinas.id 
    INNER JOIN tb_perlengkapan_badan ON tb_perlengkapan_badan.id_dinas =	tb_dinas.id";
$query = $conn->query($sql);

$htmlString = '<table class="table table-bordered" style="font-size: 10px;">
<tr>
    <th rowspan="3">NO</th>
    <th rowspan="3">SATFUNG</th>
    <th rowspan="2" colspan="2">JUMLAH PERS</th>
    <th colspan="17">NAMA KAPORLAP</th>
</tr>
<tr>
    <th colspan="2">SEPATU</th>
    <th rowspan="2">KAOS KAKI OLAH RAGA</th>
    <th colspan="2">JAS HUJAN</th>
    <th colspan="2">JAKET STAF</th>
    <th colspan="2">BAJU PDL II SABHARA</th>
    <th colspan="2">BAJU PDL II PROVOS</th>
    <th colspan="3">JILBAB</th>
    <th colspan="3">TOPI PNS</th>
</tr>
<tr>
    <th>POLRI</th>
    <th>PNS</th>
    <th>PDL STAF</th>
    <th>OLAH RAGA</th>
    <th>SABHARA</th>
    <th>LANTAS</th>
    <th>PRIA</th>
    <th>WANITA</th>
    <th>PRIA</th>
    <th>WANITA</th>
    <th>PRIA</th>
    <th>WANITA</th>
    <th>POL WAN</th>
    <th>RES KRIM</th>
    <th>PNS</th>
    <th>GOL I</th>
    <th>GOL II</th>
    <th>GOL III</th>
</tr>';

$no = 1;
foreach($query as $item) {
$htmlString .= '<tr>    
<td>' . $no++ . '</td>
<td>' . $item["dinas"] . '</td>
<td>' . $item["jml_polri"] . '</td>
<td>' . $item["jml_pns"] . '</td>
<td>' . $item["pdl_staf"] . '</td>
<td>' . $item["olahraga"] . '</td>
<td>' . $item["kaos_kaki"] . '</td>
<td>' . $item["sabhara"] . '</td>
<td>' . $item["lantas"] . '</td>
<td>' . $item["jaket_staf_pria"] . '</td>
<td>' . $item["jaket_staf_wanita"] . '</td>
<td>' . $item["baju_sabhara_pria"] . '</td>
<td>' . $item["baju_sabhara_wanita"] . '</td>
<td>' . $item["baju_provos_pria"] . '</td>
<td>' . $item["baju_provos_wanita"] . '</td>
<td>' . $item["jilbab_polwan"] . '</td>
<td>' . $item["jilbab_reskrim"] . '</td>
<td>' . $item["jilbab_pns"] . '</td>
<td>' . $item["topi_gol_1"] . '</td>
<td>' . $item["topi_gol_2"] . '</td>
<td>' . $item["topi_gol_3"] . '</td>
</tr>';
}

$htmlString .= '</table>';

$reader = new Html();
$spreadsheet = $reader->loadFromString($htmlString);
$filename = 'laporan.xls';
$writer = IOFactory::createWriter($spreadsheet, 'Xls');
$writer->save($filename); 
$content = file_get_contents($filename);

header("Content-Disposition: attachment; filename=".$filename);

unlink($filename);
exit($content);