<nav class="navbar navbar-dark bg-dark navbar-expand-lg">
  <a class="navbar-brand" href="inicio.php">
    <img src="../../img/prueba1.png" width="200" height="75" class="d-inline-block align-top img-rounded" alt="">
    <a class="navbar-brand " href="login.php">Log in</a>
    <a class="navbar-brand" href="registro.php">Sing in</a>
    <?php
    if (isset($_SESSION["user"])) {
    echo "<h4 style='margin-left: 50%; color: white;'>Estas logueado como: $_SESSION[user]</h4>";
  } else {
    echo "<h4 id='nusu'>No ha iniciado sesion</h4>";
  }
  ?>
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
        <a class="navbar-brand " href="mapa.php">Editar Mapa</a>
        <a class="navbar-brand " href="lugares.php">Editar Lugares</a>
        <a class="navbar-brand " href="mis_sitios.php">Editar Mis Sitios</a>
        <a class="navbar-brand " href="contactanos.php">Editar Contactanos</a>
      </nav>
    </div>

  </div>
  <nav class="navbar navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </nav>
</div>
