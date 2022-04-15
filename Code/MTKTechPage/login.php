
<?php

session_start();

define("connectionString", "mysql:dbname=mtk");

 define("userName", "root");

 define ("password", "");


   if (empty($_GET['email'])) {
    echo '<div id="top-bar">
    <img class="banner-icons" id="logo" src="src/logo.png" width="150pt" height="100pt">
    
    </div>
        <div id="loginbox">
          <img class="login-icons" id="logo" src="src/logo.png" width="150pt" height="100pt">
          <p id="register-header">Login Failed</p>
          <p id="login-headers">Please enter email information to Login</p>
        </div>  <div id="sideimage"><img src="src/login.jpg" width="700pt" height="795pt"></div>';

    }

    else if (empty($_GET['pass'])) {
       echo '<div id="top-bar">
    <img class="banner-icons" id="logo" src="src/logo.png" width="150pt" height="100pt">
    
    </div>
        <div id="loginbox">
          <img class="login-icons" id="logo" src="src/logo.png" width="150pt" height="100pt">
          <p id="register-header">Login Failed</p>
          <p id="login-headers">Please enter password information to Login</p>
        </div>  <div id="sideimage"><img src="src/login.jpg" width="700pt" height="795pt"></div>';
    }
    
    else{

    	
    	$email = $_GET['email'];
    	$pass = $_GET['pass'];


    	try{

			 	$conn = new PDO(connectionString,userName,password);



			   $conn2 = mysqli_connect("localhost", userName, password);
			    mysqli_select_db($conn2,"mtk");


             $sql = "SELECT '".$pass. "'"."FROM `logininfo` WHERE `password` ='".$pass."'";

             $result = mysqli_query($conn2,$sql);
             $useremails = array();

        if (mysqli_num_rows($result)>0) {

         $sql = "SELECT SUM(User_ID) AS sum FROM `logininfo`  WHERE email ='". $email."'"." AND password ='".$pass."'";
         echo $sql;

         $id = mysqli_query($conn2,$sql);

         $fetchID = mysqli_fetch_assoc($id);

         $userid = $fetchID['sum'];

         $_SESSION['userid'] = $userid;

         echo "<script> location.href='MTKTechMainPageUser.html'; </script>";

        exit;



         


           


           
        }

        else{

         echo "no account has this email  or password is incorrect";

        }



			    


			    

  		}

   catch(PDOException $e){

   }

}


    


 

?>

<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Home</title>
  <link rel="stylesheet" href="login.css" />
</head>
<body>

 

  




</body>

</html>

