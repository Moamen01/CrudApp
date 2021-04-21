<?php
//echo $_GET["id"];
require 'config.php';

$user_id = $_GET["id"];

$selectSql = "select * from Users where id = {$_GET["id"]}";
$selectResult = mysqli_query($conn,$selectSql );
if(! $selectResult ) {
  die('Could not get data: ' . mysqli_error($conn));
}

$name = $email = $gender = $status = '';
if (mysqli_num_rows($selectResult) == 1){
  while($row = mysqli_fetch_assoc($selectResult)){
    $name = $row['name'];
    $email = $row['email'];
    $gender = $row['gender'];
    $status = $row['mail_status'];

  }
}

 ?>
