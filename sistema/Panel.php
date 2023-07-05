<?php
session_start();

if (!isset($_SESSION['rut'])) {
    header('Location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="Css/style.css" rel="stylesheet" type="text/css">
    <title>Panel</title>
</head>

<body>
    <h1 class="cuerpo">Bienvenido, <?php echo $_SESSION['rut']; ?>!</h1>
    <br>
</body>

</html>

<?php
require_once('Class/Conexion.php');
require_once('Class/Usuario.php');

$usuarios = Usuario::obtenerUsuarios();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="Css/style.css" rel="stylesheet" type="text/css">
    <title>Listar Usuarios</title>
</head>
<body>
    <div class="cuerpo">
    <h1>Lista de los Usuarios en el sistema</h1>
    <br>
    <button onclick="window.location.href='CrearUsuario.php'" class="btn-Crear">Crear Usuario</button>
    <br>
    <br>
    <table>
        <tr>
            <th>RUT</th>
            <th>Nombres</th>
            <th>Apellido Paterno</th>
            <th>Apellido Materno</th>
            <th>Dirección</th>
            <th>Teléfono</th>
            <th></th>
        </tr>
        <?php foreach ($usuarios as $usuario) { ?>
            <tr>
                <td><?php echo $usuario['rut']; ?></td>
                <td><?php echo $usuario['nombres']; ?></td>
                <td><?php echo $usuario['apellido_paterno']; ?></td>
                <td><?php echo $usuario['apellido_materno']; ?></td>
                <td><?php echo $usuario['direccion']; ?></td>
                <td><?php echo $usuario['telefono']; ?></td>
                <td>
                <a href="ActualizarUsuario.php?rut=<?php echo $usuario['rut']; ?>">
                <button class="btn-Editar">Editar</button>
                </a>
                <form action="EliminarUsuario.php" method="GET" style="display: inline;">
                   <input type="hidden" name="rut" value="<?php echo $usuario['rut']; ?>">
                   <button type="submit" class="btn-Eliminar">Eliminar</button>
                </form>
                </td>
            </tr>
        <?php } ?>
    </table>
    </div>
</body>

</html>