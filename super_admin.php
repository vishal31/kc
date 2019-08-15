<?php
      $table = 'add_admin';    
      require_once "imp.inc.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Super Admin Panel </title>

    <link rel="stylesheet" href="style.css">

</head>


<body>

       <header>
               <h3> SUPER ADMIN PANEL </h3>
               <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                      <input type="submit" name="logout" value="Logout">
               </form>
       </header>
    

       <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"> 

               <label for="name"> Name </label>
               <input type="text" name="name" id="name" placeholder="Name">

               <label for="addrr"> Address </label>
               <input type="text" name="addrr" id="addrr" placeholder="Address"> 

               <label for="dob"> Date of Birth </label>
               <input type="date" name="dob" id="dob" placeholder="Date of Birth">


               <span> Gender </span> <br><br>

               <label for="male"> Male </label>
               <input type="radio" name="gender" value="male" id="male">

               <label for="female"> Female </label>
               <input type="radio" name="gender" value="female" id="female"> 

               <label for="usrname"> Username </label>
               <input type="text" name="usrname" id="usrname" placeholder="Username">

               <label for="pswrd"> Password </label>
               <input type="password" name="pswrd" id="pswrd" placeholder="Password">

               
               <input type="submit" name="add_admin" value="Add Admin"> 
 

      
       </form>



<hr>

<div id="admin_view"> 

<h1> Admin View </h1>

       <table border="1">
            <tr>
                <th> Name </th>
                <th> Address </th>
                <th> DOB </th>
                <th> Gender </th>
                <th> Username </th>
                <th> Password </th>
              </tr>
      

             <!-- data -->

                              
                    
            
             
                <?php 
                    $sql = "SELECT * FROM add_admin";
                    $res = $mysqli->query($sql);
                     
                    $row = $res->fetch_all(MYSQLI_ASSOC);

                    foreach($row as $value) { ?>  
                                                 
                    <tr>
                      <td> <?php echo $value['name'] ;?> </td>
                      <td> <?php echo $value['address'] ;?> </td>
                      <td> <?php echo $value['dob'] ;?> </td>
                      <td> <?php echo $value['gender'] ;?> </td>
                      <td> <?php echo $value['username'] ;?> </td>
                      <td> <?php echo $value['paswrd'] ;?> </td>
                    </tr>                   
                   
                <?php }  ?>
                    

               
             
      </table>
</div>

</body>
</html>