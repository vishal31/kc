<?php
     session_start();
     require_once "dbconn.php";
     
     $you = $_SESSION['username'];
     if(isset($_POST['logout']) ) {
             session_destroy();
             session_unset();
             
             if(!isset($_SESSION['username']) ) {
                   header("LOcation: index.php");                
             }
     }
     
     
  
     
     
     if(isset($_POST['add_info']) ) {
     
      if(isset($_POST['mother']) && isset($_POST['father']) ) {
 
             
             $father    = $_POST['father'];    
             $mother   = $_POST['mother']; 
             
 
             if(empty($father) || empty($mother) ) {
 
                    echo " Empty";
             }
               else{                    
                      if($mysqli->connect_errno) {
                             echo $mysqli->connect_error;
                      }
                       else{
                               $sql = "INSERT INTO emp_info VALUES('NULL','$father', '$mother') ";
 
                                $query = $mysqli->query($sql);
 
                               if($mysqli->error) {
                                      echo $mysqli->error;
                                      header("Location: add_emp.php");
                               }
                                 else{
                                      $you = $_SESSION['you'].'.php';
                                      header("Location: $you");
                                 }
                                 
                       }
               }
      }
        else{
               echo "NOT Set";
        }
 
 
 }
 
     
 ?>    
     
  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Admin Panel </title>

    <link rel="stylesheet" href="style.css">

</head>


<body>

       <header>
               <h3> Employee </h3>
               <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                      <input type="submit" name="logout" value="Logout">
               </form>
       </header>
    

       <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"> 

               <label for="mother"> Mother Name </label>
               <input type="text" name="mother" id="mother" placeholder="Mother Name">

               <label for="father"> Father Name </label>
               <input type="text" name="father" id="father" placeholder="Father Name"> 

               
               
               <input type="submit" name="add_info" value="Submit"> 
 

      
       </form>



   
     








<hr>

<div id="admin_view"> 

<h1> Employee Detail </h1>

       <table border="1">
            <tr>
                <th> Father Name </th>
                <th> Mother Name </th>
            </tr>
      

             <!-- data -->
     
                    
            
             
                <?php 
                
                    $sql = "SELECT * FROM emp_info";
                    $res = $mysqli->query($sql);
                     
                    $row = $res->fetch_all(MYSQLI_ASSOC);
                    foreach($row as $value) { ?>  
                                                 
                    <tr>
                      <td> <?php echo $value['father_name'] ;?> </td>
                      <td> <?php echo $value['mother_name'] ;?> </td>
                    </tr>                   
                   
                <?php }  ?>
                    

               
             
      </table>
</div>

</body>
</html>