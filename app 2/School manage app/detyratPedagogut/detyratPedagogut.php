<?php
session_start(); 
if (!isset($_SESSION['emriPedagogut'])) { 
  header("location: ../logimi/loginPedagog.php");
}
else { ?>
<html>
<head>
<link rel="stylesheet" href="../css/butona.css">
</head>
<body>
<div class="bottom-left">Detyrat e Pedagogeve</div>
<?php
function writeMsg(){ ?>
<?php

  echo "<form class='butona5' action='lab_Dk.php'>
  <button type='submit' class='btn'>Laboratore/Detyre Kursi</button>
  </form>";

  echo "<form class='butona1' action='shfaqStudent.php'>
  <button type='submit' class='btn'>Vendos Vleresime</button>
  </form>";

  echo "<form class='butona2' action='../mungesat/shfaqListSt.php'>
  <button type='submit' class='btn'>Vendos mungesa</button>
  </form>"; 

  echo "<form  class='butona3' action='teDhenaHyrese.php'>
  <button type='submit' class='btn'>Kthehu</button>
  </form>";

  echo "<form class='butona4' action='../logimi/loginPedagog.php'>
  <button type='submit'class='btn'>DIL</button>
  </form>"; ?>

  </body>
</html>
<?php } ?> 

<?php
  if(isset( $_SESSION['vitiSt'])){
      
  WriteMsg();

  }else{

    $lendaViti=$_GET['lenda'];
    $grupi=$_GET['grupi'];
    $vitiAkademik=$_GET['vitiAkademik'];
    if(($vitiAkademik == 'Zgjidh vitin...') || ($lendaViti == 'Zgjidh lenden...') || ($grupi == 'Zgjidh grupin...')){
    ?>
    <script>
      alert("Kujdes !!Ne cdo fushe duhet te besh nje zgjedhje!!");
      window.location.href = "teDhenaHyrese.php";
    </script>

    <?php
    }
    else{

      $viti=$lendaViti[0];
      $length=strlen($lendaViti);
      $lenda=substr($lendaViti, 1, $length);
      $_SESSION['vitiSt']=$viti;
      $_SESSION['lendaSt']=$lenda;
      $_SESSION['grupiSt']=$grupi;
      $_SESSION['vitiAkademik']=$vitiAkademik;
      WriteMsg();
    }
  }
}
?>