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
   </style>
</head>

 <body>
    <div class="container-fluid">
      <?php if (isset($_SESSION["user"])&&($_SESSION["user"])=='administrador' ) {
                include("../funciones/admin/cabecera_admin.php");
              } else {
                include("../funciones/usuario/cabecera.php");
            }
      ?>

      <?php

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
          $query="SELECT * from usuarios";
        if ($result = $connection->query($query)) {

            printf("<p>Numero de usuarios registrados: %d.</p>", $result->num_rows);

        ?>

            <!-- Tabla usuarios -->
            <table class="table table-dark">
              <thead>
                <tr>
                  <th scope="col">Nombre usuario</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Apellidos</th>
                  <th scope="col">Email</th>
                  <th scope="col">Fecha Nacimiento</th>
                  <th scope="col">Tipo</th>
                </tr>
              </thead>






        <?php

            //FETCHING OBJECTS FROM THE RESULT SET
            //THE LOOP CONTINUES WHILE WE HAVE ANY OBJECT (Query Row) LEFT
            while($obj = $result->fetch_object()) {
                //PRINTING EACH ROW
                echo "<tbody>
                        <tr>
                        <th scope='row'>$obj->nusu</th>
                        <td>$obj->nombre</td>
                        <td>$obj->apellidos</td>
                        <td>$obj->email</td>
                        <td>$obj->fecha</td>
                        <td>$obj->tipo</td>
                        <td><a href='mod_usu.php?nusu=$obj->nusu'><img src='../../img/administrador/editar.jpg' id='boton_accion' ></a></td>
                        <td><a href='borrar_usu.php?nusu=$obj->nusu'><img src='../../img/administrador/borrar.svg' id='boton_accion'></a></td>


                      </tr>
                      ";
            }
            echo "</tbody>";
            //Free the result. Avoid High Memory Usages
            $result->close();
            unset($obj);
            unset($connection);

        } //END OF THE IF CHECKING IF THE QUERY WAS RIGHT

      ?>
        </table>



 </body>
</html>
