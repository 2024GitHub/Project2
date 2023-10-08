<?php
session_start();
include("../database/connection.php");
if (!isset($_SESSION['emriLoginSt'])) { 
    header("location: ../logimi/loginStudent.php");
}
else {

$id=$_SESSION['idLoginStudent'];
$viti=$_SESSION['vitiStudentit'];
if ($viti==1){
    viti1($viti,$id);
}
else if($viti==2) {
    $sql1 = "SELECT * FROM viti$viti WHERE IDS='$id'";
    $result1 = mysqli_query($con,$sql1);
if(mysqli_num_rows($result1)>0)
{
    viti1(1,$id);
    viti2($viti,$id);
}
else{
    ?>

<script>
     alert("Kujdes!!Ju mund te shikoni notat e vitit paraardhes ose vitit aktual, por jo te viteve pasardhes!");
                   window.location.href = "../logimi/loginStudent.php";
                   </script>
    <?php
}
}
else {
    $sql2 = "SELECT * FROM viti$viti WHERE IDS='$id'";
    $result2 = mysqli_query($con,$sql2);
if(mysqli_num_rows ($result2)>0){
    viti1(1,$id);
    viti2(2,$id);
    viti3($viti,$id);
}
else{
    ?><script>
    alert("Kujdes!!Ju mund te shikoni notat e vitit paraardhes ose vitit aktual, por jo te viteve pasardhes!");
     window.location.href = "../logimi/loginStudent.php";
     </script>

    <?php
}
}
}

function viti1($viti,$id){
    include("../database/connection.php");
    $sql = "SELECT * FROM viti$viti WHERE IDS='$id'";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($result);
    $algjeber = $row['Algjeber'];
    $analize1 = $row['Analize1'];
    $fizike = $row['Fizike1'];
    $gjuhe = $row['Gjuhe_e_huaj'];
    $elemente_info = $row['Elementet_info'];
    $komunikim = $row['Komunikim'];
    $analize2 = $row['Analize2'];
    $fizike2 = $row['Fizike2'];
    $elektroteknike = $row['Elektroteknike'];
    $analize3 = $row['Analize3'];
    $gjuheC = $row['GjuheC'];
    $Probabilitet = $row['Probabilitet'];
?>
<html>
  <head>
   <title>Faqja e Studentit</title>
   <link rel="stylesheet" href="../css/studentGrade.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  </head>
  <body>
      <h1>Student <?php $emri=$_SESSION['emriLoginSt']; echo $emri;?></h1>

      <nav class="navbar navbar-light" style="background-color: #DEB887; margin-top: -60px; width:250px; margin-left: 70%;">
    <form class="container-fluid">
      <div class="sidebar__link" style=" margin-left: 100px; ">
        <i class="fa fa-power-off"></i>
        <a href="../logimi/loginStudent.php">Dil</a>
      </div>
    </form>
    </nav>
          
	<form action="">
    <h3 style="text-align:center; color:#20B2AA">Viti 1</h3>
    <table class="table table-light table-hover table-bordered table-striped" style="margin-top:37px">
      <tr>
        <th class="text-danger">Algjeber</th>
        <th class="text-danger">Analize1</th>
        <th class="text-danger">Fizike</th>
        <th class="text-danger">GjuheHuaj</th>
        <th class="text-danger">ElementeInfo</th>
        <th class="text-danger">Komunikim</th>
        <th class="text-danger">Analize2</th>
        <th class="text-danger">Fizik2</th>
        <th class="text-danger">Elektroteknike</th>
        <th class="text-danger">Analize3</th>
        <th class="text-danger">GjuheC</th>
        <th class="text-danger">Probabilitet</th>
      </tr>
      <tr>
        <td><?php echo $algjeber;?></td>
        <td><?php echo $analize1; ?></td>
        <td><?php echo $fizike; ?></td>
        <td><?php echo $gjuhe; ?></td>
        <td><?php echo $elemente_info; ?></td>
        <td><?php echo $komunikim; ?></td>
        <td><?php echo $analize2;?></td>
        <td><?php echo $fizike2;?></td>
        <td><?php echo $elektroteknike;?></td>
        <td><?php echo $analize3;?></td>
        <td><?php echo $gjuheC;?></td>
        <td><?php echo $Probabilitet;?></td>       
      </tr>
    </form>
          
<?php } ?>

