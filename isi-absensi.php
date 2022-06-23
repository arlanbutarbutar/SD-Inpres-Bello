<?php require_once('controller/script.php');
if (!isset($_GET['id-mapel']) || $_GET['id-mapel'] == "") {
  header("Location: absensi");
  exit();
}
require_once('controller/redirect-unusers.php');
$_SESSION['page-name'] = "Absensi";
$_SESSION['page-to'] = "isi-absensi?id-mapel=".$_GET['id-mapel']."&mapel=".$_GET['mapel'];
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
        <div class="row g-3 mb-4 align-items-center justify-content-between">
          <div class="col-auto">
            <h1 class="app-page-title mb-0"><?= $_SESSION['page-name'] . " " . $_GET['mapel'] ." (".date('d M Y').")" ?></h1>
          </div>
          <!--//col-auto-->
        </div>

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
                      <th scope="col">Status</th>
                      <th scope="col">Tgl</th>
                      <th scope="col">Absen</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1;
                    if (mysqli_num_rows($siswa_absen) == 0) { ?>
                      <tr>
                        <th scope="row" colspan="5">Belum ada data</th>
                      </tr>
                      <?php } else if (mysqli_num_rows($siswa_absen) > 0) {
                      while ($row = mysqli_fetch_assoc($siswa_absen)) { ?>
                        <tr>
                          <th scope="row"><?= $no; ?></th>
                          <td><?= $row['nis'] ?></td>
                          <td><?= $row['nama_siswa'] ?></td>
                          <?php $date_now=date('Y-m-d'); $id_siswa=$row['id_siswa']; $absensi_status = mysqli_query($conn, "SELECT * FROM absensi JOIN siswa ON absensi.id_siswa=siswa.id_siswa WHERE absensi.id_siswa='$id_siswa' AND tanggal='$date_now'");
                          if (mysqli_num_rows($absensi_status) == 0) { ?>
                            <td>-</td>
                            <td>-</td>
                          <?php } else if (mysqli_num_rows($absensi_status) > 0) {
                            $row_status = mysqli_fetch_assoc($absensi_status); ?>
                            <td><?= $row_status['status'] ?></td>
                            <td><?php $date = date_create($row_status['tanggal']);
                                echo $date = date_format($date, "d M Y") ?></td>
                          <?php } ?>
                          <td>
                            <button type="button" class="btn btn-primary text-white" data-toggle="modal" data-target="#ubah-siswa<?= $row['id_siswa'] ?>">Isi</button>
                            <div class="modal fade" id="ubah-siswa<?= $row['id_siswa'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header border-bottom-0">
                                    <h5 class="modal-title" id="exampleModalLabel">Isi Absen <?= $row['nama_siswa'] ?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-footer border-top-0 justify-content-center">
                                    <form action="" method="POST">
                                      <input type="hidden" name="id-siswa" value="<?= $row['id_siswa'] ?>">
                                      <input type="hidden" name="id-kelas" value="<?= $row['id_kelas'] ?>">
                                      <button type="submit" name="hadir" class="btn btn-primary text-white">Hadir</button>
                                    </form>
                                    <form action="" method="POST">
                                      <input type="hidden" name="id-siswa" value="<?= $row['id_siswa'] ?>">
                                      <input type="hidden" name="id-kelas" value="<?= $row['id_kelas'] ?>">
                                      <button type="submit" name="tidak-hadir" class="btn btn-danger text-white">Tidak Hadir</button>
                                    </form>
                                    <form action="" method="POST">
                                      <input type="hidden" name="id-siswa" value="<?= $row['id_siswa'] ?>">
                                      <input type="hidden" name="id-kelas" value="<?= $row['id_kelas'] ?>">
                                      <button type="submit" name="alpa" class="btn btn-secondary">Alpa</button>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </td>
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