<?php
require_once("controller/script.php");
require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML('<img src="assets/img/cop.png" style="width: 100%;" alt="">');
$mpdf->WriteHTML('<h3 style="text-align: center;">Daftar Jadwal</h3>');
$mpdf->WriteHTML('<table class="table table-striped" style="text-align: center;width: 100%;">
  <thead>
    <tr>
    <th scope="col">No</th>
    <th scope="col">Kelas</th>
    <th scope="col">Guru</th>
    <th scope="col">Siswa</th>
    <th scope="col">Mata Pelajaran</th>
    <th scope="col">Jam mulai - Jam Akhir</th>
    <th scope="col">Hari</th>
    </tr>
  </thead>
  <tbody>
');
$no = 1;
if (mysqli_num_rows($cetak_jadwal) == 0) {
  $mpdf->WriteHTML('<tr>
<th colspan="9">Belum ada data.</th>
</tr>
');
} else if (mysqli_num_rows($cetak_jadwal) > 0) {
  while ($row = mysqli_fetch_assoc($cetak_jadwal)) {
    $mpdf->WriteHTML('<tr>
    <th scope="row">'. $no .'</th>
    <td>'. $row['nama_kelas'] .'</td>
    <td>'. $row['nama_guru'] .'</td>
    <td>'. $row['nama_siswa'] .'</td>
    <td>'. $row['nama_mapel'] .'</td>
    <td>'. $row['jam_mulai'].' - '.$row['jam_akhir'] .'</td>
    <td>'. $row['hari'] .'</td>
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
