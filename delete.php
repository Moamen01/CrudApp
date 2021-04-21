<?php
require 'config.php';
function delete_record($id) {
  global $conn;
  $deleteSql = "delete from Users where id={$id}";
  //echo $deleteSql;

  if (mysqli_query($conn, $deleteSql)) {
    header("location: /demo/day4/home.php");
  } else {
    echo "Error deleting record: " . mysqli_error($conn);
  }
  mysqli_close($conn);

  }
if (isset($_GET['id'])) {
  delete_record($_GET['id']);
}

 ?>
