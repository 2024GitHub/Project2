<?php

session_start();
include("../database/connection.php");

	if(isset($_GET['notaButton'])){
		$id = $_GET['id'];
		$nota = $_GET['nota'];
		if($nota==""){?>
			<script>     
				alert("Zgjidhni nje note per studentin!");
				window.location.href = "shfaqStudent.php";
			</script>
		<?php
		}else{
			$viti=$_SESSION['vitiSt'];
			$lenda=$_SESSION['lendaSt'];
			$grupi=$_SESSION['grupiSt'];

			$result = mysqli_query($con,"SELECT $lenda FROM viti$viti WHERE  IDS = $id");

			if(($result)){

				$row = mysqli_fetch_array($result);

				$notaDb=$row[$lenda];
				$notaDb=$nota."/".$notaDb;

				$sql = "UPDATE viti$viti SET $lenda = '$notaDb' WHERE IDS=$id";
				if(mysqli_query($con,$sql)){
				?>
					<script>     

						alert("U vendos vleresimi");
						window.location.href = "shfaqStudent.php";
					</script>

				<?php
				}
			}

		}
	}

?>

