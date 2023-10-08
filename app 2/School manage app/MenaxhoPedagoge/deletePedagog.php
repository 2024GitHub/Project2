<?php
 include("../database/connection.php");
 session_start(); 

  if (!isset($_SESSION['emriAdminit'])) { 
    header("location: ../logimi/login.php") ; }
    else {
$sql = "DELETE FROM pedagog WHERE ID='$_GET[delete]'";
if(mysqli_query($con,$sql)){
    header("refresh:1; url=selectPedagog.php");
}else
    echo "Not deleted";
}
?>