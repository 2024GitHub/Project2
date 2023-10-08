<?php 
session_start();
include("../database/connection.php");
unset($_SESSION['emriLoginSt']);
	
	if(isset($_POST['loginStudent']))
	{
		
		$user_name = $_POST['name'];
		$password = $_POST['password'];
        $vitiStudentit = $_POST['vitiStudentit'];
        $_SESSION['vitiStudentit'] = $vitiStudentit;
		$_SESSION['emriLoginSt']=$user_name;

		if(!empty($user_name) && !empty($password))
		{			
			$query = "select * from std where emri = '$user_name' ";
			$result = mysqli_query($con, $query);
				if(mysqli_num_rows($result))
				{
					$user_data = mysqli_fetch_assoc($result);	
					if($user_data['password'] == $password)
					{
						$_SESSION['idLoginStudent'] = $user_data['ID_Studenti'];
						$_SESSION['emriLoginSt']=$user_data['emri'];

						header("Location: ../NotatStudentit/StudentPage.php ");
						
					}
				}		
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>LoginStudent</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="../css/log.css">
</head>
<body>

<nav class="navbar navbar-light" style="background-color: #DEB887">
    <form class="container-fluid">
      <div class="sidebar__link" style=" margin-left: 650px;">
        <i class="fa fa-power-off"></i>
        <a href="index.html">Shko ne Faqen Kryesore</a>
      </div>
    </form>
</nav>

<div class="tab" style="margin-top:50px;"> 
		<form method="post">
         <img src="../figura/std.jpg" style="width: 270px;" alt="Login">
		 

		<div class="container">
			<input type="text" name="name" placeholder="Emri" required>
			<input type="password" name="password" placeholder="Fjalekalimi" required>
			<select name="vitiStudentit" style=" background: rgba(0, 0, 0, 0.5); color: white;">
               <option selected>Zgjidh vitin...</option>
               <option value="1">1</option>
               <option value="2">2</option>
               <option value="3">3</option>
            </select>

            <input  type="submit" name="loginStudent" class="btn" value="Hyr">
		</form>
	</div>
</div>
</body>
</html>