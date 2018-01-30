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
        <div class="col-md-6 offset-md-3 mt-2" >
          <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand">Buscar sitio...</a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <form class="form-inline my-2 my-lg-0" method="post">
                <input class="form-control mr-sm-4" type="search" placeholder="Search" aria-label="Search" name="lugar">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
          </nav>
        </div>
      </div>
    </div>
    <?php



        if (isset($_POST["nusu"])) {


          $connection = new mysqli("localhost", "root", "Admin2015", "hea", 3316);


          if ($connection->connect_errno) {
              printf("Connection failed: %s\n", $connection->connect_error);
              exit();
          }

          $consulta="select * from sitios where ciudad=$_POST['lugar']";
          if ($result = $connection->query($consulta)) {

            if ($result->num_rows===0) {
              echo "Ninun sitio con esa correspondencia";
            } else {
              $obj = $result->fetch_object();
              $lugar=$obj->ciudad;
              echo "$lugar";



            }
          }


      }

    ?>
  </body>
</html>
