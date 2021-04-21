
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>Home Page</title>
    <meta charset="utf-8">

    <?php
    require 'config.php';
     ?>

     <style>
        .wrapper{
            width: 90%;
            margin: 0 auto;
            background-color: #E9F8FC;
            font-size: 120%;
        }
        table{
          text-align: center;
          vertical-align: middle;

        }
        table thead tr th{
          text-align: center;
          vertical-align: middle;
        }

    </style>

  </head>


  <body>

    <div class="wrapper">
      <h1 class="pull-left" >Users List</h1><br><br>
      <a href="addUser.php" class="btn btn-success pull-right">
        <i class="fa fa-plus"></i>
        Add New User
      </a>
    </div>




    <?php

    if(! $conn ) {
      die('Could not connect: ' . mysqli_error($conn));
    }
    //mysqli_close($conn);
    $selectSql = "select * from Users";
    $selectResult = mysqli_query($conn,$selectSql );

    if(! $selectResult ) {
      die('Could not get data: ' . mysqli_error($conn));
     }

    echo "<div class=\"wrapper\">
    <table style= \"color:black \" class=\"table\">
      <thead >
      <tr >
        <th>Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Gender</th>
        <th>Mail Status</th>
        <th>View</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>";
    if (mysqli_num_rows($selectResult) > 0) {
      // output data of each row
      while($row = mysqli_fetch_assoc($selectResult)) {
        echo "<tbody>
                <tr>
                  <td> {$row['id']} </td>
                  <td> {$row['name']} </td>
                  <td> {$row['email']} </td>
                  <td> {$row['gender']} </td>
                  <td> {$row['mail_status']} </td>

                  <td>
                    <a href=\"read-view.php?id='{$row['id']}'\">
                      <span class=\"fa fa-eye\" style=\"font-size:24px\"></span>
                    </a>
                  </td>

                  <td>
                    <a href=\"update.php?id='{$row['id']}'\">
                      <span class=\"fa fa-pencil\" style=\"font-size:24px\"></span>
                    </a>
                  </td>

                  <td>
                    <a href=\"delete.php?id='{$row['id']}'\">
                      <span class=\"fa fa-trash-o\" style=\"font-size:24px\"> <?php  ?></span>
                    </a>
                  </td>

                </tr>
              </tbody>
                ";
      }
    }
    else {
     echo "0 results";
    }
    echo "</table>
    </div>";
    mysqli_close($conn);

     ?>



  </body>
</html>
