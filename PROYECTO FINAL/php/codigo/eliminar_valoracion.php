<?php
  session_start();
?>
<?php



    if (isset($_GET["cod_foto"])) {


      $connection = new mysqli("localhost", "root", "Admin2015", "hea", 3316);


      if ($connection->connect_errno) {
          printf("Connection failed: %s\n", $connection->connect_error);
          exit();
      }
      $codusu=$_SESSION["codusu"];
      $cod_foto=$_GET['cod_foto'];
      $cod_lugar=$_GET['lugar'];
      $c1="delete from valoracion where cod_foto='$cod_foto'";

      if ($result = $connection->query($c1)) {
        header("Location: mod_lugar.php?lugar=$cod_lugar");
      }
  }


?>
