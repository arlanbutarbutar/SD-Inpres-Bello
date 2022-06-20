<?php require_once('controller/script.php');
require_once('controller/redirect-unusers.php');
$_SESSION['page-name'] = "Cetak Laporan";
$_SESSION['page-to'] = "cetak-laporan";
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
        <div class="row g-3 mb-4 align-items-center justify-content-between">
          <div class="col-auto">
            <h1 class="app-page-title mb-0"><?= $_SESSION['page-name'] ?></h1>
          </div>
          <!--//col-auto-->
        </div>

        <div class="row g-4">
          <div class="col-6 col-md-4 col-xl-3 col-xxl-2">
            <div class="app-card app-card-doc shadow-sm h-100">
              <div class="app-card-thumb-holder p-3">
                <span class="icon-holder">
                  <i class="fas fa-file-pdf pdf-file"></i>
                </span>
                <a class="app-card-link-mask" href="nilai-siswa"></a>
              </div>
              <div class="app-card-body p-3 has-card-actions">

                <h4 class="app-doc-title truncate mb-0"><a href="#file-link">Cetak Nilai Siswa</a></h4>
                <div class="app-doc-meta">
                  <ul class="list-unstyled mb-0">
                    <li><span class="text-muted">Type:</span> PDF</li>
                    <li><span class="text-muted">Size:</span> -</li>
                  </ul>
                </div>
                <!--//app-doc-meta-->

                <div class="app-card-actions">
                  <div class="dropdown">
                    <div class="dropdown-toggle no-toggle-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                      <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-three-dots-vertical" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                      </svg>
                    </div>
                    <!--//dropdown-toggle-->
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="<?php if ($_SESSION['akses'] <= 2) {
                                                            echo "nilai-siswa-pdf";
                                                          } else if ($_SESSION['akses'] == 3) {
                                                            echo "nilai-pdf";
                                                          } ?>" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer me-2" viewBox="0 0 16 16">
                            <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z" />
                            <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z" />
                          </svg>Print</a></li>
                      <?php if ($_SESSION['akses'] <= 2) { ?>
                        <li><a class="dropdown-item" href="nilai-siswa"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil me-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5L13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175l-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                            </svg>Ubah</a></li>
                      <?php } ?>
                      <li><a class="dropdown-item" href="<?php if ($_SESSION['akses'] <= 2) {
                                                            echo "nilai-siswa-export";
                                                          } else if ($_SESSION['akses'] == 3) {
                                                            echo "nilai-export";
                                                          } ?>" target="_blank"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-download me-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                            <path fill-rule="evenodd" d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                          </svg>Unduh</a></li>
                    </ul>
                  </div>
                  <!--//dropdown-->
                </div>
                <!--//app-card-actions-->

              </div>
              <!--//app-card-body-->

            </div>
            <!--//app-card-->
          </div>
          <!--//col-->
          <?php if ($_SESSION['akses'] == 3) { ?>
            <div class="col-6 col-md-4 col-xl-3 col-xxl-2">
              <div class="app-card app-card-doc shadow-sm h-100">
                <div class="app-card-thumb-holder p-3">
                  <span class="icon-holder">
                    <i class="fas fa-file-pdf pdf-file"></i>
                  </span>
                  <a class="app-card-link-mask" href="jadwal"></a>
                </div>
                <div class="app-card-body p-3 has-card-actions">

                  <h4 class="app-doc-title truncate mb-0"><a href="#file-link">Cetak Jadwal</a></h4>
                  <div class="app-doc-meta">
                    <ul class="list-unstyled mb-0">
                      <li><span class="text-muted">Type:</span> PDF</li>
                      <li><span class="text-muted">Size:</span> -</li>
                    </ul>
                  </div>
                  <!--//app-doc-meta-->

                  <div class="app-card-actions">
                    <div class="dropdown">
                      <div class="dropdown-toggle no-toggle-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-three-dots-vertical" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd" d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                        </svg>
                      </div>
                      <!--//dropdown-toggle-->
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="jadwal-pdf" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer me-2" viewBox="0 0 16 16">
                              <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z" />
                              <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z" />
                            </svg>Print</a></li>
                        <li><a class="dropdown-item" href="jadwal-export" target="_blank"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-download me-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                              <path fill-rule="evenodd" d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                            </svg>Unduh</a></li>
                      </ul>
                    </div>
                    <!--//dropdown-->
                  </div>
                  <!--//app-card-actions-->

                </div>
                <!--//app-card-body-->

              </div>
              <!--//app-card-->
            </div>
            <!--//col-->
          <?php } ?>
        </div>
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