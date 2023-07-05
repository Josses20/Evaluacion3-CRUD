<?php
require_once 'Conexion.php';
require_once 'Usuario.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["rut"]) && isset($_POST["nombres"]) && isset($_POST["apellido_paterno"]) && isset($_POST["apellido_materno"]) && isset($_POST["direccion"]) && isset($_POST["telefono"]) && isset($_POST["clave"])) {
        $rut = $_POST["rut"];
        $nombres = $_POST["nombres"];
        $apellidoPaterno = $_POST["apellido_paterno"];
        $apellidoMaterno = $_POST["apellido_materno"];
        $direccion = $_POST["direccion"];
        $telefono = $_POST["telefono"];
        $clave = $_POST["clave"];

        $usuario = new Usuario($rut, $nombres, $apellidoPaterno, $apellidoMaterno, $direccion, $telefono, $clave);
        $usuario->crearUsuario();
    } else {
        echo "Faltan los datos requeridos.";
    }
} else {
    echo "Método de solicitud no válido.";
}
?>