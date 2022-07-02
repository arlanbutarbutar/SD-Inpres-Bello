<?php require_once('controller/script.php');
require_once('controller/redirect-unusers.php');
$_SESSION['page-name'] = "Kelas";
$_SESSION['page-to'] = "kelas";
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
                  <form class="docs-search-form row gx-1 align-items-center">
                    <div class="col-auto">
                      <input type="text" id="search-in-page" name="searchdocs" class="form-control search-docs" placeholder="Search">
                    </div>
                  </form>
                </div>
                <div class="col-auto">
                  <a class="btn app-btn-primary" href="tambah-kelas"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
                    </svg>Tambah Kelas</a>
                </div>
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
                      <th scope="col">Kelas</th>
                      <th scope="col">Nama Guru</th>
                      <th scope="col">Semester</th>
                      <th scope="col">Tahun Ajar</th>
                      <th scope="col" colspan="2">Aksi</th>
                    </tr>
                  </thead>
                  <tbody id="search-page">
                    <?php $no = 1;
                    if (mysqli_num_rows($kelas) == 0) { ?>
                      <tr>
                        <th scope="row" colspan="8">Belum ada data</th>
                      </tr>
                      <?php } else if (mysqli_num_rows($kelas) > 0) {
                      while ($row = mysqli_fetch_assoc($kelas)) { ?>
                        <tr>
                          <th scope="row"><?= $no; ?></th>
                          <td><?= $row['nama_kelas'] ?></td>
                          <td><?= $row['nama_guru'] ?></td>
                          <td><?= $row['semester'] ?></td>
                          <td><?= $row['tahunajar'] ?></td>
                          <td>
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#ubah-kelas<?= $row['id_kelas'] ?>">Ubah</button>
                            <div class="modal fade" id="ubah-kelas<?= $row['id_kelas'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                        <label for="nama-kelas">Kelas</label>
                                        <input type="text" name="nama-kelas" id="nama-kelas" value="<?php if (isset($_POST['nama-kelas'])) {echo $_POST['nama-kelas'];} else {echo $row['nama_kelas'];} ?>" class="form-control" placeholder="Kelas" required>
                                      </div>
                                      <div class="form-group">
                                        <label for="guru">Guru</label>
                                        <select name="id-guru" id="guru" class="form-control" required>
                                          <?php 
                                            $id_guru=$row['id_guru'];
                                            $select_guru=mysqli_query($conn, "SELECT * FROM guru WHERE id_guru!='$id_guru' AND id_guru>1");
                                            $select_guruView=mysqli_query($conn, "SELECT * FROM guru WHERE id_guru='$id_guru' AND id_guru>1");
                                            $row_guruView=mysqli_fetch_assoc($select_guruView);
                                          ?>
                                          <option value="<?= $row_guruView['id_guru']?>"><?= $row_guruView['nama_guru']?></option>
                                          <?php foreach ($select_guru as $rowSG) : ?>
                                            <option value="<?= $rowSG['id_guru'] ?>"><?= $rowSG['nama_guru'] ?></option>
                                          <?php endforeach; ?>
                                        </select>
                                      </div>
                                      <div class="form-group">
                                        <label for="semester">Semester</label>
                                        <input type="text" name="semester" id="semester" value="<?php if (isset($_POST['semester'])) {echo $_POST['semester'];} else {echo $row['semester'];} ?>" class="form-control" placeholder="Semester" required>
                                      </div>
                                      <div class="form-group">
                                        <label for="tahun-ajar">Tahun Ajar</label>
                                        <input type="text" name="tahun-ajar" id="tahun-ajar" value="<?php if (isset($_POST['tahun-ajar'])) {echo $_POST['tahun-ajar'];} else {echo $row['tahunajar'];} ?>" class="form-control" placeholder="Tahun Ajar" required>
                                      </div>
                                    </div>
                                    <div class="modal-footer">
                                      <input type="hidden" name="id-kelas" value="<?= $row['id_kelas'] ?>">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                      <button type="submit" name="ubah-kelas" class="btn btn-warning">Ubah</button>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </td>
                          <td>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapus-kelas<?= $row['id_kelas'] ?>">Hapus</button>
                            <div class="modal fade" id="hapus-kelas<?= $row['id_kelas'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Hapus Kelas</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <form action="" method="POST">
                                    <div class="modal-body">
                                      Yakin anda ingin hapus? pilih "Hapus" untuk melanjutkan.
                                    </div>
                                    <div class="modal-footer">
                                      <input type="hidden" name="id-kelas" value="<?= $row['id_kelas'] ?>">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                      <button type="submit" name="hapus-kelas" class="btn btn-danger">Hapus</button>
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