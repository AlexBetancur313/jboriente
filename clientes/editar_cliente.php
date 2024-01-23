<?php
include('C:\xampp\htdocs\bj_oriente\conexion.php');
include('C:\xampp\htdocs\bj_oriente\clientes\sesion_variables.php');
if (isset($_GET['id_cliente'])) {
    $id_cliente = $_GET['id_cliente'];
    $query = "SELECT * FROM cliente WHERE id_cliente = $id_cliente";
    $result = $conexion->query($query);
    if ($result && $result->num_rows > 0) {
        $cliente = $result->fetch_assoc();
        inicializarVariablesCliente(
            $cliente['id_cliente'],
            $cliente['id_tipo_documento'],
            $cliente['documento'],
            $cliente['nombre'],
            $cliente['apellido'],
            $cliente['correo'],
            $cliente['telefono'],
            $cliente['direccion']
        );
    } else {
        echo "Cliente no encontrado.";
        exit; 
    }
} else {
    echo "ID de cliente no proporcionado.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Actualización de Clientes</title>
  <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="css/style.css" />
</head>
<body>
  <main class="container py-4 bg-primary">
    <form method="post">
      <h2 class="m-4">Formulario</h2>
            <label for="id_tipo_documento" class="form-label">Tipo de documento</label>
            <input class="form-control M-4" type="text" name="id_tipo_documento" value="<?php echo $_SESSION['id_tipo_documento']; ?>"/>
            <label for="documento" class="form-label">Documento</label>
            <input class="form-control M-4" type="text" name="documento" value="<?php echo $_SESSION['documento']; ?>"/>
            <label for="nombre" class="form-label">Nombre</label>
            <input class="form-control M-4" type="text" name="nombre" value="<?php echo $_SESSION['nombre']; ?>"/>
            <label for="apellido" class="form-label">Apellido</label>
            <input class="form-control M-4" type="text" name="apellido" value="<?php echo $_SESSION['apellido']; ?>"/>
            <label for="correo" class="form-label">Correo</label>
            <input class="form-control M-4" type="text" name="correo" value="<?php echo $_SESSION['correo']; ?>"/>
            <label for="telefono" class="form-label">Telefono</label>
            <input class="form-control M-4" type="tel" name="telefono" value="<?php echo $_SESSION['telefono']; ?>"/>
            <label for="direccion" class="form-label">Dirección</label>
            <input class="form-control M-4" type="text" name="direccion" value="<?php echo $_SESSION['direccion']; ?>"/>
            <br>
            <input type="submit" class="form-control M-4" name="Actualizar" value="Actualizar" />
             
            <!--codigo php para editar el gerente -->

      <?php
      if (!empty($_POST["Actualizar"])) {
        $id_cliente = $_POST["id_cliente"];
        $id_tipo_documento = $_POST["id_tipo_documento"];
        $documento = $_POST["documento"];
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $correo = $_POST["correo"];
        $telefono = $_POST["telefono"];
        $direccion = $_POST["direccion"];
        try {
          $update = $conexion->query("UPDATE cliente SET id_cliente ='$id_cliente',id_tipo_documento ='$id_tipo_documento', documento ='$documento', nombre ='$nombre', apellido ='$apellido', correo ='$correo', telefono ='$telefono', direccion ='$correo'
                WHERE id_cliente ='$id_cliente' ");

          if ($update === false) {
            throw new Exception("no eres tu, somos nosotros :(");
          } else {
            $_SESSION['id_cliente'] = $id_cliente;
            $_SESSION['id_tipo_documento'] = $id_tipo_documento;
            $_SESSION['documento'] = $documento;
            $_SESSION['nombre'] = $nombre;
            $_SESSION['apellido'] = $apellido;
            $_SESSION['correo'] = $correo;
            $_SESSION['telefono'] = $telefono;
            $_SESSION['direccion'] = $direccion;
            header("Location: lista_de_clientes.php");
          }
        } catch (Exception $e) {
          echo '<script type="text/javascript">';
          echo 'alert("No se pudo editar la informacion: ' . $e->getMessage() . '");';
          echo '</script>';
        }
      }
      ?>
      <br>
      <input type="submit" class="form-control M-4" value="Cancelar" name="Cancelar">
      <!-- codigo para cancelar Edición-->
      <?php
      if (!empty($_POST["Cancelar"])) {
        header("Location: lista_de_clientes.php");
      }
      ?>
    </form>
    </main>
</body>
</html>