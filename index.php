<?php
if ($_POST) {
    if ($_POST['accion'] === 'guardar') {
        echo "Guardando datos...";
        // Aquí iría el código para insertar en la base de datos
    } elseif ($_POST['accion'] === 'eliminar') {
        echo "Eliminando datos...";
        // Aquí iría el código para borrar de la base de datos
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio profesor</title>
    <link rel="stylesheet" href="style.css">
    </head>
<body>
<div class="container">
    <h2>Formulario</h2>
        <form method="POST" action="insertar.php">
        <label for="name">ID Nombre</label>
            <input type="text" id="name" name="name" placeholder="Enter your name">
            <label for="email">Correo</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>
            <label for="password">Contraseña</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>
            <p class="accion-label">Acción</p>
            <button type="submit" name="accion" value="guardar">Agregar clientes</button>
            <button type="submit" name="accion" value="eliminar" class="btn-eliminar">Eliminar</button>
            </form>
        <table>
        <tr>
            <th>ID</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Acción</th>
                </tr>
            </table>
        </div>
    </body>
</html>




       
