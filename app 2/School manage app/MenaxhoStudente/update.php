<?php
include("../database/connection.php");
  if(isset($_POST['updateStEdit'])){
    $emri=$_POST['emri'];
    $atesia=$_POST['atesia'];
    $mbiemri=$_POST['mbiemri'];
    $email=$_POST['email'];
    $password=$_POST['pass'];
    $numri=$_POST['numri'];
    $viti=$_POST['viti'];
    $grupi=$_POST['grupi'];
    $ID=$_POST['idStudentEdit'];
    $vitiAkademik=$_POST['vitiShkollor'];


    $query = "UPDATE std SET emri = '$emri', atesia = '$atesia', mbiemri = '$mbiemri', email = '$email', password = '$password', numri = '$numri', viti = '$viti', grupi = '$grupi', Viti_shkollor = '$vitiAkademik' WHERE ID_Studenti = '$ID'";
    $result = mysqli_query($con,$query);
    if($result){ ?>
   <script>
   alert("Te dhenat e studentit u ndryshuan me sukses!!");
    window.location.href = "select.php";
    </script>
<?php 
    } 
    else ?>

     <script>
   alert("Nuk ka ndryshuar");
    window.location.href = "select.php";
    </script>
<?php 
}
?>