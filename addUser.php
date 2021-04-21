<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Registration</title>

    <style>
       .wrapper{
           width: 600px;
           margin: 0 auto;
           background-color: #E9F8FC;
       }
   </style>

  </head>
  <body>

    <?php
    require 'config.php';

    $required = 0 ;
    $name = $email = $gender = $status = '';

    if (!empty($_POST["name"])){
      $name = $_POST["name"];
    }
    else{
      $required = 1;
    }
    if (!empty($_POST["email"])){
      $email = $_POST["email"];
    }
    else{
      $required = 1;
    }
    if (!empty($_POST["gender"])){
      $gender = $_POST["gender"];
    }
    else{
      $required = 1;
    }
    if(!empty($_POST["status"])){
      $status = "yes";
    }
    else{
      $status = "no";
    }
     ?>

     <div class="wrapper">
       <h1>User Registration Form</h1> <br>
       <p>Please fill this form and submit to add the record to the Database</p>
     </div>


    <form class="wrapper" action="<?php $_PHP_SELF ?>" method="post">
      <div class="form-group">
        <label>Name:</label>
        <input type="text" class="form-control" placeholder="Enter name:" name="name" value="<?php echo ($required) ? $name:'';?>" >
      </div>

      <div class="form-group">
        <label>Email:</label>
        <input type="email" class="form-control" placeholder="Enter email" name="email" value="<?php echo ($required) ? $email:'';?>" >
      </div>



      <div class="form-group">
        <label>Gender:</label><br>
        <input type="radio" id="gender" name="gender" value="M">
        <label for="gender">Male:</label>
        <input type="radio" id="gender" name="gender" value="F">
        <label for="gender">Female:</label>
      </div>


      <div class="checkbox">
        <label><input type="checkbox" name="status"> Receive E-mails from us:</label>

      </div>

      <input type="submit" name="Submit" value="Submit" class="btn btn-primary"><br><br>
      <p><a href="/demo/day4/home.php" class="btn btn-primary">Back</a></p>

    </form>


    <?php
    if (!$required){ // if there is no missing required feilds

      $sqlInsert = "insert into Users (name, email, gender, mail_status) values ('$name', '$email', '$gender', '$status')";
      $retval = mysqli_query($conn,$sqlInsert);
      if(! $retval ) {
        die('Could not insert to table: ' . mysqli_error($conn));
      }
      echo "<br>Data inserted to table successfully\n";
      mysqli_close($conn);

      $required = 0;
    }
     ?>

  </body>
</html>
