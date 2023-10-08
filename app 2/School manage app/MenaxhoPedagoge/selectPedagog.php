<?php
include("../database/connection.php");
session_start();

if (!isset($_SESSION['emriAdminit'])) {
  header("location: ../logimi/login.php");
} else {
  $query = "SELECT * FROM pedagog";
  $result = mysqli_query($con, $query);
  if (mysqli_num_rows($result) > 0) { ?>
    <html>

    <head>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>

    <body style=" background-image: url(../figura/shkll.jpg);
                background-position: center;
                background-size: cover;">
      <div class="stylee">

        <nav class="navbar navbar-light" style="background-color: #9dc4ef; margin-top:-20px;">
          <form class="container-fluid">
            <input type="text" id="myInput" onkeyup="searchFunction()" placeholder="Kerkimi sipas emrit.." class="form-control" style="margin-top:30px; width:200px; margin-left:70%">
            <div style="margin-top:-40px; margin-left: 90%;" class="sidebar__link">
              <i class="fa fa-chevron-left"></i>
              <a href="../menu/menu.php">Kthehu</a>
            </div>
          </form>
        </nav>

        <table id="myTable" class="table table-light table-striped table-hover table-bordered" style="margin-top:100px">
          <tr>
            <th scope="col" class="text-danger">Id</th>
            <th scope="col" class="text-danger">Name</th>
            <th scope="col" class="text-danger">Password</th>
            <th scope="col" class="text-danger">Surname</th>
            <th scope="col" class="text-danger">Email</th>
            <th scope="col" class="text-danger">Tel</th>
            <th colspan='2' scope="col" class="text-warning">Veprime</th>
          </tr>
      </div>
    </body>

    </html>
    <?php
    while ($row = mysqli_fetch_array($result)) { ?>
      <tr>
        <td><?php echo $row['ID']; ?></td>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['password']; ?></td>
        <td><?php echo $row['surname']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['tel']; ?></td>
        <td>
          <a href="editPedagog.php?edit=<?php echo $row['ID']; ?>" class="btn btn-outline-success badge-pill">Edito</a>
          <a href="deletePedagog.php?delete=<?php echo $row['ID']; ?>" class="btn btn-outline-danger badge-pill">Fshi</a>
        </td>
      </tr>

    <?php  } ?>

    </table>

    <script>
      function searchFunction() {
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
}
mysqli_close($con); ?>