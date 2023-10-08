<html>
<head><link rel="stylesheet" href="../css/email.css"></head>
<?php

include("../database/connection.php");

session_start();
if (!isset($_SESSION['emriPedagogut'])) { 
  header("location: ../logimi/loginPedagog.php");
}else {
  $id=$_POST['id'];
  $emri=$_POST['emri'];
  $emailiMungesave=$_POST['email'];
  $lenda=$_SESSION['lendaSt'];
  $grupi=$_SESSION['grupiSt'];
  $viti=$_SESSION['vitiSt'];

  function nrMaxMungesave($lendaM){
    include("../database/connection.php");
    $resulti = mysqli_query($con,"SELECT Oret FROM lendet WHERE Lenda = '$lendaM' ");
    if($resulti){
      $r = mysqli_fetch_array($resulti);
      $oretLendeve = $r['Oret'];
    
      return round(0.2*$oretLendeve);
    }else 
      return 0;  
  }

  $nrMax = nrMaxMungesave($lenda)-1;

  $result = mysqli_query($con,"SELECT $lenda  FROM mungesat_viti$viti WHERE  ID_St = $id");
  if(($result)){

    $row = mysqli_fetch_array($result);
    $mungesa=$row[$lenda];

    if($mungesa == $nrMax){
      echo "<h1> Studenti ka plotesuar limitin e mungesave. </h1>";
      $mungesa++;
      $sql = "UPDATE mungesat_viti$viti SET $lenda = '$mungesa' WHERE ID_St=$id";
      mysqli_query($con,$sql);
      echo "<body>";
      echo"<form method='POST' action='DergoEmail.php' >";
      echo"<input type='hidden' name='emailM' value='".$emailiMungesave."'>";
      echo"<input type='hidden' name='lendaM' value='".$lenda."'>";
      echo"<input type='hidden' name='mungesa' value='".$mungesa."'>";
      echo "<button type='submit' name='emailStudentit' class='btn'> Dergo Email Studentit</button>"; 
      echo"</form>";
      echo "</body></html>";   
    }else{ 
      $mungesa++;
      $sql = "UPDATE mungesat_viti$viti SET $lenda = '$mungesa' WHERE ID_St=$id";
      $rez= mysqli_query($con,$sql);
      if($rez){ ?>
        <script>     
          alert("U vendos mungesa te <?php echo $emri; ?>");
          window.location.href = "shfaqListSt.php";
        </script>

      <?php
      }
    }
  }
}?>
