<?php require_once('controller/script.php');
  require_once('controller/redirect-unusers.php');
  $_SESSION['page-name']="Nilai Siswa"; $_SESSION['page-to']="nilai-siswa.php";
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
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah-nilai">Tambah</button>
              <div class="modal fade" id="tambah-nilai" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Tambah Nilai</h5>
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
                            <?php foreach($selectKelas as $rowSK):?>
                            <option value="<?= $rowSK['id_kelas']?>"><?= $rowSK['nama_kelas']?></option>
                            <?php endforeach;?>
                          </select>
                        </div>
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
                          <label for="mapel">Mata Pelajaran</label>
                          <select name="id-mapel" id="mapel" class="form-control" required>
                            <option value="">Pilih Mata Pelajaran</option>
                            <?php foreach($selectMapel as $rowSM):?>
                            <option value="<?= $rowSM['id_mapel']?>"><?= $rowSM['nama_mapel']?></option>
                            <?php endforeach;?>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="guru">Guru</label>
                          <select name="id-guru" id="guru" class="form-control" required>
                            <option value="">Pilih guru</option>
                            <?php foreach($selectGuru as $rowSG):?>
                            <option value="<?= $rowSG['id_guru']?>"><?= $rowSG['nama_guru']?></option>
                            <?php endforeach;?>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="tugas">Nilai Tugas</label>
                          <input type="number" name="tugas" id="tugas" value="<?php if(isset($_POST['tugas'])){echo $_POST['tugas'];}?>" class="form-control" placeholder="Nilai Tugas" required>
                        </div>
                        <div class="form-group">
                          <label for="ulangan">Nilai Ulangan</label>
                          <input type="number" name="ulangan" id="ulangan" value="<?php if(isset($_POST['ulangan'])){echo $_POST['ulangan'];}?>" class="form-control" placeholder="Nilai Ulangan" required>
                        </div>
                        <div class="form-group">
                          <label for="uts">Nilai UTS</label>
                          <input type="number" name="uts" id="uts" value="<?php if(isset($_POST['uts'])){echo $_POST['uts'];}?>" class="form-control" placeholder="Nilai UTS" required>
                        </div>
                        <div class="form-group">
                          <label for="uas">Nilai UAS</label>
                          <input type="number" name="uas" id="uas" value="<?php if(isset($_POST['uas'])){echo $_POST['uas'];}?>" class="form-control" placeholder="Nilai UAS" required>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" name="tambah-nilai" class="btn btn-primary">Tambah</button>
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
                          <th scope="col">Guru</th>
                          <th scope="col">Nilai Tugas</th>
                          <th scope="col">Nilai Ulangan</th>
                          <th scope="col">Nilai UTS</th>
                          <th scope="col">Nilai UAS</th>
                          <th scope="col" colspan="2">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no=1; if(mysqli_num_rows($nilai)==0){?>
                        <tr>
                          <th scope="row" colspan="11">Belum ada data</th>
                        </tr>
                        <?php }else if(mysqli_num_rows($nilai)>0){while($row=mysqli_fetch_assoc($nilai)){?>
                        <tr>
                          <th scope="row"><?= $no;?></th>
                          <td><?= $row['nama_siswa']?></td>
                          <td><?= $row['nama_kelas']?></td>
                          <td><?= $row['nama_mapel']?></td>
                          <td><?= $row['nama_guru']?></td>
                          <td><?= $row['nilai_tugas']?></td>
                          <td><?= $row['nilai_ulangan']?></td>
                          <td><?= $row['nilai_uts']?></td>
                          <td><?= $row['nilai_uas']?></td>
                          <td>
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#ubah-nilai<?= $row['id_nilai']?>">Ubah</button>
                            <div class="modal fade" id="ubah-nilai<?= $row['id_nilai']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                        <label for="kelas">Kelas</label>
                                        <select name="id-kelas" id="kelas" class="form-control" required>
                                          <option value="">Pilih Kelas</option>
                                          <?php foreach($selectKelas as $rowSK):?>
                                          <option value="<?= $rowSK['id_kelas']?>"><?= $rowSK['nama_kelas']?></option>
                                          <?php endforeach;?>
                                        </select>
                                      </div>
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
                                        <label for="mapel">Mata Pelajaran</label>
                                        <select name="id-mapel" id="mapel" class="form-control" required>
                                          <option value="">Pilih Mata Pelajaran</option>
                                          <?php foreach($selectMapel as $rowSM):?>
                                          <option value="<?= $rowSM['id_mapel']?>"><?= $rowSM['nama_mapel']?></option>
                                          <?php endforeach;?>
                                        </select>
                                      </div>
                                      <div class="form-group">
                                        <label for="guru">Guru</label>
                                        <select name="id-guru" id="guru" class="form-control" required>
                                          <option value="">Pilih guru</option>
                                          <?php foreach($selectGuru as $rowSG):?>
                                          <option value="<?= $rowSG['id_guru']?>"><?= $rowSG['nama_guru']?></option>
                                          <?php endforeach;?>
                                        </select>
                                      </div>
                                      <div class="form-group">
                                        <label for="tugas">Nilai Tugas</label>
                                        <input type="number" name="tugas" id="tugas" value="<?php if(isset($_POST['tugas'])){echo $_POST['tugas'];}else{echo $row['nilai_tugas'];}?>" class="form-control" placeholder="Nilai Tugas" required>
                                      </div>
                                      <div class="form-group">
                                        <label for="ulangan">Nilai Ulangan</label>
                                        <input type="number" name="ulangan" id="ulangan" value="<?php if(isset($_POST['ulangan'])){echo $_POST['ulangan'];}else{echo $row['nilai_ulangan'];}?>" class="form-control" placeholder="Nilai Ulangan" required>
                                      </div>
                                      <div class="form-group">
                                        <label for="uts">Nilai UTS</label>
                                        <input type="number" name="uts" id="uts" value="<?php if(isset($_POST['uts'])){echo $_POST['uts'];}else{echo $row['nilai_uts'];}?>" class="form-control" placeholder="Nilai UTS" required>
                                      </div>
                                      <div class="form-group">
                                        <label for="uas">Nilai UAS</label>
                                        <input type="number" name="uas" id="uas" value="<?php if(isset($_POST['uas'])){echo $_POST['uas'];}else{echo $row['nilai_uas'];}?>" class="form-control" placeholder="Nilai UAS" required>
                                      </div>
                                    </div>
                                    <div class="modal-footer">
                                      <input type="hidden" name="id-nilai" value="<?= $row['id_nilai']?>">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                      <button type="submit" name="ubah-nilai" class="btn btn-warning">Ubah</button>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </td>
                          <td>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapus-nilai<?= $row['id_nilai']?>">Hapus</button>
                            <div class="modal fade" id="hapus-nilai<?= $row['id_nilai']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                      <input type="hidden" name="id-nilai" value="<?= $row['id_nilai']?>">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                      <button type="submit" name="hapus-nilai" class="btn btn-danger">Hapus</button>
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