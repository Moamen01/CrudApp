
<!DOCTYPE html>
<html lang="en" dir="ltr">
 <head>
   <meta charset="utf-8">
   <title>View user info</title>
   <?php
   require 'read-model.php';
    ?>
   <style>
      .wrapper{
          width: 600px;
          margin: 0 auto;
          background-color: #E9F8FC;
      }
      .form-group{
        font-size: 140%;
      }
  </style>
 </head>
 <body>

   <div class="wrapper">
     <div class="container-fluid">
       <div class="row">
         <div class="col-md-12">
           <h1 class="mt-5 mb-3">View User Info</h1> <br><br>

           <div class="form-group">
             <label >Name</label>
             <p><?php echo $name; ?></p>
           </div>

           <div class="form-group">
             <label >Email</label>
             <p><?php echo $email; ?></p>
           </div>

           <div class="form-group">
             <label >Gender</label>
             <p><?php echo $gender; ?></p>
           </div>

           <div class="form-group">
             <p><?php echo "Agrees to receive emails from us: "; ?><strong><?php echo $status; ?></strong></p>
           </div>

           <p><a href="/demo/day4/home.php" class="btn btn-primary">Back</a></p>
         </div>
       </div>
     </div>
   </div>
 </body>
</html>
