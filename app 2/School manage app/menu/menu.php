
<?php session_start(); 
  if (isset($_SESSION['emriAdminit'])) { 
      
    ?>
<html>
  <head>
  <link rel="stylesheet" href="../css/menu.css">
  <style>


.menubox {
  margin-left: 480px;
  margin-top: -330px;
  width: 400px;
  padding: 25px;
  background: rgba(0, 0, 0, 0.5);
  color: #fff;
  box-sizing: border-box;
  text-align: center;
}
  </style>
  </head>
  <body>
  

    <div class="imgcontainer" style="margin-top:-100px">
      <img src="../figura/admin.png" alt="Admin" class="admin">
      <figcaption style="width: 420px;">Admin Page</figcaption>
  
    <div class="menubox">
      <h1>Menu</h1>
      
     <p> <button class = "btn"><a href="../MenaxhoStudente/shtoStudente.php">Student</a></button></p>
     <p> <button class = "btn"><a href="../MenaxhoLende/shtoLende.php">Lende</a></button></p>
    <p><button class = "btn"><a href="../MenaxhoPedagoge/shtoPedagog.php">Pedagog</a></button></p>
    <p><button class = "btn"><a href="../logimi/login.php">Dil</a></button></p>

  </div>
  </div>
  
  </body>
</html>
<?php   } else 
  header("location: ../logimi/login.php");
  ?>