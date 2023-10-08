<?php session_start(); 

  if (!isset($_SESSION['emriAdminit'])) { 
    header("location: ../logimi/login.php") ; }
    else {

    
    ?>

<html>
<head>
<title>shtoStudente.php</title>
<script src="../logimi/logout.js"></script>
<script src="../validimet/validimi.js"></script>

<link rel="stylesheet" href="../css/rregjistrimi.css">   
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

<nav class="navbar navbar-light" style="background-color: #DEB887; margin-top: 50px; width:350px; margin-left: 1000px;">
    <form class="container-fluid">
        <h4>Opsione:</h4>
      <div class="sidebar__link" style=" margin-left: 170px; margin-top: -35px;">
        <i class="fa fa-power-off"></i>
        <a href="../menu/menu.php">Kthehu</a>
      </div>
      <div class="sidebar__link" style=" margin-left: 150px;">
        <i class="fa fa-user-o"></i>
        <a href="select.php">Shiko Studente</a>
      </div>
    </form>
    </nav>

<div class="loginbox">
   <h1>Shto Student</h1>
    <form action="" method="POST">
    <input type="text" name="id" placeholder="ID">
        <input type="text" name="emri"  onfocusout="validate()" id="emri" placeholder="Emri" required>
        <input type="password" name="pass" onfocusout="validate1()" id="pass" placeholder="Fjalekalimi" required>
        <input type="text" name="mbiemri" onfocusout="validate3()" id="mbiemri" placeholder="Mbiemri" required>      
        <input type="email" name="email" onfocusout="validate2()" id="email" placeholder="E-mail" required>      
        <input type="text" name="numri" onfocusout="validate4()" id="numriTel" placeholder="Numri" required>      
        <input type="text" name="atesia" onfocusout="validate5()" id="atesia" placeholder="Atesia" required> 
        <input type="text" name="vitiShkollor" onfocusout="validate6()" id="viti" placeholder="Viti Akademik" required> 
        
        <div class="input-group mb-3">
         <div class="input-group-prepend">
        <label class="input-group-text">Opsione</label>
         </div>
          <select class="custom-select" name="grupi" style=" background: rgba(0, 0, 0, 0.5); color: white;">
        <option selected>Zgjidh grupin...</option>
        <option value="A">A</option>
        <option value="B">B</option>
        <option value="C">C</option>
        <option value="D">D</option>
        </select>
        </div>
       <p><input type = "submit" class = "btn" style="border-radius: 100px;" name = "shtoStudent" value = "Shto Student"></p>
    </form>
    
</div>
</body>
</html>

<?php 
    include("../database/connection.php");
    if(isset($_POST['shtoStudent']))
    {
        $id = $_POST['id'];
            $emri = $_POST['emri'];
            $atesia = $_POST['atesia'];
            $mbiemri = $_POST['mbiemri'];
            $pass = $_POST['pass'];
            $email = $_POST['email'];
            $numri = $_POST['numri'];
            $viti = 1;
            $grupi = $_POST['grupi'];
            $vitiAkademik = $_POST['vitiShkollor'];

            
            $sql="INSERT INTO mungesat_viti$viti (ID_St) VALUES ('$id')";
            
                $query=mysqli_query($con,$sql);
            if($query){

                $sql3="INSERT INTO laborator_dk_viti$viti (IDS) VALUES ('$id')";
                $query3=mysqli_query($con,$sql3);
                
            			
            if($query3) { 

                $sql1="INSERT INTO std (ID_Studenti, emri, atesia, mbiemri, email, password, numri, viti, grupi, Viti_shkollor) VALUES ('$id','$emri','$atesia','$mbiemri','$email','$pass','$numri','$viti','$grupi','$vitiAkademik')";
                $query1=mysqli_query($con,$sql1);

                if($query1){
                        
                        $sql2 = "INSERT INTO viti$viti (IDS, ID_det, ID_m) VALUES ('$id','$id','$id')";
                $query2=mysqli_query($con,$sql2);
                if($query2){ ?>
                
                <script>
                 alert("Te dhenat u futen me sukses");
                 window.location.href = "select.php";
                </script>

              <?php  }
              else{
                die(mysqli_error($con));
             }
                                  
                }
            }
        }
        else { ?>
        <script>
     alert("Ekziston student me kete ID!! Kujdes ID eshte unike per cdo Student!!");
     window.location.href = "shtoStudente.php";
    </script>

        <?php

        }
    }
} 

        
?>