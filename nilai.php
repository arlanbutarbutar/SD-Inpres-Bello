<?php require_once('controller/script.php');
require_once('controller/redirect-unusers.php');
$_SESSION['page-name'] = "Nilai";
$_SESSION['page-to'] = "nilai";
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
            <h1 class="app-page-title mb-0"><?= $_SESSION['page-name'] ?></h1>
          </div>
        </div>

        <!-- Table data nilai siswa -->
        <div class="row">
          <div class="col-md-12">
            <div class="card card-body shadow border-0">
              <div style="overflow-x: auto;">
                <table class="table table-sm text-center">
                  <thead>
                    <tr style="border-top: hidden;">
                      <th scope="col">No</th>
                      <th scope="col">Mata Pelajaran</th>
                      <th scope="col">Guru</th>
                      <th scope="col">Nilai Tugas</th>
                      <th scope="col">Nilai Ulangan</th>
                      <th scope="col">Nilai UTS</th>
                      <th scope="col">Nilai UAS</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1;
                    if (mysqli_num_rows($nilai) == 0) { ?>
                      <tr>
                        <th scope="row" colspan="9">Belum ada data</th>
                      </tr>
                      <?php } else if (mysqli_num_rows($nilai) > 0) {
                      while ($row = mysqli_fetch_assoc($nilai)) { ?>
                        <tr>
                          <th scope="row"><?= $no; ?></th>
                          <td><?= $row['nama_mapel'] ?></td>
                          <td><?= $row['nama_guru'] ?></td>
                          <td><?= $row['nilai_tugas'] ?></td>
                          <td><?= $row['nilai_ulangan'] ?></td>
                          <td><?= $row['nilai_uts'] ?></td>
                          <td><?= $row['nilai_uas'] ?></td>
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