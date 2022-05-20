<?php require_once("../controller/script.php");
if(isset($_SESSION['id-guru'])){
  $_SESSION = [];
  session_unset();
  session_destroy();
  header("Location: login"); exit();
}
