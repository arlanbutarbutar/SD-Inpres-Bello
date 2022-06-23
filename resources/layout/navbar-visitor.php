<header class="header_section bg-white shadow">
  <div class="container">
    <nav class="navbar navbar-expand-lg custom_nav-container ">
      <a class="navbar-brand" href="<?php if(isset($_SESSION['auth'])){echo "../";}?>beranda">
        <img src="<?php if(isset($_SESSION['auth'])){echo "../";}?>assets/img/tut-wuri-handayani.png" style="width: 50px;" alt="Logo">
        <span class="text-dark">
          SD Inpres Bello
        </span>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <div class="d-flex ml-auto flex-column flex-lg-row align-items-center">
          <ul class="navbar-nav  ">
            <li class="nav-item">
              <a class="nav-link" href="<?php if(isset($_SESSION['auth'])){echo "../";}?>beranda"> Beranda </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php if(isset($_SESSION['auth'])){echo "../";}?>beranda#profil"> Profil </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php if(isset($_SESSION['auth'])){echo "../";}?>beranda#visi-misi"> Visi & Misi </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php if(isset($_SESSION['auth'])){echo "../";}?>beranda#galeri"> Galeri </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php if(isset($_SESSION['auth'])){echo "../";}?>beranda#kontak"> Kontak </a>
            </li>
            <li class="nav-item">
              <a class="btn btn-primary rounded-pill shadow" href="auth/login"> Login </a>
            </li>
          </ul>
        </div>
    </nav>
  </div>
</header>