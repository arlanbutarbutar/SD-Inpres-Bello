<?php if(!isset($_SESSION['id-guru'])){
  header("Location: auth/login"); exit();
}