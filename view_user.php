<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>View User</h2>
  <?php 
                  $servername = 'localhost';
                  $username = 'root';
                  $password = '';
                  $dbname = 'webster';
                  $con = mysqli_connect($servername,$username,$password, $dbname);
                  if(isset($_GET['del'])){
                    $del_id = $_GET['del'];
                  $delete = "DELETE FROM user WHERE id=$del_id";
                  $run_delete = mysqli_query($con,$delete);  
                  }
       
  ?>
          
  <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Password</th>
        <th>Image</th>
        <th>Details</th>
        <th>Delete</th>
        <th>Edit</th>
      </tr>
    </thead>
    <tbody>
    <?php
           $servername = 'localhost';
           $username = 'root';
           $password = '';
           $dbname = 'webster';
           $con = mysqli_connect($servername,$username,$password, $dbname);

           $select = "SELECT * FROM user";
           $run = mysqli_query($con,$select);
         while ($row_user = mysqli_fetch_array($run)){ //value gula table e show koranor jonna
           $user_id = $row_user['id'];           // data row input from database
           $user_name = $row_user['user_name'];
           $user_email = $row_user['user_email'];
           $user_password = $row_user['user_password'];
           $user_image = $row_user['user_image'];
           $user_details = $row_user['user_details'];
     ?>
      <tr>
        <td><?php echo $user_id ?></td>  <!--  call korlm ekhn e -->
        <td><?php echo $user_name ?></td>
        <td><?php echo $user_email ?></td>
        <td><?php echo $user_password ?></td>
        <td><img src="upload/"<?php echo $user_image ?> height=""></td>
        <td><?php echo $user_details ?></td>
        <td><a class="btn btn-danger" href="view_user.php ?del=<?php echo $user_id ?> ">Delete</a></td>
        <td><a class="btn btn-success" href="edit.php ?edit=<?php echo $user_id ?> ">Edit</a></td>
      </tr>
         <?php }?>
    </tbody>
  </table>
</div>

</body>
</html>
