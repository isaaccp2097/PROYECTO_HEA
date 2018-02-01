<!--<div class="row" id="encabezado">
 <div class="col-md-4" id="logo">
     <a href="inicio.php"><img src="../../img/prueba1.png" class="img-fluid" alt="Responsive image"></a>
 </div>
 <div class="col-md-5" id="inicio">
         <?php
         if (isset($_SESSION["user"])) {
         echo "<h4 id='nusu'>Estas logueado como: $_SESSION[user]</h4>";
       } else {
         echo "<h4 id='nusu'>No ha iniciado sesion</h4>";
       }
       ?>
 </div>


 <div class="col-md-3" id="inicio">
     <td><a href="registro.php"><button type="button" class="navbar-toggler" id='boton'>
     SING IN</button></a></td>
     <td><a href="login.php"><button type="button" class="navbar-toggler" id='boton'>
     LOG IN</button></a></td>
 </div>

 </div>


<div class="row" id="menu">
 <div class="col-md-3" id="inicio">
       <a href="mapa.php"><button type="button" id="item" class="navbar-toggler">Mapa
       </button></a>
 </div>
 <div class="col-md-3" id="inicio">
       <a href="lugares.php"><button type="button" id="item" class="navbar-toggler">Lugares
       </button></a>
 </div>
 <div class="col-md-3" id="inicio">
       <a href="missitios.php"><button type="button" id="item" class="navbar-toggler">Mis sitios
       </button></a>
 </div>
 <div class="col-md-3" id="inicio">
       <a href="contactanos.php"><button type="button" id="item" class="navbar-toggler">Contactanos
       </button></a>
 </div>
</div>

<div class="row" id="menu">
 <div class="col-md-3" id="inicio">
       <a href="admin_mapa.php"><button type="button" id="item" class="navbar-toggler">Editar Usuarios
       </button></a>
 </div>
 <div class="col-md-3" id="inicio">
       <a href="admin_lugares.php"><button type="button" id="item" class="navbar-toggler">Editar lugares de usuarios
       </button></a>
 </div>
 <div class="col-md-3" id="inicio">
       <a href="admin_missitios.php"><button type="button" id="item" class="navbar-toggler">Sitios admin
       </button></a>
 </div>
 <div class="col-md-3" id="inicio">
       <a href="admin_contactanos.php"><button type="button" id="item" class="navbar-toggler">Edita Contactanos
       </button></a>
 </div>
</div>-->











<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<nav class="navbar navbar-dark bg-dark navbar-expand-lg">
  <a class="navbar-brand" href="inicio.php">
    <img src="../../img/prueba1.png" width="200" height="75" class="d-inline-block align-top img-rounded" alt="">
    <a class="navbar-brand " href="login.php">Log in</a>
    <a class="navbar-brand" href="registro.php">Sing in</a>
    </a>
</nav>
<div class="pos-f-t">
  <div class="collapse" id="navbarToggleExternalContent">
    <div class="bg-dark p-4">
      <h4 class="text-white">CONTENIDO</h4>
      <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand " href="mapa.php">Mapa</a>
        <a class="navbar-brand " href="lugares.php">Lugares</a>
        <a class="navbar-brand " href="mis_sitios.php">Mis Sitios</a>
        <a class="navbar-brand " href="contactanos.php">Contactanos</a>
      </nav>
    </div>
    
  </div>
  <nav class="navbar navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </nav>
</div>
