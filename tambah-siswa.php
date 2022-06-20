<?php require_once('controller/script.php');
require_once('controller/redirect-unusers.php');
$_SESSION['page-name'] = "Tambah Siswa";
$_SESSION['page-to'] = "tambah-siswa";
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
                  <label for="nis">NIS</label>
                  <input type="number" name="nis" id="nis" value="<?php if (isset($_POST['nis'])) {
                                                                    echo $_POST['nis'];
                                                                  } ?>" class="form-control" placeholder="NIS" required>
                </div>
                <div class="form-group">
                  <label for="nama-siswa">Nama Siswa</label>
                  <input type="text" name="nama-siswa" id="nama-siswa" value="<?php if (isset($_POST['nama-siswa'])) {
                                                                                echo $_POST['nama-siswa'];
                                                                              } ?>" class="form-control" placeholder="Nama Siswa" required>
                </div>
                <div class="form-group">
                  <label for="kelas">Kelas</label>
                  <select name="id-kelas" id="kelas" class="form-control" required>
                    <option value="">Pilih Kelas</option>
                    <?php foreach ($kelas as $rowK) : ?>
                      <option value="<?= $rowK['id_kelas'] ?>"><?= $rowK['nama_kelas'] ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="jk">Jenis kelamin</label>
                  <select name="jk" id="jk" class="form-control" required>
                    <option value="">Pilih Jenis Kelamin</option>
                    <option value="Laki-Laki">Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="tempat-lahir">Tempat Lahir</label>
                  <input type="text" name="tempat-lahir" id="tempat-lahir" value="<?php if (isset($_POST['tempat-lahir'])) {
                                                                                    echo $_POST['tempat-lahir'];
                                                                                  } ?>" class="form-control" placeholder="Tempat Lahir" required>
                </div>
                <div class="form-group">
                  <label for="tgl-lahir">Tanggal Lahir</label>
                  <input type="date" name="tgl-lahir" id="tgl-lahir" value="<?php if (isset($_POST['tgl-lahir'])) {
                                                                              echo $_POST['tgl-lahir'];
                                                                            } ?>" class="form-control" placeholder="Tanggal Lahir" required>
                </div>
                <div class="form-group">
                  <label for="nama-ortu">Nama Orang Tua</label>
                  <input type="text" name="nama-ortu" id="nama-ortu" value="<?php if (isset($_POST['nama-ortu'])) {
                                                                              echo $_POST['nama-ortu'];
                                                                            } ?>" class="form-control" placeholder="Nama Orang Tua" required>
                </div>
              </div>
              <div class="modal-footer justify-content-center">
                <a href="siswa" class="btn btn-secondary">Kembali</a>
                <button type="submit" name="tambah-siswa" class="btn btn-primary ml-3">Tambah</button>
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