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



      <?php if (isset($_SESSION["user"])&&($_SESSION["user"])=='administrador' ) {
                include("../funciones/admin/cabecera_admin.php");
              } else {
                include("../funciones/usuario/cabecera.php");
            }
      ?>

      <div class="row">
        <div class="col-md-3">
        </div>
        <div class="col-md-6">
      <form  method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label>Ciudad: </label>
          <input name="ciudad" type="text" class="form-control" required>
          <label>Pais: </label>
          <input name="pais" type="text" class="form-control">
          <label>Provincia: </label>
          <input name="provincia" type="text" class="form-control">
          <label>Latitud: </label>
          <input name="latitud" type="varchar" class="form-control">
          <label>Longitud: </label>
          <input name="longitud" type="varchar" class="form-control">
          <label>Descripción: </label>
          <input name="descripcion" type="varchar" class="form-control">
          <label>Nombre foto: </label>
          <input class="form-control" type="text" name="name" required placeholder="Inserta el nombre de la foto" />
          <label>Foto: </label>
          <input name="image" type="file" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">AÑADIR</button>
      </form>
    </div>
    </div>
    </div>

    <?php

        if (isset($_POST["ciudad"])) {


          $connection = new mysqli("localhost", "root", "Admin2015", "hea", 3316);


          if ($connection->connect_errno) {
              printf("Connection failed: %s\n", $connection->connect_error);
              exit();
          }


          $ciudad=$_POST['ciudad'];
          $pais=$_POST['pais'];
          $provincia=$_POST['provincia'];
          $latitud=$_POST['latitud'];
          $longitud=$_POST['longitud'];
          $descripcion=$_POST['descripcion'];
          $cod_usu=$_SESSION['codusu'];

          $c1="insert into sitios (cod_usu,ciudad,pais,provincia,latitud,longitud,descripcion)
          values
          ('$cod_usu','$ciudad','$pais','$provincia','$latitud','$longitud','$descripcion')";

          if ($result = $connection->query($c1)) {
            $codsitio=$connection->insert_id;



            $tmp_file = $_FILES['image']['tmp_name'];


            $target_dir = "../../img/usuario/sitios/";


            $target_file = strtolower($target_dir . basename($_FILES['image']['name']));


            $valid= true;



            if (file_exists($target_file)) {
              echo "Sorry, file already exists.";
              $valid = false;
            }


            if ($_FILES['image']['size'] > (2048000)) {
              $valid = false;
              echo 'Oops!  Your file\'s size is to large.';
            }


            $file_extension = pathinfo($target_file, PATHINFO_EXTENSION);
            if ($file_extension!="jpg" && $file_extension!="jpeg" && $file_extension!="png" && $file_extension!="gif") {
              $valid = false;
              echo "Only JPG, JPEG, PNG & GIF files are allowed";
            }


            if ($valid) {


              move_uploaded_file($tmp_file, $target_file);

            

              $connection = new mysqli("localhost", "root", "Admin2015", "hea", 3316);


              if ($connection->connect_errno) {
                  printf("Connection failed: %s\n", $connection->connect_error);
                  exit();
              }


              $query="insert into fotos (cod_foto, cod_sitio, foto)
              values
              (NULL,'$codsitio','$target_file')";

              if ($result = $connection->query($query)) {
                  header("Location: mis_sitios.php");
              }
            }


          }
        }

    ?>
 </body>
</html>
