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
      #color_negro{
        color: black;
      }
    </style>
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
          if (isset($_GET["lugar"])) {
            $connection = new mysqli("localhost", "root", "Admin2015", "hea", 3316);


            if ($connection->connect_errno) {
                printf("Connection failed: %s\n", $connection->connect_error);
                exit();
            }
            $lug=$_GET['lugar'];
            $consulta="select round(avg(nota),1) nota from valoracion v join fotos f
            on v.cod_foto=f.cod_foto join sitios s on f.cod_sitio=s.cod_sitio where s.cod_sitio='$lug' ";
            if ($result = $connection->query($consulta)) {

              if ($result->num_rows===0) {
                echo "Ninun sitio con esa correspondencia";
              } else {
                if($obj = $result->fetch_object()) {

                $nota=$obj->nota;

              }
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
            $consulta="select * from sitios s join fotos f on s.cod_sitio=f.cod_sitio where s.cod_sitio='$lug' ";
            if ($result = $connection->query($consulta)) {

              if ($result->num_rows===0) {
                echo "Ninun sitio con esa correspondencia";
              } else {
                while($obj = $result->fetch_object()) {

                $lugar=$obj->ciudad;
                $foto=$obj->foto;
                $cod_foto=$obj->cod_foto;
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
                echo "<h2 class='text-center'>$lugar</h2><br>
                  <h1 class='text-center'>$nota/5.0</h1><br>
                    <div class='ec-stars-wrapper text-center'>
	                     <a href='valorar.php?lugar=$lug&nota=1&codfoto=$cod_foto' data-value='1' title='Votar con 1 estrellas'>&#9733;</a>
	                     <a href='valorar.php?lugar=$lug&nota=2&codfoto=$cod_foto' data-value='2' title='Votar con 2 estrellas'>&#9733;</a>
	                     <a href='valorar.php?lugar=$lug&nota=3&codfoto=$cod_foto' data-value='3' title='Votar con 3 estrellas'>&#9733;</a>
	                     <a href='valorar.php?lugar=$lug&nota=4&codfoto=$cod_foto' data-value='4' title='Votar con 4 estrellas'>&#9733;</a>
	                     <a href='valorar.php?lugar=$lug&nota=5&codfoto=$cod_foto' data-value='5' title='Votar con 5 estrellas'>&#9733;</a>
                    </div>";
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
              }
            }
        }
        else {
          echo "<h1>No has accedido bien y no hay ningún sitio";
        }

      ?>
      <h1 class='text-center' id="color_negro"> COMENTARIOS </h1>
      <div class="row">
        <div class="col-md-3">
        </div>
        <div class="col-md-6">
          <form class="" method="post">
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Escribe aquí tu comentario</label>
              <textarea name="comentario" required class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
              <input type="hidden" name="lugar" value="">
            </div>
            <button type="submit" class="btn btn-primary">Enviar comentario</button>
          </form>
        </div>
        <div class="col-md-3">
        </div>
      </div>



      <?php



          if (isset($_GET["lugar"])) {


            $connection = new mysqli("localhost", "root", "Admin2015", "hea", 3316);


            if ($connection->connect_errno) {
                printf("Connection failed: %s\n", $connection->connect_error);
                exit();
            }
            $lug=$_GET['lugar'];
            $consulta="select * from comentarios c join sitios s on s.cod_sitio=c.cod_sitio where s.cod_sitio='$lug'";
            if ($result = $connection->query($consulta)) {

              if ($result->num_rows===0) {
                echo "<div class='row'>";
                echo "<div class='col-md-3'>";
                echo "</div>";
                echo "<div class='col-md-6 mt-5 ' id='color_negro'>";
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

                echo "<div class='mt-5 alert alert-info'>$com</div>";
                echo "</div>";
                echo "<div class='col-md-3'>";
                echo "</div>";
                echo "</div>";
              }
            }
            }
        }


      ?>
      <?php



          if (isset($_POST["comentario"])) {


            $connection = new mysqli("localhost", "root", "Admin2015", "hea", 3316);


            if ($connection->connect_errno) {
                printf("Connection failed: %s\n", $connection->connect_error);
                exit();
            }
            $lug=$_GET['lugar'];
            $com=$_POST['comentario'];
            $u=$_SESSION["user"];
            $cu=$_SESSION["codusu"];
            $consulta="insert into comentarios (cod_comentario,comentario,cod_usu,cod_sitio)
            values (NULL,'$u dice: $com','$cu','$lug')";
            if ($result = $connection->query($consulta)) {
              header("Location: lugar.php?lugar=$lug");

            }
        }


      ?>
    </div>
  </body>
</html>
<?php
ob_end_flush();
?>
