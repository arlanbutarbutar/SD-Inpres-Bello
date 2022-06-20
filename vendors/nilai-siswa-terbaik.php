<?php require_once('controller/script.php');
  require_once('controller/redirect-unusers.php');
  $_SESSION['page-name']="Nilai Siswa Terbaik"; $_SESSION['page-to']="nilai-siswa-terbaik.php";
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
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no=1; if(mysqli_num_rows($nilai)==0){?>
                        <tr>
                          <th scope="row" colspan="9">Belum ada data</th>
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