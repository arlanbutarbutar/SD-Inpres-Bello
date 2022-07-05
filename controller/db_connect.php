<?php 
  // $conn=mysqli_connect("localhost","gaslvldx_netmedia","Itha040700_","gaslvldx_sd_inpres_bello");
  $conn=mysqli_connect("localhost","root","","sd_inpres_bello");
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }