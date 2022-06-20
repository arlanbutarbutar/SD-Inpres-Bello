<?php require_once("../controller/script.php");
require_once("../controller/redirect-users.php");
$_SESSION['page-name'] = "Login";
$_SESSION['page-to'] = "login";
$_SESSION['auth'] = 1;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php require_once("../resources/layout/header.php"); ?>
</head>

<body class="app app-login p-0">
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
  <div class="row g-0 app-auth-wrapper">
    <div class="col-12 col-md-7 col-lg-12 auth-main-col text-center p-5">
      <div class="d-flex flex-column align-content-end">
        <div class="app-auth-body mx-auto">
          <h2 class="auth-heading text-center mb-5">Log in to SD Inpres Bello</h2>
          <div class="auth-form-container text-start">
            <form class="auth-form login-form" method="POST">
              <div class="email mb-3">
                <label class="sr-only" for="nip">NIP</label>
                <input id="nip" name="nip" value="<?php if (isset($_POST['nip'])) {
                                                    echo $_POST['nip'];
                                                  } ?>" type="number" class="form-control nip" placeholder="NIP" required="required">
              </div>
              <div class="password mb-3">
                <label class="sr-only" for="password">Password</label>
                <input id="password" name="password" type="password" class="form-control password" placeholder="Password" required="required">
              </div>
              <div class="text-center">
                <button type="submit" name="login" class="btn app-btn-primary w-100 theme-btn mx-auto">Log In</button>
              </div>
            </form>

          </div>
          <!--//auth-form-container-->

        </div>
        <!--//auth-body-->

        <?php require_once("../resources/layout/footer.php"); ?>
        <?php require_once("../resources/pattern/footer-js.php"); ?>
</body>

</html>