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
              } else{
                include("../funciones/usuario/cabecera.php");
            }

      ?>

      <?php



          if (isset($_GET["cod_lugar"])) {


            $connection = new mysqli("localhost", "root", "Admin2015", "hea", 3316);


            if ($connection->connect_errno) {
                printf("Connection failed: %s\n", $connection->connect_error);
                exit();
            }
            $lug=$_GET['cod_lugar'];
            $consulta="select * from sitios s join fotos f on s.cod_sitio=f.cod_sitio where s.cod_sitio='$lug' ";
            if ($result = $connection->query($consulta)) {

              if ($result->num_rows===0) {
                echo "Ninun sitio con esa correspondencia";
              } else {
                while($obj = $result->fetch_object()) {

                $lugar=$obj->ciudad;
                $foto=$obj->foto;
                $des=$obj->descripcion;
                $cod_lugar=$obj->cod_sitio;
                // Solo foto y ciudad del sitio
                echo "<div class='row mt-1'>";
                echo "<div class='col-md-3'>";
                echo "</div>";
                echo "<div class='col-md-3 alert'>";
                echo "<img class='w-100 img-thumbnail ' alt='Responsive image' src='$foto'>";
                echo "</div>";
                echo "<div class='col-md-3 alert'>";
                echo "<h2 class='text-center'>$lugar</h2>";
                echo "</div>";
                echo "<div class='col-md-3'>";
                echo "</div>";
                echo "</div>";
                //Esta es la descripcion
                echo "<div class='row mt-1'>";
                echo "<div class='col-md-3'>";
                echo "</div>";
                echo "<div class='col-md-6 alert alert-warning'>";
                echo "$des";
                echo "</div>";
                echo "<div class='col-md-3'>";
                echo "</div>";
                echo "</div>";
              }
              $result->close();
              unset($obj);
              unset($connection);
              }
            }
        }


      ?>


      <?php



          if (isset($_GET["lugar"])) {


            $connection = new mysqli("localhost", "root", "Admin2015", "hea", 3316);


            if ($connection->connect_errno) {
                printf("Connection failed: %s\n", $connection->connect_error);
                exit();
            }
            $lug=$_GET['lugar'];
            $consulta="select * from comentarios c join sitios s on s.cod_sitio=c.cod_sitio where s.cod_sitio='$lug' ";
            if ($result = $connection->query($consulta)) {

              if ($result->num_rows===0) {
                echo "<div class='row'>";
                echo "<div class='col-md-3'>";
                echo "</div>";
                echo "<div class='col-md-6'>";
                echo "<h1 class='text-center'> COMENTARIOS </h1>";
                echo "Ninun Comentario";
                echo "</div>";
                echo "<div class='col-md-3'>";
                echo "</div>";
                echo "</div>";
              } else {
                  while($obj = $result->fetch_object()) {
                $com=$obj->comentario;
                echo "<div class='row'>";
                echo "<div class='col-md-3'>";
                echo "</div>";
                echo "<div class='col-md-6'>";
                echo "<h1 class='text-center'> COMENTARIOS </h1>";
                echo "<div class='alert alert-info'>$com</div>";
                echo "</div>";
                echo "<div class='col-md-3'>";
                echo "</div>";
                echo "</div>";
              }
              $result->close();
              unset($obj);
              unset($connection);
            }
            }
        }
        else {
          echo "<h1>NO TIENES PERMISOS PARA ACCEDER AQUI</h1>";
        }


      ?>
    </div>
  </body>
</html>
