<?php
 include("../database/connection.php");
 session_start(); 

  if (!isset($_SESSION['emriAdminit'])) { 
    header("location: ../logimi/login.php") ; }
    else {
$sql = "SELECT * FROM lendet WHERE ID='$_GET[edit]'";
$result = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($result);
    $id = $row['ID'];
    $idLende = $row['ID_lende'];
    $Lendet = $row['Lenda'];
    $Oret = $row['Oret'];
?>
<html>
  <head>
   <title>Edit value</title>
   <script src="../logimi/logout.js"></script>
   <script src="../validimet/validimi.js"></script>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

   <link rel="stylesheet" href="../css/editoLende.css">
  </head>
  <body>

    <nav class="navbar navbar-light" style="background-color: #DEB887; margin-top:-200px;">
    <form class="container-fluid">
      <div class="sidebar__link" style=" margin-left: 700px;">
        <i class="fa fa-power-off"></i>
        <a href="selectLendet.php">Kthehu</a>
      </div>
    </form>
    </nav>

  

        <div class="imgcontainer" style="margin-top:60px;">
          <img src="../figura/subject.jpg" alt="subject" class="foto1">
          <figcaption>Update Form</figcaption>
      </div>
          <hr class="vija1">

          <form method="post" action="updateLende.php">
          <div class="editbox1">
           <input type='text' name='id' value="<?php echo $id;?>">
           <input type='text' name='idLende' value="<?php echo $idLende;?>">
           <input type='text' name='lendet' id="emri" onfocusout="validate()" value="<?php echo $Lendet;?>">
           <input type='text' name='oret' value="<?php echo $Oret;?>">
           <p><input type='submit' class="btn" name='update' value="Ndrysho lenden"></p>
           
           </div>
          </form>
        </div>
  </body>
  <?php } ?>