
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
      <form method="post">
        <label>Elige la nueva Foto: </label>
        <input name='nueva_f' type='file' class='form-control'>
        <button type="submit" class="btn btn-primary">AÑADIR</button>
      </form>
      <!-- todos los sitios del usuario-->
      <?php



          if (isset($_POST["nueva_f"])) {


            $connection = new mysqli("localhost", "root", "Admin2015", "hea", 3316);


            if ($connection->connect_errno) {
                printf("Connection failed: %s\n", $connection->connect_error);
                exit();
            }
            $codusu=$_SESSION["codusu"];
            $f=$_GET['foto'];
            $nueva_f=$_POST['nueva_f'];
            $lugar=$_GET['lugar'];

            $c1="update fotos set foto='../../img/usuario/sitios/$nueva_f' WHERE foto='$f'";
            if ($result = $connection->query($c1)) {
              header("Location: mod_lugar.php?lugar=$lugar");
            }
        }


      ?>

      <?php else: ?>
        <h1>NO TIENES PERMISOS PARA ACCEDER AQUI</h1>


      <?php endif ?>

    </div>
  </body>
</html>
