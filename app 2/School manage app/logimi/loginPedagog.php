<?php 

session_start();
include("../database/connection.php");
unset($_SESSION['emriPedagogut']);
unset($_SESSION['lendaSt']);
unset($_SESSION['grupiSt']);
unset($_SESSION['vitiSt']);

	if(isset($_POST['loginPedagog']))
	{
		
		$user_name = $_POST['name'];
		$password = $_POST['password'];


		$query = "select * from pedagog where name = '$user_name' ";
		$result = mysqli_query($con, $query);

			
				if(mysqli_num_rows($result) > 0)
				{
					
					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['emriPedagogut'] = $user_name;
						header("Location: ../detyratPedagogut/teDhenaHyrese.php ");
						die;
					}
	
	}
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>LoginPedagog</title>
	<link rel="stylesheet" href="../css/logoPedagog.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>

<nav class="navbar navbar-light" style="background-color: #DEB887; margin-top:-5px;">
    <form class="container-fluid">
      <div class="sidebar__link" style=" margin-left: 1100px;">
        <i class="fa fa-power-off"></i>
        <a href="index.html">Kthehu te faqja kryesore</a>
      </div>
    </form>
    </nav>

<h1 style="color: rgb(230, 241, 177)">Miresevini Pedagog!</h1>

    <div class="box">
		<form method="post">
        <i class="fa fa-user-o fa-2x text-lightblue" style="color:red"></i> <input type="text" placeholder="Emri" name="name" required>
		<i class="fa fa-building-o fa-2x" style="color:red"></i> <input  type="password" placeholder="Fjalekalimi" name="password" required>
		<input type="submit" name="loginPedagog" class="btn" value="Hyr">
		</form>
	</div>
</body>
</html>