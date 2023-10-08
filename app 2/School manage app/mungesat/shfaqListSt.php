<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body style=" background-image: url(../figura/PED.jpg); background-position: center; background-size: cover;">

<?php
session_start(); 
if (!isset($_SESSION['emriPedagogut'])) { 
  header("location: ../logimi/loginPedagog.php");
}
else {
  $lenda=$_SESSION['lendaSt'];
  $grupi=$_SESSION['grupiSt'];
  $viti=$_SESSION['vitiSt'];
  $vitiAkademik=$_SESSION['vitiAkademik'];

  echo"<h3 style='bottom: 80px; left: 46px; position: absolute; text-align:center;'>Lista e studenteve ne lenden $lenda grupi $grupi </h3>";

  require("../database/connection.php");
  $sql = "SELECT * FROM viti$viti INNER JOIN std ON viti$viti.IDS=std.ID_Studenti WHERE grupi = '$grupi' && Viti_shkollor = '$vitiAkademik'";
  $rezultati = mysqli_query($con,$sql);
  if(mysqli_num_rows($rezultati)>0){ ?>
    <table class="table table-dark table-hover table-bordered"  style="margin-top:170px; width:850px;margin-left: auto; margin-right: auto;">
      <tr>
        <th style='color:red'>Id</th>
        <th style='color:red'>Emri</th>
        <th style='color:red'>Action</th>
      </tr>
      <?php
      while($row = mysqli_fetch_assoc($rezultati)){
      ?>
      <tr>
        <td><?php echo $row['ID_Studenti']; ?></td>
        <td><?php echo $row['emri'];?></td>
        <td>
          <form method='POST' action='updateMungesa.php'>
          <input type='hidden' name='id' value='<?php echo $row['ID_Studenti']; ?>'>
          <input type='hidden' name='emri' value='<?php echo $row['emri'];?>'>
          <input type='hidden' name='email' value='<?php echo $row['email'];?>'>
          <button type='submit' name='mungesa' style="color:white; background-color:gray"> Vendos mungese </button>
          </form>
        </td>         
      </tr> 
      <?php  }  ?>
      <td colspan='4' style='text-align:center'><?php  echo"<a href='../detyratPedagogut/detyratPedagogut.php'>Kthehu</a>"; ?></td>
    </table>
  <?php }
}?>
  </body> 
</html> 