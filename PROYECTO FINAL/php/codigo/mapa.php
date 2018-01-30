<?php
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
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

      <div class="row">
        <div class="col-md-3">
        </div>
        <div class="col-md-6 mt-2 img-thumbnail" >
          <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d6360057.857436926!2d-4.2827772923841545!3d38.889748591177806!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2ses!4v1517313753095" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
        <div class="col-md-3">
        </div>
      </div>
    </div>
  </body>
</html>
