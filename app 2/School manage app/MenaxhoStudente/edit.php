<?php
 include("../database/connection.php");
 session_start(); 

  if (!isset($_SESSION['emriAdminit'])) { 
    header("location: ../logimi/login.php") ; }
    else {

$sql = "SELECT * FROM std WHERE ID_Studenti='$_GET[edit]'";
$result = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($result);
    
    $idStd = $row['ID_Studenti'];
    $emri = $row['emri'];
    $atesia = $row['atesia'];
    $mbiemri = $row['mbiemri'];
    $email = $row['email'];
    $pass = $row['password'];
    $numri = $row['numri'];
    $viti = $row['viti'];
    $grupi = $row['grupi'];
    $vitiAkademik = $row['Viti_shkollor'];
?>
<html>
  <head>
   <title>Edit value</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="../validimet/validimi.js"></script>
   <link rel="stylesheet" href="../css/edito.css">
  </head>
  <body>
  
          <div class="updateimg">
          <img src="../figura/Update.png" alt="update" class="update">
          
          <div class="container">
          <div style="margin-top:10px" class="sidebar__link">
        <i class="fa fa-power-off"></i>
        <a href="select.php">Kthehu</a>
      </div>
          </div>
          </div>

          <div class="editbox">
		      <form method="POST" action="update.php">
           
           <input type='text' name='idStudentEdit' value="<?php echo $idStd;?>">
           <input type='text' name='emri' onfocusout="validate()" id="emri" value="<?php echo $emri;?>">
           <input type='text' name='atesia' onfocusout="validate5()" id="atesia" value="<?php echo $atesia;?>">
           <input type='text' name='mbiemri' onfocusout="validate3()" id="mbiemri" value="<?php echo $mbiemri;?>">
           <input type='email' name='email' onfocusout="validate2()" id="email" value="<?php echo $email;?>">
           <input type='password' name='pass' onfocusout="validate1()" id="pass" value="<?php echo $pass;?>">
           <input type='text' name='numri'  onfocusout="validate4()" id="numriTel" value="<?php echo $numri;?>">
           <input type='text' name='viti' value="<?php echo $viti;?>">
           <input type='text' name='grupi' value="<?php echo $grupi;?>">
           <input type='text' name='vitiShkollor' onfocusout="validate6()" id="viti" value="<?php echo $vitiAkademik;?>">

           <input type='submit' class="btn" name='updateStEdit' value="Ndrysho Studentin">
          </form>
          </div>
  </body>
  <?php  } ?>