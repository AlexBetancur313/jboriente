<?php
session_start();
function inicializarVariablesCliente($id_cliente, $id_tipo_documento, $documento, $nombre, $apellido, $correo, $telefono, $direccion) {
    $_SESSION['id_cliente'] = $id_cliente;
    $_SESSION['id_tipo_documento'] = $id_tipo_documento;
    $_SESSION['documento'] = $documento;
    $_SESSION['nombre'] = $nombre;
    $_SESSION['apellido'] = $apellido;
    $_SESSION['correo'] = $correo;
    $_SESSION['telefono'] = $telefono;
    $_SESSION['direccion'] = $direccion;
}
?>