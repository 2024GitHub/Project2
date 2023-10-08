<?php
 include("../database/connection.php");
  if(isset($_POST['update'])){
    $id = $_POST['id'];
    $query = "UPDATE lendet SET ID_lende='$_POST[idLende]',Lenda='$_POST[lendet]',Oret='$_POST[oret]' WHERE ID='$_POST[id]'";
    $result = mysqli_query($con,$query);
    if($result){ ?>
   <script>
   alert("Te dhenat e lendes u ndryshuan me sukses!!");
    window.location.href = "selectLendet.php";
    </script>
<?php 
    }  
}
?>