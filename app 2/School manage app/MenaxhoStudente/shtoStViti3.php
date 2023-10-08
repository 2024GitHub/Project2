<?php
 include("../database/connection.php");
$id=$_GET['id'];
$vitiShk=$_GET['viti'];
$vitVj=substr($vitiShk,0,4);
$vitiRi=(int)$vitVj+1;
$vitiVj1=substr($vitiShk,5,8);
$vitiRi1=(int)$vitiVj1+1;
$vitiRi2=$vitiRi."_".$vitiRi1 ;

$sql4="INSERT INTO laborator_dk_viti3(IDS) VALUES ('$id')";
$query4=mysqli_query($con,$sql4);


    if($query4){
      $sql="INSERT INTO mungesat_viti3 (ID_St) VALUES ('$id')";
      $query=mysqli_query($con,$sql);
      
if($query){

            $sql1="INSERT INTO viti3 (IDS , ID_det , ID_m) VALUES ('$id' , '$id' , '$id')";
    $query1=mysqli_query($con,$sql1);
    if($query1){ 


        $sql2 = "UPDATE std SET viti=3 , Viti_shkollor='$vitiRi2' WHERE ID_Studenti='$id'";
        $query2=mysqli_query($con,$sql2);
        if($query2){
         ?>
    
    <script>
     alert("Studenti u regjistrua ne vit te 3");
     window.location.href = "select.php";
    </script>

  <?php  }
    }
    
  
}  
}        
else { ?>
  <script>
       alert("Studenti eshte i regjistruar ne vit te 3");
       window.location.href = "select.php";
      </script>
  
    <?php
  }             
      
  mysqli_close($con); 
  
  
  ?>