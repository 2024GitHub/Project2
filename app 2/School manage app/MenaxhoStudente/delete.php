<?php
include("../database/connection.php");
session_start(); 

  if (!isset($_SESSION['emriAdminit'])) { 
    header("location: login.php") ; }
    else {

$viti=$_GET['viti'];
$id=$_GET['delete'];
if($viti==1){
   if(delete(1,$id)){

        $sql2="DELETE FROM std  WHERE ID_Studenti='$id'";
        if(mysqli_query($con,$sql2)){
            header("refresh:1; url=select.php");     
        }
    }
        else
        echo"Not deleted";
}
else if($viti==2){
    if(delete(1,$id)&delete($viti,$id)){

        $sql2="DELETE FROM std  WHERE ID_Studenti='$id'";
        if(mysqli_query($con,$sql2)){
            header("refresh:1; url=select.php");     
        }
    }
        else
        echo"Not deleted";

    
}else{
    if(delete(1,$id)&delete(2,$id)&delete($viti,$id)){

        $sql2="DELETE FROM std  WHERE ID_Studenti='$id'";
        if(mysqli_query($con,$sql2)){
            header("refresh:1; url=select.php");     
        }
    }
        else
        echo"Not deleted";

}

 }

function delete($viti,$id){
    include("../database/connection.php");
    $sql1="DELETE FROM viti$viti  WHERE IDS = '$id'";
if(mysqli_query($con,$sql1)){
    $sql = "DELETE FROM mungesat_viti$viti  WHERE ID_St='$id'";
    
if(mysqli_query($con,$sql)){
    $sql2 = "DELETE FROM laborator_dk_viti$viti  WHERE IDS='$id'";
if(mysqli_query($con,$sql2)){
    return true;
}   
}

else{
    
return false;
}

}

else{
    return false;
}

}
    

  
?>