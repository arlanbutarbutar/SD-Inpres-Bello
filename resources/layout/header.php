<meta charset="utf-8">
<noscript>
  <meta http-equiv="refresh" content="0;url=406" />
</noscript>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">

<title><?php if (isset($_SESSION['page-name'])) {
          echo $_SESSION['page-name'] . " - ";
        } ?>SD Inpres Bello</title>

<link rel="shortcut icon" href="assets/img/tut-wuri-handayani.png">
<!-- Custom fonts for this template-->
<link href="<?php if (isset($_SESSION['auth'])) {
              echo "../";
            } ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

<!-- Custom styles for this template-->
<link href="<?php if (isset($_SESSION['auth'])) {
              echo "../";
            } ?>assets/css/sb-admin-2.min.css" rel="stylesheet">
<!-- FontAwesome JS-->
<script defer src="<?php if (isset($_SESSION['auth'])) {
                      echo "../";
                    } ?>assets/plugins/fontawesome/js/all.min.js"></script>

<!-- App CSS -->
<link id="theme-style" rel="stylesheet" href="<?php if (isset($_SESSION['auth'])) {
                                                echo "../";
                                              } ?>assets/css/portal.css">

<script src="<?php if (isset($_SESSION['auth'])) {
                echo "../";
              } ?>assets/sweetalert/dist/sweetalert2.all.min.js"></script>