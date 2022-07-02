<?php require_once('controller/script.php');
require_once('controller/redirect-unusers.php');
$_SESSION['page-name'] = "Nilai Siswa";
$_SESSION['page-to'] = "nilai-siswa-pdf";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php require_once("resources/layout/header.php"); ?>
  <script>
    window.print();
  </script>
</head>

<body class="app" onclick="window.print()">
  <div class="container-xl">
    <div class="row g-3 mb-4 align-items-center justify-content-center">
      <div class="col-auto">
        <img src="assets/img/cop.png" style="width: 100%;" alt="">
        <h3 class="mt-3" style="text-align: center;">Daftar Nilai Siswa</h3>
      </div>
      <div class="col-auto">
        <div class="page-utilities">
          <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
            <div class="col-auto">
            </div>
          </div>
          <!--//row-->
        </div>
        <!--//table-utilities-->
      </div>
      <!--//col-auto-->
    </div>

    <!-- Table data nilai siswa -->
    <div class="row align-items-center justify-content-center">
      <div class="col-md-8">
        <div class="card card-body border-0">
          <div style="overflow-x: auto;">
            <table class="table table-sm text-center">
              <thead>
                <tr style="border-top: hidden;">
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
                <?php $no = 1;
                if (mysqli_num_rows($nilai) == 0) { ?>
                  <tr>
                    <th scope="row" colspan="9">Belum ada data</th>
                  </tr>
                  <?php } else if (mysqli_num_rows($nilai) > 0) {
                  while ($row = mysqli_fetch_assoc($nilai)) { 
                    $tgl_nilai=date_create($row['tgl_nilai']);
                    $tgl_nilai=date_format($tgl_nilai, "d M Y");?>
                    <tr>
                      <th scope="row"><?= $no; ?></th>
                      <td><?= $row['nama_siswa'] ?></td>
                      <td><?= $row['nama_kelas'] ?></td>
                      <td><?= $row['nama_mapel'] ?></td>
                      <td><?= $tgl_nilai ?></td>
                      <td><?= $row['nilai_tugas'] ?></td>
                      <td><?= $row['nilai_ulangan'] ?></td>
                      <td><?= $row['nilai_uts'] ?></td>
                      <td><?= $row['nilai_uas'] ?></td>
                      <td><?= $row['nilai_akhir'] ?></td>
                      <td><?= $row['ket_nilai'] ?></td>
                    </tr>
                <?php $no++;
                  }
                } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php require_once("resources/pattern/footer-js.php"); ?>
</body>

</html>