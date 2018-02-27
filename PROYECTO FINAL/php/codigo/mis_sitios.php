<?php
ob_start();
?>
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
    <style media="screen">
      #boton_accion{
        height: 30px;
      }
      #fotos{
        height: 300px;

      }
    </style>
</head>
  <body>
     <div class="container-fluid">


      <?php if (isset($_SESSION["user"])&&($_SESSION["user"])=='administrador' ) {
                include("../funciones/admin/cabecera_admin.php");
              } else if (isset($_SESSION["user"])) {
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



      <!-- todos los sitios del usuario-->
      <?php



          if (isset($_SESSION["user"])) {

            echo "<div class='row mt-1'>
              <div class='col-md-4'>
              </div>
              <div class='col-md-2'>
                <h2>Añadir sitio</h2>
              </div>
              <div class='col-md-2'>
                <form action='mis_sitios.php' method='post'>
                  <div class='form-group'>
                    <a href='sitio.php?'><img id='boton_accion' src='../../img/administrador/anadir.png'></a>
              </div>
              <div class='col-md-4'>
              </div>

            </div>
          </div>";
            $connection = new mysqli("localhost", "root", "Admin2015", "hea", 3316);


            if ($connection->connect_errno) {
                printf("Connection failed: %s\n", $connection->connect_error);
                exit();
            }
            $codusu=$_SESSION["codusu"];
            $consulta="select s.ciudad, f.foto, s.cod_sitio from usuarios u join sitios s on u.cod_usu=s.cod_usu
            join fotos f on s.cod_sitio=f.cod_sitio where u.cod_usu=$codusu";
            if ($result = $connection->query($consulta)) {

              if ($result->num_rows===0) {
                echo "No tienes ningún sitio, pero puedes agregar uni sitio pulsando en el botón de AÑADIR";
              } else {
                echo "<div class='row'>";
                while($obj = $result->fetch_object()) {

                $lugar=$obj->ciudad;
                $foto=$obj->foto;
                $cod_lugar=$obj->cod_sitio;

                        echo "<div class='mt-3 col-md-4'>
                        <a href='mod_lugar.php?lugar=$cod_lugar'><img id='fotos' class='img-thumbnail' src='$foto'></a><a href='borrar_sitio.php?cod_lugar=$cod_lugar&foto=$foto'><img id='boton_accion' src='../../img/administrador/borrar.svg'></a>
                        <b>$lugar</b>
                        </div>";



              }
              $result->close();
              unset($obj);
              unset($connection);
              echo "</div>";
              }
            }
        }


      ?>


    </div>
  </body>
</html>
<?php
ob_end_flush();
?>
