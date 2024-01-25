<?php
include('C:\xampp\htdocs\bj_oriente\controlador_sesion.php');
include('C:\xampp\htdocs\bj_oriente\conexion.php');

if (empty($_SESSION['id_usuario'])) {
    header("Location: index.html");
    exit();
}
$id_usuario = $_SESSION['id_usuario'];
?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- <link rel="stylesheet" href="img/logo.webp" /> -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="css/style.css" />

    <title>JBOriente | Crear Cliente</title>
  </head>
  <body>
    <header class="">
      <!-- CAMBIAR EL TAMAÑO DE LA LETRA -->
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark p-3">
        <div class="container-fluid">
          <img src="img/logo.png" alt="" class="img-header mx-3" />
          <a class="navbar-brand" href="#">JBOriente</a>
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="">Inicio</a>
              </li>
              <li class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle active"
                  href="bj_oriente\index.html"
                  role="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
                  Clientes
                </a>
                <ul class="dropdown-menu">
                  <li>
                    <a class="dropdown-item" href="crearcliente.php"
                      >Crear Cliente</a
                    >
                  </li>
                  <li>
                    <a class="dropdown-item" href="lista_de_clientes.php">Lista de Clientes</a>
                  </li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  role="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
                  Cuenta Por Cobrar
                </a>
                <ul class="dropdown-menu">
                  <li>
                    <a class="dropdown-item" href="#"
                      >Crear Cuenta Por Cobrar</a
                    >
                  </li>
                  <li>
                    <a class="dropdown-item" href="#"
                      >Lista Cuenta Por Cobrar</a
                    >
                  </li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  role="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
                  Cotización
                </a>
                <ul class="dropdown-menu">
                  <li>
                    <a class="dropdown-item" href="#">Crear Cotización</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="#">Lista Cotización</a>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <main class="container py-4 bg-primary">
      <form method="POST">
      <h1 class="m-4">Crear Cliente</h1>

      <h2 class="m-4">Información básica del cliente</h2>
      <input type="hidden" name="id_usuario" value="<?php echo $id_usuario; ?>">
      <label for="id_tipo_documento" class="form-label">Tipo de Documento</label>
<select class="form-control M-4" name="id_tipo_documento">
    <option value="1">Targeta de identidad</option>
    <option value="2">Cedula</option>
</select>
        <label for="documento" class="form-label"
          >Ingrese su documento</label
        >
        <input
          type="text"
          class="form-control M-4"
          name="documento"
          placeholder="Ingrese el documento del Cliente"
        />

        <label for="cliente-nombre" class="form-label">Nombre</label>
        <input
          type="text"
          class="form-control M-4"
          name="nombre"
          placeholder="Ingrese El Nombre Del Cliente"
        />

        <label for="cliente-nombre" class="form-label">Apellido</label>
        <input
          type="text"
          class="form-control M-4"
          name="apellido"
          placeholder="Ingrese El Apellido Del Cliente"
        />

        <label for="cliente-nombre" class="form-label"
          >Correo del Cliente</label
        >
        <input
          type="text"
          class="form-control M-4"
          name="correo"
          placeholder="Ingrese El Correo Del Cliente"
        />
        <label for="cliente-nombre" class="form-label"
          >Telefono del Cliente</label
        >
        <input
          type="tel"
          class="form-control M-4"
          name="telefono"
          placeholder="Ingrese El Telefono Del Cliente"
        />

        <label for="cliente-direccion" class="form-label">Dirección</label>
        <input
          type="text"
          class="form-control M-4"
          name="direccion"
          placeholder="Ingrese El Dirección Del Cliente"
        />

        <input type="submit" name="Crear" value="Crear"  class="btn btn-primary bg-light text-dark m-4">
         
        <!-- codigo php para la creacion de clientes-->
        <?php
          if (!empty($_POST["Crear"])) {
            //ng hace referencia a nuevo cliente para evitar posibles confusiones con otras variables
            $id_usuario = $_POST['id_usuario'];
            $id_tipo_documento = $_POST['id_tipo_documento'];
            $ng_documento = $_POST['documento'];
            $ng_nombre = $_POST['nombre'];
            $ng_apellido = $_POST['apellido'];
            $ng_correo = $_POST['correo'];
            $ng_telefono = $_POST['telefono'];
            $ng_direccion = $_POST['direccion'];
            try {
              $insertar_nuevo_cliente = $conexion->query("INSERT INTO cliente( id_usuario, id_tipo_documento, documento, nombre, apellido, correo,
              telefono, direccion) VALUES('$id_usuario', '$id_tipo_documento', '$ng_documento', '$ng_nombre', '$ng_apellido', '$ng_correo',
              '$ng_telefono', '$ng_direccion')");

              if ($insertar_nuevo_cliente === false) {
                throw new Exception('Error al enviar la consulta:');
                header("Location: crearcliente.php");
              }
            } catch (Exception $e) {
              echo '<script type="text/javascript">';
              echo 'alert("No se pudo registrar al nuevo cliente: ' . $e->getMessage() . '");';
              echo '</script>';
            }
          }
          ?>
      </form>
    </main>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
      $(document).ready(function () {
        // Selecciona los elementos del menú desplegable y activa el evento al pasar el cursor
        $(".nav-item.dropdown").mouseenter(function () {
          $(this).addClass("show");
          $(this).find(".dropdown-menu").addClass("show");
        });

        // Desactiva el menú desplegable al salir del enlace
        $(".nav-item.dropdown").mouseleave(function () {
          $(this).removeClass("show");
          $(this).find(".dropdown-menu").removeClass("show");
        });
      });
    </script>
  </body>
</html>
