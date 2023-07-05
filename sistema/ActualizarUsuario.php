<?php
require_once('Class/Conexion.php');
require_once('Class/Usuario.php');

$rut = $_GET['rut'];

$usuario = Usuario::obtenerUsuarioPorRut($rut);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['rut'])) {
        $rut = $_POST['rut'];
        $nombres = $_POST['nombres'];
        $apellidoPaterno = $_POST['apellido_paterno'];
        $apellidoMaterno = $_POST['apellido_materno'];
        $direccion = $_POST['direccion'];
        $telefono = $_POST['telefono'];
        $clave = $_POST['clave'];

        $usuario = new Usuario($rut, $nombres, $apellidoPaterno, $apellidoMaterno, $direccion, $telefono, $clave);

        if ($usuario->actualizarUsuario()) {
            echo "Usuario actualizado correctamente.";
        }
    }
} else {
    if (isset($_GET['rut'])) {
        $rut = $_GET['rut'];
        $usuario = Usuario::obtenerUsuarioPorRut($rut);

        if ($usuario) {
            ?>
            <h1>Editar Usuario</h1>
            <form action="ActualizarUsuario.php" method="POST">
                <input type="hidden" name="rut" value="<?php echo $rut; ?>">
                <label for="nombres">Nombres:</label>
                <input type="text" name="nombres" value="<?php echo $usuario['nombres']; ?>">
                <br>
                <label for="apellido_paterno">Apellido Paterno:</label>
                <input type="text" name="apellido_paterno" value="<?php echo $usuario['apellido_paterno']; ?>">
                <br>
                <label for="apellido_materno">Apellido Materno:</label>
                <input type="text" name="apellido_materno" value="<?php echo $usuario['apellido_materno']; ?>">
                <br>
                <label for="direccion">Dirección:</label>
                <input type="text" name="direccion" value="<?php echo $usuario['direccion']; ?>">
                <br>
                <label for="telefono">Teléfono:</label>
                <input type="text" name="telefono" value="<?php echo $usuario['telefono']; ?>">
                <br>
                <label for="clave">Clave:</label>
                <input type="password" name="clave" value="<?php echo $usuario['clave']; ?>">
                <br>
                <button type="submit">Actualizar</button>
            </form>
            <?php
        } else {
            echo "Usuario no encontrado.";
        }
    }
}
?>