<?php
function viti2($viti,$id){
    include("../database/connection.php");
    $sql = "SELECT * FROM viti$viti WHERE IDS='$id'";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($result);
    $analizeNumerike = $row['Analize_numerike'];
    $strukture = $row['Strukture'];
    $teorisinjali = $row['Teori_sinjali'];
    $automatizim = $row['Automatizim'];
    $arkitekture = $row['Arkitekture'];
    $elementeElektronike = $row['Elemente_elektronike'];
    $sisteme = $row['Sisteme'];
    $perpunimi = $row['Perpunim_numerik'];
    $matje = $row['Matje'];
    $rrjetaTelematike = $row['Rrjeta_telematike'];
    $java = $row['Java'];

?>
            
   <form action="">

   <table class="table table-light table-hover table-bordered table-striped" style="margin-top:47px">
   <h3 style="text-align:center; color:#20B2AA">Viti 2</h3>
    <tr>
        <th class="text-danger">AnalizeNumerike</th>
        <th class="text-danger">Strukture</th>
        <th class="text-danger">TeoriSinjali</th>
        <th class="text-danger">Automatizim</th>
        <th class="text-danger">Arkitekture</th>
        <th class="text-danger">ElementeElektronike</th>
        <th class="text-danger">Sisteme</th>
        <th class="text-danger">Perpunim</th>
        <th class="text-danger">Matje</th>
        <th class="text-danger">RrjetaTelematike</th>
        <th class="text-danger">Java</th>
    </tr>

    <tr>
        <td><?php echo $analizeNumerike;?></td>
        <td><?php echo $strukture; ?></td>
        <td><?php echo $teorisinjali; ?></td>
        <td><?php echo $automatizim; ?></td>
        <td><?php echo $arkitekture; ?></td>
        <td><?php echo $elementeElektronike; ?></td>
        <td><?php echo $sisteme;?></td>
        <td><?php echo $perpunimi;?></td>
        <td><?php echo $matje;?></td>
        <td><?php echo $rrjetaTelematike;?></td>
        <td><?php echo $java;?></td>    
    </tr>
    </form>

<?php }

?>

<?php
function viti3($viti,$id){
    include("../database/connection.php");
    $sql = "SELECT * FROM viti$viti WHERE IDS='$id'";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($result);
    $algoritmike = $row['Algoritmike'];
    $bazaTeDhena = $row['Baza_te_dhenave'];
    $web = $row['Web'];
    $sisOperative = $row['Sisteme_operative'];
    $rrjetaKompjuterave = $row['Rrjeta_kompjuterave'];
    $programimNeAmbiente = $row['Programim_ne_ambjente'];
    $inxhSofti = $row['Inxhinieri_Softi'];
    $praktike = $row['Praktike'];
    $ekonomi = $row['Ekonomi'];
    $integrimEuropian = $row['Integrim_europian'];
?>

         
    <form>
    <table class="table table-light table-hover table-bordered table-striped" style="margin-top:57px">
    <h3 style="text-align:center; color:#20B2AA">Viti 3</h3>
    <tr>
        <th class="text-danger">Algoritmike</th>
        <th class="text-danger">BazeTeDhenash</th>
        <th class="text-danger">Web</th>
        <th class="text-danger">SistemeOperative</th>
        <th class="text-danger">RrjetaKompjuterave</th>
        <th class="text-danger">ProgramimNeAmbiente</th>
        <th class="text-danger">InxhSofti</th>
        <th class="text-danger">IntegrimEuropian</th>
        <th class="text-danger">Ekonomi</th>
        <th class="text-danger">Praktike</th>
    </tr>
    <tr>
        <td><?php echo $algoritmike;?></td>
        <td><?php echo $bazaTeDhena; ?></td>
        <td><?php echo $web; ?></td>
        <td><?php echo $sisOperative; ?></td>
        <td><?php echo $rrjetaKompjuterave; ?></td>
        <td><?php echo $programimNeAmbiente; ?></td>
        <td><?php echo $inxhSofti;?></td>
        <td><?php echo $integrimEuropian;?></td>
        <td><?php echo $ekonomi;?></td>
        <td><?php echo $praktike;?></td>   
    </tr>
    </form>
<?php 

} ?>
</body>
</html>