<?
require_once("assest/php/db.php");
$con = Createdb();


//login

if(isset($_POST['login-btn'])){
  login();
}
if(isset($_POST['insert-btn'])){
    insert();
}


 function login(){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $select = "SELECT FROM user WHERE user_email = '$email'";

    $run = mysqli_query($_GLOBALS['con'],$select);

    $row_user = mysqli_fetch_array($run);

    $db_email =  $row_user('user_email');
    $db_password =  $row_user('user_password');

    if($email = $db_email && $password = $db_password){
        echo "<script>window.open('index.php','_self');</script>"; //this javascript code open new window and page
        $_SESSION['email'] = $db_email;
    }
    else{
        echo "wrong password and email";
    }
 }
//create button click
function insert(){

    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $user_details = $_POST['user_details'];

    $insert = "INSERT INTO user(user_name,user_email,user_password,user_image,user_details)
                VALUES('$user_name','$user_email,'$user_password','','$user_details')";

    $value_insert = mysqli_query($_GLOBALS['con'],$insert);
    if ($value_insert === true){
        echo "ok";
    }
    else{
        echo "no"
    }
                

};

function text($class , $msg){
    $text = "<h6 class='$class'>$msg</h6>";
    echo $text;
}
?>