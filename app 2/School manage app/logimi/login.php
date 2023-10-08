<!DOCTYPE html>
<html>
<head> <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
  <link rel="stylesheet" href="../css/log.css">
</head>
<body>


<nav class="navbar navbar-light" style="background-color: #DEB887;">
    <form class="container-fluid">
      <div class="sidebar__link" style=" margin-left: 700px;">
        <i class="fa fa-power-off"></i>
        <a href="../logimi/index.html">Kthehu te faqja kryesore</a>
      </div>
    </form>
    </nav>



    <div class="tab">
        <form action="" method="post">
      <div class="imgcontainer">
         <img src="../figura/logo.jpg" alt="Login" class="logo">
      </div>
    
      <div class="container">
        <input type="text" placeholder="Emri" name="uname" required>
        <input type="password" placeholder="Fjalekalimi" name="psw" required>
       <p><button type="submit" name="log" class="btn">Hyr</button><p>
        
       </div>
      </form>
    </div>
</body>
</html>

<?php
session_start();
unset($_SESSION['emriAdminit']);
if(isset($_POST['log'])){
  $emri = $_POST['uname'];
  $pass = $_POST['psw'];
  include("../database/connection.php");

  $query = "select * from admin where name = '$emri' ";
  $result = mysqli_query($con, $query);

        
    if(mysqli_num_rows($result) > 0)
    {
      
      $user_data = mysqli_fetch_assoc($result);
      
      if($user_data['password'] === $pass)
      {

        $_SESSION['emriAdminit'] = $emri;
        header("location: ../menu/menu.php");
        die;
      }
    }
}
  
?>