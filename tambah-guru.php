<?php require_once('controller/script.php');
require_once('controller/redirect-unusers.php');
$_SESSION['page-name'] = "Tambah Guru";
$_SESSION['page-to'] = "tambah-guru";
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
                  <label for="nik">NIK</label>
                  <input type="number" name="nik" id="nik" value="<?php if (isset($_POST['nik'])) {
                                                                    echo $_POST['nik'];
                                                                  } ?>" class="form-control" placeholder="NIK" required>
                </div>
                <div class="form-group">
                  <label for="nip">NIP</label>
                  <input type="number" name="nip" id="nip" value="<?php if (isset($_POST['nip'])) {
                                                                    echo $_POST['nip'];
                                                                  } ?>" class="form-control" placeholder="NIP" required>
                </div>
                <div class="form-group">
                  <label for="nuptk">NUPTK</label>
                  <input type="number" name="nuptk" id="nuptk" value="<?php if (isset($_POST['nuptk'])) {
                                                                        echo $_POST['nuptk'];
                                                                      } ?>" class="form-control" placeholder="NUPTK" required>
                </div>
                <div class="form-group">
                  <label for="nama-guru">Nama Guru</label>
                  <input type="text" name="nama-guru" id="nama-guru" value="<?php if (isset($_POST['nama-guru'])) {
                                                                              echo $_POST['nama-guru'];
                                                                            } ?>" class="form-control" placeholder="Nama Guru" required>
                </div>
                <div class="form-group">
                  <label for="jabatan">Jabatan</label>
                  <select name="jabatan" id="jabatan" class="form-control" required>
                    <option value="">Jabatan</option>
                    <option value="Kepala Sekolah">Kepala Sekolah</option>
                    <option value="Wakil Kepala Sekolah">Wakil Kepala Sekolah</option>
                    <option value="Guru Mapel">Guru Mapel</option>
                    <option value="Penjaga Sekolah">Penjaga Sekolah</option>
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
                  <label for="no-tlp">No. Telepon</label>
                  <input type="number" name="no-tlp" id="no-tlp" value="<?php if (isset($_POST['no-tlp'])) {
                                                                          echo $_POST['no-tlp'];
                                                                        } ?>" class="form-control" placeholder="No. Telepon" required>
                </div>
                <div class="form-group">
                  <label for="status">Status</label>
                  <select name="status" id="status" class="form-control" required>
                    <option value="">Status</option>
                    <option value="Guru Honor">Guru Honor</option>
                    <option value="CPNS">CPNS</option>
                    <option value="PNS">PNS</option>
                  </select>
                </div>
              </div>
              <div class="modal-footer justify-content-center">
                <a href="guru" class="btn btn-secondary">Kembali</a>
                <button type="submit" name="tambah-guru" class="btn btn-primary ml-3">Tambah</button>
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