

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Edit User</title>
     <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
            background-color: #E9F8FC;
            font-size: 140%;
        }
    </style>
   </head>
   <body>

     <?php
     
     require 'read-model.php';

     $required = 0 ;

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

      ?>

      <div class="wrapper">
        <h1>Edit User</h1> <br>
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
          <input type="radio" id="gender" name="gender" value="M" <?php if ($gender === 'M') {echo 'checked';}?>>
          <label for="gender">Male:</label>
          <input type="radio" id="gender" name="gender" value="F" <?php if ($gender === 'F') {echo 'checked';}?>>
          <label for="gender">Female:</label>
        </div>


        <div class="checkbox">
          <label><input type="checkbox" name="status" <?php if ($status === 'yes') {echo 'checked';}?>> Receive E-mails from us:</label>

        </div>

        <input type="submit" name="Submit" value="Update" class="btn btn-primary"><br><br>
        <p><a href="/demo/day4/home.php" class="btn btn-primary">Back</a></p>

      </form>

      <?php
      if (!$required){ // if there is no missing required feilds

        $sqlUpdate = "update Users set name = '$name', email='$email', gender='$gender', mail_status = '$status' where id = {$_GET["id"]} ";

        $retval = mysqli_query($conn,$sqlUpdate);
        if(! $retval ) {
          die('Could not update data: ' . mysqli_error($conn));
        }
        echo "<br>Data updated successfully\n";
        mysqli_close($conn);

        $required = 0;
      }
       ?>

   </body>
 </html>
