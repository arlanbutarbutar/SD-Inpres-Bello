<?php require_once('controller/script.php');
require_once('controller/redirect-unusers.php');
$_SESSION['page-name'] = "Jadwal";
$_SESSION['page-to'] = "jadwal";
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
          <div class="col-auto">
            <div class="page-utilities">
              <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                <div class="col-auto">
                  <?php if ($_SESSION['akses'] == 1) { ?>
                    <a class="btn app-btn-primary" href="tambah-jadwal"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
                      </svg>Tambah Jadwal</a>
                  <?php } ?>
                </div>
              </div>
              <!--//row-->
            </div>
            <!--//table-utilities-->
          </div>
          <!--//col-auto-->
        </div>

        <!-- Table data jadwal -->
        <div class="row">
          <div class="col-md-12">
            <div class="card card-body shadow border-0">
              <div style="overflow-x: auto;">
                <table class="table table-sm text-center">
                  <thead>
                    <tr style="border-top: hidden;">
                      <th scope="col">No</th>
                      <th scope="col">Kelas</th>
                      <th scope="col">Mata Pelajaran</th>
                      <th scope="col">Jam Mulai - Jam Akhir</th>
                      <th scope="col">Hari</th>
                      <?php if ($_SESSION['akses'] == 1) { ?>
                        <th scope="col" colspan="2">Aksi</th>
                      <?php } ?>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1;
                    if (mysqli_num_rows($jadwal) == 0) { ?>
                      <tr>
                        <th scope="row" colspan="<?php if ($_SESSION['akses'] == 1) {
                                                    echo "7";
                                                  } else {
                                                    echo "5";
                                                  } ?>">Belum ada data</th>
                      </tr>
                      <?php } else if (mysqli_num_rows($jadwal) > 0) {
                      while ($row = mysqli_fetch_assoc($jadwal)) { ?>
                        <tr>
                          <th scope="row"><?= $no; ?></th>
                          <td><?= $row['nama_kelas'] ?></td>
                          <td><?= $row['nama_mapel'] ?></td>
                          <td><?= $row['jam_mulai'] . " - " . $row['jam_akhir'] ?></td>
                          <td><?= $row['hari'] ?></td>
                          <?php if ($_SESSION['akses'] == 1) { ?>
                            <td>
                              <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#ubah-jadwal<?= $row['id_jadwal'] ?>">Ubah</button>
                              <div class="modal fade" id="ubah-jadwal<?= $row['id_jadwal'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Ubah Jadwal</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
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
                                      <div class="modal-footer">
                                        <input type="hidden" name="id-jadwal" value="<?= $row['id_jadwal'] ?>">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                        <button type="submit" name="ubah-jadwal" class="btn btn-warning">Ubah</button>
                                      </div>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </td>
                            <td>
                              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapus-jadwal<?= $row['id_jadwal'] ?>">Hapus</button>
                              <div class="modal fade" id="hapus-jadwal<?= $row['id_jadwal'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Hapus Jadwal</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <form action="" method="POST">
                                      <div class="modal-body">
                                        Yakin anda ingin hapus? pilih "Hapus" untuk melanjutkan.
                                      </div>
                                      <div class="modal-footer">
                                        <input type="hidden" name="id-jadwal" value="<?= $row['id_jadwal'] ?>">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                        <button type="submit" name="hapus-jadwal" class="btn btn-danger">Hapus</button>
                                      </div>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </td>
                          <?php } ?>
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