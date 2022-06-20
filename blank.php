<?php require_once('controller/script.php');
require_once('controller/redirect-unusers.php');
$_SESSION['page-name'] = "";
$_SESSION['page-to'] = "";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php require_once("resources/layout/header.php"); ?>
</head>

<body class="app">
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
  <header class="app-header fixed-top">
    <?php require_once("resources/layout/navbar.php"); ?>
    <?php require_once("resources/layout/sidebar.php"); ?>
  </header>
  <!--//app-header-->

  <div class="app-wrapper">

    <div class="app-content pt-3 p-md-3 p-lg-4">
      <div class="container-xl">

        <h1 class="app-page-title"><?= $_SESSION['page-name'] ?></h1>

        <div class="row"></div>

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