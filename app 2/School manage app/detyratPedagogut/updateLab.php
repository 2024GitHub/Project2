<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/email.css"></head>

<?php
session_start();
	include("../database/connection.php");

    if(isset($_GET['pranoDetKursi'])){


        $id = $_GET['idL'];
        $emri=$_GET['emri'];
        
    
        $viti=$_SESSION['vitiSt'];
        $lenda=$_SESSION['lendaSt'];
        
    
    
    $result = mysqli_query($con,"SELECT $lenda FROM laborator_dk_viti$viti WHERE  IDS = $id");
    
    if(($result)){
    
        $row = mysqli_fetch_array($result);
    
        $labDb=$row[$lenda];
        $labDb=$labDb+10000;
    
        $sql = "UPDATE laborator_dk_viti$viti SET $lenda = '$labDb' WHERE IDS=$id";
        if(mysqli_query($con,$sql)){
    
            ?>
            <script>     
    
    alert("Studentit <?php echo "$emri";?> iu pranua Detyra Kursit!!");
    window.location.href = "lab_Dk.php";
    </script>
    
            <?php
            }
        }
        else { ?>
            <script>     
    
    alert("Kjo lende nuk ka Detyre Kursi");
    window.location.href = "lab_Dk.php";
    </script>
    
        <?php }
    
    
    }

    if(isset($_GET['refuzoDetKursi'])){


        $id = $_GET['id'];
        $emailL=$_GET['email'];
        $viti=$_SESSION['vitiSt'];
        $lenda=$_SESSION['lendaSt'];

    $result = mysqli_query($con,"SELECT $lenda FROM laborator_dk_viti$viti WHERE  IDS = $id"); ?>

    <nav class="navbar navbar-light" style="background-color: #DEB887; margin-top:-5px;">
    <form class="container-fluid">
      <div class="sidebar__link" style=" margin-left: 1200px;">
        <i class="fa fa-power-off"></i>
        <a href='lab_Dk.php'>Kthehu</a>
      </div>
    </form>
    </nav>
    
    <?php echo "<h1>Studentit nuk i eshte pranuar detyra e kursit!</h1>"; 
  
    if(($result)){

         echo"<form method='POST' action='../mungesat/DergoEmail.php' >";
         echo"<input type='hidden' name='emailL' value='".$emailL."'>";
         echo "<button type='submit' name='emailDK' class='btn'> Dergo Email Studentit</button>"; 
         echo"</form>";   
    
            
        }
        else { ?>
            <script>     
    
    alert("Kjo lende nuk ka Detyre Kursi");
    window.location.href = "lab_Dk.php";
    </script>
    
        <?php }
    
    
    }


	if(isset($_GET['pranoLab'])){


		$id = $_GET['id'];
		$lab = $_GET['pranoLabi'];
        $emri=$_GET['emri'];
        
		if($lab==""){?>
		<script>     

alert("Zgjidhni nje laborator per tu pranuar!");
 window.location.href = "lab_Dk.php";
</script>
		<?php
		}else{

		
		$viti=$_SESSION['vitiSt'];
        $lenda=$_SESSION['lendaSt'];
        

	$result = mysqli_query($con,"SELECT $lenda FROM laborator_dk_viti$viti WHERE  IDS = $id");

	if(($result)){

		$row = mysqli_fetch_array($result);
if($lab==1){
    $labDb=$row[$lenda];
		$labDb=$labDb+1;
}
else if ($lab==2){
    $labDb=$row[$lenda];
		$labDb=$labDb+10;
}
else if ($lab==3){
    $labDb=$row[$lenda];
		$labDb=$labDb+100;
}
else if($lab==4){
    $labDb=$row[$lenda];
    $labDb=$labDb+1000; 
}

		

		$sql = "UPDATE laborator_dk_viti$viti SET $lenda = '$labDb' WHERE IDS=$id";
		if(mysqli_query($con,$sql)){

			?>
			<script>     

alert("Studentit <?php echo $emri ; ?> iu pranua laboratori!!");
 window.location.href = "lab_Dk.php";
</script>

			<?php
			}
		}
        else?>
        	<script>     

alert("Kjo lende nuk ka laboratore");
 window.location.href = "lab_Dk.php";
</script>

        <?php

	}
}

if(isset($_GET['refuzoLab'])){


    $id = $_GET['id'];
    $lab = $_GET['refuzoLabi'];
    $emailL=$_GET['email'];
    if($lab==""){?>
    <script>     

alert("Zgjidhni nje laborator per tu refuzuar!");
window.location.href = "lab_Dk.php";
</script>
    <?php
    }else{

    
    $viti=$_SESSION['vitiSt'];
    $lenda=$_SESSION['lendaSt'];
    
    


$result = mysqli_query($con,"SELECT $lenda FROM laborator_dk_viti$viti WHERE  IDS = $id");

if(($result)){ ?>
    
<nav class="navbar navbar-light" style="background-color: #DEB887; margin-top:-7px;">
<form class="container-fluid">
  <div class="sidebar__link" style=" margin-left: 1200px;">
    <i class="fa fa-power-off"></i>
    <a href='lab_Dk.php'>Kthehu</a>
  </div>
</form>
</nav>


<?php
echo "<h1>Studentit nuk i eshte pranuar laboratori!</h1>";


        echo"<form method='POST' action='../mungesat/DergoEmail.php' >";
    echo"<input type='hidden' name='emailL' value='".$emailL."'>";
  echo"<input type='hidden' name='lendaL' value='".$lenda."'>";
    echo"<input type='hidden' name='lab' value='".$lab."'>";
    echo "<button type='submit' name='emailLab' class='btn'> Dergo Email Studentit</button>"; 
    echo"</form>";   

        
    }
    else { ?>
        <script>     

alert("Kjo lende nuk ka laboratore");
window.location.href = "lab_Dk.php";
</script>

    <?php }

}
}

?>

