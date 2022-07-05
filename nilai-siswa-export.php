<?php
require_once("controller/script.php");
require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML('<img src="assets/img/cop.png" style="width: 100%;" alt="">');
$mpdf->WriteHTML('<h3 style="text-align: center;">Daftar Nilai Siswa</h3>');
$mpdf->WriteHTML('<div style="margin-top: 30px;"><table class="table table-striped" style="width: 100%;text-align: center;">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Siswa</th>
      <th scope="col">Kelas</th>
      <th scope="col">Mata Pelajaran</th>
      <th scope="col">Tgl Nilai</th>
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
    $tgl_nilai=date_create($row['tgl_nilai']);
    $tgl_nilai=date_format($tgl_nilai, "d M Y");
    $mpdf->WriteHTML('<tr>
    <th scope="row">'. $no .'</th>
    <td>' .$row["nama_siswa"] .'</td>
    <td>'. $row["nama_kelas"] .'</td>
    <td>'. $row["nama_mapel"] .'</td>
    <td>'. $tgl_nilai .'</td>
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
if($_SESSION['akses']==1){
  $mpdf->WriteHTML('
  </tbody>
  </table>
  ');
  $mpdf->Output();
}
if($_SESSION['akses']==2){
  $mpdf->WriteHTML('
  <tr><td colspan="9"></td></tr>
  <tr><td colspan="9"></td></tr>
  <tr><td colspan="9"></td></tr>
  <tr><td colspan="9"></td></tr>
  <tr><td colspan="9"></td></tr>
  <tr><td colspan="9"></td></tr>
  <tr><td colspan="9"></td></tr>
  <tr><td colspan="9"></td></tr>
  </tbody>
  </table>
  <p style="text-align: right;">Kupang, '.date("d M Y").'</p>
  <p style="text-align: right; margin-top: 75px;">'.$_SESSION['nama-guru'].'</p>
  ');
  $mpdf->Output();
}