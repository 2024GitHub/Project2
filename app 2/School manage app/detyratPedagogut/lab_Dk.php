<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
 </head>
 <body style=" background-image: url(../figura/PED.jpg);
                background-position: center;
                background-size: cover;">

<?php


session_start(); 
if (!isset($_SESSION['emriPedagogut'])) { 
  header("location: ../loginPedagog/loginPedagog.php");
}
else { 
 
$lenda=$_SESSION['lendaSt'];
$grupi=$_SESSION['grupiSt'];
$viti=$_SESSION['vitiSt'];
$vitiAkademik=$_SESSION['vitiAkademik'];


    echo"<h3 style='bottom: 80px; left: 46px; position: absolute; text-align:center;'>Lista e studenteve ne lenden $lenda grupi $grupi <h3>";

                require("../database/connection.php");
                $sql = "SELECT * FROM viti$viti INNER JOIN std ON viti$viti.IDS=std.ID_Studenti WHERE grupi = '$grupi' && Viti_shkollor = '$vitiAkademik' ";
                $rezultati = mysqli_query($con,$sql);
                if(mysqli_num_rows($rezultati)>0){ ?>
                    <table class="table table-dark table-hover table-bordered"  style="margin-top:170px; width:850px;margin-left: auto; margin-right: auto;">
                            <tr>
                                 <th style='color:red'>Id</th>
                                 <th style='color:red'>Emri</th>
                                 <th style='color:red'>Laborator</th>
                                 <th style='color:red'>Detyre Kursi</th>
                            </tr>
                 
               
                            <?php
	              	while($row = mysqli_fetch_assoc($rezultati)){
				?>

				<tr>
                    <td><?php echo $row['ID_Studenti']; ?></td>
                    <td><?php echo $row['emri'];?></td>
                    <td>
                      <form method='GET' action='updateLab.php'>
                       <input type='hidden' name='id' value='<?php echo $row['ID_Studenti']; ?>'>
                       <input type='hidden' name='emri' value='<?php echo $row['emri'];?>'>
                       <input type='hidden' name='email' value='<?php echo $row['email'];?>'>
                       <select name="pranoLabi" style=" background: rgba(0, 0, 0, 0.5); color: white;">
                        <option selected disabled>Nr_laborator</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        </select>
                       <button type='submit' name='pranoLab' style="color:white; background-color:gray">Prano laborator</button>
                      </form>
                      <form method='GET' action='updateLab.php'>
                       <input type='hidden' name='id' value='<?php echo $row['ID_Studenti']; ?>'>
                       <input type='hidden' name='emri' value='<?php echo $row['emri'];?>'>
                       <input type='hidden' name='email' value='<?php echo $row['email'];?>'>
                       <input type='hidden' name='lenda' value='<?php echo $lenda; ?>'>
                       <select name="refuzoLabi" style=" background: rgba(0, 0, 0, 0.5); color: white;">
                       <option selected disabled>Nr_laborator</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        </select>
                       <button type='submit' name='refuzoLab' style="color:white; background-color:gray"> Refuzo laborator </button>
                      </form>
                    </td>
                    <td>
                      <form method='GET' action='updateLab.php'>
                       <input type='hidden' name='idL' value='<?php echo $row['ID_Studenti']; ?>'>
                       <input type='hidden' name='emri' value='<?php echo $row['emri'];?>'>
                       <input type='hidden' name='lenda' value='<?php echo $lenda; ?>'>
                       
                       <button type='submit' name='pranoDetKursi' style="color:white; background-color:gray"> Prano Detyre Kursi </button>
                      </form>
                      <form method='GET' action='updateLab.php'>
                       <input type='hidden' name='id' value='<?php echo $row['ID_Studenti']; ?>'>
                       <input type='hidden' name='email' value='<?php echo $row['email'];?>'>
                       <input type='hidden' name='lenda' value='<?php echo $lenda; ?>'>
                       <button type='submit' name='refuzoDetKursi' style="color:white; background-color:gray"> Refuzo Detyre Kursi </button>
                      </form>
                    </td>
                        
                </tr> 
              <?php  }  ?>
              <td colspan='4' style='text-align:center'><?php  echo"<a href='../detyratPedagogut/detyratPedagogut.php'>Kthehu</a>"; ?></td>
              </table>
               <?php }
               } ?>
                

<body>  