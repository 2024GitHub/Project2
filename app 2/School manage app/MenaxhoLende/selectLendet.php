<?php
include("../database/connection.php");
session_start();

if (!isset($_SESSION['emriAdminit'])) {
  header("location: ../logimi/login.php");
} else {
  $query = "SELECT * FROM lendet";
  $result = mysqli_query($con, $query);
  if (mysqli_num_rows($result) > 0) { ?>
    <html>

    <head>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    </head>

    <body style=" background-image: url(../figura/shkll.jpg);
                background-position: center;
                background-size: cover;">

      <nav class="navbar navbar-light" style="background-color: #DEB887;">
        <form class="container-fluid">
          <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Kerko sipas emrit.." class="form-control" style="margin-top:10px; width:200px; margin-left:70%">
          <div style="margin-top:-40px; margin-left: 90%;" class="sidebar__link">
            <i class="fa fa-power-off"></i>
            <a href="../menu/menu.php">Kthehu</a>
          </div>
        </form>
      </nav>

      <table id="myTable" class="table table-dark table-hover table-bordered" style="width: 980px;  margin-left: auto; margin-right: auto;">
        <tr>
          <th class="text-danger">Id</th>
          <th class="text-danger">IdLende</th>
          <th class="text-danger">Lendet</th>
          <th class="text-danger">Oret</th>
          <th colspan='2' class="text-warning">Veprimet</th>
        </tr>
        </div>
    </body>

    </html>
    <?php
    while ($row = mysqli_fetch_array($result)) { ?>
      <tr>
        <td><?php echo $row['ID']; ?></td>
        <td><?php echo $row['ID_lende']; ?></td>
        <td><?php echo $row['Lenda']; ?></td>
        <td><?php echo $row['Oret']; ?></td>
        <td>
          <a href="editLendet.php?edit=<?php echo $row['ID']; ?>" class="btn btn-outline-success badge-pill">Edito</a>
          <a href="deleteLendet.php?delete=<?php echo $row['ID']; ?>" class="btn btn-outline-danger badge-pill">Fshi</a>
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
          td = tr[i].getElementsByTagName("td")[2];
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