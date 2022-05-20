<?php require_once("../controller/script.php");
  require_once("../controller/redirect-users.php");
  $_SESSION['page-name']="Login"; $_SESSION['page-to']="login"; $_SESSION['auth']=1;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php require_once("../resources/layout/header.php");?>
  </head>
  <body class="bg-gradient-primary">
    <?php if(isset($_SESSION['message-success'])){?>
    <div class="message-success" data-message-success="<?= $_SESSION['message-success']?>"></div>
    <?php } if(isset($_SESSION['message-info'])){?>
    <div class="message-info" data-message-info="<?= $_SESSION['message-info']?>"></div>
    <?php } if(isset($_SESSION['message-warning'])){?>
    <div class="message-warning" data-message-warning="<?= $_SESSION['message-warning']?>"></div>
    <?php } if(isset($_SESSION['message-danger'])){?>
    <div class="message-danger" data-message-danger="<?= $_SESSION['message-danger']?>"></div>
    <?php }?>
    <div class="container">
      <!-- Outer Row -->
      <div class="row justify-content-center">
        <div class="col-md-4">
          <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 font-weight-bold">Login</h1>
                  <h4 class="text-gray-900 mb-4">SD Inpres Bello</h4>
                </div>
                <form class="user" method="POST">
                  <div class="form-group">
                    <input type="number" name="nip" value="<?php if(isset($_POST['nip'])){echo $_POST['nip'];}?>" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="NIP" required>
                  </div>
                  <div class="form-group">
                    <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" required>
                  </div>
                  <button type="submit" name="login" class="btn btn-primary btn-user btn-block">Login</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php require_once("../resources/pattern/footer-js.php");?>
  </body>
</html>