<?php require_once('controller/script.php');
require_once('controller/redirect-unusers.php');
$_SESSION['page-name'] = "Dashboard";
$_SESSION['page-to'] = "./";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php require_once("resources/layout/header.php"); ?>
</head>

<body class="app">
  <header class="app-header fixed-top">
    <?php require_once("resources/layout/navbar.php"); ?>
    <?php require_once("resources/layout/sidebar.php"); ?>
  </header>
  <!--//app-header-->

  <div class="app-wrapper">

    <div class="app-content pt-3 p-md-3 p-lg-4" style="height: 85vh;">
      <div class="container-xl">

        <h1 class="app-page-title"><?= $_SESSION['page-name']?></h1>

        <div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">
          <div class="inner">
            <div class="app-card-body p-3 p-lg-4">
              <h3 class="mb-3">Selamat datang, <?= $_SESSION['nama-guru'] ?>!</h3>
              <div class="row gx-5 gy-3">
                <div class="col-12 col-lg-8">

                  <div>SD Inpres Bello merupakan suatu Instansi Negeri yang berdiri pada tahun 1983 dan bergerak di bidang pendidikan dasar yang beralamat di jalan. H.R. Koroh, kelurahan Bello kecamatan Maulafa, Kota Kupang.</div>
                </div>
                <!--//col-->
                <div class="col-12 col-lg-4">
                  <img src="assets/img/6528450.jpg" style="max-width: 300px;" alt="">
                </div>
                <!--//col-->
              </div>
            </div>
            <!--//app-card-body-->

          </div>
          <!--//inner-->
        </div>
        <!--//app-card-->

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