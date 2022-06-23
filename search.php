<?php require_once('controller/script.php');
if ($_SESSION['page-to'] == "siswa") {
  if (isset($_GET['key']) && $_GET['key'] != "") {
    $key = addslashes(trim($_GET['key']));
    $query = "SELECT * FROM siswa JOIN kelas ON kelas.id_kelas=siswa.id_kelas WHERE siswa.nik LIKE '%$key%' OR siswa.nisn LIKE '%$key%' ORDER BY siswa.id_siswa DESC";
    $siswa = mysqli_query($conn, $query);
  }
  if (mysqli_num_rows($siswa) == 0) { ?>
    <tr>
      <th scope="row" colspan="<?php if ($_SESSION['akses'] == 1) {
                                  echo "10";
                                } else {
                                  echo "8";
                                } ?>">Belum ada data</th>
    </tr>
    <?php }
  $no = 1;
  if (mysqli_num_rows($siswa) > 0) {
    while ($row = mysqli_fetch_assoc($siswa)) { ?>
      <tr>
        <th scope="row"><?= $no; ?></th>
        <td><?= $row['nik'] ?></td>
        <td><?= $row['nisn'] ?></td>
        <td><?= $row['nama_siswa'] ?></td>
        <td><?= $row['nama_kelas'] ?></td>
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
                        <input type="number" name="nik" id="nik" value="<?php if (isset($_POST['nik'])) {
                                                                          echo $_POST['nik'];
                                                                        } else {
                                                                          echo $row['nik'];
                                                                        } ?>" class="form-control" placeholder="NIK" required>
                      </div>
                      <div class="form-group">
                        <label for="nisn">NISN</label>
                        <input type="number" name="nisn" id="nisn" value="<?php if (isset($_POST['nisn'])) {
                                                                            echo $_POST['nisn'];
                                                                          } else {
                                                                            echo $row['nisn'];
                                                                          } ?>" class="form-control" placeholder="NISN" required>
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
                        <label for="nama-ibu">Nama Ibu</label>
                        <input type="text" name="nama-ibu" id="nama-ibu" value="<?php if (isset($_POST['nama-ibu'])) {
                                                                                  echo $_POST['nama-ibu'];
                                                                                } else {
                                                                                  echo $row['nama_ibu'];
                                                                                } ?>" class="form-control" placeholder="Nama Ibu" required>
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
<?php $no++;
    }
  }
} ?>