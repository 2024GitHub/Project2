<?php session_start(); 

  if (!isset($_SESSION['emriAdminit'])) { 
    header("location: ../logimi/login.php") ; }
    else {
    ?>

<html>
<head>
<title>Rregjistro Lendet</title>
<script src="../logimi/logout.js"></script>
<script src="../validimet/validimi.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="../css/rregjistrimi.css">  
</head>
<body>

      <nav class="navbar navbar-light" style="background-color: #DEB887; margin-top: 140px; width:350px; margin-left: 1000px;">
    <form class="container-fluid">
        <h4>Opsione:</h4>
      <div class="sidebar__link" style=" margin-left: 170px; margin-top: -35px;">
        <i class="fa fa-power-off"></i>
        <a href="../menu/menu.php">Kthehu</a>
      </div>
      <div class="sidebar__link" style=" margin-left: 150px;">
        <i class="fa fa-user-o"></i>
        <a href="selectLendet.php">Shiko Lende</a>
      </div>
    </form>
    </nav>


<div class="loginbox">
    <h1>Shto Lende</h1>
    <form action="" method="post">
    <select name="vitiStudentit" style=" background: rgba(0, 0, 0, 0.5); color: white;">
               <option selected>Zgjidh vitin...</option>
               <option value="1">1</option>
               <option value="2">2</option>
               <option value="3">3</option>
            </select>
        <input type="text" id="emri"  name="lendet" onfocusout="validate()" placeholder="Emri Lendes">
        <input type="text" name="oret" placeholder="Numri Oreve">      
        <p><input type = "submit" class = "btn" name = "shtoLende" value = "Shto Lende"><p>
        
    </form>
</div>
</body>
</html>

<?php 
    include("../database/connection.php");
    if(isset($_POST['shtoLende']))
    {
            $idLende = $_POST['idlende'];
            $lendet = $_POST['lendet'];
            $oret = $_POST['oret'];

            $sql = "INSERT INTO lendet (ID_lende, Lenda, Oret) VALUES ('$idLende','$lendet','$oret')";			
            if($rezultati = mysqli_query($con,$sql)) { ?>
                <script>
                 alert("Te dhenat u futen me sukses");
                 window.location.href = "selectLendet.php";
                </script>
              
            <?php
            }
            else {
               die(mysqli_error($con));
            }
        }
    mysqli_close($con); 
    }
?>