<nav class="navbar navbar-dark bg-dark navbar-expand-lg">
  <a class="navbar-brand" href="inicio.php">
    <h1> He estado Aquí</h1>
    


    <?php
    if (isset($_SESSION["user"])) {
      echo "<h4 id='nusu'>Estas logueado como: $_SESSION[user]</h4>";
      echo "<a class='navbar-brand' href='../../php/codigo/logout.php'>Log out</a>";

    } else {
      echo "<h4 id='nusu'>No ha iniciado sesion</h4>";
      echo "<a class='navbar-brand' href='login.php'>Log in</a>";
      echo "<a class='navbar-brand' href='registro.php'>Sing in</a>";
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
        <a class="navbar-brand " href="editar_cuenta.php">Editar cuenta</a>
      </nav>
    </div>

  </div>
  <nav class="navbar navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </nav>
