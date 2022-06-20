<?php 
  function login($data){global $conn;
    $nip=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['nip']))));
    $password=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['password']))));
    $guru=mysqli_query($conn, "SELECT * FROM guru WHERE nip='$nip'");
    if(mysqli_num_rows($guru)==0){
      $siswa=mysqli_query($conn, "SELECT * FROM siswa WHERE nis='$nip'");
      if(mysqli_num_rows($siswa)==0){
        $_SESSION['message-danger']="Maaf, akun anda belum terdaftar.";
        $_SESSION['time-message']=time();
        return false;
      }else if(mysqli_num_rows($siswa)>0){
        $row=mysqli_fetch_assoc($siswa);
        if(password_verify($password, $row['password'])){
          $_SESSION['id-guru']=$row['id_siswa'];
          $_SESSION['id-kelas']=$row['id_kelas'];
          $_SESSION['nip']=$row['nis'];
          $_SESSION['nama-guru']=$row['nama_siswa'];
          $_SESSION['akses']=3;
          if(isset($_SESSION['auth'])){unset($_SESSION['auth']);}
          return mysqli_affected_rows($conn);
        }else{
          $_SESSION['message-danger']="Maaf, kata sandi yang Anda masukkan tidak cocok.";
          $_SESSION['time-message']=time();
          return false;
        }
      }
    }else if(mysqli_num_rows($guru)>0){
      $row=mysqli_fetch_assoc($guru);
      if(password_verify($password, $row['password'])){
        $_SESSION['id-guru']=$row['id_guru'];
        $_SESSION['nip']=$row['nip'];
        $_SESSION['nama-guru']=$row['nama_guru'];
        $_SESSION['akses']=$row['hak_akses'];
        if(isset($_SESSION['auth'])){unset($_SESSION['auth']);}
        return mysqli_affected_rows($conn);
      }else{
        $_SESSION['message-danger']="Maaf, kata sandi yang Anda masukkan tidak cocok.";
        $_SESSION['time-message']=time();
        return false;
      }
    }
  }
  function tambahGuru($data){global $conn;
    $nip=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['nip']))));
    $checkNIP=mysqli_query($conn, "SELECT * FROM guru WHERE nip='$nip'");
    if(mysqli_num_rows($checkNIP)>0){
      $_SESSION['message-danger']="Maaf, NIP yang anda masukan belum terdaftar.";
      $_SESSION['time-message']=time();
      return false;
    }
    $nama_guru=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['nama-guru']))));
    $jk=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['jk']))));
    $no_tlp=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['no-tlp']))));
    $password=password_hash($nip, PASSWORD_DEFAULT);
    mysqli_query($conn, "INSERT INTO guru(nip,nama_guru,jenis_kelamin,no_tlp,password) VALUES('$nip','$nama_guru','$jk','$no_tlp','$password')");
    return mysqli_affected_rows($conn);
  }
  function ubahGuru($data){global $conn;
    $id_guru=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id-guru']))));
    $nip=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['nip']))));
    $nipOld=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['nipOld']))));
    $nama_guru=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['nama-guru']))));
    $jk=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['jk']))));
    if($jk==""){
      $_SESSION['message-danger']="Maaf, anda belum mengisi Jenis Kelamin.";
      $_SESSION['time-message']=time();
      return false;
    }
    $no_tlp=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['no-tlp']))));
    if($nip!=$nipOld){
      $checkNIP=mysqli_query($conn, "SELECT * FROM guru WHERE nip='$nip'");
      if(mysqli_num_rows($checkNIP)>0){
        $_SESSION['message-danger']="Maaf, NIP yang anda masukan belum terdaftar.";
        $_SESSION['time-message']=time();
        return false;
      }
      $password=password_hash($nip, PASSWORD_DEFAULT);
      mysqli_query($conn, "UPDATE guru SET nip='$nip', nama_guru='$nama_guru', jenis_kelamin='$jk', no_tlp='$no_tlp', password='$password' WHERE id_guru='$id_guru'");
    }else{
      mysqli_query($conn, "UPDATE guru SET nama_guru='$nama_guru', jenis_kelamin='$jk', no_tlp='$no_tlp' WHERE id_guru='$id_guru'");
    }
    return mysqli_affected_rows($conn);
  }
  function hapusGuru($data){global $conn;
    $id_guru=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id-guru']))));
    mysqli_query($conn, "DELETE FROM guru WHERE id_guru='$id_guru'");
    return mysqli_affected_rows($conn);
  }
  function tambahSiswa($data){global $conn;
    $nis=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['nis']))));
    $checkNIS=mysqli_query($conn, "SELECT * FROM siswa WHERE nis='$nis'");
    if(mysqli_num_rows($checkNIS)>0){
      $_SESSION['message-danger']="Maaf, NIS yang anda masukan sudah terdaftar.";
      $_SESSION['time-message']=time();
      return false;
    }
    $nama_siswa=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['nama-siswa']))));
    $id_kelas=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id-kelas']))));
    $jk=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['jk']))));
    $tempat_lahir=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['tempat-lahir']))));
    $tgl_lahir=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['tgl-lahir']))));
    $tgl_lahir=date_create($tgl_lahir);
    $tgl_lahir=date_format($tgl_lahir, "d M Y");
    $ttl=$tempat_lahir.", ".$tgl_lahir;
    $password=password_hash($nis, PASSWORD_DEFAULT);
    $nama_ortu=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['nama-ortu']))));
    mysqli_query($conn, "INSERT INTO siswa(id_kelas,nis,password,nama_siswa,jenis_kelamin,ttl,nama_ortu) VALUES('$id_kelas','$nis','$password','$nama_siswa','$jk','$ttl','$nama_ortu')");
    return mysqli_affected_rows($conn);
  }
  function ubahSiswa($data){global $conn;
    $id_siswa=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id-siswa']))));
    $nis=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['nis']))));
    $nisOld=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['nisOld']))));
    $nama_siswa=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['nama-siswa']))));
    $jk=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['jk']))));
    if($jk==""){
      $_SESSION['message-danger']="Maaf, anda belum mengisi Jenis Kelamin.";
      $_SESSION['time-message']=time();
      return false;
    }
    $tempat_lahir=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['tempat-lahir']))));
    $tgl_lahir=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['tgl-lahir']))));
    $tgl_lahir=date_create($tgl_lahir);
    $tgl_lahir=date_format($tgl_lahir, "d M Y");
    $ttl=$tempat_lahir.", ".$tgl_lahir;
    $nama_ortu=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['nama-ortu']))));
    if($nis!=$nisOld){
      $checkNIS=mysqli_query($conn, "SELECT * FROM siswa WHERE nis='$nis'");
      if(mysqli_num_rows($checkNIS)>0){
        $_SESSION['message-danger']="Maaf, NIS yang anda masukan sudah terdaftar.";
        $_SESSION['time-message']=time();
        return false;
      }
      $password=password_hash($nis, PASSWORD_DEFAULT);
      mysqli_query($conn, "UPDATE siswa SET nis='$nis', password='$password', nama_siswa='$nama_siswa', jenis_kelamin='$jk', ttl='$ttl', nama_ortu='$nama_ortu' WHERE id_siswa='$id_siswa'");
    }else{
      mysqli_query($conn, "UPDATE siswa SET nama_siswa='$nama_siswa', jenis_kelamin='$jk', ttl='$ttl', nama_ortu='$nama_ortu' WHERE id_siswa='$id_siswa'");
    }
    return mysqli_affected_rows($conn);
  }
  function hapusSiswa($data){global $conn;
    $id_siswa=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id-siswa']))));
    mysqli_query($conn, "DELETE FROM siswa WHERE id_siswa='$id_siswa'");
    return mysqli_affected_rows($conn);
  }
  function tambahKelas($data){global $conn;
    $nama_kelas=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['nama-kelas']))));
    $id_guru=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id-guru']))));
    if($id_guru==""){
      $_SESSION['message-danger']="Maaf, anda belum mengisi Guru.";
      $_SESSION['time-message']=time();
      return false;
    }
    $semester=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['semester']))));
    $tahun_ajar=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['tahun-ajar']))));
    $tahun_ajar=date_create($tahun_ajar);
    $tahun_ajar=date_format($tahun_ajar, "Y");
    mysqli_query($conn, "INSERT INTO kelas(nama_kelas,id_guru,semester,tahunajar) VALUES('$nama_kelas','$id_guru','$semester','$tahun_ajar')");
    return mysqli_affected_rows($conn);
  }
  function ubahKelas($data){global $conn;
    $id_kelas=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id-kelas']))));
    $nama_kelas=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['nama-kelas']))));
    $id_guru=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id-guru']))));
    if($id_guru==""){
      $_SESSION['message-danger']="Maaf, anda belum mengisi Guru.";
      $_SESSION['time-message']=time();
      return false;
    }
    $semester=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['semester']))));
    $tahun_ajar=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['tahun-ajar']))));
    $tahun_ajar=date_create($tahun_ajar);
    $tahun_ajar=date_format($tahun_ajar, "Y");
    mysqli_query($conn, "UPDATE kelas SET nama_kelas='$nama_kelas', id_guru='$id_guru', semester='$semester', tahunajar='$tahun_ajar' WHERE id_kelas='$id_kelas'");
    return mysqli_affected_rows($conn);
  }
  function hapusKelas($data){global $conn;
    $id_kelas=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id-kelas']))));
    mysqli_query($conn, "DELETE FROM kelas WHERE id_kelas='$id_kelas'");
    return mysqli_affected_rows($conn);
  }
  function tambahmapel($data){global $conn;
    $nama_mapel=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['mapel']))));
    mysqli_query($conn, "INSERT INTO mapel(nama_mapel) VALUES('$nama_mapel')");
    return mysqli_affected_rows($conn);
  }
  function ubahmapel($data){global $conn;
    $id_mapel=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id-mapel']))));
    $nama_mapel=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['mapel']))));
    mysqli_query($conn, "UPDATE mapel SET nama_mapel='$nama_mapel' WHERE id_mapel='$id_mapel'");
    return mysqli_affected_rows($conn);
  }
  function hapusmapel($data){global $conn;
    $id_mapel=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id-mapel']))));
    mysqli_query($conn, "DELETE FROM mapel WHERE id_mapel='$id_mapel'");
    return mysqli_affected_rows($conn);
  }
  function tambahjadwal($data){global $conn;
    $id_kelas=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id-kelas']))));
    $id_mapel=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id-mapel']))));
    $jam=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['jam']))));
    $hari=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['hari']))));
    mysqli_query($conn, "INSERT INTO jadwal(id_kelas,id_mapel,jam,hari) VALUES('$id_kelas','$id_mapel','$jam','$hari')");
    return mysqli_affected_rows($conn);
  }
  function ubahjadwal($data){global $conn;
    $id_jadwal=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id-jadwal']))));
    $id_kelas=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id-kelas']))));
    $id_mapel=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id-mapel']))));
    $jam=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['jam']))));
    $hari=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['hari']))));
    mysqli_query($conn, "UPDATE jadwal SET id_kelas='$id_kelas', id_mapel='$id_mapel', jam='$jam', hari='$hari' WHERE id_jadwal='$id_jadwal'");
    return mysqli_affected_rows($conn);
  }
  function hapusjadwal($data){global $conn;
    $id_jadwal=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id-jadwal']))));
    mysqli_query($conn, "DELETE FROM jadwal WHERE id_jadwal='$id_jadwal'");
    return mysqli_affected_rows($conn);
  }
  function tambahnilai($data){global $conn;
    $id_siswa=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id-siswa']))));
    $id_mapel=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id-mapel']))));
    $nilai_tugas=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['tugas']))));
    $nilai_ulangan=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['ulangan']))));
    $nilai_uts=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['uts']))));
    $nilai_uas=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['uas']))));
    mysqli_query($conn, "INSERT INTO nilai(id_siswa,id_mapel,nilai_tugas,nilai_ulangan,nilai_uts,nilai_uas) VALUES('$id_siswa','$id_mapel','$nilai_tugas','$nilai_ulangan','$nilai_uts','$nilai_uas')");
    return mysqli_affected_rows($conn);
  }
  function ubahnilai($data){global $conn;
    $id_nilai=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id-nilai']))));
    $id_siswa=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id-siswa']))));
    $id_mapel=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id-mapel']))));
    $nilai_tugas=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['tugas']))));
    $nilai_ulangan=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['ulangan']))));
    $nilai_uts=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['uts']))));
    $nilai_uas=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['uas']))));
    mysqli_query($conn, "UPDATE nilai SET id_siswa='$id_siswa', id_mapel='$id_mapel', nilai_tugas='$nilai_tugas', nilai_ulangan='$nilai_ulangan', nilai_uts='$nilai_uts', nilai_uas='$nilai_uas' WHERE id_nilai='$id_nilai'");
    return mysqli_affected_rows($conn);
  }
  function hapusnilai($data){global $conn;
    $id_nilai=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id-nilai']))));
    mysqli_query($conn, "DELETE FROM nilai WHERE id_nilai='$id_nilai'");
    return mysqli_affected_rows($conn);
  }
  // function __($data){global $conn;}