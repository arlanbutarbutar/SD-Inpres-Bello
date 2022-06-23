<?php require_once("controller/script.php"); 
if(isset($_SESSION['id-guru'])){
  header("Location: ./"); exit();
}
if(isset($_SESSION['auth'])){
  unset($_SESSION['auth']);
}
?>

<!DOCTYPE html>
<html style="scroll-behavior: smooth;">

<head>
  <?php require_once("resources/layout/header-visitor.php"); ?>
</head>

<body>
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
  <div class="top_container" style="background-image: url('assets/img/bg-header.jpeg');z-index: 0;background-size: cover;height: 100vh;">
    <!-- header section strats -->
    <?php require_once("resources/layout/navbar-visitor.php"); ?>
    <section class="hero_section mt-5">
      <div class="hero-container container">
        <div class="hero_detail-box">
          <h3>
            Selamat datang di
          </h3>
          <h1>
            SD Inpres Bello
          </h1>
          <div class="hero_btn-continer mt-5">
            <a href="#tentang" class="call_to-btn btn_white-border shadow">
              <span>
                Lihat Lebih
              </span>
              <img src="assets/img/right-arrow.png" alt="">
            </a>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- end header section -->

  <!-- about section -->
  <section id="tentang" class="about_section layout_padding">
    <div class="container">
      <div class="row align-items-center flex-row-reverse">
        <div class="col-lg-7">
          <div class="about_img-box ">
            <img src="assets/img/tentang.svg" alt="" class="img-fluid w-100">
          </div>
        </div>
        <div class="col-lg-5">
          <h2 class="main-heading ">
            Tentang Sekolah
          </h2>
          <p class="text-center mt-4">
            SD Inpres Bello merupakan suatu Instansi Negeri yang berdiri pada tahun 1983 dan bergerak di bidang pendidikan dasar yang beralamat di jalan. H.R. Koroh, kelurahan Bello kecamatan Maulafa, Kota Kupang. Pada tahun 2022, jumlah guru sebanyak 21 orang terdiri dari guru laki-laki berjumlah 7 orang dan guru perempuan berjumlah 14 orang. Jumlah siswa dari kelas satu sampai kelas enam sebanyak 344 orang yang terdiri dari siswa laki-laki berjumlah 176 orang, dan siswa perempuan berjumlah 168 orang.
          </p>
        </div>
      </div>
    </div>
  </section>
  <!-- about section -->

  <!-- about section -->
  <section id="profil" class="about_section layout_padding">
    <div class="container">
      <div class="row">
        <div class="col-lg-7">
          <div class="about_img-box ">
            <img src="assets/img/profil.svg" alt="" class="img-fluid w-100">
          </div>
        </div>
        <div class="col-lg-5">
          <h2 class="main-heading ">
            Profil Sekolah
          </h2>
          <table class="table table-hover">
            <tbody>
              <tr>
                <th scope="row">Nama Sekolah</th>
                <td>:</td>
                <td>SD NEGERI BELLO</td>
              </tr>
              <tr>
                <th scope="row">NPSN</th>
                <td>:</td>
                <td>50305243</td>
              </tr>
              <tr>
                <th scope="row">Tipe Sekolah</th>
                <td>:</td>
                <td>B</td>
              </tr>
              <tr>
                <th scope="row">Alamat Sekolah</th>
                <td>:</td>
                <td>Jln. H.R. Koroh Km 09, BELLO, Kec. Maulafa, Kota Kupang Prov. Nusa Tenggara Timur</td>
              </tr>
              <tr>
                <th scope="row">Kode Pos</th>
                <td>:</td>
                <td>85145</td>
              </tr>
              <tr>
                <th scope="row">Desa/Kelurahan</th>
                <td>:</td>
                <td>BELLO</td>
              </tr>
              <tr>
                <th scope="row">Kecamatan/Kota</th>
                <td>:</td>
                <td>Kec. Maulafa</td>
              </tr>
              <tr>
                <th scope="row">Kab.-Kota/Negara</th>
                <td>:</td>
                <td>Kota Kupang</td>
              </tr>
              <tr>
                <th scope="row">Propinsi/Luar Negeri</th>
                <td>:</td>
                <td>Prov. Nusa Tenggara Timur</td>
              </tr>
              <tr>
                <th scope="row">Status Sekolah</th>
                <td>:</td>
                <td>NEGERI</td>
              </tr>
              <tr>
                <th scope="row">Waktu Penyelenggaraan</th>
                <td>:</td>
                <td>Double Shift/6 hari</td>
              </tr>
              <tr>
                <th scope="row">Jenjang Pendidikan</th>
                <td>:</td>
                <td>SD</td>
              </tr>
              <tr>
                <th scope="row">Email</th>
                <td>:</td>
                <td>sdninpresbello@gmail.com</td>
              </tr>
              <tr>
                <th scope="row">Luas Tanah</th>
                <td>:</td>
                <td>5,170 m2</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
  <!-- about section -->

  <!-- visi misi section -->
  <section id="visi-misi" class="about_section layout_padding">
    <div class="container">
      <div class="row align-items-center flex-row-reverse">
        <div class="col-lg-7">
          <div class="about_img-box ">
            <img src="assets/img/visi-misi.svg" alt="" class="img-fluid w-100">
          </div>
        </div>
        <div class="col-lg-5">
          <h2 class="main-heading ">
            Visi
          </h2>
          <p class="text-center mt-4">
            Luhur dalam pekerti, prima, dalam prestasi, santun dalam berperilaku.
          </p>
          <h2 class="main-heading ">
            Misi
          </h2>
          <p class="mt-4">
            <ol type="1">
              <li>Membrikan dasar-dasar keimanan dan ketakwaan terhadap Tuhan Yang Maha Esa.</li>
              <li>Meningkatkan disiplin belajar mengajar.</li>
              <li>Menciptakan suasana belajar yang aktif, kreatif, efektif dan menyenangkan.</li>
              <li>Meningkatkan kegiatan ekstrakurikuler</li>
              <li>Pembinaan prestasi siswa dalam ilmu pengetahuan, keagamaan, seni dan olahraga.</li>
              <li>Memupuk atau menumbuhkan kembangkan rasa cinta terhadap sasama manusia dan lingkungannya.</li>
              <li>Membiasakan siswa hidup bersih.</li>
              <li>Mengembangkan nilai-nilai budi pekerti luhur.</li>
              <li>Meningkatkan profesionalisme guru atau personil.</li>
              <li>Membina hubungan sekolah dengan komite sekolah dan masyarakat sekitar sekolah.</li>
            </ol>
          </p>
        </div>
      </div>
    </div>
  </section>
  <!-- visi misi section -->

  <!-- galeri section -->
  <section id="galeri" class="teacher_section layout_padding-bottom">
    <div class="container">
      <h2 class="main-heading">
        Galeri
      </h2>
      <div class="teacher_container layout_padding2">
        <div class="row align-items-center justify-content-between">
          <div class="col-lg-4">
            <div class="card shadow mt-3">
              <img class="card-img-top" src="assets/img/galery/g1.jpeg" alt="Card image cap">
            </div>
          </div>
          <div class="col-lg-4">
            <div class="card shadow mt-3">
              <div class="card shadow">
                <img class="card-img-top" src="assets/img/galery/g2.jpeg" alt="Card image cap">
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="card shadow mt-3">
              <div class="card shadow">
                <img class="card-img-top" src="assets/img/galery/g3.jpeg" alt="Card image cap">
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="card shadow mt-3">
              <div class="card shadow">
                <img class="card-img-top" src="assets/img/galery/g4.jpeg" alt="Card image cap">
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="card shadow mt-3">
              <div class="card shadow">
                <img class="card-img-top" src="assets/img/galery/g5.jpeg" alt="Card image cap">
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="card shadow mt-3">
              <div class="card shadow">
                <img class="card-img-top" src="assets/img/galery/g6.jpeg" alt="Card image cap">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- galeri section -->
  
  <!-- contact section -->
  <section id="kontak" class="contact_section layout_padding">
    <div class="container">
      <h2 class="main-heading">
        Kontak
      </h2>
      <div class="">
        <div class="contact_section-container">
          <div class="row">
            <div class="col-md-6 mx-auto">
              <div class="contact-form">
                <form action="" method="post">
                  <div>
                    <input type="text" name="name" placeholder="Name" required>
                  </div>
                  <div>
                    <input type="email" name="email" placeholder="Email" required>
                  </div>
                  <div>
                    <input type="text" name="message" placeholder="Message" class="input_message" required>
                  </div>
                  <div class="d-flex justify-content-center">
                    <button type="submit" name="kontak" class="btn_on-hover">
                      Send
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end contact section -->

  <?php require_once("resources/layout/footer-visitor.php"); ?>
  <?php require_once("resources/pattern/footer-js.visitor.php"); ?>

</body>

</html>