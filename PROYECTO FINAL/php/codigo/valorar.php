<?php
  session_start();
?>
<?php
if (isset($_GET["lugar"])) {



//CREATING THE CONNECTION
$connection = new mysqli("localhost", "root", "Admin2015", "hea",3316);
$connection->set_charset("uft8");

//TESTING IF THE CONNECTION WAS RIGHT
if ($connection->connect_errno) {
    printf("Connection failed: %s\n", $connection->connect_error);
    exit();
}

//MAKING A SELECT QUERY
/* Consultas de selección que devuelven un conjunto de resultados */
$nota=$_GET["nota"];
$cod_foto=$_GET["codfoto"];
$cod_usu=$_SESSION["codusu"];
$lug=$_GET["lugar"];

$query="insert into valoracion (nota,cod_usu,cod_foto)
values ('$nota','$cod_usu','$cod_foto')";


if ($result = $connection->query($query)) {
  header("Location: lugar.php?lugar=$lug");
} else {
  header("Location: lugar.php?lugar=$lug");
}
}
?>
