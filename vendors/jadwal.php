<?php require_once('controller/script.php');
  require_once('controller/redirect-unusers.php');
  $_SESSION['page-name']="Jadwal"; $_SESSION['page-to']="jadwal.php";
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
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah-jadwal">Tambah</button>
              <div class="modal fade" id="tambah-jadwal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Tambah Jadwal</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form action="" method="POST">
                      <div class="modal-body">
                        <div class="form-group">
                          <label for="siswa">Siswa</label>
                          <select name="id-siswa" id="siswa" class="form-control" required>
                            <option value="">Pilih Siswa</option>
                            <?php foreach($selectSiswa as $rowSS):?>
                            <option value="<?= $rowSS['id_siswa']?>"><?= $rowSS['nama_siswa']?></option>
                            <?php endforeach;?>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="kelas">Kelas</label>
                          <select name="id-kelas" id="kelas" class="form-control" required>
                            <option value="">Pilih Kelas</option>
                            <?php foreach($selectKelas as $rowSK):?>
                            <option value="<?= $rowSK['id_kelas']?>"><?= $rowSK['nama_kelas']?></option>
                            <?php endforeach;?>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="mapel">Mata Pelajaran</label>
                          <select name="id-mapel" id="mapel" class="form-control" required>
                            <option value="">Pilih Mata Pelajaran</option>
                            <?php foreach($selectMapel as $rowSM):?>
                            <option value="<?= $rowSM['id_mapel']?>"><?= $rowSM['nama_mapel']?></option>
                            <?php endforeach;?>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="jam">Jam</label>
                          <input type="time" name="jam" id="jam" value="<?php if(isset($_POST['jam'])){echo $_POST['jam'];}?>" class="form-control" placeholder="Jam" required>
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
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" name="tambah-jadwal" class="btn btn-primary">Tambah</button>
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
                          <th scope="col">Siswa</th>
                          <th scope="col">Kelas</th>
                          <th scope="col">Mata Pelajaran</th>
                          <th scope="col">Jam</th>
                          <th scope="col">Hari</th>
                          <th scope="col" colspan="2">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no=1; if(mysqli_num_rows($jadwal)==0){?>
                        <tr>
                          <th scope="row" colspan="8">Belum ada data</th>
                        </tr>
                        <?php }else if(mysqli_num_rows($jadwal)>0){while($row=mysqli_fetch_assoc($jadwal)){?>
                        <tr>
                          <th scope="row"><?= $no;?></th>
                          <td><?= $row['nama_siswa']?></td>
                          <td><?= $row['nama_kelas']?></td>
                          <td><?= $row['nama_mapel']?></td>
                          <td><?= $row['jam']?></td>
                          <td><?= $row['hari']?></td>
                          <td>
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#ubah-jadwal<?= $row['id_jad']?>">Ubah</button>
                            <div class="modal fade" id="ubah-jadwal<?= $row['id_jad']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                        <label for="siswa">Siswa</label>
                                        <select name="id-siswa" id="siswa" class="form-control" required>
                                          <option value="">Pilih Siswa</option>
                                          <?php foreach($selectSiswa as $rowSS):?>
                                          <option value="<?= $rowSS['id_siswa']?>"><?= $rowSS['nama_siswa']?></option>
                                          <?php endforeach;?>
                                        </select>
                                      </div>
                                      <div class="form-group">
                                        <label for="kelas">Kelas</label>
                                        <select name="id-kelas" id="kelas" class="form-control" required>
                                          <option value="">Pilih Kelas</option>
                                          <?php foreach($selectKelas as $rowSK):?>
                                          <option value="<?= $rowSK['id_kelas']?>"><?= $rowSK['nama_kelas']?></option>
                                          <?php endforeach;?>
                                        </select>
                                      </div>
                                      <div class="form-group">
                                        <label for="mapel">Mata Pelajaran</label>
                                        <select name="id-mapel" id="mapel" class="form-control" required>
                                          <option value="">Pilih Mata Pelajaran</option>
                                          <?php foreach($selectMapel as $rowSM):?>
                                          <option value="<?= $rowSM['id_mapel']?>"><?= $rowSM['nama_mapel']?></option>
                                          <?php endforeach;?>
                                        </select>
                                      </div>
                                      <div class="form-group">
                                        <label for="jam">Jam</label>
                                        <input type="time" name="jam" id="jam" value="<?php if(isset($_POST['jam'])){echo $_POST['jam'];}?>" class="form-control" placeholder="Jam" required>
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
                                      <input type="hidden" name="id-jadwal" value="<?= $row['id_jad']?>">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                      <button type="submit" name="ubah-jadwal" class="btn btn-warning">Ubah</button>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </td>
                          <td>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapus-jadwal<?= $row['id_jad']?>">Hapus</button>
                            <div class="modal fade" id="hapus-jadwal<?= $row['id_jad']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                      <input type="hidden" name="id-jadwal" value="<?= $row['id_jad']?>">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                      <button type="submit" name="hapus-jadwal" class="btn btn-danger">Hapus</button>
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