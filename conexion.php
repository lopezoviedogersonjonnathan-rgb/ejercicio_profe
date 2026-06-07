<?php
// 1. Definimos las credenciales de la base de datos (Las variables)
$host = "127.0.0.1";     // La dirección de tu computadora local (localhost)
$port = "3307";          // ¡CLAVE! El parqueadero que cambiamos en XAMPP para que funcione
$user = "root";          // El usuario administrador por defecto de XAMPP
$password = "";          // Por defecto en XAMPP viene sin contraseña, se deja vacío ""
$dbname = "crud_app";    // El nombre exacto de la base de datos que acabas de guardar

// 2. Intentamos hacer la conexión usando la extensión mysqli
$conexion = mysqli_connect($host, $user, $password, $dbname, $port);

// 3. Verificamos si la llamada telefónica falló o tuvo éxito
if (!$conexion) {
    die("Error de conexión a la base de datos: " . mysqli_connect_error());
} else {
    // Esto es solo para probar en el navegador; luego lo borraremos
    echo "¡Conexión exitosa al puerto 3307, maestro!"; 
}
?>