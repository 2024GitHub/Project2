<?php
 include("../database/connection.php");
 session_start(); 

  if (!isset($_SESSION['emriAdminit'])) { 
    header("location: ../logimi/login.php") ; }
    else {
$sql = "SELECT * FROM pedagog WHERE ID='$_GET[edit]'";
$result = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($result);
    $id = $row['ID'];
    $emri = $row['name'];
    $pass = $row['password'];
    $mbiemri = $row['surname'];
    $email = $row['email'];
    $numri = $row['tel'];
?>
<html>
  <head>
   <title>Edit value</title>
   <link rel="stylesheet" href="../css/editoPedagog.css">
   <script src="../validimet/validimi.js"></script>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

  </head>
  <body>
  
          <div class="updateimg">
          <img src="../figura/updPed.jpg" alt="update" class="update">

          <div class="container">
          <div style="margin-top:10px" class="sidebar__link">
        <i class="fa fa-chevron-left"></i>
        <a href="selectPedagog.php">Kthehu</a>
      </div>
          </div>
          <div class="editbox2">
		  <form method="post" action="updatePedagog.php">
           <input type='text' name='id' value="<?php echo $id;?>">
           <input type='text' name='emri' onfocusout="validate()" id="emri" value="<?php echo $emri;?>">
           <input type='text' name='pass' onfocusout="validate1()" id="pass" value="<?php echo $pass;?>">
           <input type='text' name='mbiemri' onfocusout="validate3()" id="mbiemri" value="<?php echo $mbiemri;?>">
           <input type='text' name='email' onfocusout="validate2()" id="email" value="<?php echo $email;?>">
           <input type='text' name='numri' onfocusout="validate4()" id="numriTel" value="<?php echo $numri;?>">
           <input type='submit' class="btn" name='update' value="Ndrysho Pedagog">
          </form>
          </div>
  </body>
  <?php } ?>