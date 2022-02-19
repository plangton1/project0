<?php
// Create connection
$connection = mysqli_connect("localhost", "root", "" , "catalog");

// Check connection
if (mysqli_connect_error()) {
  echo"Connection failed: " . mysqli_connect_error();
  exit();
}else{
echo "Connected successfully";
}
// session_start();
?>