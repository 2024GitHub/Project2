<?php session_start(); 

  if (!isset($_SESSION['emriAdminit'])) { 
    header("location: ../logimi/login.php") ; }
    else {

    
    ?>

<html>
<head>
<script src="../validimet/validimi.js"></script>

<title>Rregjistro Pedagog</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="../css/rregjistrimi.css">   
</head>
<body>

<nav class="navbar navbar-light" style="background-color: #9dc4ef; margin-top: 75px; width:350px; margin-left: 1000px; height: 100px;">
    <form class="container-fluid">
      <div class="sidebar__link">
        <i class="fa fa-chevron-left"></i>
        <a href="../menu/menu.php">Kthehu Mbas</a>
      </div>
      <div class="sidebar__link">
        <i class="fa fa-user-o"></i>
        <a href="selectPedagog.php">Shiko Pedagog</a>
      </div>
    </form>
    </nav>


<div class="loginbox">
    <h1>Shto Pedagoget</h1>
    <form action="" method="post">
        <input type="text" name="name" onfocusout="validate()" id="emri" placeholder="Emri" required>
        <input type="password" name="pass" placeholder="Fjalekalimi" onfocusout="validate1()" id="pass" required>
        <input type="text" name="surname" placeholder="Mbiemri" onfocusout="validate3()" id="mbiemri" required>      
        <input type="email" name="email" placeholder="E-mail" onfocusout="validate2()" id="email" required>      
        <input type="text" name="numri" placeholder="Numri" onfocusout="validate4()" id="numriTel" required>      
        <input type = "submit" class = "btn" name = "shtoPedagoget" value = "Shto Pedagog">
    </form>
</div>
</body>
</html>

<?php 
    include("../database/connection.php");
    if(isset($_POST['shtoPedagoget']))
    {
            $emri = $_POST['name'];
            $pass = $_POST['pass'];
            $mbiemri = $_POST['surname'];
            $email = $_POST['email'];
            $numri = $_POST['numri'];

            $sql = "INSERT INTO pedagog (name, password, surname, email, tel) VALUES ('$emri','$pass','$mbiemri','$email','$numri')";	
            if (!isset($_SESSION['emriAdminit'])) { 
              header("location: ../logimi/login.php") ; }
              else {		
            if($rezultati = mysqli_query($con,$sql)) { ?>
                <script>
                 alert("Te dhenat u futen me sukses");
                 window.location.href = "selectPedagog.php";
                </script>
              
            <?php
            }
            else {
               die(mysqli_error($con));
            }
              }  
        }
    mysqli_close($con); 
    }
?>