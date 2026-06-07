<?php

/**
 * ============================================================================
 * SCRIPT PARA INSERTAR DATOS (CREATE EN EL CRUD)
 * ============================================================================
 */

// 1. TRAER EL TUBO DE CONEXIÓN
// 'include' funciona como un "copiar y pegar" automático. Trae todo el código 
// de 'conexion.php' (incluyendo la variable $conn) para poder usar el puente aquí.
include "conexion.php";


// 2. DETECTAR SI EL USUARIO LE DIO CLIC AL BOTÓN "AGREGAR CLIENTES"
// '$_SERVER["REQUEST_METHOD"]' revisa cómo se enviaron los datos. 
// Cuando un formulario web envía información confidencial, usa el método "POST".
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // 3. CAPTURAR LO QUE EL USUARIO ESCRIBIÓ EN LOS INPUTS
    // '$_POST["..."]' son como manos que atrapan el texto de las cajas del formulario.
    // OJO: Lo que va entre comillas debe coincidir con el atributo 'name' de tus inputs de HTML.
    $nombre_usuario = $_POST["nombre"];     
    $correo_usuario = $_POST["correo"];     
    $clave_usuario  = $_POST["contrasena"]; 


    // 4. PREPARAR LA ORDEN EN IDIOMA SQL (La Sentencia)
    // Le decimos a MySQL: "Inserta en la tabla 'users' en las columnas (name, email, password) 
    // los valores que guardamos en las variables de PHP".
    // El 'id' no se pone porque se suma solo gracias al AUTO_INCREMENT que activaste en phpMyAdmin.
    $sql = "INSERT INTO users (name, email, password) VALUES ('$nombre_usuario', '$correo_usuario', '$clave_usuario')";


    // 5. EJECUTAR LA ORDEN Y VERIFICAR SI FUNCIONÓ
    // Usamos el objeto '$conn' (el teléfono) y le disparamos la orden con '->query($sql)'.
    if ($conn->query($sql) === TRUE) {
        
        // Si todo sale bien, mandamos una alerta en pantalla y lo devolvemos al formulario
        echo "<script>
                alert('¡Cliente agregado con éxito a la base de datos, mi bro!');
                window.location.href = 'index.php';
              </script>";
              
    } else {
        // Si hay un error (por ejemplo, una letra mal escrita en la tabla), nos avisa aquí
        echo "Error al registrar: " . $conn->error;
    }

}

?>