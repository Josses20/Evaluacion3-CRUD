<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Usuario</title>
</head>
<body>
    <h1>Crear Usuario</h1>
    <form action="Class/Create.php" method="post"> 
        <label for="rut">RUT:</label>
        <input type="text" name="rut">
        <br>
        <label for="nombres">Nombres:</label>
        <input type="text" name="nombres">
        <br>
        <label for="apellido_paterno">Apellido Paterno:</label>
        <input type="text" name="apellido_paterno">
        <br>
        <label for="apellido_materno">Apellido Materno:</label>
        <input type="text" name="apellido_materno">
        <br>
        <label for="direccion">Dirección:</label>
        <input type="text" name="direccion">
        <br>
        <label for="telefono">Teléfono:</label>
        <input type="text" name="telefono">
        <br>
        <label for="clave">Clave:</label>
        <input type="password" name="clave">
        <br>
        <input type="submit" value="Crear">
    </form>
</body>
</html>