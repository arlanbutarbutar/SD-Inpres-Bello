<?php require_once("controller/script.php"); 
if(isset($_SESSION['id-guru'])){
  header("Location: ./"); exit();
}
?>

<!DOCTYPE html>
<html style="scroll-behavior: smooth;">

<head>
  <?php require_once("resources/layout/header-visitor.php"); ?>
</head>

<body>
  <div class="top_container">
    <!-- header section strats -->
    <?php require_once("resources/layout/navbar-visitor.php"); ?>
    <section class="hero_section">
      <div class="hero-container container">
        <div class="hero_detail-box">
          <h3>
            Selamat datang di
          </h3>
          <h1>
            SD Inpres Bello
          </h1>
          <div class="hero_btn-continer">
            <a href="#tentang" class="call_to-btn btn_white-border">
              <span>
                Lihat Lebih
              </span>
              <img src="assets/img/right-arrow.png" alt="">
            </a>
          </div>
        </div>
        <div class="hero_img-container">
          <div>
            <img src="assets/img/hero.png" alt="" class="img-fluid">
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- end header section -->

  <!-- about section -->
  <section id="tentang" class="about_section layout_padding" style="height: 100vh;">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-5">
          <h2 class="main-heading ">
            Tentang Sekolah
          </h2>
          <p class="text-center mt-4">
            SD Inpres Bello merupakan suatu Instansi Negeri yang berdiri pada tahun 1983 dan bergerak di bidang pendidikan dasar yang beralamat di jalan. H.R. Koroh, kelurahan Bello kecamatan Maulafa, Kota Kupang. Pada tahun 2022, jumlah guru sebanyak 21 orang terdiri dari guru laki-laki berjumlah 7 orang dan guru perempuan berjumlah 14 orang. Jumlah siswa dari kelas satu sampai kelas enam sebanyak 344 orang yang terdiri dari siswa laki-laki berjumlah 176 orang, dan siswa perempuan berjumlah 168 orang.
          </p>
          <div class="d-flex justify-content-center mt-5">
            <a href="#guru" class="call_to-btn  ">
              <span>
                Guru
              </span>
              <img src="assets/img/right-arrow.png" alt="">
            </a>
          </div>
        </div>
        <div class="col-lg-7">
          <div class="about_img-box ">
            <img src="assets/img/kids.jpg" alt="" class="img-fluid w-100">
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- about section -->

  <?php require_once("resources/layout/footer-visitor.php"); ?>
  <?php require_once("resources/pattern/footer-js.visitor.php"); ?>

</body>

</html>