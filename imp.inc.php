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








if(isset($_POST['add_admin']) ) {

      if(isset($_POST['name']) && isset($_POST['addrr']) && isset($_POST['dob']) && isset($_POST['gender']) &&  isset($_POST['usrname']) &&  isset($_POST['pswrd'])  ) {

             
             $name    = $_POST['name'];    
             $addrr   = $_POST['addrr']; 
             $dob     = $_POST['dob'];
             $gender  = $_POST['gender']; 
             $usrname = $_POST['usrname'];
             $pswrd   = $_POST['pswrd'];  


             if(empty($name) || empty($addrr) || empty($dob) || empty($gender) || empty($usrname) || empty($pswrd) ) {

                    echo " Empty";
             }
               else{                    
                      if($mysqli->connect_errno) {
                             echo $mysqli->connect_error;
                      }
                       else{
                               $sql = "INSERT INTO $table VALUES('NULL','$name', '$addrr', '$dob', '$gender', '$usrname', '$pswrd') ";

                                $query = $mysqli->query($sql);

                               if($mysqli->error) {
                                      echo $mysqli->error;
                                      header("Location: index.php");
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

