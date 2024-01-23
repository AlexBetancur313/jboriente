<?php
session_start();
include('C:\xampp\htdocs\bj_oriente\conexion.php');

if (isset($_POST["Borrar"])) {
    // Procesar el borrado del cliente
    $id_cliente_borrar = $_POST["id_cliente_borrar"];
    $borrar_cliente = $conexion->query("DELETE FROM cliente WHERE id_cliente = '$id_cliente_borrar'");
    if ($borrar_cliente) {
        header("Location: lista_de_clientes.php");
    }
}
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

    <title>JBOriente | Lista de Clientes</title>
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
                  href="C:\xampp\htdocs\bj_oriente\index.html"
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
    <table class="table table-striped table-bordered">
          <tr>
            <th>Id</th>
            <th>Id usuario</th>
            <th>Id documento</th>
            <th>Documento</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Correo</th>
            <th>Telefono</th>
            <th>Dirección</th>
            <th>Editar</th>
            <th>Eliminar</th>
          </tr>
          <?php
          $seleccionar = $conexion->query("SELECT * FROM cliente");
          while ($datos_obtenidos = $seleccionar->fetch_assoc()) {

          ?>
            <tr>
              <td><?php echo $datos_obtenidos['id_cliente'] ?></td>
              <td><?php echo $datos_obtenidos['id_usuario'] ?></td>
              <td><?php echo $datos_obtenidos['id_tipo_documento'] ?></td>
              <td><?php echo $datos_obtenidos['documento'] ?></td>
              <td><?php echo $datos_obtenidos['nombre'] ?></td>
              <td><?php echo $datos_obtenidos['apellido']; ?></td>
              <td><?php echo $datos_obtenidos['correo']; ?></td>
              <td><?php echo $datos_obtenidos['telefono']; ?></td>
              <td><?php echo $datos_obtenidos['direccion']; ?></td>
              <td><a class="actualizar" href="editar_cliente.php?id_cliente=<?php echo $datos_obtenidos['id_cliente'] ?>">Actualizar </td>
              <td><form method="post">
                    <input type="hidden" name="id_cliente_borrar" value="<?php echo $datos_obtenidos['id_cliente']; ?>"/>
                    <input type="submit" name="Borrar" value="Eliminar"/>
                </form></td>
            </tr>
          <?php } ?>
        </table>
  </body>
</html>
