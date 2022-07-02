<div id="app-sidepanel" class="app-sidepanel">
  <div id="sidepanel-drop" class="sidepanel-drop"></div>
  <div class="sidepanel-inner d-flex flex-column">
    <a href="#" id="sidepanel-close" class="sidepanel-close d-xl-none">&times;</a>
    <div class="app-branding">
      <a class="app-logo" href="./"><span class="logo-text">SD Inpres Bello</span></a>

    </div>
    <!--//app-branding-->

    <nav id="app-nav-main" class="app-nav app-nav-main flex-grow-1">
      <ul class="app-menu list-unstyled accordion" id="menu-accordion">
        <li class="nav-item">
          <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
          <a class="nav-link <?php if ($_SESSION['page-to'] == "./") {
                                echo "active";
                              } ?>" href="./">
            <span class="nav-icon">
              <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-house-door" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M7.646 1.146a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 .146.354v7a.5.5 0 0 1-.5.5H9.5a.5.5 0 0 1-.5-.5v-4H7v4a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .146-.354l6-6zM2.5 7.707V14H6v-4a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v4h3.5V7.707L8 2.207l-5.5 5.5z" />
                <path fill-rule="evenodd" d="M13 2.5V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
              </svg>
            </span>
            <span class="nav-link-text">Dashboard</span>
          </a>
          <!--//nav-link-->
        </li>
        <?php if ($_SESSION['akses'] == 1) { ?>
          <li class="nav-item has-submenu">
            <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
            <a class="nav-link submenu-toggle <?php if ($_SESSION['page-to'] == "guru") {
                                                echo "active";
                                              } ?>" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-1" aria-expanded="false" aria-controls="submenu-1">
              <span class="nav-icon">
                <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-workspace" viewBox="0 0 16 16">
                  <path d="M4 16s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H4Zm4-5.95a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
                  <path d="M2 1a2 2 0 0 0-2 2v9.5A1.5 1.5 0 0 0 1.5 14h.653a5.373 5.373 0 0 1 1.066-2H1V3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v9h-2.219c.554.654.89 1.373 1.066 2h.653a1.5 1.5 0 0 0 1.5-1.5V3a2 2 0 0 0-2-2H2Z" />
                </svg>
              </span>
              <span class="nav-link-text">Guru</span>
              <span class="submenu-arrow">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                </svg>
              </span>
              <!--//submenu-arrow-->
            </a>
            <!--//nav-link-->
            <div id="submenu-1" class="collapse submenu submenu-1 <?php if ($_SESSION['page-to'] == "guru") {
                                                                    echo "show";
                                                                  } ?>" data-bs-parent="#menu-accordion">
              <ul class="submenu-list list-unstyled">
                <li class="submenu-item"><a class="submenu-link <?php if ($_SESSION['page-to'] == "guru") {
                                                                  echo "active";
                                                                } ?>" href="guru">Data Guru</a></li>
              </ul>
            </div>
          </li>
        <?php }
        if ($_SESSION['akses'] <= 2) { ?>
          <li class="nav-item has-submenu">
            <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
            <a class="nav-link submenu-toggle <?php if ($_SESSION['page-to'] == "siswa" || $_SESSION['page-to'] == "siswa-lulus" || $_SESSION['page-to'] == "kelas" || $_SESSION['page-to'] == "mapel" || $_SESSION['page-to'] == "nilai-siswa" || $_SESSION['page-to'] == "nilai-siswa-terbaik" || $_SESSION['page-to'] == "jadwal" || $_SESSION['page-to'] == "absensi") {
                                                echo "active";
                                              } ?>" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-2" aria-expanded="false" aria-controls="submenu-2">
              <span class="nav-icon">
                <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-mortarboard" viewBox="0 0 16 16">
                  <path d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917l-7.5-3.5ZM8 8.46 1.758 5.965 8 3.052l6.242 2.913L8 8.46Z" />
                  <path d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466 4.176 9.032Zm-.068 1.873.22-.748 3.496 1.311a.5.5 0 0 0 .352 0l3.496-1.311.22.748L8 12.46l-3.892-1.556Z" />
                </svg>
              </span>
              <span class="nav-link-text">Siswa</span>
              <span class="submenu-arrow">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                </svg>
              </span>
              <!--//submenu-arrow-->
            </a>
            <!--//nav-link-->
            <div id="submenu-2" class="collapse submenu submenu-2 <?php if ($_SESSION['page-to'] == "siswa" || $_SESSION['page-to'] == "siswa-lulus" || $_SESSION['page-to'] == "kelas" || $_SESSION['page-to'] == "mapel" || $_SESSION['page-to'] == "nilai-siswa" || $_SESSION['page-to'] == "nilai-siswa-terbaik" || $_SESSION['page-to'] == "jadwal" || $_SESSION['page-to'] == "absensi") {
                                                                    echo "show";
                                                                  } ?>" data-bs-parent="#menu-accordion">
              <ul class="submenu-list list-unstyled">
                <li class="submenu-item"><a class="submenu-link <?php if ($_SESSION['page-to'] == "siswa") {
                                                                  echo "active";
                                                                } ?>" href="siswa">Siswa Aktif</a></li>
                <li class="submenu-item"><a class="submenu-link <?php if ($_SESSION['page-to'] == "siswa-lulus") {
                                                                  echo "active";
                                                                } ?>" href="siswa-lulus">Siswa Lulus</a></li>
                <?php if ($_SESSION['akses'] == 1) { ?>
                  <li class="submenu-item"><a class="submenu-link <?php if ($_SESSION['page-to'] == "kelas") {
                                                                    echo "active";
                                                                  } ?>" href="kelas">Kelas</a></li>
                  <li class="submenu-item"><a class="submenu-link <?php if ($_SESSION['page-to'] == "mapel") {
                                                                    echo "active";
                                                                  } ?>" href="mapel">Mata Pelajaran</a></li>
                <?php } ?>
                <li class="submenu-item"><a class="submenu-link <?php if ($_SESSION['page-to'] == "nilai-siswa") {
                                                                  echo "active";
                                                                } ?>" href="nilai-siswa">Nilai Siswa</a></li>
                <li class="submenu-item"><a class="submenu-link <?php if ($_SESSION['page-to'] == "jadwal") {
                                                                  echo "active";
                                                                } ?>" href="jadwal">Jadwal</a></li>
                <?php if ($_SESSION['akses'] == 2) { ?>
                  <li class="submenu-item"><a class="submenu-link <?php if ($_SESSION['page-to'] == "absensi") {
                                                                    echo "active";
                                                                  } ?>" href="absensi">Absensi</a></li>
                <?php } ?>
              </ul>
            </div>
          </li>
        <?php }
        if ($_SESSION['akses'] == 3) { ?>
          <li class="nav-item">
            <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
            <a class="nav-link <?php if ($_SESSION['page-to'] == "jadwal") {
                                  echo "active";
                                } ?>" href="jadwal">
              <span class="nav-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-alarm" viewBox="0 0 16 16">
                  <path d="M8.5 5.5a.5.5 0 0 0-1 0v3.362l-1.429 2.38a.5.5 0 1 0 .858.515l1.5-2.5A.5.5 0 0 0 8.5 9V5.5z" />
                  <path d="M6.5 0a.5.5 0 0 0 0 1H7v1.07a7.001 7.001 0 0 0-3.273 12.474l-.602.602a.5.5 0 0 0 .707.708l.746-.746A6.97 6.97 0 0 0 8 16a6.97 6.97 0 0 0 3.422-.892l.746.746a.5.5 0 0 0 .707-.708l-.601-.602A7.001 7.001 0 0 0 9 2.07V1h.5a.5.5 0 0 0 0-1h-3zm1.038 3.018a6.093 6.093 0 0 1 .924 0 6 6 0 1 1-.924 0zM0 3.5c0 .753.333 1.429.86 1.887A8.035 8.035 0 0 1 4.387 1.86 2.5 2.5 0 0 0 0 3.5zM13.5 1c-.753 0-1.429.333-1.887.86a8.035 8.035 0 0 1 3.527 3.527A2.5 2.5 0 0 0 13.5 1z" />
                </svg>
              </span>
              <span class="nav-link-text">Jadwal</span>
            </a>
            <!--//nav-link-->
          </li>
          <li class="nav-item">
            <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
            <a class="nav-link <?php if ($_SESSION['page-to'] == "nilai") {
                                  echo "active";
                                } ?>" href="nilai">
              <span class="nav-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-123" viewBox="0 0 16 16">
                  <path d="M2.873 11.297V4.142H1.699L0 5.379v1.137l1.64-1.18h.06v5.961h1.174Zm3.213-5.09v-.063c0-.618.44-1.169 1.196-1.169.676 0 1.174.44 1.174 1.106 0 .624-.42 1.101-.807 1.526L4.99 10.553v.744h4.78v-.99H6.643v-.069L8.41 8.252c.65-.724 1.237-1.332 1.237-2.27C9.646 4.849 8.723 4 7.308 4c-1.573 0-2.36 1.064-2.36 2.15v.057h1.138Zm6.559 1.883h.786c.823 0 1.374.481 1.379 1.179.01.707-.55 1.216-1.421 1.21-.77-.005-1.326-.419-1.379-.953h-1.095c.042 1.053.938 1.918 2.464 1.918 1.478 0 2.642-.839 2.62-2.144-.02-1.143-.922-1.651-1.551-1.714v-.063c.535-.09 1.347-.66 1.326-1.678-.026-1.053-.933-1.855-2.359-1.845-1.5.005-2.317.88-2.348 1.898h1.116c.032-.498.498-.944 1.206-.944.703 0 1.206.435 1.206 1.07.005.64-.504 1.106-1.2 1.106h-.75v.96Z" />
                </svg>
              </span>
              <span class="nav-link-text">Nilai</span>
            </a>
            <!--//nav-link-->
          </li>
        <?php } ?>
        <li class="nav-item">
          <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
          <a class="nav-link <?php if ($_SESSION['page-to'] == "cetak-laporan") {
                                echo "active";
                              } ?>" href="cetak-laporan">
            <span class="nav-icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-files" viewBox="0 0 16 16">
                <path d="M13 0H6a2 2 0 0 0-2 2 2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h7a2 2 0 0 0 2-2 2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm0 13V4a2 2 0 0 0-2-2H5a1 1 0 0 1 1-1h7a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1zM3 4a1 1 0 0 1 1-1h7a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V4z" />
              </svg>
            </span>
            <span class="nav-link-text">Cetak Laporan</span>
          </a>
          <!--//nav-link-->
        </li>
      </ul>
      <!--//app-menu-->
    </nav>
    <!--//app-nav-->
    <div class="app-sidepanel-footer">
      <nav class="app-nav app-nav-footer">
        <ul class="app-menu footer-menu list-unstyled">
          <!--//nav-item-->
          <li class="nav-item">
            <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
            <a class="nav-link" href="auth/logout">
              <span class="nav-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z" />
                  <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z" />
                </svg>
              </span>
              <span class="nav-link-text">Logout</span>
            </a>
            <!--//nav-link-->
          </li>
          <!--//nav-item-->
        </ul>
        <!--//footer-menu-->
      </nav>
    </div>
    <!--//app-sidepanel-footer-->

  </div>
  <!--//sidepanel-inner-->
</div>