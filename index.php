<?php require_once('controller/script.php');
  require_once('controller/redirect-unusers.php');
  $_SESSION['page-name']="Dashboard"; $_SESSION['page-to']="./";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php require_once("resources/layout/header.php");?>
  </head>
  <body id="page-top">
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
            <!-- Content Row -->
            <div class="row">
              <div class="col-md-12">
                <h5 class="text-dark">Selamat datang <?= $_SESSION['nama-guru']?>!</h5>
              </div>
            </div>
            <!-- Content Row -->
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