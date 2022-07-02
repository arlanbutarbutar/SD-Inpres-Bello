<?php 
  function kontak($data){global $conn;
    $name=htmlspecialchars(addslashes(trim(strtolower(mysqli_real_escape_string($conn, $data['name'])))));
    $email=htmlspecialchars(addslashes(trim(strtolower(mysqli_real_escape_string($conn, $data['email'])))));
    $message=htmlspecialchars(addslashes(trim(strtolower(mysqli_real_escape_string($conn, $data['message'])))));
    require("mail.php");
    $to       = 'arlan270899@gmail.com';
    $subject  = 'Pesan Dari Pengunjung!!';
    $messageMail  = "<!doctype html>
        <html>
            <head>
                <meta name='viewport' content='width=device-width'>
                <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
                <title>Pesan Kontak</title>
                <style>
                    @media only screen and (max-width: 620px) {
                        table[class='body'] h1 {
                            font-size: 28px !important;
                            margin-bottom: 10px !important;}
                        table[class='body'] p,
                        table[class='body'] ul,
                        table[class='body'] ol,
                        table[class='body'] td,
                        table[class='body'] span,
                        table[class='body'] a {
                            font-size: 16px !important;}
                        table[class='body'] .wrapper,
                        table[class='body'] .article {
                            padding: 10px !important;}
                        table[class='body'] .content {
                            padding: 0 !important;}
                        table[class='body'] .container {
                            padding: 0 !important;
                            width: 100% !important;}
                        table[class='body'] .main {
                            border-left-width: 0 !important;
                            border-radius: 0 !important;
                            border-right-width: 0 !important;}
                        table[class='body'] .btn table {
                            width: 100% !important;}
                        table[class='body'] .btn a {
                            width: 100% !important;}
                        table[class='body'] .img-responsive {
                            height: auto !important;
                            max-width: 100% !important;
                            width: auto !important;}}
                    @media all {
                        .ExternalClass {
                            width: 100%;}
                        .ExternalClass,
                        .ExternalClass p,
                        .ExternalClass span,
                        .ExternalClass font,
                        .ExternalClass td,
                        .ExternalClass div {
                            line-height: 100%;}
                        .apple-link a {
                            color: inherit !important;
                            font-family: inherit !important;
                            font-size: inherit !important;
                            font-weight: inherit !important;
                            line-height: inherit !important;
                            text-decoration: none !important;
                        .btn-primary table td:hover {
                            background-color: #d5075d !important;}
                        .btn-primary a:hover {
                            background-color: #000 !important;
                            border-color: #000 !important;
                            color: #fff !important;}}
                </style>
            </head>
            <body class style='background-color: #161f33; font-family: sans-serif; -webkit-font-smoothing: antialiased; font-size: 14px; line-height: 1.4; margin: 0; padding: 0; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;'>
                <table role='presentation' border='0' cellpadding='0' cellspacing='0' class='body' style='border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; background-color: #161f33; width: 100%;' width='100%' bgcolor='#161f33'>
                <tr>
                    <td style='font-family: sans-serif; font-size: 14px; vertical-align: top;' valign='top'>&nbsp;</td>
                    <td class='container' style='font-family: sans-serif; font-size: 14px; vertical-align: top; display: block; max-width: 580px; padding: 10px; width: 580px; margin: 0 auto;' width='580' valign='top'>
                    <div class='header' style='padding: 20px 0;'>
                        <table role='presentation' border='0' cellpadding='0' cellspacing='0' style='border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; width: 100%;' width='100%'>
                        <tr>
                            <td class='align-center' style='font-family: sans-serif; font-size: 14px; vertical-align: top; text-align: center;' valign='top' align='center'>
                            <a href='https://sd-inpres-bello.gui.my.id' style='color: #000; text-decoration: underline;'><img src='https://i.ibb.co/s9cL5M9/UNWIRA-2.png' height='100' alt='Postdrop' style='border: none; -ms-interpolation-mode: bicubic; max-width: 100%;'></a>
                            <p style='font-family: sans-serif; font-weight: normal; margin: 0; margin-bottom: 15px; text-decoration: none; color: #fff; font-size: 20px;'>SD Inpres Bello</p>
                            </td>
                        </tr>
                        </table>
                    </div>
                    <div class='content' style='box-sizing: border-box; display: block; margin: 0 auto; max-width: 580px; padding: 10px;'>
            
                        <!-- START CENTERED WHITE CONTAINER -->
                        <table role='presentation' class='main' style='border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; background: #ffffff; border-radius: 3px; width: 100%;' width='100%'>
            
                        <!-- START MAIN CONTENT AREA -->
                        <tr>
                            <td class='wrapper' style='font-family: sans-serif; font-size: 14px; vertical-align: top; box-sizing: border-box; padding: 20px;' valign='top'>
                            <table role='presentation' border='0' cellpadding='0' cellspacing='0' style='border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; width: 100%;' width='100%'>
                                <tr>
                                <td style='font-family: sans-serif; font-size: 14px; vertical-align: top;' valign='top'>
                                    <p style='font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;'>Hai,</p>
                                    <p style='font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;'>Pesan masuk dari pengunjung dengn pesan sebagai berikut: <br> ".$message." <br> Dikirim oleh ".$name." dan email ".$email."</p>
                                    <small>Peringatan! Ini adalah pesan otomatis sehingga Anda tidak dapat membalas pesan ini.</small>
                                </td>
                                </tr>
                            </table>
                            </td>
                        </tr>
            
                        <!-- END MAIN CONTENT AREA -->
                        </table>
            
                        <!-- START FOOTER -->
                        <div class='footer' style='clear: both; margin-top: 10px; text-align: center; width: 100%;'>
                        <table role='presentation' border='0' cellpadding='0' cellspacing='0' style='border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; width: 100%;' width='100%'>
                            <tr>
                            <td class='content-block' style='font-family: sans-serif; vertical-align: top; padding-bottom: 10px; padding-top: 10px; color: #9a9ea6; font-size: 12px; text-align: center;' valign='top' align='center'>
                                <span class='apple-link' style='color: #9a9ea6; font-size: 12px; text-align: center;'>Workarea Jln. W.J Lalamentik no.95 NTT, Indo AR +62 811 3827 421</span>
                            </td>
                            </tr>
                            <tr>
                            <td class='content-block powered-by' style='font-family: sans-serif; vertical-align: top; padding-bottom: 10px; padding-top: 10px; color: #9a9ea6; font-size: 12px; text-align: center;' valign='top' align='center'>
                                Powered by <a href='https://www.netmedia-framecode.com' style='color: #9a9ea6; font-size: 12px; text-align: center; text-decoration: none;'>Netmedia Framecode</a>.
                            </td>
                            </tr>
                        </table>
                        </div>
                        <!-- END FOOTER -->
            
                    <!-- END CENTERED WHITE CONTAINER -->
                    </div>
                    </td>
                    <td style='font-family: sans-serif; font-size: 14px; vertical-align: top;' valign='top'>&nbsp;</td>
                </tr>
                </table>
            </body>
        </html>";
    smtp_mail($to, $subject, $messageMail, '', '', 0, 0, true);
    return true;
  }
  function login($data){global $conn;
    $nip=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['nip']))));
    $password=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['password']))));
    $guru=mysqli_query($conn, "SELECT * FROM guru WHERE nik='$nip'");
    if(mysqli_num_rows($guru)==0){
      $siswa=mysqli_query($conn, "SELECT * FROM siswa WHERE nisn='$nip'");
      if(mysqli_num_rows($siswa)==0){
        $_SESSION['message-danger']="Maaf, akun anda belum terdaftar.";
        $_SESSION['time-message']=time();
        return false;
      }else if(mysqli_num_rows($siswa)>0){
        $row=mysqli_fetch_assoc($siswa);
        if(password_verify($password, $row['password'])){
          $_SESSION['id-guru']=$row['id_siswa'];
          $_SESSION['id-kelas']=$row['id_kelas'];
          $_SESSION['nip']=$row['nik'];
          $_SESSION['nama-guru']=$row['nama_siswa'];
          $_SESSION['status-siswa']=$row['status_siswa'];
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
        $_SESSION['nip']=$row['nik'];
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
    if($nip!=0){
      $checkNIP=mysqli_query($conn, "SELECT * FROM guru WHERE nip='$nip'");
      if(mysqli_num_rows($checkNIP)>0){
        $_SESSION['message-danger']="Maaf, NIP yang anda masukan sudah terdaftar.";
        $_SESSION['time-message']=time();
        return false;
      }
    }
    $nama_guru=htmlspecialchars(trim(mysqli_real_escape_string($conn, $data['nama-guru'])));
    $jk=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['jk']))));
    $no_tlp=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['no-tlp']))));
    $jabatan=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['jabatan']))));
    $nik=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['nik']))));
    $checkNIK=mysqli_query($conn, "SELECT * FROM guru WHERE nik='$nik'");
    if(mysqli_num_rows($checkNIK)>0){
      $_SESSION['message-danger']="Maaf, NIK yang anda masukan sudah terdaftar.";
      $_SESSION['time-message']=time();
      return false;
    }
    $status=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['status']))));
    $nuptk=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['nuptk']))));
    if($nuptk!=0){
      $checkNUPTK=mysqli_query($conn, "SELECT * FROM guru WHERE nuptk='$nuptk'");
      if(mysqli_num_rows($checkNUPTK)>0){
        $_SESSION['message-danger']="Maaf, NUPTK yang anda masukan sudah terdaftar.";
        $_SESSION['time-message']=time();
        return false;
      }
    }
    $password=password_hash($nik, PASSWORD_DEFAULT);
    mysqli_query($conn, "INSERT INTO guru(nip,nama_guru,jenis_kelamin,no_tlp,password,jabatan,nik,status,nuptk) VALUES('$nip','$nama_guru','$jk','$no_tlp','$password','$jabatan','$nik','$status','$nuptk')");
    return mysqli_affected_rows($conn);
  }
  function ubahGuru($data){global $conn;
    $id_guru=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id-guru']))));
    $nip=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['nip']))));
    $nipOld=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['nipOld']))));
    if($nip!=0){
      if($nip!=$nipOld){
        $checkNIP=mysqli_query($conn, "SELECT * FROM guru WHERE nip='$nip'");
        if(mysqli_num_rows($checkNIP)>0){
          $_SESSION['message-danger']="Maaf, NIP yang anda masukan sudah terdaftar.";
          $_SESSION['time-message']=time();
          return false;
        }
      }
    }
    $nama_guru=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['nama-guru']))));
    $jk=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['jk']))));
    $no_tlp=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['no-tlp']))));
    $jabatan=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['jabatan']))));
    $nik=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['nik']))));
    $nikOld=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['nikOld']))));
    if($nik!=$nikOld){
      $checkNIK=mysqli_query($conn, "SELECT * FROM guru WHERE nik='$nik'");
      if(mysqli_num_rows($checkNIK)>0){
        $_SESSION['message-danger']="Maaf, NIK yang anda masukan sudah terdaftar.";
        $_SESSION['time-message']=time();
        return false;
      }
    }
    $status=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['status']))));
    $nuptk=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['nuptk']))));
    $nuptkOld=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['nuptkOld']))));
    if($nuptk!=0){
      if($nuptk!=$nuptkOld){
        $checkNUPTK=mysqli_query($conn, "SELECT * FROM guru WHERE nuptk='$nuptk'");
        if(mysqli_num_rows($checkNUPTK)>0){
          $_SESSION['message-danger']="Maaf, NUPTK yang anda masukan sudah terdaftar.";
          $_SESSION['time-message']=time();
          return false;
        }
      }
    }
    $nip=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['nip']))));
    $nipOld=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['nipOld']))));
    $nama_guru=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['nama-guru']))));
    $jk=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['jk']))));
    $no_tlp=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['no-tlp']))));
    $password=password_hash($nik, PASSWORD_DEFAULT);
    mysqli_query($conn, "UPDATE guru SET nik='$nik', nip='$nip', nuptk='$nuptk', nama_guru='$nama_guru', jabatan='$jabatan', jenis_kelamin='$jk', no_tlp='$no_tlp', password='$password', status='$status' WHERE id_guru='$id_guru'");
    return mysqli_affected_rows($conn);
  }
  function hapusGuru($data){global $conn;
    $id_guru=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id-guru']))));
    mysqli_query($conn, "DELETE FROM guru WHERE id_guru='$id_guru'");
    return mysqli_affected_rows($conn);
  }
  function tambahSiswa($data){global $conn;
    $nik=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['nik']))));
    $nisn=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['nisn']))));
    $checkNISN=mysqli_query($conn, "SELECT * FROM siswa WHERE nisn='$nisn'");
    if(mysqli_num_rows($checkNISN)>0){
      $_SESSION['message-danger']="Maaf, NISN yang anda masukan sudah terdaftar.";
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
    $password=password_hash($nisn, PASSWORD_DEFAULT);
    $nama_ibu=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['nama-ibu']))));
    mysqli_query($conn, "INSERT INTO siswa(id_kelas,nik,nisn,password,nama_siswa,jenis_kelamin,ttl,nama_ibu) VALUES('$id_kelas','$nik','$nisn','$password','$nama_siswa','$jk','$ttl','$nama_ibu')");
    return mysqli_affected_rows($conn);
  }
  function ubahSiswa($data){global $conn;
    $id_siswa=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id-siswa']))));
    $nik=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['nik']))));
    $nisn=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['nisn']))));
    $nisnOld=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['nisnOld']))));
    if($nisn!=$nisnOld){
      $checkNISN=mysqli_query($conn, "SELECT * FROM siswa WHERE nisn='$nisn'");
      if(mysqli_num_rows($checkNISN)>0){
        $_SESSION['message-danger']="Maaf, NISN yang anda masukan sudah terdaftar.";
        $_SESSION['time-message']=time();
        return false;
      }
    }
    $nama_siswa=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['nama-siswa']))));
    $jk=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['jk']))));
    $ttl=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['ttl']))));
    $nama_ibu=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['nama-ibu']))));
    $password=password_hash($nisn, PASSWORD_DEFAULT);
    mysqli_query($conn, "UPDATE siswa SET nik='$nik', nisn='$nisn', password='$password', nama_siswa='$nama_siswa', jenis_kelamin='$jk', ttl='$ttl', nama_ibu='$nama_ibu' WHERE id_siswa='$id_siswa'");
    return mysqli_affected_rows($conn);
  }
  function naik_kelas($data){global $conn;
    $id_siswa=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id-siswa']))));
    $kelas=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['kelas']))));
    $kelas_az=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['kelas-az']))));
    $kelas=$kelas+1;
    $nama_kelas=$kelas.$kelas_az;
    $check_kelas=mysqli_query($conn, "SELECT * FROM kelas WHERE nama_kelas='$nama_kelas'");
    if(mysqli_num_rows($check_kelas)>0){
      $row=mysqli_fetch_assoc($check_kelas);
      $id_kelas=$row['id_kelas'];
      mysqli_query($conn, "UPDATE siswa SET id_kelas='$id_kelas' WHERE id_siswa='$id_siswa'");
    }
    return mysqli_affected_rows($conn);
  }
  function lulus($data){global $conn;
    $id_siswa=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id-siswa']))));
    mysqli_query($conn, "UPDATE siswa SET status_siswa='2', tgl_lulus=NOW() WHERE id_siswa='$id_siswa'");
    return mysqli_affected_rows($conn);
  }
  function hapusSiswa($data){global $conn;
    $id_siswa=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id-siswa']))));
    mysqli_query($conn, "DELETE FROM siswa WHERE id_siswa='$id_siswa'");
    return mysqli_affected_rows($conn);
  }
  function tambahKelas($data){global $conn;
    $nama_kelas=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['nama-kelas']))));
    $nama_kelas=str_replace(' ', '', $nama_kelas);
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
    $nama_kelas=str_replace(' ', '', $nama_kelas);
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
    $jam_mulai=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['jam_mulai']))));
    $jam_akhir=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['jam_akhir']))));
    $hari=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['hari']))));
    $checkJam=mysqli_query($conn, "SELECT * FROM jadwal WHERE hari='$hari' AND id_mapel='$id_mapel' AND id_kelas='$id_kelas'");
    if(mysqli_num_rows($checkJam)>0){
      $_SESSION['message-danger']="Maaf, jam yang anda masukan bertabrakan dengan jadwal lain.";
      $_SESSION['time-message']=time();
      return false;
    }
    mysqli_query($conn, "INSERT INTO jadwal(id_kelas,id_mapel,jam_mulai,jam_akhir,hari) VALUES('$id_kelas','$id_mapel','$jam_mulai','$jam_akhir','$hari')");
    return mysqli_affected_rows($conn);
  }
  function ubahjadwal($data){global $conn;
    $id_jadwal=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id-jadwal']))));
    $id_kelas=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id-kelas']))));
    $id_mapel=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id-mapel']))));
    $jam=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['jam']))));
    $hari=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['hari']))));
    $checkJam=mysqli_query($conn, "SELECT * FROM jadwal WHERE hari='$hari' AND jam='$jam' AND id_mapel='$id_mapel' AND id_kelas='$id_kelas'");
    if(mysqli_num_rows($checkJam)>0){
      $_SESSION['message-danger']="Maaf, jam yang anda masukan bertabrakan dengan jadwal lain.";
      $_SESSION['time-message']=time();
      return false;
    }
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
    $nilai_akhir=($nilai_tugas+$nilai_ulangan+$nilai_uts+$nilai_uas)/4;
    if($nilai_akhir>=90){
      $ket="A";
    }else if($nilai_akhir>=75 && $nilai_akhir<90){
      $ket="B";
    }else if($nilai_akhir>=50 && $nilai_akhir<75){
      $ket="C";
    }else if($nilai_akhir>=25 && $nilai_akhir<50){
      $ket="D";
    }else if($nilai_akhir>=0 && $nilai_akhir<25){
      $ket="E";
    }
    mysqli_query($conn, "INSERT INTO nilai(id_siswa,id_mapel,nilai_tugas,nilai_ulangan,nilai_uts,nilai_uas,nilai_akhir,ket_nilai) VALUES('$id_siswa','$id_mapel','$nilai_tugas','$nilai_ulangan','$nilai_uts','$nilai_uas','$nilai_akhir','$ket')");
    return mysqli_affected_rows($conn);
  }
  function ubahnilai($data){global $conn;
    $id_nilai=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id-nilai']))));
    $nilai_tugas=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['tugas']))));
    $nilai_ulangan=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['ulangan']))));
    $nilai_uts=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['uts']))));
    $nilai_uas=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['uas']))));
    $nilai_akhir=($nilai_tugas+$nilai_ulangan+$nilai_uts+$nilai_uas)/4;
    if($nilai_akhir>=90){
      $ket="A";
    }else if($nilai_akhir>=75 && $nilai_akhir<90){
      $ket="B";
    }else if($nilai_akhir>=50 && $nilai_akhir<75){
      $ket="C";
    }else if($nilai_akhir>=25 && $nilai_akhir<50){
      $ket="D";
    }else if($nilai_akhir>=0 && $nilai_akhir<25){
      $ket="E";
    }
    mysqli_query($conn, "UPDATE nilai SET nilai_tugas='$nilai_tugas', nilai_ulangan='$nilai_ulangan', nilai_uts='$nilai_uts', nilai_uas='$nilai_uas', nilai_akhir='$nilai_akhir', ket_nilai='$ket' WHERE id_nilai='$id_nilai'");
    return mysqli_affected_rows($conn);
  }
  function hapusnilai($data){global $conn;
    $id_nilai=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id-nilai']))));
    mysqli_query($conn, "DELETE FROM nilai WHERE id_nilai='$id_nilai'");
    return mysqli_affected_rows($conn);
  }
  function absen_hadir($data){global $conn,$id_guru,$id_mapel;
    $id_siswa=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id-siswa']))));
    $id_kelas=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id-kelas']))));
    $tgl=date('Y-m-d');
    $check_siswa=mysqli_query($conn, "SELECT * FROM absensi WHERE id_siswa='$id_siswa' AND tanggal='$tgl'");
    if(mysqli_num_rows($check_siswa)==0){
      mysqli_query($conn, "INSERT INTO absensi(id_guru,id_siswa,id_mapel,tanggal,status_hadir,id_kelas) VALUES('$id_guru','$id_siswa','$id_mapel','$tgl','Hadir','$id_kelas')");
    }else if(mysqli_num_rows($check_siswa)>0){
      mysqli_query($conn, "UPDATE absensi SET status_hadir='Hadir' WHERE id_siswa='$id_siswa' AND tanggal='$tgl'");
    }
    return mysqli_affected_rows($conn);
  }
  function absen_tidak_hadir($data){global $conn,$id_guru,$id_mapel;
    $id_siswa=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id-siswa']))));
    $id_kelas=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id-kelas']))));
    $tgl=date('Y-m-d');
    $check_siswa=mysqli_query($conn, "SELECT * FROM absensi WHERE id_siswa='$id_siswa' AND tanggal='$tgl'");
    if(mysqli_num_rows($check_siswa)==0){
      mysqli_query($conn, "INSERT INTO absensi(id_guru,id_siswa,id_mapel,tanggal,status_hadir,id_kelas) VALUES('$id_guru','$id_siswa','$id_mapel','$tgl','Tidak Hadir','$id_kelas')");
    }else if(mysqli_num_rows($check_siswa)>0){
      mysqli_query($conn, "UPDATE absensi SET status_hadir='Tidak Hadir' WHERE id_siswa='$id_siswa' AND tanggal='$tgl'");
    }
    return mysqli_affected_rows($conn);
  }
  function absen_alpa($data){global $conn,$id_guru,$id_mapel;
    $id_siswa=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id-siswa']))));
    $id_kelas=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id-kelas']))));
    $tgl=date('Y-m-d');
    $check_siswa=mysqli_query($conn, "SELECT * FROM absensi WHERE id_siswa='$id_siswa' AND tanggal='$tgl'");
    if(mysqli_num_rows($check_siswa)==0){
      mysqli_query($conn, "INSERT INTO absensi(id_guru,id_siswa,id_mapel,tanggal,status_hadir,id_kelas) VALUES('$id_guru','$id_siswa','$id_mapel','$tgl','Alpa','$id_kelas')");
    }else if(mysqli_num_rows($check_siswa)>0){
      mysqli_query($conn, "UPDATE absensi SET status_hadir='Alpa' WHERE id_siswa='$id_siswa' AND tanggal='$tgl'");
    }
    return mysqli_affected_rows($conn);
  }