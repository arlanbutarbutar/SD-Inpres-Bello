<?php require_once('controller/script.php');
require_once('controller/redirect-unusers.php');
$_SESSION['page-name'] = "Absensi";
$_SESSION['page-to'] = "absensi-pdf";
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
        <h3 class="mt-3" style="text-align: center;">Daftar Absensi Siswa</h3>
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
                  <th scope="col">NISN</th>
                  <th scope="col">Nama Siswa</th>
                  <th scope="col">Kelas</th>
                  <th scope="col">Status</th>
                  <th scope="col">Tgl</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1;
                if (mysqli_num_rows($absensi_cetak) == 0) { ?>
                  <tr>
                    <th scope="row" colspan="6">Belum ada data</th>
                  </tr>
                  <?php } else if (mysqli_num_rows($absensi_cetak) > 0) {
                  while ($row = mysqli_fetch_assoc($absensi_cetak)) { ?>
                    <tr>
                      <th scope="row"><?= $no; ?></th>
                      <td><?= $row['nisn'] ?></td>
                      <td><?= $row['nama_siswa'] ?></td>
                      <td><?= $row['nama_kelas'] ?></td>
                      <td><?= $row['status_hadir'] ?></td>
                      <td><?php $date = date_create($row['tanggal']);
                          echo $date = date_format($date, "d M Y") ?></td>
                    </tr>
                <?php $no++;
                  }
                } 
                $take_kepsek=mysqli_query($conn, "SELECT * FROM guru WHERE jabatan='Kepala Sekolah'");
                $row_kepsek=mysqli_fetch_assoc($take_kepsek);?>
              </tbody>
            </table>
            <div style="width: 220px;margin-left: 400px;text-align: center;margin-top: 100px;">
              <p>Kupang, <?= date("d M Y")?></p>
              <p>Kepala Sekolah SD Inpres Bello</p>
              <p style="margin-top: 75px;"><?= $row_kepsek['nama_guru']?></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php require_once("resources/pattern/footer-js.php"); ?>
</body>

</html>