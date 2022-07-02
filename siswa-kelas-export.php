<?php
require_once("controller/script.php");
require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML('<img src="assets/img/cop.png" style="width: 100%;" alt="">');
$mpdf->WriteHTML('<h3 style="text-align: center;">Daftar Siswa Kelas '.$nama_kelas.'</h3>');
$mpdf->WriteHTML('<div style="margin-top: 30px;"><table class="table table-striped" style="width: 100%;text-align: center;">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">NIK</th>
      <th scope="col">NISN</th>
      <th scope="col">Nama Siswa</th>
      <th scope="col">Kelas</th>
      <th scope="col">Jenis Kelamin</th>
      <th scope="col">TTL</th>
      <th scope="col">Nama Ibu</th>
    </tr>
  </thead>
  <tbody>
');
$no = 1;
if (mysqli_num_rows($siswa_perKelas) == 0) {
  $mpdf->WriteHTML('<tr>
<th colspan="8">Belum ada data.</th>
</tr>
');
} else if (mysqli_num_rows($siswa_perKelas) > 0) {
  while ($row = mysqli_fetch_assoc($siswa_perKelas)) {
    $mpdf->WriteHTML('<tr>
    <th scope="row">'. $no .'</th>
    <td>'. $row['nik'] .'</td>
    <td>'. $row['nisn'] .'</td>
    <td>'. $row['nama_siswa'] .'</td>
    <td>'. $row['nama_kelas'] .'</td>
    <td>'. $row['jenis_kelamin'] .'</td>
    <td>'. $row['ttl'] .'</td>
    <td>'. $row['nama_ibu'] .'</td>
  </tr>
');
    $no++;
  }
}
$mpdf->WriteHTML('
</tbody>
</table></div>
');
$mpdf->Output();
