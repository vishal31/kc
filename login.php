<?php
session_start();
require_once "dbconn.php";

if(isset($_POST['login']) ) {

    if( isset($_POST['usrname']) &&  isset($_POST['pswrd']) ) {

          if(!empty($_POST['usrname']) && !empty($_POST['usrname']) ) {

             $usrname = $_POST['usrname'];
             $pswrd   = $_POST['pswrd'];
            
             $you = $_SESSION['you'];

            $sql = "SELECT * FROM `$you` WHERE username = '$usrname' AND paswrd = '$pswrd'; ";

             $res = $mysqli->query($sql);

             if($mysqli->error) {
                   echo $mysqli->error;
             }
            else{
                  if($res->num_rows > 0) {

                        $row = $res->fetch_assoc();
                        $_SESSION['username'] = $row['username'];
                        $location = $you.'.php';    
                        header("Location: $location");

                  }
                    else{
                          echo "Username and Password does not exist";
                    }
                  
            }
    }
  }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Login</title>

    <link rel="stylesheet" href="style.css">
    
</head>


<body>

      <header>
             <h3> Login </h3>
      </header>

  

             <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
             
                   <label for="usrname"> Username </label>
                   <input type="text" id="usrname" name="usrname" placeholder="Username"> 

                   <label for="pswrd"> Password </label>
                   <input type="password" id="pswrd" name="pswrd" placeholder="Password">

                   <input type="submit" name="login" value="Login">
             </form>
       
</body>
</html>