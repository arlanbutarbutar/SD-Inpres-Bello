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
  <div class="top_container" style="background-image: url('assets/img/bg-header.png');z-index: 0;background-size: cover;height: 100vh;">
    <!-- header section strats -->
    <?php require_once("../resources/layout/navbar-visitor.php"); ?>
    <section class="hero_section mt-5">
      <div class="hero-container container">
        <div class="row align-items-center">
          <div class="col-lg-5 text-center">
            <div class="hero_detail-box">
              <h2>
                Login to
              </h2>
              <h1>
                SD Inpres Bello
              </h1>
              <div class="auth-form-container text-center mt-4">
                <form class="auth-form login-form" method="POST">
                  <div class="email mb-3">
                    <label class="sr-only" for="nip">NIK</label>
                    <input id="nip" name="nip" value="<?php if (isset($_POST['nip'])) {
                                                        echo $_POST['nip'];
                                                      } ?>" type="number" class="form-control text-center" placeholder="NIK" required="required">
                  </div>
                  <div class="password mb-3">
                    <label class="sr-only" for="password">Password</label>
                    <input id="password" name="password" type="password" class="form-control text-center" placeholder="Password" required="required">
                  </div>
                  <div class="text-center">
                    <button type="submit" name="login" class="btn w-100 theme-btn mx-auto text-white" style="background-color: #082465;">Log In</button>
                  </div>
                </form>
    
              </div>
              <!--//auth-form-container-->
            </div>
          </div>
          <div class="col-lg-7">
            <img src="../assets/img/login.svg" alt="">
          </div>
        </div>
      </div>
    </section>
  </div>
  <?php require_once("../resources/pattern/footer-js.php"); ?>
</body>

</html>