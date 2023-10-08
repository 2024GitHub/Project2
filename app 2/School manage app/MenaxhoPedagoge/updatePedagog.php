<?php
 include("../database/connection.php");
  if(isset($_POST['update'])){
    $id = $_POST['id'];
    $query = "UPDATE pedagog SET name='$_POST[emri]',password='$_POST[pass]',surname='$_POST[mbiemri]',email='$_POST[email]',tel='$_POST[numri]' WHERE ID='$_POST[id]'";
    $result = mysqli_query($con,$query);
    if($result){ ?>
   <script>
   alert("Te dhenat e pedagogut u ndryshuan!!");
    window.location.href = "selectPedagog.php";
    </script>
<?php 
    }  
}
?>