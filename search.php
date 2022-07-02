<?php require_once('controller/script.php');
if ($_SESSION['page-to'] == "siswa") {
  if (isset($_GET['key'])) {
    $key = addslashes(trim($_GET['key']));
    if ($_SESSION['akses'] == 1) {
      $query = "SELECT * FROM siswa 
        JOIN kelas ON kelas.id_kelas=siswa.id_kelas 
        WHERE siswa.status_siswa=1
        AND siswa.nik LIKE '%$key%' 
        OR siswa.nisn LIKE '%$key%' 
        AND siswa.status_siswa=1
        OR siswa.nama_siswa LIKE '%$key%' 
        AND siswa.status_siswa=1
        OR kelas.nama_kelas LIKE '%$key%' 
        AND siswa.status_siswa=1
        ORDER BY siswa.id_siswa DESC
      ";
    } else if ($_SESSION['akses'] == 2) {
      $id_guru = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $_SESSION['id-guru']))));
      $query = "SELECT * FROM siswa 
        JOIN kelas ON kelas.id_kelas=siswa.id_kelas 
        WHERE siswa.nik LIKE '%$key%' 
        AND kelas.id_guru='$id_guru' 
        AND siswa.status_siswa=1
        OR siswa.nisn LIKE '%$key%' 
        AND kelas.id_guru='$id_guru' 
        AND siswa.status_siswa=1
        OR siswa.nama_siswa LIKE '%$key%' 
        AND kelas.id_guru='$id_guru' 
        AND siswa.status_siswa=1
        OR kelas.nama_kelas LIKE '%$key%' 
        AND kelas.id_guru='$id_guru' 
        AND siswa.status_siswa=1
        ORDER BY siswa.id_siswa DESC
      ";
    }
    $siswa = mysqli_query($conn, $query);
  }if (mysqli_num_rows($siswa) == 0) { ?>
    <tr>
      <th scope="row" colspan="<?php if ($_SESSION['akses'] == 1) {echo "11";} else {echo "9";} ?>">Belum ada data</th>
    </tr>
    <?php }$no = 1;if (mysqli_num_rows($siswa) > 0) {while ($row = mysqli_fetch_assoc($siswa)) { ?>
      <tr>
        <th scope="row"><?= $no; ?></th>
        <td><?= $row['nik'] ?></td>
        <td><?= $row['nisn'] ?></td>
        <td><?= $row['nama_siswa'] ?></td>
        <td><?= $row['nama_kelas'] ?> <?php if($_SESSION['akses']==2){?><span style="cursor: pointer;" class="badge badge-success shadow" data-toggle="modal" data-target="#exampleModal">Ubah</span><?php }?></td>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
    <?php $no++;
    }
  }
}
if ($_SESSION['page-to'] == "siswa-lulus") {
  if (isset($_GET['key'])) {
    $key = addslashes(trim($_GET['key']));
    if ($_SESSION['akses'] == 1) {
      $query = "SELECT * FROM siswa 
        JOIN kelas ON kelas.id_kelas=siswa.id_kelas 
        WHERE siswa.status_siswa=2
        AND siswa.nik LIKE '%$key%' 
        OR siswa.nisn LIKE '%$key%' 
        AND siswa.status_siswa=2
        OR siswa.nama_siswa LIKE '%$key%' 
        AND siswa.status_siswa=2
        OR kelas.nama_kelas LIKE '%$key%' 
        AND siswa.status_siswa=2
        ORDER BY siswa.id_siswa DESC
      ";
    } else if ($_SESSION['akses'] == 2) {
      $id_guru = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $_SESSION['id-guru']))));
      $query = "SELECT * FROM siswa 
        JOIN kelas ON kelas.id_kelas=siswa.id_kelas 
        WHERE siswa.nik LIKE '%$key%' 
        AND kelas.id_guru='$id_guru' 
        AND siswa.status_siswa=2
        OR siswa.nisn LIKE '%$key%' 
        AND kelas.id_guru='$id_guru' 
        AND siswa.status_siswa=2
        OR siswa.nama_siswa LIKE '%$key%' 
        AND kelas.id_guru='$id_guru' 
        AND siswa.status_siswa=2
        OR kelas.nama_kelas LIKE '%$key%' 
        AND kelas.id_guru='$id_guru' 
        AND siswa.status_siswa=2
        ORDER BY siswa.id_siswa DESC
      ";
    }
    $siswa = mysqli_query($conn, $query);
  }if (mysqli_num_rows($siswa) == 0) { ?>
    <tr>
      <th scope="row" colspan="9">Belum ada data</th>
    </tr>
    <?php }$no = 1;if (mysqli_num_rows($siswa) > 0) {while ($row = mysqli_fetch_assoc($siswa)) { 
      $tgl_lulus=date_create($row['tgl_lulus']);
      $tgl_lulus=date_format($tgl_lulus, "d M Y");?>
      <tr>
        <th scope="row"><?= $no; ?></th>
        <td><?= $row['nik'] ?></td>
        <td><?= $row['nisn'] ?></td>
        <td><?= $row['nama_siswa'] ?></td>
        <td><?= $row['jenis_kelamin'] ?></td>
        <td><?= $row['ttl'] ?></td>
        <td><?= $row['nama_ibu'] ?></td>
        <td><?= $row['tahunajar'] ?></td>
        <td><?= $tgl_lulus ?></td>
      </tr>
    <?php $no++;
    }
  }
}
if ($_SESSION['page-to'] == "guru") {
  if (isset($_GET['key'])) {
    $key = addslashes(trim($_GET['key']));
    $query = "SELECT * FROM guru 
      WHERE nik!='$nip' 
      AND nik LIKE '%$key%' 
      OR nip LIKE '%$key%' 
      AND nik!='$nip' 
      OR nama_guru LIKE '%$key%' 
      AND nik!='$nip' 
      OR nuptk LIKE '%$key%' 
      AND nik!='$nip' 
      ORDER BY id_guru DESC
    ";
    $guru = mysqli_query($conn, $query);
  }
  if (mysqli_num_rows($guru) == 0) { ?>
    <tr>
      <th scope="row" colspan="11">Belum ada data</th>
    </tr>
    <?php }
  $no = 1;
  if (mysqli_num_rows($guru) > 0) {
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
  }
}
if ($_SESSION['page-to'] == "kelas") {
  if (isset($_GET['key'])) {
    $key = addslashes(trim($_GET['key']));
    $query = "SELECT * FROM kelas 
      JOIN guru ON kelas.id_guru=guru.id_guru 
      WHERE kelas.nama_kelas LIKE '%$key%' 
      OR kelas.semester LIKE '%$key%' 
      OR kelas.tahunajar LIKE '%$key%' 
      OR guru.nama_guru LIKE '%$key%' 
      ORDER BY id_kelas DESC
    ";
    $kelas = mysqli_query($conn, $query);
  }
  $no = 1;
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
  }
}
if ($_SESSION['page-to'] == "mapel") {
  if (isset($_GET['key'])) {
    $key = addslashes(trim($_GET['key']));
    $query = "SELECT * FROM mapel 
      WHERE nama_mapel LIKE '%$key%' 
      ORDER BY id_mapel DESC
    ";
    $mapel = mysqli_query($conn, $query);
  }
  $no = 1;
  if (mysqli_num_rows($mapel) == 0) { ?>
    <tr>
      <th scope="row" colspan="4">Belum ada data</th>
    </tr>
    <?php } else if (mysqli_num_rows($mapel) > 0) {
    while ($row = mysqli_fetch_assoc($mapel)) { ?>
      <tr>
        <th scope="row"><?= $no; ?></th>
        <td><?= $row['nama_mapel'] ?></td>
        <td>
          <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#ubah-mapel<?= $row['id_mapel'] ?>">Ubah</button>
          <div class="modal fade" id="ubah-mapel<?= $row['id_mapel'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Ubah Mapel</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="" method="POST">
                  <div class="modal-body">
                    <div class="form-group">
                      <label for="mapel">Mata pelajaran</label>
                      <input type="text" name="mapel" id="mapel" value="<?php if (isset($_POST['mapel'])) {
                                                                          echo $_POST['mapel'];
                                                                        } else {
                                                                          echo $row['nama_mapel'];
                                                                        } ?>" class="form-control" placeholder="Mata pelajaran" required>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <input type="hidden" name="id-mapel" value="<?= $row['id_mapel'] ?>">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" name="ubah-mapel" class="btn btn-warning">Ubah</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </td>
        <td>
          <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapus-mapel<?= $row['id_mapel'] ?>">Hapus</button>
          <div class="modal fade" id="hapus-mapel<?= $row['id_mapel'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Hapus Mata Pelajaran</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="" method="POST">
                  <div class="modal-body">
                    Yakin anda ingin hapus? pilih "Hapus" untuk melanjutkan.
                  </div>
                  <div class="modal-footer">
                    <input type="hidden" name="id-mapel" value="<?= $row['id_mapel'] ?>">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" name="hapus-mapel" class="btn btn-danger">Hapus</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </td>
      </tr>
    <?php $no++;
    }
  }
}
if ($_SESSION['page-to'] == "nilai-siswa") {
  if (isset($_GET['key'])) {
    $key = addslashes(trim($_GET['key']));
    if ($_SESSION['akses'] == 1) {
      $query = "SELECT * FROM nilai 
        JOIN siswa ON nilai.id_siswa=siswa.id_siswa 
        JOIN kelas ON siswa.id_kelas=kelas.id_kelas 
        JOIN mapel ON nilai.id_mapel=mapel.id_mapel 
        WHERE siswa.nama_siswa LIKE '%$key%' 
        ORDER BY nilai.id_nilai DESC
      ";
    } else if ($_SESSION['akses'] == 2) {
      $id_guru = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $_SESSION['id-guru']))));
      $query = "SELECT * FROM nilai 
        JOIN siswa ON nilai.id_siswa=siswa.id_siswa 
        JOIN kelas ON siswa.id_kelas=kelas.id_kelas 
        JOIN mapel ON nilai.id_mapel=mapel.id_mapel 
        WHERE kelas.id_guru='$id_guru' 
        AND siswa.nama_siswa LIKE '%$key%' 
        OR kelas.nama_kelas LIKE '%$key%' 
        AND kelas.id_guru='$id_guru' 
        OR mapel.nama_mapel LIKE '%$key%' 
        AND kelas.id_guru='$id_guru' 
        ORDER BY nilai.id_nilai DESC
      ";
    }
    $nilai = mysqli_query($conn, $query);
  }
  $no = 1;
  if (mysqli_num_rows($nilai) == 0) { ?>
    <tr>
      <th scope="row" colspan="11">Belum ada data</th>
    </tr>
    <?php } else if (mysqli_num_rows($nilai) > 0) {
    while ($row = mysqli_fetch_assoc($nilai)) {
      $tgl_nilai=date_create($row['tgl_nilai']);
      $tgl_nilai=date_format($tgl_nilai, "d M Y"); ?>
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
  }
}
if ($_SESSION['page-to'] == "jadwal") {
  if (isset($_GET['key'])) {
    $key = addslashes(trim($_GET['key']));
    if ($_SESSION['akses'] == 1) {
      $query = "SELECT * FROM jadwal 
        JOIN kelas ON jadwal.id_kelas=kelas.id_kelas 
        JOIN mapel ON jadwal.id_mapel=mapel.id_mapel 
        WHERE mapel.nama_mapel LIKE '%$key%' 
        OR kelas.nama_kelas LIKE '%$key%' 
        ORDER BY jadwal.id_jadwal DESC
      ";
    } else if ($_SESSION['akses'] == 2) {
      $id_guru = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $_SESSION['id-guru']))));
      $query = "SELECT * FROM jadwal 
        JOIN kelas ON jadwal.id_kelas=kelas.id_kelas 
        JOIN mapel ON jadwal.id_mapel=mapel.id_mapel 
        WHERE kelas.id_guru='$id_guru' 
        AND mapel.nama_mapel LIKE '%$key%' 
        OR kelas.nama_kelas LIKE '%$key%' 
        AND kelas.id_guru='$id_guru'
        ORDER BY jadwal.id_jadwal DESC
      ";
    } else if ($_SESSION['akses'] == 3) {
      $id_kelas = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $_SESSION['id-kelas']))));
      $query = "SELECT * FROM jadwal 
        JOIN kelas ON jadwal.id_kelas=kelas.id_kelas 
        JOIN mapel ON jadwal.id_mapel=mapel.id_mapel 
        WHERE kelas.id_kelas='$id_kelas' 
        AND mapel.nama_mapel LIKE '%$key%' 
        OR kelas.nama_kelas LIKE '%$key%'
        AND kelas.id_kelas='$id_kelas'  
        ORDER BY jadwal.id_jadwal DESC
      ";
    }
    $jadwal = mysqli_query($conn, $query);
  }
  $no = 1;
  if (mysqli_num_rows($jadwal) == 0) { ?>
    <tr>
      <th scope="row" colspan="<?php if ($_SESSION['akses'] == 1) {echo "7";} else {echo "5";} ?>">Belum ada data</th>
    </tr>
    <?php } else if (mysqli_num_rows($jadwal) > 0) {
    while ($row = mysqli_fetch_assoc($jadwal)) { ?>
      <tr>
        <th scope="row"><?= $no; ?></th>
        <td><?= $row['nama_kelas'] ?></td>
        <td><?= $row['nama_mapel'] ?></td>
        <td><?= $row['jam_mulai'] . " - " . $row['jam_akhir'] ?></td>
        <td><?= $row['hari'] ?></td>
        <?php if ($_SESSION['akses'] == 1) { ?>
          <td>
            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#ubah-jadwal<?= $row['id_jadwal'] ?>">Ubah</button>
            <div class="modal fade" id="ubah-jadwal<?= $row['id_jadwal'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <label for="kelas">Kelas</label>
                        <select name="id-kelas" id="kelas" class="form-control" required>
                          <?php 
                            $id_kelas=$row['id_kelas'];
                            $select_kelas=mysqli_query($conn, "SELECT * FROM kelas WHERE id_kelas!='$id_kelas'");
                            $select_kelasView=mysqli_query($conn, "SELECT * FROM kelas WHERE id_kelas='$id_kelas'");
                            $row_kelasView=mysqli_fetch_assoc($select_kelasView);
                          ?>
                          <option value="<?= $row_kelasView['id_kelas']?>"><?= $row_kelasView['nama_kelas']?></option>
                          <?php foreach ($select_kelas as $rowSK) : ?>
                            <option value="<?= $rowSK['id_kelas'] ?>"><?= $rowSK['nama_kelas'] ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="mapel">Mata Pelajaran</label>
                        <select name="id-mapel" id="mapel" class="form-control" required>
                          <?php 
                            $id_mapel=$row['id_mapel'];
                            $select_mapel=mysqli_query($conn, "SELECT * FROM mapel WHERE id_mapel!='$id_mapel'");
                            $select_mapelView=mysqli_query($conn, "SELECT * FROM mapel WHERE id_mapel='$id_mapel'");
                            $row_mapelView=mysqli_fetch_assoc($select_mapelView);
                          ?>
                          <option value="<?= $row_mapelView['id_mapel']?>"><?= $row_mapelView['nama_mapel']?></option>
                          <?php foreach ($select_mapel as $rowSM) : ?>
                            <option value="<?= $rowSM['id_mapel'] ?>"><?= $rowSM['nama_mapel'] ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="jam_mulai">Jam Mulai</label>
                        <input type="time" name="jam_mulai" id="jam_mulai" value="<?php if (isset($_POST['jam_mulai'])) {echo $_POST['jam_mulai'];}else{echo $row['jam_mulai'];} ?>" class="form-control" placeholder="Jam Mulai" required>
                      </div>
                      <div class="form-group">
                        <label for="jam_akhir">Jam Akhir</label>
                        <input type="time" name="jam_akhir" id="jam_akhir" value="<?php if (isset($_POST['jam_akhir'])) {echo $_POST['jam_akhir'];}else{echo $row['jam_akhir'];} ?>" class="form-control" placeholder="Jam Akhir" required>
                      </div>
                      <div class="form-group">
                        <label for="hari">Hari</label>
                        <select name="hari" id="hari" class="form-control" required>
                          <?php
                            $hari=$row['hari'];
                            $select_hari=mysqli_query($conn, "SELECT * FROM hari WHERE nama_hari!='$hari'");
                            $select_hariView=mysqli_query($conn, "SELECT * FROM hari WHERE nama_hari='$hari'");
                            $row_hariView=mysqli_fetch_assoc($select_hariView);
                          ?>
                          <option value="<?= $row_hariView['nama_hari']?>"><?= $row_hariView['nama_hari']?></option>
                          <?php foreach($select_hari as $rowSH):?>
                          <option value="<?= $rowSH['nama_hari']?>"><?= $rowSH['nama_hari']?></option>
                          <?php endforeach;?>
                        </select>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <input type="hidden" name="id-jadwal" value="<?= $row['id_jadwal'] ?>">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                      <button type="submit" name="ubah-jadwal" class="btn btn-warning">Ubah</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </td>
          <td>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapus-jadwal<?= $row['id_jadwal'] ?>">Hapus</button>
            <div class="modal fade" id="hapus-jadwal<?= $row['id_jadwal'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                      <input type="hidden" name="id-jadwal" value="<?= $row['id_jadwal'] ?>">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                      <button type="submit" name="hapus-jadwal" class="btn btn-danger">Hapus</button>
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
}
if ($_SESSION['page-name'] == "Lihat Absensi") {
  if (isset($_GET['key'])) {
    $key = addslashes(trim($_GET['key']));
    $id_mapel=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $_SESSION['id-mapel']))));
    $query = "SELECT * FROM absensi 
      JOIN guru ON absensi.id_guru=guru.id_guru
      JOIN siswa ON absensi.id_siswa=siswa.id_siswa
      JOIN mapel ON absensi.id_mapel=mapel.id_mapel
      JOIN kelas ON absensi.id_kelas=kelas.id_kelas 
      WHERE mapel.id_mapel='$id_mapel'
      AND siswa.nisn LIKE '%$key%' 
      OR siswa.nama_siswa LIKE '%$key%' 
      AND mapel.id_mapel='$id_mapel'
      OR kelas.nama_kelas LIKE '%$key%' 
      AND mapel.id_mapel='$id_mapel'
      OR absensi.status_hadir LIKE '%$key%' 
      AND mapel.id_mapel='$id_mapel'
      ORDER BY absensi.id_absen DESC
    ";
    $siswa_view = mysqli_query($conn, $query);
  }
  $no = 1;
  if (mysqli_num_rows($siswa_view) == 0) { ?>
    <tr>
      <th scope="row" colspan="6">Belum ada data</th>
    </tr>
    <?php } else if (mysqli_num_rows($siswa_view) > 0) {
    while ($row = mysqli_fetch_assoc($siswa_view)) { ?>
      <tr>
        <th scope="row"><?= $no; ?></th>
        <td><?= $row['nisn'] ?></td>
        <td><?= $row['nama_siswa'] ?></td>
        <td><?= $row['nama_kelas'] ?></td>
        <td><?= $row['status_hadir'] ?></td>
        <td><?php $date = date_create($row['tanggal']);
            echo $date = date_format($date, "d M Y") ?></td>
      </tr>
<?php $no++;
    }
  }
} ?>