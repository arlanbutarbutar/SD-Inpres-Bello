<?php require_once('controller/script.php');
require_once('controller/redirect-unusers.php');
$_SESSION['page-name'] = "Tambah Nilai";
$_SESSION['page-to'] = "tambah-nilai";
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

        <h1 class="app-page-title"><?= $_SESSION['page-name'] ?></h1>

        <div class="row">
          <div class="card card-body shadow border-0">
            <form action="" method="POST">
              <div class="modal-body">
                <div class="form-group">
                  <label for="siswa">Siswa</label>
                  <select name="id-siswa" id="siswa" class="form-control" required>
                    <option value="">Pilih Siswa</option>
                    <?php foreach ($selectSiswa as $rowSS) : ?>
                      <option value="<?= $rowSS['id_siswa'] ?>"><?= $rowSS['nama_siswa'] ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="mapel">Mata Pelajaran</label>
                  <select name="id-mapel" id="mapel" class="form-control" required>
                    <option value="">Pilih Mata Pelajaran</option>
                    <?php foreach ($selectMapel as $rowSM) : ?>
                      <option value="<?= $rowSM['id_mapel'] ?>"><?= $rowSM['nama_mapel'] ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="tugas">Nilai Tugas</label>
                  <input type="number" name="tugas" id="tugas" value="<?php if (isset($_POST['tugas'])) {
                                                                        echo $_POST['tugas'];
                                                                      } ?>" class="form-control" placeholder="Nilai Tugas" required>
                </div>
                <div class="form-group">
                  <label for="ulangan">Nilai Ulangan</label>
                  <input type="number" name="ulangan" id="ulangan" value="<?php if (isset($_POST['ulangan'])) {
                                                                            echo $_POST['ulangan'];
                                                                          } ?>" class="form-control" placeholder="Nilai Ulangan" required>
                </div>
                <div class="form-group">
                  <label for="uts">Nilai UTS</label>
                  <input type="number" name="uts" id="uts" value="<?php if (isset($_POST['uts'])) {
                                                                    echo $_POST['uts'];
                                                                  } ?>" class="form-control" placeholder="Nilai UTS" required>
                </div>
                <div class="form-group">
                  <label for="uas">Nilai UAS</label>
                  <input type="number" name="uas" id="uas" value="<?php if (isset($_POST['uas'])) {
                                                                    echo $_POST['uas'];
                                                                  } ?>" class="form-control" placeholder="Nilai UAS" required>
                </div>
              </div>
              <div class="modal-footer justify-content-center">
                <a href="nilai-siswa" class="btn btn-secondary">Kembali</a>
                <button type="submit" name="tambah-nilai" class="btn btn-primary ml-3">Tambah</button>
              </div>
            </form>
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