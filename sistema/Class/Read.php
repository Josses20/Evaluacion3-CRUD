<?php
require_once('Conexion.php');
require_once('Usuario.php');

$usuarios = Usuario::obtenerUsuarios();

if (!empty($usuarios)) {
    echo "<table>";
    foreach ($usuarios as $usuario) {
        echo "<tr>";
        echo "<td>" . $usuario['rut'] . "</td>";
        echo "<td>" . $usuario['nombres'] . "</td>";
        echo "<td>" . $usuario['apellido_paterno'] . "</td>";
        echo "<td>" . $usuario['apellido_materno'] . "</td>";
        echo "<td>" . $usuario['direccion'] . "</td>";
        echo "<td>" . $usuario['telefono'] . "</td>";
        echo "<td>";
        echo "<a href='EditarUsuario.php?rut=" . $usuario['rut'] . "'>Editar</a> ";
        echo "<a href='EliminarUsuario.php?rut=" . $usuario['rut'] . "'>Eliminar</a>";
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No se encontraron usuarios.";
}
?>