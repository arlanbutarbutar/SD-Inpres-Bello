<?php require_once('controller/script.php');
  require_once('controller/redirect-unusers.php');
  $_SESSION['page-name']="Guru"; $_SESSION['page-to']="guru.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php require_once("resources/layout/header.php");?>
  </head>
  <body id="page-top">
    <?php if(isset($_SESSION['message-success'])){?>
    <div class="message-success" data-message-success="<?= $_SESSION['message-success']?>"></div>
    <?php } if(isset($_SESSION['message-info'])){?>
    <div class="message-info" data-message-info="<?= $_SESSION['message-info']?>"></div>
    <?php } if(isset($_SESSION['message-warning'])){?>
    <div class="message-warning" data-message-warning="<?= $_SESSION['message-warning']?>"></div>
    <?php } if(isset($_SESSION['message-danger'])){?>
    <div class="message-danger" data-message-danger="<?= $_SESSION['message-danger']?>"></div>
    <?php }?>
    <!-- Page Wrapper -->
    <div id="wrapper">
      <?php require_once("resources/layout/sidebar.php");?>
      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
          <?php require_once("resources/layout/navbar.php");?>
          <!-- Begin Page Content -->
          <div class="container-fluid">
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
              <h1 class="h3 mb-0 text-gray-800"><?= $_SESSION['page-name']?></h1>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah-guru">Tambah</button>
              <div class="modal fade" id="tambah-guru" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Tambah Guru</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form action="" method="POST">
                      <div class="modal-body">
                        <div class="form-group">
                          <label for="nip">NIP</label>
                          <input type="number" name="nip" id="nip" value="<?php if(isset($_POST['nip'])){echo $_POST['nip'];}?>" class="form-control" placeholder="NIP" required>
                        </div>
                        <div class="form-group">
                          <label for="nama-guru">Nama Guru</label>
                          <input type="text" name="nama-guru" id="nama-guru" value="<?php if(isset($_POST['nama-guru'])){echo $_POST['nama-guru'];}?>" class="form-control" placeholder="Nama Guru" required>
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
                          <input type="number" name="no-tlp" id="no-tlp" value="<?php if(isset($_POST['no-tlp'])){echo $_POST['no-tlp'];}?>" class="form-control" placeholder="No. Telepon" required>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" name="tambah-guru" class="btn btn-primary">Tambah</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- Table data guru -->
            <div class="row">
              <div class="col-md-12">
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
                        <?php $no=1; if(mysqli_num_rows($guru)==0){?>
                        <tr>
                          <th scope="row" colspan="7">Belum ada data</th>
                        </tr>
                        <?php }else if(mysqli_num_rows($guru)>0){while($row=mysqli_fetch_assoc($guru)){?>
                        <tr>
                          <th scope="row"><?= $no;?></th>
                          <td><?= $row['nip']?></td>
                          <td><?= $row['nama_guru']?></td>
                          <td><?= $row['jenis_kelamin']?></td>
                          <td><?= $row['no_tlp']?></td>
                          <td>
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#ubah-guru<?= $row['id_guru']?>">Ubah</button>
                            <div class="modal fade" id="ubah-guru<?= $row['id_guru']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                        <input type="number" name="nip" id="nip" value="<?php if(isset($_POST['nip'])){echo $_POST['nip'];}else{echo $row['nip'];}?>" class="form-control" placeholder="NIP" required>
                                      </div>
                                      <div class="form-group">
                                        <label for="nama-guru">Nama Guru</label>
                                        <input type="text" name="nama-guru" id="nama-guru" value="<?php if(isset($_POST['nama-guru'])){echo $_POST['nama-guru'];}else{echo $row['nama_guru'];}?>" class="form-control" placeholder="Nama Guru" required>
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
                                        <input type="number" name="no-tlp" id="no-tlp" value="<?php if(isset($_POST['no-tlp'])){echo $_POST['no-tlp'];}else{echo $row['no_tlp'];}?>" class="form-control" placeholder="No. Telepon" required>
                                      </div>
                                    </div>
                                    <div class="modal-footer">
                                      <input type="hidden" name="id-guru" value="<?= $row['id_guru']?>">
                                      <input type="hidden" name="nipOld" value="<?= $row['nip']?>">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                      <button type="submit" name="ubah-guru" class="btn btn-warning">Ubah</button>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </td>
                          <td>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapus-guru<?= $row['id_guru']?>">Hapus</button>
                            <div class="modal fade" id="hapus-guru<?= $row['id_guru']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                      <input type="hidden" name="id-guru" value="<?= $row['id_guru']?>">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                      <button type="submit" name="hapus-guru" class="btn btn-danger">Hapus</button>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </td>
                        </tr>
                        <?php $no++; }}?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->
        <?php require_once("resources/layout/footer.php");?>
      </div>
      <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->
    <?php require_once("resources/pattern/footer-js.php");?>
  </body>
</html>