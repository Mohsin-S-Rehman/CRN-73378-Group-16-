
<?php

define("connectionString", "mysql:dbname=mtk");

 define("userName", "root");

 define ("password", "");

 if (empty($_GET['fname']) == true || empty($_GET['lname']) == true || empty($_GET['email']) ||empty($_GET['pass'])) {

    echo '<div id="top-bar">
    <img class="banner-icons" id="logo" src="src/logo.png" width="150pt" height="100pt">
    
    </div>
        <div id="loginbox">
          <img class="login-icons" id="logo" src="src/logo.png" width="150pt" height="100pt">
          <p id="register-header">Registration Failed</p>
          <p id="login-headers">Please enter all information to register an account</p>
        </div>  <div id="sideimage"><img src="src/login.jpg" width="700pt" height="795pt"></div>';

    }


    else if(!strstr($_GET['pass'],'_')&&!strstr($_GET['pass'],'-')&&!strstr($_GET['pass'],'!')&&!strstr($_GET['pass'],'@')&&!strstr($_GET['pass'],'#') &&!strstr($_GET['pass'],'$') &&!strstr($_GET['pass'],'%')&&!strstr($_GET['pass'],'^')&&!strstr($_GET['pass'],'&')&&!strstr($_GET['pass'],'*')&&!strstr($_GET['pass'],'(')&&!strstr($_GET['pass'],')')&&!strstr($_GET['pass'],'=')&&!strstr($_GET['pass'],'+')){

      echo '<div id="top-bar">
    <img class="banner-icons" id="logo" src="src/logo.png" width="150pt" height="100pt">
    
    </div>
        <div id="loginbox">
          <img class="login-icons" id="logo" src="src/logo.png" width="150pt" height="100pt">
          <p id="register-header">Registration Failed</p>
          <p id="login-headers">Password does not meet symbol requirements</p>
        </div>  <div id="sideimage"><img src="src/login.jpg" width="700pt" height="795pt"></div>';

    }

    else if (!strstr($_GET['pass'],'0')&&!strstr($_GET['pass'],'1')&&!strstr($_GET['pass'],'2')&&!strstr($_GET['pass'],'3')&&!strstr($_GET['pass'],'4')&&!strstr($_GET['pass'],'5')&&!strstr($_GET['pass'],'6')&&!strstr($_GET['pass'],'7')&&!strstr($_GET['pass'],'8')&&!strstr($_GET['pass'],'9')) {
      echo '<div id="top-bar">
    <img class="banner-icons" id="logo" src="src/logo.png" width="150pt" height="100pt">
    
    </div>
        <div id="loginbox">
          <img class="login-icons" id="logo" src="src/logo.png" width="150pt" height="100pt">
          <p id="register-header">Registration Failed</p>
          <p id="login-headers">Password does not meet number requirements</p>
        </div>  <div id="sideimage"><img src="src/login.jpg" width="700pt" height="795pt"></div>';
    }
    
    else if (strlen($_GET['pass'])<8) {
      echo '<div id="top-bar">
    <img class="banner-icons" id="logo" src="src/logo.png" width="150pt" height="100pt">
    
    </div>
        <div id="loginbox">
          <img class="login-icons" id="logo" src="src/logo.png" width="150pt" height="100pt">
          <p id="register-header">Registration Failed</p>
          <p id="login-headers">Password does not meet length requirements</p>
        </div>  <div id="sideimage"><img src="src/login.jpg" width="700pt" height="795pt"></div>';
    }

    

    

    
    
    else{

      $first_name = $_GET['fname'];
      $last_name =$_GET['lname'];
      $email = $_GET['email'];
      $pass = $_GET['pass'];


      try{

        $conn = new PDO(connectionString,userName,password);



         $conn2 = mysqli_connect("localhost", userName, password);
          mysqli_select_db($conn2,"mtk");


             $sql = "SELECT * FROM `logininfo` WHERE `email` = '". $email. "'";

             $result = mysqli_query($conn2,$sql);
             $useremails = array();

        if (mysqli_num_rows($result)>0) {

            echo '<div id="top-bar">
            <img class="banner-icons" id="logo" src="src/logo.png" width="150pt" height="100pt">
    
            </div>
              <div id="loginbox">
              <img class="login-icons" id="logo" src="src/logo.png" width="150pt" height="100pt">
              <p id="register-header">Registration Failed</p>
              <p id="login-headers">The Email you entered has already been registered for another account</p>
            </div>  
            <div id="sideimage">
              <img src="src/login.jpg" width="700pt" height="795pt">
            </div>';


           
        }

        else{

            $obtainTableNum = mysqli_query($conn2, "SELECT * FROM logininfo");

             $numOfRows = mysqli_num_rows($obtainTableNum);

             $user_id = $numOfRows + 100;

             $sql = "INSERT INTO `logininfo` (`User_ID`, `first_name`, `last_name`, `email`, `password`) values ('". $user_id ."','". $first_name ."','". $last_name ."','".$email."','" . $pass. "')";

             echo '<div id="top-bar">
            
            <img class="banner-icons" id="logo" src="src/logo.png" width="150pt" height="100pt">
    
            </div>
              <div id="loginbox">
              <img class="login-icons" id="logo" src="src/logo.png" width="150pt" height="100pt">
              <p id="register-header">Registration Complete</p>
              <p id="login-headers">Please go back and login or click the link below</p>
              <a href="login.html"><p id="transfertologin"> click here to be taken to the login page</p></a>
            </div>  
            <div id="sideimage">
              <img src="src/login.jpg" width="700pt" height="795pt">
            </div>';

             $conn ->exec($sql);

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