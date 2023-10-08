<?php
include("../database/connection.php");
session_start(); 

  if (!isset($_SESSION['emriAdminit'])) { 
    header("location: login.php") ; }
    else {
$query = "SELECT * FROM std";
$result = mysqli_query($con,$query);
if(mysqli_num_rows($result) > 0){ ?>
<html>
  <head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  </head>
  <body style=" background-image: url(../figura/shkll.jpg);
                background-position: center;
                background-size: cover;">
    

    <nav class="navbar navbar-light" style="background-color: #DEB887; margin-top:-20px;">
    <form class="container-fluid">
     <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Kerko sipas emrit.." class="form-control" style="margin-top:30px; width:200px; margin-left:70%">
      <div class="sidebar__link" style="margin-top:-40px; margin-left: 90%;">
        <i class="fa fa-power-off"></i>
        <a href="../menu/menu.php">Kthehu</a>
      </div>
    </form>
    </nav>



     <table id="myTable" class="table table-dark table-hover table-bordered" style=" margin-left: auto; margin-right: auto; margin-top:30px;">
      <tr>
       
        <th class="text-danger">IdStd</th>
        <th class="text-danger">Emri</th>
        <th class="text-danger">Atesia</th>
        <th class="text-danger">Mbiemri</th>
        <th class="text-danger">Email</th>
        <th class="text-danger">Fjalekalimi</th>
        <th class="text-danger">Numri</th>
        <th class="text-danger">Viti</th>
        <th class="text-danger">Grupi</th>
        <th class="text-danger">Viti akademik</th>
        <th colspan='2' class="text-warning">Veprime</th>
      </tr>
    </div>
  </body>
</html>
         <?php
         while($row = mysqli_fetch_array($result)){ ?>
           <tr>
                
                <td><?php echo $row['ID_Studenti']; ?></td>
                <td><?php echo $row['emri']; ?></td>
                <td><?php echo $row['atesia']; ?></td>
                <td><?php echo $row['mbiemri']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['password']; ?></td>
                <td><?php echo $row['numri']; ?></td>
                <td><?php echo $row['viti']; ?></td>
                <td><?php echo $row['grupi']; ?></td>
                <td><?php echo $row['Viti_shkollor']; ?></td>
                <td>
                  <a href="edit.php?edit=<?php echo $row['ID_Studenti']; ?>" class="btn btn-outline-success badge-pill">Edito</a>
                  <a href="delete.php?delete=<?php echo $row['ID_Studenti']; ?>&viti=<?php echo $row['viti']; ?>" class="btn btn-outline-danger badge-pill">Fshi</a> 
                  <a href="shtoStViti2.php?id=<?php echo $row['ID_Studenti']; ?>&viti=<?php echo $row['Viti_shkollor']; ?>" class="btn btn-outline-success badge-pill">Shto ne vit 2</a>
                  <a href="shtoStViti3.php?id=<?php echo $row['ID_Studenti']; ?>&viti=<?php echo $row['Viti_shkollor']; ?>" class="btn btn-outline-danger badge-pill">Shto ne vit 3</a> 
                </td>
            </tr>
      <?php  } ?>
        </table>

        
        <script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>

  <?php  } 
  else  { ?>
  <script>
     alert("Nuk ka asnje student te regjistruar");
     window.location.href = "shtoStudente.php";
    </script>

  <?php }
    }

mysqli_close($con); ?>