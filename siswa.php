<?php require_once('controller/script.php');
require_once('controller/redirect-unusers.php');
$_SESSION['page-name'] = "Siswa Aktif";
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
                <div class="col-auto">
                  <form class="docs-search-form row gx-1 align-items-center">
                    <div class="col-auto">
                      <input type="text" id="search-in-page" name="searchdocs" class="form-control search-docs" placeholder="Search">
                    </div>
                  </form>
                </div>
                <!--//col-->
                <?php if ($_SESSION['akses'] < 2) { ?>
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
                      <th scope="col">NIK</th>
                      <th scope="col">NISN</th>
                      <th scope="col">Nama Siswa</th>
                      <th scope="col">Kelas</th>
                      <th scope="col">Tahun Ajaran</th>
                      <th scope="col">Jenis Kelamin</th>
                      <th scope="col">TTL</th>
                      <th scope="col">Nama Ibu</th>
                      <?php if ($_SESSION['akses'] == 1) { ?>
                        <th scope="col" colspan="2">Aksi</th>
                      <?php } ?>
                    </tr>
                  </thead>
                  <tbody id="search-page">
                    <?php $no = 1;
                    if (mysqli_num_rows($siswa) == 0) { ?>
                      <tr>
                        <th scope="row" colspan="<?php if($_SESSION['akses']==1){echo "11";}else{echo "9";} ?>">Belum ada data</th>
                      </tr>
                      <?php } else if (mysqli_num_rows($siswa) > 0) {
                      while ($row = mysqli_fetch_assoc($siswa)) { ?>
                        <tr>
                          <th scope="row"><?= $no; ?></th>
                          <td><?= $row['nik'] ?></td>
                          <td><?= $row['nisn'] ?></td>
                          <td><?= $row['nama_siswa'] ?></td>
                          <td><?= $row['nama_kelas'] ?> <?php if($_SESSION['akses']==2){?><span style="cursor: pointer;" class="badge badge-success shadow" data-toggle="modal" data-target="#status-siswa<?= $row['id_siswa']?>">Ubah</span><?php }?></td>
                          <div class="modal fade" id="status-siswa<?= $row['id_siswa']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header border-bottom-0">
                                  <h5 class="modal-title" id="exampleModalLabel"></h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <?php 
                                  $kelas=preg_replace("/[^0-9]/", "", $row['nama_kelas']);
                                  $kelas_az=preg_replace("/[^a-zA-Z]/", "", $row['nama_kelas']);
                                  if($kelas<6){
                                ?>
                                <div class="modal-body text-center">
                                  Apakah siswa dengan nama <?= $row['nama_siswa']?> naik kelas?
                                </div>
                                <div class="modal-footer border-top-0 justify-content-center">
                                  <form action="" method="POST">
                                    <button type="button" name="tidak-naik" class="btn btn-secondary" data-dismiss="modal">Tidak Naik</button>
                                  </form>
                                  <form action="" method="POST">
                                    <input type="hidden" name="id-siswa" value="<?= $row['id_siswa']?>">
                                    <input type="hidden" name="kelas" value="<?= $kelas?>">
                                    <input type="hidden" name="kelas-az" value="<?= $kelas_az?>">
                                    <input type="hidden" name="nama-siswa" value="<?= $row['nama_siswa']?>">
                                    <button type="submit" name="naik-kelas" class="btn btn-primary text-white">Naik Kelas</button>
                                  </form>
                                </div>
                                <?php }else if($kelas==6){?>
                                <div class="modal-body text-center">
                                  Apakah siswa dengan nama <?= $row['nama_siswa']?> telah dinyatakan lulus?
                                </div>
                                <div class="modal-footer border-top-0 justify-content-center">
                                  <form action="" method="POST">
                                    <button type="button" name="tidak-lulus" class="btn btn-secondary" data-dismiss="modal">Tidak Lulus</button>
                                  </form>
                                  <form action="" method="POST">
                                    <input type="hidden" name="id-siswa" value="<?= $row['id_siswa']?>">
                                    <button type="submit" name="lulus" class="btn btn-primary text-white">Lulus</button>
                                  </form>
                                </div>
                                <?php }?>
                              </div>
                            </div>
                          </div>
                          <td><?= $row['tahunajar'] ?></td>
                          <td><?= $row['jenis_kelamin'] ?></td>
                          <td><?= $row['ttl'] ?></td>
                          <td><?= $row['nama_ibu'] ?></td>
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
                                          <label for="nik">NIK</label>
                                          <input type="number" name="nik" id="nik" value="<?php if (isset($_POST['nik'])) {echo $_POST['nik'];} else {echo $row['nik'];} ?>" class="form-control" placeholder="NIK" required>
                                        </div>
                                        <div class="form-group">
                                          <label for="nisn">NISN</label>
                                          <input type="number" name="nisn" id="nisn" value="<?php if (isset($_POST['nisn'])) {echo $_POST['nisn'];} else {echo $row['nisn'];} ?>" class="form-control" placeholder="NISN" required>
                                        </div>
                                        <div class="form-group">
                                          <label for="nama-siswa">Nama Siswa</label>
                                          <input type="text" name="nama-siswa" id="nama-siswa" value="<?php if (isset($_POST['nama-siswa'])) {echo $_POST['nama-siswa'];} else {echo $row['nama_siswa'];} ?>" class="form-control" placeholder="Nama Siswa" required>
                                        </div>
                                        <div class="form-group">
                                          <label for="jk">Jenis kelamin</label>
                                          <select name="jk" id="jk" class="form-control" required>
                                            <option value="<?= $row['jenis_kelamin'] ?>">
                                              <?php if ($row['jenis_kelamin'] == "Laki-Laki") {echo "Laki-Laki";} else if ($row['jenis_kelamin'] == "Perempuan") {echo "Perempuan";} ?>
                                            </option>
                                            <option value="<?php if ($row['jenis_kelamin'] == "Laki-Laki") {echo "Perempuan";} else if ($row['jenis_kelamin'] == "Perempuan") {echo "Laki-Laki";} ?>">
                                              <?php if ($row['jenis_kelamin'] == "Laki-Laki") {echo "Perempuan";} else if ($row['jenis_kelamin'] == "Perempuan") {echo "Laki-Laki";} ?>
                                            </option>
                                          </select>
                                        </div>
                                        <div class="form-group">
                                          <label for="ttl">TTL <small>(Tempat Tanggal Lahir)</small></label>
                                          <input type="text" name="ttl" id="ttl" value="<?php if (isset($_POST['ttl'])) {echo $_POST['ttl'];} else {echo $row['ttl'];} ?>" class="form-control" placeholder="Tempat Lahir" required>
                                        </div>
                                        <div class="form-group">
                                          <label for="nama-ibu">Nama Ibu</label>
                                          <input type="text" name="nama-ibu" id="nama-ibu" value="<?php if (isset($_POST['nama-ibu'])) {echo $_POST['nama-ibu'];} else {echo $row['nama_ibu'];} ?>" class="form-control" placeholder="Nama Ibu" required>
                                        </div>
                                      </div>
                                      <div class="modal-footer">
                                        <input type="hidden" name="id-siswa" value="<?= $row['id_siswa'] ?>">
                                        <input type="hidden" name="nisnOld" value="<?= $row['nisn'] ?>">
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
                    <?php $no++; }} ?>
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