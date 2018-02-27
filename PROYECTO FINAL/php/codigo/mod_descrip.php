<?php
 session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/estilos.css" media="screen" title="no title">
</head>
 <body>
    <div class="container-fluid">
      <?php if (isset($_SESSION["user"])&&($_SESSION["tipo"])=='administrador' ) {
                include("../funciones/admin/cabecera_admin.php");
              } else {
                include("../funciones/usuario/cabecera.php");
            }
      ?>
<h1 class='text-center' id="color_negro"> DESCRIPCIÓN </h1>
<div class="row">
  <div class="col-md-3">
  </div>
  <div class="col-md-6">
    <form class="" method="post">
      <div class="form-group">

        <?php
          if (isset($_GET["lugar"])) {


        $connection = new mysqli("localhost", "root", "Admin2015", "hea",3316);
        $connection->set_charset("uft8");


        if ($connection->connect_errno) {
            printf("Connection failed: %s\n", $connection->connect_error);
            exit();
        }


        $lug=$_GET['lugar'];
        $query="select * from sitios where cod_sitio=$lug";


        if ($result = $connection->query($query)) {
          if($obj = $result->fetch_object()) {
            $com=$obj->descripcion;

        }
      }else {
          echo "Error al actualizar los datos";
        }
        }
        ?>
        <?php echo "<h1>$com</h1>" ?>
        <textarea name="desc" required class="form-control" id="exampleFormControlTextarea1" rows="5" ></textarea>
        <input type="hidden" name="lugar" value="">




      </div>
      <button type="submit" class="btn btn-primary">Enviar comentario</button>
    </form>
  </div>
  <div class="col-md-3">
  </div>
</div>
<?php
  if (isset($_POST["desc"])) {


$connection = new mysqli("localhost", "root", "Admin2015", "hea",3316);
$connection->set_charset("uft8");


if ($connection->connect_errno) {
    printf("Connection failed: %s\n", $connection->connect_error);
    exit();
}


$desc=$_POST['desc'];
$cod_c=$_GET['lugar'];
$query="update sitios set descripcion='$desc' where cod_sitio=$cod_c";


if ($result = $connection->query($query)) {
  header("Location: mod_lugar.php?lugar=$cod_c");
} else {
  echo "Error al actualizar los datos";
}
}
?>
