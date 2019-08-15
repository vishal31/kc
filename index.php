<?php
  session_start();
   if(isset($_GET['you']) ) {
     
     $_SESSION['you'] = $_GET['you'];   
     $you = 'login.php?you='.$_GET['you'];
     header("Location: $you");      
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Home Page</title>

        <style>
                h1 { text-align: center; }

                span {
                      display: block;
                      text-align: center;
                      color: red;}

                #btn{ margin-left: 30%; }

                #btn a {
                         display: inline-block;
                         text-decoration: none;
                         text-align: center;
                         padding: .2em 2em .2em 2em;
                         color: white;
                         background-color: purple;
                         margin-top: 1em;
                }

                #btn a:hover {
                        padding: .3em 2.3em .3em 2.3em;
                }


      @media only screen and (max-width: 1400px) {

        #btn{ margin-left: 10%; }
  
        #btn a {
                display: block;
                width: 70%;
                
            }

      }          
        </style>
</head>


<body>

<h1> Are You </h1>
<span> Select any one </span>

<div id="btn">


       <a href="index.php?you=super_admin" > SUPER ADMIN </a>
       <a href="index.php?you=add_admin" >     SUB ADMIN   </a>
       <a href="index.php?you=add_emp">     EMPLOYEE    </a>
       

</div>





</body>
</html>