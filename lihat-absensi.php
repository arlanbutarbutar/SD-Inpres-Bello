<?php require_once('controller/script.php');
if (!isset($_GET['id-mapel']) || $_GET['id-mapel'] == "") {
  header("Location: absensi");
  exit();
}
require_once('controller/redirect-unusers.php');
$_SESSION['page-name'] = "Lihat Absensi";
$_SESSION['page-to'] = "lihat-absensi?id-mapel=" . $_GET['id-mapel'] . "&mapel=" . $_GET['mapel'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php require_once("resources/layout/header.php"); ?>
</head>

<body class="app">
  <?php if (isset($_SESSION['message-success'])) { ?>
    <div class="message-success" data-message-success="<?= $_SESSION['message-success'] ?>"></div>
  <?php }
  if (isset($_SESSION['message-info'])) { ?>
    <div class="message-info" data-message-info="<?= $_SESSION['message-info'] ?>"></div>
  <?php }
  if (isset($_SESSION['message-warning'])) { ?>
    <div class="message-warning" data-message-warning="<?= $_SESSION['message-warning'] ?>"></div>
  <?php }
  if (isset($_SESSION['message-danger'])) { ?>
    <div class="message-danger" data-message-danger="<?= $_SESSION['message-danger'] ?>"></div>
  <?php } ?>
  <header class="app-header fixed-top">
    <?php require_once("resources/layout/navbar.php"); ?>
    <?php require_once("resources/layout/sidebar.php"); ?>
  </header>
  <!--//app-header-->

  <div class="app-wrapper">

    <div class="app-content pt-3 p-md-3 p-lg-4">
      <div class="container-xl">

        <h1 class="app-page-title"><?= $_SESSION['page-name'] . " " . $_GET['mapel'] ?></h1>

        <div class="row">
          <div class="col-md-12">
            <div class="card card-body shadow border-0">
              <div style="overflow-x: auto;">
                <table class="table table-sm text-center">
                  <thead>
                    <tr style="border-top: hidden;">
                      <th scope="col">No</th>
                      <th scope="col">NIS</th>
                      <th scope="col">Nama Siswa</th>
                      <th scope="col">Kelas</th>
                      <th scope="col">Status</th>
                      <th scope="col">Tgl</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1;
                    if (mysqli_num_rows($siswa_view) == 0) { ?>
                      <tr>
                        <th scope="row" colspan="6">Belum ada data</th>
                      </tr>
                      <?php } else if (mysqli_num_rows($siswa_view) > 0) {
                      while ($row = mysqli_fetch_assoc($siswa_view)) { ?>
                        <tr>
                          <th scope="row"><?= $no; ?></th>
                          <td><?= $row['nis'] ?></td>
                          <td><?= $row['nama_siswa'] ?></td>
                          <td><?= $row['nama_kelas'] ?></td>
                          <td><?= $row['status'] ?></td>
                          <td><?php $date = date_create($row['tanggal']);
                              echo $date = date_format($date, "d M Y") ?></td>
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
      <!--//container-fluid-->
    </div>
    <!--//app-content-->

    <?php require_once("resources/layout/footer.php"); ?>
  </div>
  <!--//app-wrapper-->
  <?php require_once("resources/pattern/footer-js.php"); ?>
</body>

</html>