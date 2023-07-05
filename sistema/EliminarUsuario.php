<?php
require_once('Class/Conexion.php');
require_once('Class/Usuario.php');
if (isset($_GET['rut'])) {
    $rut = $_GET['rut'];
    $usuario = Usuario::obtenerUsuarioPorRut($rut);
    if ($usuario) {
        $usuarioObj = new Usuario($usuario['rut'], $usuario['nombres'], $usuario['apellido_paterno'], $usuario['apellido_materno'], $usuario['direccion'], $usuario['telefono'], $usuario['clave']);
        $usuarioObj->eliminarUsuario();
    } else {
        echo "El usuario no existe.";
    }
} else {
    echo "Parámetro 'rut' no encontrado.";
}
?>