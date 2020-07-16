<nav class="navbar is-white">
  <div class="navbar-brand">
    <a class="navbar-item" href="index.php?pid=<?php echo base64_encode("presentacion/administrador/sesionAdministrador.php") ?>">
      <img src="img/Logo.png" alt="Logotipo perron" width="65px" height="35px">
      <span class="navbar-text">Veterinaria</span>
    </a>
    <div class="navbar-burger burger" data-target="navbarExampleTransparentExample">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>
  <div class="navbar-end">
    <div class="navbar-item">
      <div class="field is-grouped">
        <p class="control">
          <span class="navbar-text">
            Administrador: <?php echo $administrador->getNombre() . " " . $administrador->getApellido() ?> </span>
        </p>
        <p class="control">
          <a class="bd-tw-button button" href="index.php">
            <span>
              Salida
            </span>
          </a>
        </p>
      </div>
    </div>
  </div>
</nav>
<div class="row">
  <div class="col-2">
    <div class="card">
      <div class="card-body">
        <aside class="menu">
          <p class="menu-label">Registrar</p>
          <ul class="menu-list">
            <li><a href=<?php echo "index.php?pid=" . base64_encode("presentacion/veterinario/registrarVeterinario.php") ?>>Veterinario</a></li>
            <li><a href=<?php echo "index.php?pid=" . base64_encode("presentacion/auxiliar/registrarAuxiliar.php") ?>>Auxiliar</a></li>
          </ul>
          <p class="menu-label">Consultar</p>
          <ul class="menu-list">
            <li><a href=<?php echo "index.php?pid=" . base64_encode("presentacion/cliente/consultarCliente.php") ?>>Cliente</a></li>
            <li><a href=<?php echo "index.php?pid=" . base64_encode("presentacion/auxiliar/consultarAuxiliar.php") ?>>Auxiliar</a></li>
            <li><a href=<?php echo "index.php?pid=" . base64_encode("presentacion/veterinario/consultarVeterinario.php") ?>>Veterinario</a></li>
            <li><a href=<?php echo "index.php?pid=" . base64_encode("presentacion/mascota/consultarSolicitudes.php") ?>>Solicitudes Pendientes</a></li>
          </ul>
          <p class="menu-label">Analisis</p>
          <ul class="menu-list">

            <li><a href=<?php echo "index.php?pid=" . base64_encode("presentacion/administrador/analisis.php") ?>>Analisis Generales</a></li>
            <li><a href=<?php echo "index.php?pid=" . base64_encode("presentacion/administrador/analisisTrabajadores.php") ?>>Analisis Trabajadores</a></li>
          </ul>

        </aside>
      </div>
    </div>
  </div>