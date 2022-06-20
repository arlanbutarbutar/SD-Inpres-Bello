<?php if(isset($_SESSION['id-guru']) || isset($_SESSION['id-siswa'])){
  header("Location: ../"); exit();
}