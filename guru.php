<?php require_once('controller/script.php');
require_once('controller/redirect-unusers.php');
$_SESSION['page-name'] = "Guru";
$_SESSION['page-to'] = "guru";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php require_once("resources/layout/header.php"); ?>
</head>

<body class="app">
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
                <div class="col-auto">
                  <a class="btn app-btn-primary" href="tambah-guru"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
                    </svg>Tambah Guru</a>
                </div>
              </div>
              <!--//row-->
            </div>
            <!--//table-utilities-->
          </div>
          <!--//col-auto-->
        </div>
        <div class="row">
          <div class="card card-body shadow border-0">
            <div style="overflow-x: auto;">
              <table class="table table-sm text-center">
                <thead>
                  <tr style="border-top: hidden;">
                    <th scope="col">No</th>
                    <th scope="col">NIP</th>
                    <th scope="col">Nama Guru</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">No Tlp</th>
                    <th scope="col" colspan="2">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1;
                  if (mysqli_num_rows($guru) == 0) { ?>
                    <tr>
                      <th scope="row" colspan="7">Belum ada data</th>
                    </tr>
                    <?php } else if (mysqli_num_rows($guru) > 0) {
                    while ($row = mysqli_fetch_assoc($guru)) { ?>
                      <tr>
                        <th scope="row"><?= $no; ?></th>
                        <td><?= $row['nip'] ?></td>
                        <td><?= $row['nama_guru'] ?></td>
                        <td><?= $row['jenis_kelamin'] ?></td>
                        <td><?= $row['no_tlp'] ?></td>
                        <td>
                          <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#ubah-guru<?= $row['id_guru'] ?>">Ubah</button>
                          <div class="modal fade" id="ubah-guru<?= $row['id_guru'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Ubah Guru</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <form action="" method="POST">
                                  <div class="modal-body">
                                    <div class="form-group">
                                      <label for="nip">NIP</label>
                                      <input type="number" name="nip" id="nip" value="<?php if (isset($_POST['nip'])) {
                                                                                        echo $_POST['nip'];
                                                                                      } else {
                                                                                        echo $row['nip'];
                                                                                      } ?>" class="form-control" placeholder="NIP" required>
                                    </div>
                                    <div class="form-group">
                                      <label for="nama-guru">Nama Guru</label>
                                      <input type="text" name="nama-guru" id="nama-guru" value="<?php if (isset($_POST['nama-guru'])) {
                                                                                                  echo $_POST['nama-guru'];
                                                                                                } else {
                                                                                                  echo $row['nama_guru'];
                                                                                                } ?>" class="form-control" placeholder="Nama Guru" required>
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
                                                                                            } else {
                                                                                              echo $row['no_tlp'];
                                                                                            } ?>" class="form-control" placeholder="No. Telepon" required>
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <input type="hidden" name="id-guru" value="<?= $row['id_guru'] ?>">
                                    <input type="hidden" name="nipOld" value="<?= $row['nip'] ?>">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                    <button type="submit" name="ubah-guru" class="btn btn-warning">Ubah</button>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        </td>
                        <td>
                          <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapus-guru<?= $row['id_guru'] ?>">Hapus</button>
                          <div class="modal fade" id="hapus-guru<?= $row['id_guru'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                    <input type="hidden" name="id-guru" value="<?= $row['id_guru'] ?>">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                    <button type="submit" name="hapus-guru" class="btn btn-danger">Hapus</button>
                                  </div>
                                </form>
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
      <!--//container-fluid-->
    </div>
    <!--//app-content-->

    <?php require_once("resources/layout/footer.php"); ?>
  </div>
  <!--//app-wrapper-->
  <?php require_once("resources/pattern/footer-js.php"); ?>
</body>

</html>