<?php
 session_start();
?>
<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8">
  <title></title>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="../../css/estilos.css" media="screen" title="no title">
</head>
 <body>
    <div class="container-fluid">
      <?php   /*if (isset($_SESSION["user"])&&($_SESSION["user"])=='administrador' ): */?>
      <?php if (isset($_SESSION["user"])&&($_SESSION["user"])=='administrador' ) {
                include("../funciones/admin/cabecera_admin.php");
              }

      ?>


        <?php if (isset($_GET["nusu"])){

          //Creacion de la conexion
          $connection = new mysqli("localhost", "root", "Admin2015", "hea",3316);
          $connection->set_charset("uft8");

          //Probando que la conexion es correcta
          if ($connection->connect_errno) {
              printf("La conexión falló: %s\n", $connection->connect_error);
              exit();
          }

          //CONSULTA PARA CONSEGUIR DATOS DE LOS USUARIOS
          $consulta="SELECT * from usuarios where nusu='".$_GET["nusu"]."'";

          if ($result = $connection->query($consulta))  {

            $obj = $result->fetch_object();

            if ($result->num_rows==0) {
              echo "NO EXISTE ESE USUARIO";
              exit();
            }

            $nusu = $obj->nusu;
            $nombre = $obj->nombre;
            $apellidos = $obj->apellidos;
            $email = $obj->email;
            $fecha = $obj->fecha;
            $tipo = $obj->tipo;
            $cod_usu= $obj->cod_usu;

          } else {
            echo "No se han recuperar los datos cliente";
            exit();
          }
        }

        ?>
        <div class="col-md-6">
      <form method="post">
        <div class="form-group">
          <label>Nombre de usuario: </label>
          <input name="nusu" required type="text" class="form-control" aria-describedby="emailHelp" value='<?php echo $nusu; ?>'>
          <small class="form-text ">Debe ser único, en caso de estar repetido se repetira el formulario</small>
        </div>
        <div class="form-group">
          <label>Nombre: </label>
          <input name="nombre" type="text" class="form-control" placeholder="Nombre" value='<?php echo $nombre; ?>'>
          <label>Apellidos: </label>
          <input name="apellidos" type="text" class="form-control" placeholder="Apellidos" value='<?php echo $apellidos; ?>'>
        </div>
        <div class="form-group">
          <label>Dirección de correo: </label>
          <input name="email" type="email" class="form-control" placeholder="Email" value='<?php echo $email; ?>'>
        </div>
        <div class="form-group">
          <label>Fecha de nacimiento: </label>
          <input name="fecha" type="date" class="form-control" placeholder="Edad" value='<?php echo $fecha; ?>'>
        </div>
        <div class="form-group">
          <label>Tipo de usuario: </label>
          <input name="tipo" type="text" class="form-control" placeholder="tipo" value='<?php echo $tipo; ?>'>
        </div>
        <div class="form-group">
          <input name="cod_usu" type="hidden" class="form-control" placeholder="tipo" value='<?php echo $cod_usu; ?>'>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>



        <?php
        if (isset($_POST["nusu"])) {


        $nusu1 = $_POST["nusu"];
        $nombre1 = $_POST["nombre"];
        $apellidos1 = $_POST["apellidos"];
        $email1 = $_POST["email"];
        $fecha1 = $_POST["fecha"];
        $tipo1 = $_POST["tipo"];
        $cod_usu1 = $_POST["cod_usu"];

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
        $query="update usuarios set nusu='$nusu1',nombre='$nombre1',
        apellidos='$apellidos1',email='$email1',fecha='$fecha1',tipo='$tipo1'
        WHERE cod_usu=$cod_usu1";


        if ($result = $connection->query($query)) {
          header("Location: edita_usuarios.php");
        } else {
          echo "Error al actualizar los datos";
        }
      }
        ?>
        <?php /*else: */?>


  </body>
</html>
