
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
       <?php if (isset($_SESSION["user"]))  :?>

      <?php if (isset($_SESSION["user"])&&($_SESSION["user"])=='administrador' ) {
                include("../funciones/admin/cabecera_admin.php");
              } else if(isset($_SESSION["user"])) {
                include("../funciones/usuario/cabecera.php");
              }else{
                include("../funciones/usuario/cabecera.php");
                echo "<div class='row'>
                  <div class='col-md-3'>
                  </div>
                  <div class='col-md-6'>
                    <form action='login.php' method='post'>
                      <div class='form-group'>
                        <label>Nombre de usuario: </label>
                        <input name='nusu' type='text' class='form-control' placeholder='Nombre de usuario'>
                      </div>
                      <div class='form-group'>
                        <label>Contraseña: </label>
                        <input name='contrasena' type='password' class='form-control' placeholder='Contraseña'>
                      </div><br>
                      <button type='submit' class='btn btn-primary'>Log in</button>
                    </form>
                  </div>
                  <div class='col-md-3'>
                  </div>
                </div>";
            }

      ?>
      <form  method="post" enctype="multipart/form-data">
        <label>Nombre foto: </label>
        <input class="form-control" type="text" name="name" required placeholder="Inserta el nombre de la foto" />
        <label>Elige una nueva foto: </label>
        <input name="image" type="file" class="form-control">
        <button type="submit" class="btn btn-primary">AÑADIR</button>
      </form>
      <!-- todos los sitios del usuario-->
      <?php

      if (isset($_POST["name"])) {

      //NUEVO CODIGO DE INSERCION DE fotos
      //Temp file. Where the uploaded file is stored temporary
      $tmp_file = $_FILES['image']['tmp_name'];

      //Dir where we are going to store the file
      $target_dir = "../../img/usuario/sitios/";

      //Full name of the file.
      $target_file = strtolower($target_dir . basename($_FILES['image']['name']));

      //Can we upload the file
      $valid= true;


      //Check if the file already exists
      if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $valid = false;
      }

      //Check the size of the file. Up to 2Mb
      if ($_FILES['image']['size'] > (2048000)) {
        $valid = false;
        echo 'Oops!  Your file\'s size is to large.';
      }

      //Check the file extension: We need an image not any other different type of file
      $file_extension = pathinfo($target_file, PATHINFO_EXTENSION); // We get the entension
      if ($file_extension!="jpg" && $file_extension!="jpeg" && $file_extension!="png" && $file_extension!="gif") {
        $valid = false;
        echo "Only JPG, JPEG, PNG & GIF files are allowed";
      }


      if ($valid) {

        //var_dump($target_file);
        //Put the file in its place
        move_uploaded_file($tmp_file, $target_file);

      //  echo "PRODUCT ADDED";

        $connection = new mysqli("localhost", "root", "Admin2015", "hea", 3316);


        if ($connection->connect_errno) {
            printf("Connection failed: %s\n", $connection->connect_error);
            exit();
        }

        $f=$_GET['foto'];
        $query="update fotos set foto='$target_file' WHERE foto='$f'";
        if ($result = $connection->query($query)) {
          header("Location: mis_sitios.php");
        }
      }

}
      ?>

      <?php else: ?>
        <h1>NO TIENES PERMISOS PARA ACCEDER AQUI</h1>


      <?php endif ?>

    </div>
  </body>
</html>
