<?php
session_start();
unset($_SESSION['lendaSt']);
unset($_SESSION['grupiSt']);
unset($_SESSION['vitiSt']);
unset($_SESSION['vitiAkademik']);
if (!isset($_SESSION['emriPedagogut'])) { 
  header("location: ../logimi/loginPedagog.php");
}
else {
  ?>

  <!DOCTYPE html>
  <html>
    <head>
      <link rel="stylesheet" href="../css/teDhena.css">
      <title>teDhenaHyrese</title>
    </head>
    <body>

      <div class="imgcontainer" style="margin-top:-200px;">
        <h3 style="color:white; text-align:center;">Miresevini ! Ju lutem zgjidh grupin e studenteve ,lenden dhe vitin akademik! </h3>
        <hr style="color:white;"/>
        <img src="../figura/neon.jpg" alt="neon">
        <form method="get" action="detyratPedagogut.php" >  
          <div class="teDhenat">
            <select name="grupi" style=" background: rgba(0, 0, 0, 0.5); color: white;">
              <option selected>Zgjidh grupin...</option>
              <option value="A">A</option>
              <option value="B">B</option>
              <option value="C">C</option>
              <option value="D">D</option>
            </select>
              <select name="vitiAkademik" style=" background: rgba(0, 0, 0, 0.5); color: white;">
              <option selected>Zgjidh vitin...</option>
              <option value="2017_2018">2017_2018</option>
              <option value="2018_2019">2018_2019</option>
              <option value="2019_2020">2019_2020</option>
              <option value="2020_2021">2020_2021</option>
              <option value="2021_2022">2021_2022</option>
            </select>

            <select name="lenda" style=" background: rgba(0, 0, 0, 0.5); color: white;">
              <option selected>Zgjidh lenden...</option>
              <?php
                require('../database/connection.php');
                $query="select ID_lende , Lenda from lendet";
                $rezultati=mysqli_query($con,$query);

                while($lenda=mysqli_fetch_row($rezultati)){ ?>
                <option> <?php echo $lenda[0].$lenda[1]?></option>
              <?php } ?>
            </select>
            <input type="submit" value="Hyr" class="btn" name="teDhena"/> 
            
            <a class="btn" href="../logimi/loginPedagog.php" style="background-color: white; text-decoration: none;">DIL</a>
          </div>	
        </form>
      </div>
    </body>
  </html>
<?php } ?>