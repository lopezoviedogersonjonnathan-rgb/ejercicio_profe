<?php

/**
 * ============================================================================
 * CONEXIÓN A LA BASE DE DATOS (Estilo Orientado a Objetos)
 * ============================================================================
 * * ANALOGÍA: Estamos configurando un "teléfono inteligente" ($conn) para llamar 
 * a la oficina de nuestra base de datos. Para que la llamada entre, necesitamos
 * marcar el número correcto, identificarnos y decir a qué extensión vamos.
 */

// 1. CREACIÓN DEL OBJETO DE CONEXIÓN
// 'new mysqli()' es una clase nativa de PHP. Al usar 'new', estamos creando una 
// instancia (un canal activo de comunicación). Recibe 5 parámetros obligatorios en nuestro caso:
//
//   - "localhost": El servidor. Significa "esta misma computadora".
//   - "root":      El usuario administrador por defecto que crea XAMPP.
//   - "":          La contraseña. Por defecto en XAMPP viene vacía, por eso son comillas solas.
//   - "crud_app":  El nombre exacto de la base de datos a la que nos queremos meter.
//   - 3307:        ¡El Puerto! Le indica a PHP que no use el puerto normal (3306), sino el 
//                  nuevo "parqueadero" que habilitamos en XAMPP.
$conn = new mysqli("localhost", "root", "", "crud_app", 3307);


// 2. CONTROL DE ERRORES (La Validación)
// '$conn->connect_error' es un atributo (una propiedad) de nuestra conexión.
// Si la llamada telefónica falló por culpa de una clave mala o un puerto cerrado, 
// este atributo guardará el mensaje del error. Si todo está bien, estará vacío (falso).
if ($conn->connect_error) {