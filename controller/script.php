<?php require_once("db_connect.php"); require_once("functions.php");
  if(!isset($_SESSION[''])){session_start();}
  if (isset($_SESSION['time-message'])) {
    if((time()-$_SESSION['time-message'])>2){
      if(isset($_SESSION['message-success'])){unset($_SESSION['message-success']);}
      if(isset($_SESSION['message-info'])){unset($_SESSION['message-info']);}
      if(isset($_SESSION['message-warning'])){unset($_SESSION['message-warning']);}
      if(isset($_SESSION['message-danger'])){unset($_SESSION['message-danger']);}
      if(isset($_SESSION['message-dark'])){unset($_SESSION['message-dark']);}
      unset($_SESSION['time-alert']);
    }
  }
  if(isset($_POST['login'])){
    if(login($_POST)>0){
      header("Location: ../"); exit();
    }else{
      $_SESSION['message-warning']="Maaf, sepertinya ada kesalahan saat menyambungkan ke database.";
      $_SESSION['time-message']=time();
      header("Location: ".$_SESSION['page-to']); exit();
    }
  }
  if(isset($_SESSION['id-guru'])){
    $nip=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $_SESSION['nip']))));
    $guru=mysqli_query($conn, "SELECT * FROM guru WHERE nip!='$nip'");
    if(isset($_POST['tambah-guru'])){
      if(tambahGuru($_POST)>0){
        $_SESSION['message-success']="Data guru berhasil ditambahkan.";
        $_SESSION['time-message']=time();
        header("Location: ".$_SESSION['page-to']); exit();
      }else{
        $_SESSION['message-warning']="Maaf, sepertinya ada kesalahan saat menyambungkan ke database.";
        $_SESSION['time-message']=time();
        header("Location: ".$_SESSION['page-to']); exit();
      }
    }
    if(isset($_POST['ubah-guru'])){
      if(ubahGuru($_POST)>0){
        $_SESSION['message-success']="Data guru berhasil diubah.";
        $_SESSION['time-message']=time();
        header("Location: ".$_SESSION['page-to']); exit();
      }else{
        $_SESSION['message-warning']="Maaf, sepertinya ada kesalahan saat menyambungkan ke database.";
        $_SESSION['time-message']=time();
        header("Location: ".$_SESSION['page-to']); exit();
      }
    }
    if(isset($_POST['hapus-guru'])){
      if(hapusGuru($_POST)>0){
        $_SESSION['message-success']="Data guru berhasil dihapus.";
        $_SESSION['time-message']=time();
        header("Location: ".$_SESSION['page-to']); exit();
      }else{
        $_SESSION['message-warning']="Maaf, sepertinya ada kesalahan saat menyambungkan ke database.";
        $_SESSION['time-message']=time();
        header("Location: ".$_SESSION['page-to']); exit();
      }
    }
    $siswa=mysqli_query($conn, "SELECT * FROM siswa");
    if(isset($_POST['tambah-siswa'])){
      if(tambahSiswa($_POST)>0){
        $_SESSION['message-success']="Data siswa berhasil ditambahkan.";
        $_SESSION['time-message']=time();
        header("Location: ".$_SESSION['page-to']); exit();
      }else{
        $_SESSION['message-warning']="Maaf, sepertinya ada kesalahan saat menyambungkan ke database.";
        $_SESSION['time-message']=time();
        header("Location: ".$_SESSION['page-to']); exit();
      }
    }
    if(isset($_POST['ubah-siswa'])){
      if(ubahSiswa($_POST)>0){
        $_SESSION['message-success']="Data siswa berhasil diubah.";
        $_SESSION['time-message']=time();
        header("Location: ".$_SESSION['page-to']); exit();
      }else{
        $_SESSION['message-warning']="Maaf, sepertinya ada kesalahan saat menyambungkan ke database.";
        $_SESSION['time-message']=time();
        header("Location: ".$_SESSION['page-to']); exit();
      }
    }
    if(isset($_POST['hapus-siswa'])){
      if(hapusSiswa($_POST)>0){
        $_SESSION['message-success']="Data siswa berhasil dihapus.";
        $_SESSION['time-message']=time();
        header("Location: ".$_SESSION['page-to']); exit();
      }else{
        $_SESSION['message-warning']="Maaf, sepertinya ada kesalahan saat menyambungkan ke database.";
        $_SESSION['time-message']=time();
        header("Location: ".$_SESSION['page-to']); exit();
      }
    }
    $selectGuru=mysqli_query($conn, "SELECT * FROM guru");
    $kelas=mysqli_query($conn, "SELECT * FROM kelas JOIN guru ON kelas.id_guru=guru.id_guru");
    if(isset($_POST['tambah-kelas'])){
      if(tambahKelas($_POST)>0){
        $_SESSION['message-success']="Data kelas berhasil ditambahkan.";
        $_SESSION['time-message']=time();
        header("Location: ".$_SESSION['page-to']); exit();
      }else{
        $_SESSION['message-warning']="Maaf, sepertinya ada kesalahan saat menyambungkan ke database.";
        $_SESSION['time-message']=time();
        header("Location: ".$_SESSION['page-to']); exit();
      }
    }
    if(isset($_POST['ubah-kelas'])){
      if(ubahKelas($_POST)>0){
        $_SESSION['message-success']="Data kelas berhasil diubah.";
        $_SESSION['time-message']=time();
        header("Location: ".$_SESSION['page-to']); exit();
      }else{
        $_SESSION['message-warning']="Maaf, sepertinya ada kesalahan saat menyambungkan ke database.";
        $_SESSION['time-message']=time();
        header("Location: ".$_SESSION['page-to']); exit();
      }
    }
    if(isset($_POST['hapus-kelas'])){
      if(hapusKelas($_POST)>0){
        $_SESSION['message-success']="Data kelas berhasil dihapus.";
        $_SESSION['time-message']=time();
        header("Location: ".$_SESSION['page-to']); exit();
      }else{
        $_SESSION['message-warning']="Maaf, sepertinya ada kesalahan saat menyambungkan ke database.";
        $_SESSION['time-message']=time();
        header("Location: ".$_SESSION['page-to']); exit();
      }
    }
    $mapel=mysqli_query($conn, "SELECT * FROM mapel");
    if(isset($_POST['tambah-mapel'])){
      if(tambahmapel($_POST)>0){
        $_SESSION['message-success']="Data mapel berhasil ditambahkan.";
        $_SESSION['time-message']=time();
        header("Location: ".$_SESSION['page-to']); exit();
      }else{
        $_SESSION['message-warning']="Maaf, sepertinya ada kesalahan saat menyambungkan ke database.";
        $_SESSION['time-message']=time();
        header("Location: ".$_SESSION['page-to']); exit();
      }
    }
    if(isset($_POST['ubah-mapel'])){
      if(ubahmapel($_POST)>0){
        $_SESSION['message-success']="Data mapel berhasil diubah.";
        $_SESSION['time-message']=time();
        header("Location: ".$_SESSION['page-to']); exit();
      }else{
        $_SESSION['message-warning']="Maaf, sepertinya ada kesalahan saat menyambungkan ke database.";
        $_SESSION['time-message']=time();
        header("Location: ".$_SESSION['page-to']); exit();
      }
    }
    if(isset($_POST['hapus-mapel'])){
      if(hapusmapel($_POST)>0){
        $_SESSION['message-success']="Data mapel berhasil dihapus.";
        $_SESSION['time-message']=time();
        header("Location: ".$_SESSION['page-to']); exit();
      }else{
        $_SESSION['message-warning']="Maaf, sepertinya ada kesalahan saat menyambungkan ke database.";
        $_SESSION['time-message']=time();
        header("Location: ".$_SESSION['page-to']); exit();
      }
    }
    $selectKelas=mysqli_query($conn, "SELECT * FROM kelas");
    $selectSiswa=mysqli_query($conn, "SELECT * FROM siswa");
    $selectMapel=mysqli_query($conn, "SELECT * FROM mapel");
    $jadwal=mysqli_query($conn, "SELECT * FROM jadwal_pelajaran_siswa JOIN siswa ON jadwal_pelajaran_siswa.id_siswa=siswa.id_siswa JOIN kelas ON jadwal_pelajaran_siswa.id_kelas=kelas.id_kelas JOIN mapel ON jadwal_pelajaran_siswa.id_mapel=mapel.id_mapel");
    if(isset($_POST['tambah-jadwal'])){
      if(tambahjadwal($_POST)>0){
        $_SESSION['message-success']="Data jadwal berhasil ditambahkan.";
        $_SESSION['time-message']=time();
        header("Location: ".$_SESSION['page-to']); exit();
      }else{
        $_SESSION['message-warning']="Maaf, sepertinya ada kesalahan saat menyambungkan ke database.";
        $_SESSION['time-message']=time();
        header("Location: ".$_SESSION['page-to']); exit();
      }
    }
    if(isset($_POST['ubah-jadwal'])){
      if(ubahjadwal($_POST)>0){
        $_SESSION['message-success']="Data jadwal berhasil diubah.";
        $_SESSION['time-message']=time();
        header("Location: ".$_SESSION['page-to']); exit();
      }else{
        $_SESSION['message-warning']="Maaf, sepertinya ada kesalahan saat menyambungkan ke database.";
        $_SESSION['time-message']=time();
        header("Location: ".$_SESSION['page-to']); exit();
      }
    }
    if(isset($_POST['hapus-jadwal'])){
      if(hapusjadwal($_POST)>0){
        $_SESSION['message-success']="Data jadwal berhasil dihapus.";
        $_SESSION['time-message']=time();
        header("Location: ".$_SESSION['page-to']); exit();
      }else{
        $_SESSION['message-warning']="Maaf, sepertinya ada kesalahan saat menyambungkan ke database.";
        $_SESSION['time-message']=time();
        header("Location: ".$_SESSION['page-to']); exit();
      }
    }
    $nilai=mysqli_query($conn, "SELECT * FROM nilai JOIN siswa ON nilai.id_siswa=siswa.id_siswa JOIN kelas ON nilai.id_kelas=kelas.id_kelas JOIN mapel ON nilai.id_mapel=mapel.id_mapel JOIN guru ON nilai.id_guru=guru.id_guru");
    if(isset($_POST['tambah-nilai'])){
      if(tambahnilai($_POST)>0){
        $_SESSION['message-success']="Data nilai berhasil ditambahkan.";
        $_SESSION['time-message']=time();
        header("Location: ".$_SESSION['page-to']); exit();
      }else{
        $_SESSION['message-warning']="Maaf, sepertinya ada kesalahan saat menyambungkan ke database.";
        $_SESSION['time-message']=time();
        header("Location: ".$_SESSION['page-to']); exit();
      }
    }
    if(isset($_POST['ubah-nilai'])){
      if(ubahnilai($_POST)>0){
        $_SESSION['message-success']="Data nilai berhasil diubah.";
        $_SESSION['time-message']=time();
        header("Location: ".$_SESSION['page-to']); exit();
      }else{
        $_SESSION['message-warning']="Maaf, sepertinya ada kesalahan saat menyambungkan ke database.";
        $_SESSION['time-message']=time();
        header("Location: ".$_SESSION['page-to']); exit();
      }
    }
    if(isset($_POST['hapus-nilai'])){
      if(hapusnilai($_POST)>0){
        $_SESSION['message-success']="Data nilai berhasil dihapus.";
        $_SESSION['time-message']=time();
        header("Location: ".$_SESSION['page-to']); exit();
      }else{
        $_SESSION['message-warning']="Maaf, sepertinya ada kesalahan saat menyambungkan ke database.";
        $_SESSION['time-message']=time();
        header("Location: ".$_SESSION['page-to']); exit();
      }
    }
    $nilai=mysqli_query($conn, "SELECT * FROM nilai JOIN siswa ON nilai.id_siswa=siswa.id_siswa JOIN kelas ON nilai.id_kelas=kelas.id_kelas JOIN mapel ON nilai.id_mapel=mapel.id_mapel JOIN guru ON nilai.id_guru=guru.id_guru WHERE nilai.nilai_tugas>74 AND nilai.nilai_ulangan>74 AND nilai.nilai_uts>74 AND nilai.nilai_uas>74");
  }