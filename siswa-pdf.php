<?php require_once('controller/script.php');
require_once('controller/redirect-unusers.php');
$_SESSION['page-name'] = "Data Siswa";
$_SESSION['page-to'] = "siswa-pdf";
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
        <h3 class="mt-3" style="text-align: center;">Daftar Siswa</h3>
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
      <div class="col-md-12">
        <div class="card card-body border-0">
          <div>
            <table class="table table-sm text-center">
              <thead>
                <tr style="border-top: hidden;">
                  <th scope="col">No</th>
                  <th scope="col">NIK</th>
                  <th scope="col">NISN</th>
                  <th scope="col">Nama Siswa</th>
                  <th scope="col">Kelas</th>
                  <th scope="col">Tahun Ajaran</th>
                  <th scope="col">Jenis Kelamin</th>
                  <th scope="col">TTL</th>
                  <th scope="col">Nama Ibu</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1;
                if (mysqli_num_rows($siswa) == 0) { ?>
                  <tr>
                    <th scope="row" colspan="9">Belum ada data</th>
                  </tr>
                  <?php } else if (mysqli_num_rows($siswa) > 0) {
                  while ($row = mysqli_fetch_assoc($siswa)) { ?>
                    <tr>
                      <th scope="row"><?= $no; ?></th>
                      <td><?= $row['nik'] ?></td>
                      <td><?= $row['nisn'] ?></td>
                      <td><?= $row['nama_siswa'] ?></td>
                      <td><?= $row['nama_kelas'] ?></td>
                      <td><?= $row['tahunajar'] ?></td>
                      <td><?= $row['jenis_kelamin'] ?></td>
                      <td><?= $row['ttl'] ?></td>
                      <td><?= $row['nama_ibu'] ?></td>
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