<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit User</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Edit User</h2>
  <?php 
                  $servername = 'localhost';
                  $username = 'root';
                  $password = '';
                  $dbname = 'webster';
                  $con = mysqli_connect($servername,$username,$password, $dbname);
                  if(isset($_GET['edit'])){
                    $edit_id = $_GET['edit'];
                    $select = "SELECT * FROM user WHERE id ='$edit_id'";
                    $run = mysqli_query($con,$select);
                   $row_user = mysqli_fetch_array($run); //value gula table e show koranor jonna
                      $user_id = $row_user['id'];           // data row input from database
                      $user_name = $row_user['user_name'];
                      $user_email = $row_user['user_email'];
                      $user_password = $row_user['user_password'];
                      $user_image = $row_user['user_image'];
                      $user_details = $row_user['user_details'];
                
                  }
       
  ?>
  <form action="" method="post" enctype="multipart/form-data">
     <div class="form-group">
      <label>Name:</label>
      <input type="text" class="form-control" value="<?php echo $user_name; ?>" placeholder="Enter Name" name="user_name">
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" value="<?php echo $user_email; ?>" placeholder="Enter email" name="user_email">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" value="<?php echo $user_password; ?>" placeholder="Enter password" name="user_password">
    </div>
     <div class="form-group">
      <label>Image:</label>
      <input type="file" class="form-control" value="<?php echo $user_image; ?>" placeholder="Enter Image" name="user_image">
    </div>
     <div class="form-group">
      <label>Details:</label>
      <textarea class="form-control" name="user_details"><?php echo $user_details; ?></textarea>
    </div>
  <!--   <div class="form-group form-check">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="remember"> Remember me
      </label>
    </div> -->
    <input type="submit" name="insert-btn" class="btn btn-primary" />
  </form>

  <?php
       $servername = 'localhost';
       $username = 'root';
       $password = '';
       $dbname = 'webster';
       $con = mysqli_connect($servername,$username,$password, $dbname);
      
          if(isset($_POST['insert-btn'])){

          $euser_name = $_POST['user_name'];
          $euser_email = $_POST['user_email'];
          $euser_password = $_POST['user_password'];
          $euser_image = $_FILES['user_image']['name'];
          $etmp_name = $_FILES['user_image']['tmp_name'];
          $euser_details = $_POST['user_details'];

          $update = "UPDATE user SET user_name='$euser_name',user_email='$euser_email',
                    user_password='$euser_password',user_image='$euser_image',user_details='$euser_details' WHERE id='$edit_id' ";
           
           if(mysqli_query($con,$update)){
             echo"Done";
             move_uploaded_file($etmp_name,"upload/$euser_image");
           }
           else{
             echo "NO";
           }

           }
  ?>
  <br>
  <a class="btn btn-primary" href="view_user.php">Vies User</a>


</div>

</body>
</html>
