<?php require_once('controller/script.php');
require_once('controller/redirect-unusers.php');
$_SESSION['page-name'] = "Siswa";
$_SESSION['page-to'] = "siswa";
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
            <h1 class="app-page-title mb-0"><?= $_SESSION['page-name']; ?></h1>
          </div>
          <div class="col-auto">
            <div class="page-utilities">
              <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                <!-- <div class="col-auto">
                  <form class="docs-search-form row gx-1 align-items-center">
                    <div class="col-auto">
                      <input type="text" id="search-docs" name="searchdocs" class="form-control search-docs" placeholder="Search">
                    </div>
                    <div class="col-auto">
                      <button type="submit" class="btn app-btn-secondary">Search</button>
                    </div>
                  </form>

                </div> -->
                <!--//col-->
                <?php if ($_SESSION['akses'] == 1) { ?>
                  <div class="col-auto">
                    <a class="btn app-btn-primary" href="tambah-siswa"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
                      </svg>Tambah Siswa</a>
                  </div>
                <?php } ?>
              </div>
              <!--//row-->
            </div>
            <!--//table-utilities-->
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
                      <th scope="col">Kelas</th>
                      <th scope="col">Jenis Kelamin</th>
                      <th scope="col">TTL</th>
                      <th scope="col">Nama Ortu</th>
                      <?php if ($_SESSION['akses'] == 1) { ?>
                      <th scope="col" colspan="2">Aksi</th>
                      <?php } ?>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1;
                    if (mysqli_num_rows($siswa) == 0) { ?>
                      <tr>
                        <th scope="row" colspan="6">Belum ada data</th>
                      </tr>
                      <?php } else if (mysqli_num_rows($siswa) > 0) {
                      while ($row = mysqli_fetch_assoc($siswa)) { ?>
                        <tr>
                          <th scope="row"><?= $no; ?></th>
                          <td><?= $row['nis'] ?></td>
                          <td><?= $row['nama_siswa'] ?></td>
                          <td><?= $row['nama_kelas'] ?></td>
                          <td><?= $row['jenis_kelamin'] ?></td>
                          <td><?= $row['ttl'] ?></td>
                          <td><?= $row['nama_ortu'] ?></td>
                          <?php if ($_SESSION['akses'] == 1) { ?>
                          <td>
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#ubah-siswa<?= $row['id_siswa'] ?>">Ubah</button>
                            <div class="modal fade" id="ubah-siswa<?= $row['id_siswa'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Ubah Siswa</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <form action="" method="POST">
                                    <div class="modal-body">
                                      <div class="form-group">
                                        <label for="nis">NIS</label>
                                        <input type="number" name="nis" id="nis" value="<?php if (isset($_POST['nis'])) {
                                                                                          echo $_POST['nis'];
                                                                                        } else {
                                                                                          echo $row['nis'];
                                                                                        } ?>" class="form-control" placeholder="NIS" required>
                                      </div>
                                      <div class="form-group">
                                        <label for="nama-siswa">Nama Siswa</label>
                                        <input type="text" name="nama-siswa" id="nama-siswa" value="<?php if (isset($_POST['nama-siswa'])) {
                                                                                                      echo $_POST['nama-siswa'];
                                                                                                    } else {
                                                                                                      echo $row['nama_siswa'];
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
                                                                                                  } else {
                                                                                                    echo $row['nama_ortu'];
                                                                                                  } ?>" class="form-control" placeholder="Nama Orang Tua" required>
                                      </div>
                                    </div>
                                    <div class="modal-footer">
                                      <input type="hidden" name="id-siswa" value="<?= $row['id_siswa'] ?>">
                                      <input type="hidden" name="nisOld" value="<?= $row['nis'] ?>">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                      <button type="submit" name="ubah-siswa" class="btn btn-warning">Ubah</button>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </td>
                          <td>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapus-siswa<?= $row['id_siswa'] ?>">Hapus</button>
                            <div class="modal fade" id="hapus-siswa<?= $row['id_siswa'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Hapus Guru</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <form action="" method="POST">
                                    <div class="modal-body">
                                      Yakin anda ingin hapus? pilih "Hapus" untuk melanjutkan.
                                    </div>
                                    <div class="modal-footer">
                                      <input type="hidden" name="id-siswa" value="<?= $row['id_siswa'] ?>">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                      <button type="submit" name="hapus-siswa" class="btn btn-danger">Hapus</button>
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