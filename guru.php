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
                    <th scope="col">NIK</th>
                    <th scope="col">NIP</th>
                    <th scope="col">NUPTK</th>
                    <th scope="col">Nama Guru</th>
                    <th scope="col">Jabatan</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">No Tlp</th>
                    <th scope="col">Status</th>
                    <th scope="col" colspan="2">Aksi</th>
                  </tr>
                </thead>
                <tbody id="search-page">
                  <?php $no = 1;
                  if (mysqli_num_rows($guru) == 0) { ?>
                    <tr>
                      <th scope="row" colspan="11">Belum ada data</th>
                    </tr>
                    <?php } else if (mysqli_num_rows($guru) > 0) {
                    while ($row = mysqli_fetch_assoc($guru)) { ?>
                      <tr>
                        <th scope="row"><?= $no; ?></th>
                        <td><?= $row['nik'] ?></td>
                        <td><?= $row['nip'] ?></td>
                        <td><?= $row['nuptk'] ?></td>
                        <td><?= $row['nama_guru'] ?></td>
                        <td><?= $row['jabatan'] ?></td>
                        <td><?= $row['jenis_kelamin'] ?></td>
                        <td><?= $row['no_tlp'] ?></td>
                        <td><?= $row['status'] ?></td>
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
                                      <label for="nik">NIK</label>
                                      <input type="number" name="nik" id="nik" value="<?php if (isset($_POST['nik'])) {echo $_POST['nik'];} else {echo $row['nik'];} ?>" class="form-control" placeholder="NIK" required>
                                    </div>
                                    <div class="form-group">
                                      <label for="nip">NIP</label>
                                      <input type="number" name="nip" id="nip" value="<?php if (isset($_POST['nip'])) {echo $_POST['nip'];} else {echo $row['nip'];} ?>" class="form-control" placeholder="NIP" required>
                                    </div>
                                    <div class="form-group">
                                      <label for="nuptk">NUPTK</label>
                                      <input type="number" name="nuptk" id="nuptk" value="<?php if (isset($_POST['nuptk'])) {echo $_POST['nuptk'];} else {echo $row['nuptk'];} ?>" class="form-control" placeholder="NUPTK" required>
                                    </div>
                                    <div class="form-group">
                                      <label for="nama-guru">Nama Guru</label>
                                      <input type="text" name="nama-guru" id="nama-guru" value="<?php if (isset($_POST['nama-guru'])) {echo $_POST['nama-guru'];} else {echo $row['nama_guru'];} ?>" class="form-control" placeholder="Nama Guru" required>
                                    </div>
                                    <div class="form-group">
                                      <label for="jabatan">Jabatan</label>
                                      <select name="jabatan" id="jabatan" class="form-control" required>
                                        <?php 
                                          $jabatan=$row['jabatan'];
                                          $select_jabatan=mysqli_query($conn, "SELECT * FROM jabatan WHERE jabatan!='$jabatan'");
                                          $select_jabatanView=mysqli_query($conn, "SELECT * FROM jabatan WHERE jabatan='$jabatan'");
                                          $row_jabatanView=mysqli_fetch_assoc($select_jabatanView);
                                        ?>
                                        <option value="<?= $row_jabatanView['jabatan']?>"><?= $row_jabatanView['jabatan']?></option>
                                        <?php foreach($select_jabatan as $row_jabatan):?>
                                        <option value="<?= $row_jabatan['jabatan']?>"><?= $row_jabatan['jabatan']?></option>
                                        <?php endforeach;?>
                                      </select>
                                    </div>
                                    <div class="form-group">
                                      <label for="jk">Jenis kelamin</label>
                                      <select name="jk" id="jk" class="form-control" required>
                                        <option value="<?= $row['jenis_kelamin']?>">
                                          <?php if($row['jenis_kelamin']=="Laki-Laki"){echo "Laki-Laki";}else if($row['jenis_kelamin']=="Perempuan"){echo "Perempuan";}?>
                                        </option>
                                        <option value="<?php if($row['jenis_kelamin']=="Laki-Laki"){echo "Perempuan";}else if($row['jenis_kelamin']=="Perempuan"){echo "Laki-Laki";}?>">
                                          <?php if($row['jenis_kelamin']=="Laki-Laki"){echo "Perempuan";}else if($row['jenis_kelamin']=="Perempuan"){echo "Laki-Laki";}?>
                                        </option>
                                      </select>
                                    </div>
                                    <div class="form-group">
                                      <label for="no-tlp">No. Telepon</label>
                                      <input type="number" name="no-tlp" id="no-tlp" value="<?php if (isset($_POST['no-tlp'])) {echo $_POST['no-tlp'];} else {echo $row['no_tlp'];} ?>" class="form-control" placeholder="No. Telepon" required>
                                    </div>
                                    <div class="form-group">
                                      <label for="status">Status</label>
                                      <select name="status" id="status" class="form-control" required>
                                        <?php 
                                          $status=$row['status'];
                                          $select_status=mysqli_query($conn, "SELECT * FROM status_guru WHERE status!='$status'");
                                          $select_statusView=mysqli_query($conn, "SELECT * FROM status_guru WHERE status='$status'");
                                          $row_statusView=mysqli_fetch_assoc($select_statusView);
                                        ?>
                                        <option value="<?= $row_statusView['status']?>"><?= $row_statusView['status']?></option>
                                        <?php foreach($select_status as $row_status):?>
                                        <option value="<?= $row_status['status']?>"><?= $row_status['status']?></option>
                                        <?php endforeach;?>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <input type="hidden" name="id-guru" value="<?= $row['id_guru'] ?>">
                                    <input type="hidden" name="nikOld" value="<?= $row['nik'] ?>">
                                    <input type="hidden" name="nipOld" value="<?= $row['nip'] ?>">
                                    <input type="hidden" name="nuptkOld" value="<?= $row['nuptk'] ?>">
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