<?php
require_once("controller/script.php");
require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML('<img src="assets/img/cop.png" style="width: 100%;" alt="">');
$mpdf->WriteHTML('<h3 style="text-align: center;">Daftar Nilai</h3>');
$mpdf->WriteHTML('<table class="table table-striped" style="text-align: center;width: 100%;">
  <thead>
    <tr>
    <th scope="col">No</th>
    <th scope="col">Mata Pelajaran</th>
    <th scope="col">Guru</th>
    <th scope="col">Nilai Tugas</th>
    <th scope="col">Nilai Ulangan</th>
    <th scope="col">Nilai UTS</th>
    <th scope="col">Nilai UAS</th>
    <th scope="col">Nilai Akhir</th>
    <th scope="col">Ket</th>
    </tr>
  </thead>
  <tbody>
');
$no = 1;
if (mysqli_num_rows($nilai) == 0) {
  $mpdf->WriteHTML('<tr>
<th colspan="9">Belum ada data.</th>
</tr>
');
} else if (mysqli_num_rows($nilai) > 0) {
  while ($row = mysqli_fetch_assoc($nilai)) {
    $mpdf->WriteHTML('<tr>
    <th scope="row">'. $no .'</th>
    <td>'. $row["nama_mapel"] .'</td>
    <td>'. $row["nama_guru"] .'</td>
    <td>'. $row["nilai_tugas"] .'</td>
    <td>'. $row["nilai_ulangan"] .'</td>
    <td>'. $row["nilai_uts"] .'</td>
    <td>'. $row["nilai_uas"] .'</td>
    <td>'. $row['nilai_akhir'] .'</td>
    <td>'. $row['ket_nilai'] .'</td>
  </tr>
');
    $no++;
  }
}
$mpdf->WriteHTML('
</tbody>
</table>
');
$mpdf->Output();
