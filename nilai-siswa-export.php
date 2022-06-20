<?php
require_once("controller/script.php");
require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML('<h1>SD Inpres Bello</h1>');
$mpdf->WriteHTML('<h3>Nilai Siswa</h3>');
$mpdf->WriteHTML('<table class="table table-striped" style="text-align: center;width: 100%;">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Siswa</th>
      <th scope="col">Kelas</th>
      <th scope="col">Mata Pelajaran</th>
      <th scope="col">Nilai Tugas</th>
      <th scope="col">Nilai Ulangan</th>
      <th scope="col">Nilai UTS</th>
      <th scope="col">Nilai UAS</th>
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
    <td>' .$row["nama_siswa"] .'</td>
    <td>'. $row["nama_kelas"] .'</td>
    <td>'. $row["nama_mapel"] .'</td>
    <td>'. $row["nilai_tugas"] .'</td>
    <td>'. $row["nilai_ulangan"] .'</td>
    <td>'. $row["nilai_uts"] .'</td>
    <td>'. $row["nilai_uas"] .'</td>
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
