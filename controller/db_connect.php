<?php 
  $conn=mysqli_connect("localhost","root","","sd_inpres_bello");
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }