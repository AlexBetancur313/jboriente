<?php
session_start();
if (!empty($_POST["Login"])) {
  if (empty($_POST["username"]) and empty($_POST["contraseña"])) {
    echo ("Los campos estan vacios");
  } else {
    $username = $_POST["username"];
    $contraseña = $_POST["contraseña"];
    $sql = $conexion->query("SELECT * FROM usuario WHERE username='$username' AND contraseña ='$contraseña'");
    //datos hace de fila/row
    if ($datos = $sql->fetch_object()) {
      session_start();
      $_SESSION['id_usuario'] = $datos->id_usuario;
      $_SESSION['username'] = $datos->username;
      $_SESSION['contraseña'] = $datos->contraseña;
      $_SESSION['nombres'] = $datos->nombres;
      $_SESSION['apellidos'] = $datos->apellidos;
      $_SESSION['email'] = $datos->email; 
      $_SESSION['telefono'] = $datos->telefono;
      $_SESSION['id_metodo_pago'] = $datos->id_metodo_pago;
      $_SESSION['numero_cuenta'] = $datos->numero_cuenta;
      
      header('Location:index.html');
    } else {
      echo '<script type="text/javascript">';
      echo 'alert("hay un error al enviar la info");';
      echo '</script>';
    }
  }
}