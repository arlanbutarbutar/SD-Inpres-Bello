<?php require_once('controller/script.php');
require_once('controller/redirect-unusers.php');
$_SESSION['page-name'] = "Nilai Siswa";
$_SESSION['page-to'] = "nilai-siswa";
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
                <?php if($_SESSION['akses']==2){?>
                <div class="col-auto">
                  <a class="btn app-btn-primary" href="tambah-nilai"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
                    </svg>Tambah Nilai</a>
                </div>
                <?php }?>
              </div>
              <!--//row-->
            </div>
            <!--//table-utilities-->
          </div>
          <!--//col-auto-->
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
                      <th scope="col">Siswa</th>
                      <th scope="col">Kelas</th>
                      <th scope="col">Mata Pelajaran</th>
                      <th scope="col">Tgl Nilai</th>
                      <th scope="col">Nilai Tugas</th>
                      <th scope="col">Nilai Ulangan</th>
                      <th scope="col">Nilai UTS</th>
                      <th scope="col">Nilai UAS</th>
                      <th scope="col">Nilai Akhir</th>
                      <th scope="col">Ket</th>
                      <?php if($_SESSION['akses']==2){?>
                      <th scope="col" colspan="2">Aksi</th>
                      <?php }?>
                    </tr>
                  </thead>
                  <tbody id="search-page">
                    <?php $no = 1;
                    if (mysqli_num_rows($nilai) == 0) { ?>
                      <tr>
                        <th scope="row" colspan="11">Belum ada data</th>
                      </tr>
                      <?php } else if (mysqli_num_rows($nilai) > 0) {
                      while ($row = mysqli_fetch_assoc($nilai)) { 
                        $tgl_nilai=date_create($row['tgl_nilai']);
                        $tgl_nilai=date_format($tgl_nilai, "d M Y");?>
                        <tr>
                          <th scope="row"><?= $no; ?></th>
                          <td><?= $row['nama_siswa'] ?></td>
                          <td><?= $row['nama_kelas'] ?></td>
                          <td><?= $row['nama_mapel'] ?></td>
                          <td><?= $tgl_nilai ?></td>
                          <td><?= $row['nilai_tugas'] ?></td>
                          <td><?= $row['nilai_ulangan'] ?></td>
                          <td><?= $row['nilai_uts'] ?></td>
                          <td><?= $row['nilai_uas'] ?></td>
                          <td><?= $row['nilai_akhir'] ?></td>
                          <td><?= $row['ket_nilai'] ?></td>
                          <?php if($_SESSION['akses']==2){?>
                          <td>
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#ubah-nilai<?= $row['id_nilai'] ?>">Ubah</button>
                            <div class="modal fade" id="ubah-nilai<?= $row['id_nilai'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Ubah Nilai</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <form action="" method="POST">
                                    <div class="modal-body">
                                      <div class="form-group">
                                        <label for="tugas">Nilai Tugas</label>
                                        <input type="number" name="tugas" id="tugas" value="<?php if (isset($_POST['tugas'])) {echo $_POST['tugas'];} else {echo $row['nilai_tugas'];} ?>" class="form-control" placeholder="Nilai Tugas" required>
                                      </div>
                                      <div class="form-group">
                                        <label for="ulangan">Nilai Ulangan</label>
                                        <input type="number" name="ulangan" id="ulangan" value="<?php if (isset($_POST['ulangan'])) {echo $_POST['ulangan'];} else {echo $row['nilai_ulangan'];} ?>" class="form-control" placeholder="Nilai Ulangan" required>
                                      </div>
                                      <div class="form-group">
                                        <label for="uts">Nilai UTS</label>
                                        <input type="number" name="uts" id="uts" value="<?php if (isset($_POST['uts'])) {echo $_POST['uts'];} else {echo $row['nilai_uts'];} ?>" class="form-control" placeholder="Nilai UTS" required>
                                      </div>
                                      <div class="form-group">
                                        <label for="uas">Nilai UAS</label>
                                        <input type="number" name="uas" id="uas" value="<?php if (isset($_POST['uas'])) {echo $_POST['uas'];} else {echo $row['nilai_uas'];} ?>" class="form-control" placeholder="Nilai UAS" required>
                                      </div>
                                    </div>
                                    <div class="modal-footer">
                                      <input type="hidden" name="id-nilai" value="<?= $row['id_nilai'] ?>">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                      <button type="submit" name="ubah-nilai" class="btn btn-warning">Ubah</button>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </td>
                          <td>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapus-nilai<?= $row['id_nilai'] ?>">Hapus</button>
                            <div class="modal fade" id="hapus-nilai<?= $row['id_nilai'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Hapus Nilai</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <form action="" method="POST">
                                    <div class="modal-body">
                                      Yakin anda ingin hapus? pilih "Hapus" untuk melanjutkan.
                                    </div>
                                    <div class="modal-footer">
                                      <input type="hidden" name="id-nilai" value="<?= $row['id_nilai'] ?>">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                      <button type="submit" name="hapus-nilai" class="btn btn-danger">Hapus</button>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </td>
                          <?php }?>
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