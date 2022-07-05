<?php
require_once("controller/script.php");
require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML('<img src="assets/img/cop.png" style="width: 100%;" alt="">');
$mpdf->WriteHTML('<h3 style="text-align: center;">Daftar Absensi Siswa</h3>');
$mpdf->WriteHTML('<div style="margin-top: 30px;"><table class="table table-striped" style="width: 100%;text-align: center;">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">NISN</th>
      <th scope="col">Nama Siswa</th>
      <th scope="col">Kelas</th>
      <th scope="col">Status</th>
      <th scope="col">Tgl</th>
    </tr>
  </thead>
  <tbody>
');
$no = 1;
if (mysqli_num_rows($absensi_cetak) == 0) {
  $mpdf->WriteHTML('<tr>
<th colspan="6">Belum ada data.</th>
</tr>
');
} else if (mysqli_num_rows($absensi_cetak) > 0) {
  while ($row = mysqli_fetch_assoc($absensi_cetak)) {
    $date = date_create($row['tanggal']);
    $date = date_format($date, "d M Y");
    $mpdf->WriteHTML('<tr>
    <th scope="row">'. $no .'</th>
    <td>'. $row['nisn'] .'</td>
    <td>'. $row['nama_siswa'] .'</td>
    <td>'. $row['nama_kelas'] .'</td>
    <td>'. $row['status_hadir'] .'</td>
    <td>'. $date .'</td>
  </tr>
');
    $no++;
  }
}
$take_kepsek=mysqli_query($conn, "SELECT * FROM guru WHERE jabatan='Kepala Sekolah'");
$row_kepsek=mysqli_fetch_assoc($take_kepsek);
$mpdf->WriteHTML('
<tr><td colspan="6"></td></tr>
<tr><td colspan="6"></td></tr>
<tr><td colspan="6"></td></tr>
<tr><td colspan="6"></td></tr>
<tr><td colspan="6"></td></tr>
<tr><td colspan="6"></td></tr>
<tr><td colspan="6"></td></tr>
<tr><td colspan="6"></td></tr>
</tbody>
</table>
<div style="width: 220px;margin-left: 450px;text-align: center;">
  <p>Kupang, '.date("d M Y").'</p>
  <p>Kepala Sekolah SD Inpres Bello</p>
  <p style="margin-top: 75px;">'.$row_kepsek['nama_guru'].'</p>
</div>
</div>
');
$mpdf->Output();
