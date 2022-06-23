<?php require_once('controller/script.php');
require_once('controller/redirect-unusers.php');
$_SESSION['page-name'] = "Tambah Jadwal";
$_SESSION['page-to'] = "tambah-jadwal";
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
                  <label for="kelas">Kelas</label>
                  <select name="id-kelas" id="kelas" class="form-control" required>
                    <option value="">Pilih Kelas</option>
                    <?php foreach ($selectKelas as $rowSK) : ?>
                      <option value="<?= $rowSK['id_kelas'] ?>"><?= $rowSK['nama_kelas'] ?></option>
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
                  <label for="jam_mulai">Jam Mulai</label>
                  <input type="time" name="jam_mulai" id="jam_mulai" value="<?php if (isset($_POST['jam_mulai'])) {
                                                                              echo $_POST['jam_mulai'];
                                                                            } ?>" class="form-control" placeholder="Jam Mulai" required>
                </div>
                <div class="form-group">
                  <label for="jam_akhir">Jam Akhir</label>
                  <input type="time" name="jam_akhir" id="jam_akhir" value="<?php if (isset($_POST['jam_akhir'])) {
                                                                              echo $_POST['jam_akhir'];
                                                                            } ?>" class="form-control" placeholder="Jam Akhir" required>
                </div>
                <div class="form-group">
                  <label for="hari">Hari</label>
                  <select name="hari" id="hari" class="form-control" required>
                    <option value="Senin">Senin</option>
                    <option value="Selasa">Selasa</option>
                    <option value="Rabu">Rabu</option>
                    <option value="Kamis">Kamis</option>
                    <option value="Jumat">Jumat</option>
                    <option value="Sabtu">Sabtu</option>
                  </select>
                </div>
              </div>
              <div class="modal-footer justify-content-center">
                <a href="jadwal" class="btn btn-secondary">Kembali</a>
                <button type="submit" name="tambah-jadwal" class="btn btn-primary ml-3">Tambah</button>
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