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
        $viti=$_SESSION['vitiSt'];
        $lenda=$_SESSION['lendaSt'];
        $grupi=$_SESSION['grupiSt'];
        $vitiAkademik=$_SESSION['vitiAkademik'];

        function nrMaxMungesave($lendaM){
            include("../database/connection.php");
        
            $resulti = mysqli_query($con,"SELECT Oret FROM lendet WHERE Lenda = '$lendaM' ");
            if($resulti){
                $r = mysqli_fetch_array($resulti);
                $oretLendeve = $r['Oret'];
            
                return round(0.2*$oretLendeve);
            }else 
                return 0;
            
        }

        $nrMax = nrMaxMungesave($lenda);

        echo"<h3 style='bottom: 80px; left: 46px; position: absolute; text-align:center;'>Notat e studenteve ne lenden $lenda grupi $grupi </h3>";
            require("../database/connection.php");
            if(!($lenda=='Fizike1' || $lenda=='Fizike2' || $lenda=='Elektroteknike' || $lenda=='GjuheC' || $lenda=='Praktike' ||  $lenda=='Diplome' || $viti==2 || $viti==3)){
                $sql = "SELECT * FROM viti$viti INNER JOIN std ON viti$viti.IDS=std.ID_Studenti  INNER JOIN mungesat_viti$viti ON viti$viti.ID_m=mungesat_viti$viti.ID_St WHERE grupi = '$grupi' && (viti$viti.$lenda =' ' || viti$viti.$lenda<5 ) && mungesat_viti$viti.$lenda <=$nrMax";
                $rezultati = mysqli_query($con,$sql);

            }else{
                $sql = "SELECT * FROM viti$viti INNER JOIN std ON viti$viti.IDS=std.ID_Studenti INNER JOIN laborator_dk_viti$viti ON viti$viti.ID_det=laborator_dk_viti$viti.IDS INNER JOIN mungesat_viti$viti ON viti$viti.ID_m=mungesat_viti$viti.ID_St WHERE grupi = '$grupi' && (viti$viti.$lenda =' ' || viti$viti.$lenda<5 ) && laborator_dk_viti$viti.$lenda='11111' && mungesat_viti$viti.$lenda <=$nrMax ";
                $rezultati = mysqli_query($con,$sql);
            }

            if(mysqli_num_rows($rezultati)>0){ ?>
                <table class="table table-dark table-hover table-bordered"  style="margin-top:170px; width:850px;margin-left: auto; margin-right: auto;">
                    <tr>
                        <th style='color:red'>Id</th>
                        <th style='color:red'>Emri</th>
                        <th style='color:red'>Grupi</th>
                        <th style='color:red'>Action</th>
                    </tr>
            
                    <?php
                    while($row = mysqli_fetch_assoc($rezultati)){
                    ?>
                    <tr>
                        <td><?php echo $row['IDS']; ?></td>
                        <td><?php echo $row['emri'];?></td>
                        <td><?php echo $row['grupi'];?></td>
                        <td><form method="GET" action="updateNota.php">
                            <select name="nota" style=" background: rgba(0, 0, 0, 0.5); color: white;">
                                <option selected disabled>Zgjidh noten...</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                                <option>7</option>
                                <option>8</option>
                                <option>9</option>
                                <option>10</option>
                                <option>.</option>
                            </select>
                            <input type="hidden" name="id" value="<?php echo $row['IDS'];?>">
                            <button type='submit' name='notaButton'> Vendos vleresimin</button>
                        </form></td>
                            
                    </tr>
                        
                    <?php }  ?>
                    <td colspan='4' style='text-align:center'><?php  echo"<a href='../detyratPedagogut/detyratPedagogut.php'>Kthehu</a>"; ?></td>
                </table>
            <?php   
            }else{ ?>
                <script>
                    alert("Kjo lende ka kalueshmeri 100%");
                    window.location.href = "detyratPedagogut.php";
                </script>
            <?php } 
    }?> 
    </body> 
</html>