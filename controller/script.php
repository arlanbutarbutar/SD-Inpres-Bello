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
  if(!isset($_SESSION['id-guru'])){
    if(isset($_POST['kontak'])){
      if(kontak($_POST)>0){
        $_SESSION['message-success']="Anda berhasil mengirimkan pesan.";
        $_SESSION['time-message']=time();
        header("Location: beranda"); exit();
      }else{
        $_SESSION['message-warning']="Maaf, sepertinya ada kesalahan saat menyambungkan ke database.";
        $_SESSION['time-message']=time();
        header("Location: beranda"); exit();
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
  }
  if(isset($_SESSION['id-guru'])){
    $nip=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $_SESSION['nip']))));
    if($_SESSION['akses']==1){
      $guru=mysqli_query($conn, "SELECT * FROM guru WHERE nik!='$nip' ORDER BY guru.id_guru DESC");
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
      $siswa=mysqli_query($conn, "SELECT * FROM siswa JOIN kelas ON kelas.id_kelas=siswa.id_kelas WHERE siswa.status_siswa='1' ORDER BY siswa.id_siswa DESC");
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
      $nilai=mysqli_query($conn, "SELECT * FROM nilai JOIN siswa ON nilai.id_siswa=siswa.id_siswa JOIN kelas ON siswa.id_kelas=kelas.id_kelas JOIN mapel ON nilai.id_mapel=mapel.id_mapel");
      $selectSiswa=mysqli_query($conn, "SELECT * FROM siswa JOIN kelas ON kelas.id_kelas=siswa.id_kelas ORDER BY siswa.nama_siswa ASC");
      $jadwal=mysqli_query($conn, "SELECT * FROM jadwal JOIN kelas ON jadwal.id_kelas=kelas.id_kelas JOIN mapel ON jadwal.id_mapel=mapel.id_mapel ORDER BY jadwal.id_jadwal DESC");
      $siswa_lulus=mysqli_query($conn, "SELECT * FROM siswa JOIN kelas ON kelas.id_kelas=siswa.id_kelas WHERE siswa.status_siswa='2' ORDER BY siswa.id_siswa DESC");
      $nilai_siswa=mysqli_query($conn, "SELECT * FROM kelas JOIN guru ON kelas.id_guru=guru.id_guru");
      if(isset($_GET['id-kelas'])){
        $id_kelas=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $_GET['id-kelas']))));
        $nilai=mysqli_query($conn, "SELECT * FROM nilai JOIN siswa ON nilai.id_siswa=siswa.id_siswa JOIN kelas ON siswa.id_kelas=kelas.id_kelas JOIN guru ON kelas.id_guru=guru.id_guru JOIN mapel ON nilai.id_mapel=mapel.id_mapel WHERE kelas.id_kelas='$id_kelas'");
      }
      $selectMapel=mysqli_query($conn, "SELECT * FROM mapel");
    }
    if($_SESSION['akses']<=2){
      $selectGuru=mysqli_query($conn, "SELECT * FROM guru");
      $kelas=mysqli_query($conn, "SELECT * FROM kelas JOIN guru ON kelas.id_guru=guru.id_guru ORDER BY kelas.id_kelas DESC");
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
      $mapel=mysqli_query($conn, "SELECT * FROM mapel ORDER BY id_mapel DESC");
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
      $data_kelas_cetak=mysqli_query($conn, "SELECT * FROM kelas");
      if(isset($_GET['cetak-siswa-kelas'])){
        $id_kelas_cetak=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $_GET['cetak-siswa-kelas']))));
        $nama_kelas=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $_GET['nama-kelas']))));
        $siswa_perKelas=mysqli_query($conn, "SELECT * FROM siswa JOIN kelas ON siswa.id_kelas=kelas.id_kelas WHERE siswa.id_kelas='$id_kelas_cetak' ORDER BY kelas.nama_kelas ASC");
      }
      $cetak_jadwal=mysqli_query($conn, "SELECT * FROM jadwal JOIN kelas ON jadwal.id_kelas=kelas.id_kelas JOIN mapel ON jadwal.id_mapel=mapel.id_mapel JOIN guru ON kelas.id_guru=guru.id_guru");
      if($_SESSION['akses']==2){
        $id_guru=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $_SESSION['id-guru']))));
        $siswa=mysqli_query($conn, "SELECT * FROM kelas 
          JOIN guru ON kelas.id_guru=guru.id_guru 
          JOIN siswa ON kelas.id_kelas=siswa.id_kelas 
          WHERE kelas.id_guru='$id_guru' 
          AND siswa.status_siswa='1' 
          ORDER BY siswa.nama_siswa ASC
        ");
        $siswa_lulus=mysqli_query($conn, "SELECT * FROM siswa JOIN kelas ON kelas.id_kelas=siswa.id_kelas WHERE kelas.id_guru='$id_guru' AND siswa.status_siswa='2' ORDER BY siswa.id_siswa DESC");
        $selectSiswa=mysqli_query($conn, "SELECT * FROM siswa JOIN kelas ON kelas.id_kelas=siswa.id_kelas WHERE kelas.id_guru='$id_guru'");
        $jadwal=mysqli_query($conn, "SELECT * FROM jadwal JOIN kelas ON jadwal.id_kelas=kelas.id_kelas JOIN mapel ON jadwal.id_mapel=mapel.id_mapel WHERE kelas.id_guru='$id_guru'");
        $mapel_absen=mysqli_query($conn, "SELECT * FROM jadwal JOIN mapel ON jadwal.id_mapel=mapel.id_mapel JOIN kelas ON jadwal.id_kelas=kelas.id_kelas WHERE kelas.id_guru='$id_guru'");
        if(isset($_GET['mapel'])){
          $id_mapel=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $_GET['id-mapel']))));
          $_SESSION['id-mapel']=$id_mapel;
          $siswa_absen=mysqli_query($conn, "SELECT * FROM siswa 
            JOIN kelas ON siswa.id_kelas=kelas.id_kelas 
            JOIN guru ON kelas.id_guru=guru.id_guru
            JOIN jadwal ON kelas.id_kelas=jadwal.id_kelas
            JOIN mapel ON jadwal.id_mapel=mapel.id_mapel
            WHERE mapel.id_mapel='$id_mapel'
          ");
          if(isset($_POST['hadir'])){
            if(absen_hadir($_POST)>0){
              $_SESSION['message-success']="Data absensi berhasil diubah.";
              $_SESSION['time-message']=time();
              header("Location: ".$_SESSION['page-to']); exit();
            }else{
              $_SESSION['message-warning']="Maaf, sepertinya ada kesalahan saat menyambungkan ke database.";
              $_SESSION['time-message']=time();
              header("Location: ".$_SESSION['page-to']); exit();
            }
          }
          if(isset($_POST['tidak-hadir'])){
            if(absen_tidak_hadir($_POST)>0){
              $_SESSION['message-success']="Data absensi berhasil diubah.";
              $_SESSION['time-message']=time();
              header("Location: ".$_SESSION['page-to']); exit();
            }else{
              $_SESSION['message-warning']="Maaf, sepertinya ada kesalahan saat menyambungkan ke database.";
              $_SESSION['time-message']=time();
              header("Location: ".$_SESSION['page-to']); exit();
            }
          }
          if(isset($_POST['alpa'])){
            if(absen_alpa($_POST)>0){
              $_SESSION['message-success']="Data absensi berhasil diubah.";
              $_SESSION['time-message']=time();
              header("Location: ".$_SESSION['page-to']); exit();
            }else{
              $_SESSION['message-warning']="Maaf, sepertinya ada kesalahan saat menyambungkan ke database.";
              $_SESSION['time-message']=time();
              header("Location: ".$_SESSION['page-to']); exit();
            }
          }
          $siswa_view=mysqli_query($conn, "SELECT * FROM absensi 
            JOIN guru ON absensi.id_guru=guru.id_guru
            JOIN siswa ON absensi.id_siswa=siswa.id_siswa
            JOIN mapel ON absensi.id_mapel=mapel.id_mapel
            JOIN kelas ON absensi.id_kelas=kelas.id_kelas 
            WHERE mapel.id_mapel='$id_mapel'
          ");
        }
        $absensi_cetak=mysqli_query($conn, "SELECT * FROM absensi 
          JOIN guru ON absensi.id_guru=guru.id_guru
          JOIN siswa ON absensi.id_siswa=siswa.id_siswa
          JOIN mapel ON absensi.id_mapel=mapel.id_mapel
          JOIN kelas ON absensi.id_kelas=kelas.id_kelas 
        ");
        if(isset($_POST['naik-kelas'])){
          if(naik_kelas($_POST)>0){
            $kelas=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $_POST['kelas']))));
            $kelas_az=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $_POST['kelas-az']))));
            $kelas=$kelas+1;
            $nama_kelas=$kelas.$kelas_az;
            $_SESSION['message-success']="Siswa dengan nama ".$_POST['nama-siswa']." telah dinyatakan naik ke kelas ".$nama_kelas.".";
            $_SESSION['time-message']=time();
            header("Location: ".$_SESSION['page-to']); exit();
          }else{
            $_SESSION['message-warning']="Maaf, sepertinya ada kesalahan saat menyambungkan ke database.";
            $_SESSION['time-message']=time();
            header("Location: ".$_SESSION['page-to']); exit();
          }
        }
        if(isset($_POST['lulus'])){
          if(lulus($_POST)>0){
            $_SESSION['message-success']="Siswa dengan nama ".$_POST['nama-siswa']." telah dinyatakan Lulus.";
            $_SESSION['time-message']=time();
            header("Location: ".$_SESSION['page-to']); exit();
          }else{
            $_SESSION['message-warning']="Maaf, sepertinya ada kesalahan saat menyambungkan ke database.";
            $_SESSION['time-message']=time();
            header("Location: ".$_SESSION['page-to']); exit();
          }
        }
        $nilai_siswa=mysqli_query($conn, "SELECT * FROM kelas JOIN guru ON kelas.id_guru=guru.id_guru WHERE kelas.id_guru='$id_guru'");
        if(isset($_GET['id-kelas'])){
          $id_kelas=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $_GET['id-kelas']))));
          $nilai=mysqli_query($conn, "SELECT * FROM nilai JOIN siswa ON nilai.id_siswa=siswa.id_siswa JOIN kelas ON siswa.id_kelas=kelas.id_kelas JOIN guru ON kelas.id_guru=guru.id_guru JOIN mapel ON nilai.id_mapel=mapel.id_mapel WHERE kelas.id_guru='$id_guru' AND kelas.id_kelas='$id_kelas'");
        }else{
          $nilai=mysqli_query($conn, "SELECT * FROM nilai JOIN siswa ON nilai.id_siswa=siswa.id_siswa JOIN kelas ON siswa.id_kelas=kelas.id_kelas JOIN guru ON kelas.id_guru=guru.id_guru JOIN mapel ON nilai.id_mapel=mapel.id_mapel WHERE kelas.id_guru='$id_guru'");
        }
        if(isset($_GET['id-mapel'])){
          $id_mapel=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $_GET['id-mapel']))));
          $nilai_mapel=mysqli_query($conn, "SELECT * FROM nilai JOIN siswa ON nilai.id_siswa=siswa.id_siswa JOIN kelas ON siswa.id_kelas=kelas.id_kelas JOIN guru ON kelas.id_guru=guru.id_guru JOIN mapel ON nilai.id_mapel=mapel.id_mapel WHERE kelas.id_guru='$id_guru' AND mapel.id_mapel='$id_mapel'");
        }else{
          $nilai_mapel=mysqli_query($conn, "SELECT * FROM mapel JOIN jadwal ON mapel.id_mapel=jadwal.id_mapel JOIN kelas ON jadwal.id_kelas=kelas.id_kelas WHERE kelas.id_guru='$id_guru'");
        }
        $view_mapel=mysqli_query($conn, "SELECT * FROM mapel JOIN jadwal ON mapel.id_mapel=jadwal.id_mapel JOIN kelas ON jadwal.id_kelas=kelas.id_kelas WHERE kelas.id_guru='$id_guru'");
        $selectMapel=mysqli_query($conn, "SELECT * FROM mapel JOIN jadwal ON mapel.id_mapel=jadwal.id_mapel JOIN kelas ON jadwal.id_kelas=kelas.id_kelas WHERE kelas.id_guru='$id_guru'");
      }
    }
    if($_SESSION['akses']<=3){ 
      // 
      if($_SESSION['akses']==3){
        $nis=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $_SESSION['nip']))));
        $id_kelas=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $_SESSION['id-kelas']))));
        $jadwal=mysqli_query($conn, "SELECT * FROM jadwal JOIN kelas ON jadwal.id_kelas=kelas.id_kelas JOIN mapel ON jadwal.id_mapel=mapel.id_mapel WHERE kelas.id_kelas='$id_kelas'");
        $cetak_jadwal=mysqli_query($conn, "SELECT * FROM jadwal 
          JOIN kelas ON jadwal.id_kelas=kelas.id_kelas
          JOIN mapel ON jadwal.id_mapel=mapel.id_mapel
          JOIN guru ON kelas.id_guru=guru.id_guru
          JOIN siswa ON kelas.id_kelas=siswa.id_kelas
          WHERE jadwal.id_kelas='$id_kelas' AND siswa.nik='$nis'
        ");
        $nilai=mysqli_query($conn, "SELECT * FROM nilai JOIN siswa ON nilai.id_siswa=siswa.id_siswa JOIN kelas ON siswa.id_kelas=kelas.id_kelas JOIN mapel ON nilai.id_mapel=mapel.id_mapel JOIN guru ON kelas.id_guru=guru.id_guru WHERE siswa.nik='$nis'");
      }
    }
  }