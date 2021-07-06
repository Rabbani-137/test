<?php
     function Createdb(){
		$servername = 'localhost';
		$username = 'root';
		$password = '';
		$dbname = 'webster';

		//Create connection 
		$con = mysqli_connect($servername,$username,$password, $dbname);

     	//check conection 
     	if (!$con) {
     		die("Connection Failed:".mysqli_connect_error());
     	}
          else {
               echo "connection ok";
		  }

     };
?>