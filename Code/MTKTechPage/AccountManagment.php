<?php
session_start()
?>
<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Home</title>
	<link rel="stylesheet" href="mainpage.css" />
</head>
<body>

	<div id="top-bar">

		<img class="banner-icons" id="logo" src="src/logo.png" width="150pt" height="100pt">
		

	</div>

	<div>
		 <input id="previousorders"type="submit" value="View Past Orders"/>

	</div>

	



</body>
</html>

<?php

define("connectionString", "mysql:dbname=mtk");

 define("userName", "root");

 define ("password", "");

$userid = $_SESSION['userid'];

echo "Orders For User ID ".$userid;

try{

    $conn = new PDO(connectionString,userName,password);


    
    $conn2 = mysqli_connect("localhost", userName, password);
    mysqli_select_db($conn2,"mtk");

    $sql = "SELECT `first_name` FROM `logininfo` WHERE `User_ID`=".$userid;
    $result = mysqli_query($conn2,$sql);


	    


}

catch(PDOException $e){

                echo $e->getMessage();
              echo "erro connection failed";

         }
?>