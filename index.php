<?php
// ─────────────────────────────────────────────────────────────
// <?php  →  Le dice al servidor "ey, desde aquí empieza código PHP".
// Sin esto el servidor trata todo como HTML y no ejecuta nada.

// $_SERVER["REQUEST_METHOD"]  →  Variable global del servidor que nos
// dice con qué método llegó la petición HTTP (GET, POST, PUT, etc.).
// === "POST"  →  Comparación estricta (compara tipo Y valor a la vez).
// Entramos solo si el form fue enviado por POST.
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // isset()  →  Función que pregunta: "¿esta variable existe y no es null?"
    // $_POST['accion']  →  Busca en el arreglo POST el campo llamado 'accion'.
    // Ese valor lo manda el botón que tenga name="accion" en el HTML.
    if (isset($_POST['accion'])) {

        // Comparamos qué botón presionó el usuario.
        // Si el botón tenía value="guardar", entramos aquí.
        if ($_POST['accion'] === 'guardar') {
            // echo  →  Imprime/muestra texto en el HTML. Como un console.log pero en PHP.
            echo "¡Procesando la orden de Guardar datos, mi bro!";

        // Si el botón tenía value="eliminar", caemos aquí.
        } elseif ($_POST['accion'] === 'eliminar') {
            echo "¡Procesando la orden de Eliminando datos!";

        // Si el botón tenía value="editar", caemos aquí.
        } elseif ($_POST['accion'] === 'editar') {
            echo "¡Procesando la orden de Editar datos!";
        }
    }
}
?>  
<!--?→  Cierra el bloque PHP. Todo lo que sigue después es HTML puro. --> 

<!-- ─────────────────────────────────────────────────────────────
     DOCTYPE  →  Le dice al navegador qué versión de HTML usamos.
     En HTML5 no lleva número, solo "DOCTYPE html". Sin esto el
     navegador entra en "modo quirks" y renderiza de forma rara.
───────────────────────────────────────────────────────────────── -->
<!DOCTYPE html>

<!-- <html lang="es">  →  Etiqueta raíz. Todo el documento vive adentro.
     lang="es"  →  Le avisa a lectores de pantalla y buscadores que
     el contenido está en español. Buena práctica de SEO y accesibilidad. -->
<html lang="es">

<head>
    <!-- HEAD  →  Zona de configuración. El usuario no lo ve directamente
         pero define cómo se comporta y se ve la página. -->

    <!-- charset="UTF-8"  →  Codificación de caracteres.
         UTF-8 soporta tildes, ñ, emojis, etc.
         Sin esto esos caracteres aparecen como símbolos raros tipo "GuardarÂ". -->
    <meta charset="UTF-8">

    <!-- X-UA-Compatible  →  Le dice a Internet Explorer que use su motor
         más moderno (Edge). Ya casi no se usa pero se deja por compatibilidad. -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- viewport  →  Hace la página responsive (adaptable a móvil).
         width=device-width  →  El ancho se ajusta al ancho real del dispositivo.
         initial-scale=1.0   →  Zoom inicial al 100%, sin zoom automático. -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- <title>  →  El texto que aparece en la pestaña del navegador
         y en los resultados de Google. Importante para SEO. -->
    <title>Ejercicio Profesor - Sistema CRUD</title>

    <!-- <link rel="stylesheet">  →  Conecta un archivo CSS externo.
         rel="stylesheet"  →  Le dice al navegador qué tipo de archivo es.
         href="style.css"  →  Ruta del archivo CSS. Debe estar en la misma
         carpeta que este PHP o ajustar la ruta si está en otra ubicación. -->
    <link rel="stylesheet" href="style.css">
</head>

<body>
<!-- BODY  →  Todo lo que el usuario ve y con lo que interactúa va aquí. -->

<!-- <div class="container">  →  Contenedor genérico sin semántica propia.
     Agrupa elementos para aplicarles estilos desde el CSS.
     class="container"  →  Clase CSS para centrar, darle ancho máximo, padding, etc. -->
<div class="container">

    <!-- <h2>  →  Encabezado de nivel 2. Hay del h1 al h6 (h1 es el más importante).
         Se usa para títulos de sección. Afecta SEO y accesibilidad. -->
    <h2>Formulario de Usuarios</h2>

    <!-- <form>  →  Agrupa todos los campos del formulario.
         method="POST"    →  Los datos viajan ocultos en el cuerpo de la petición HTTP.
                             Más seguro que GET que los manda en la URL visible.
         action="insertar.php"  →  A qué archivo PHP se envían los datos al hacer submit. -->
    <form method="POST" action="insertar.php">

        <!-- <label for="name">  →  Etiqueta descriptiva de un campo.
             for="name"  →  Conecta este label con el input que tenga id="name".
             Al clickear el label, el foco va directo al input. Mejora accesibilidad. -->
        <label for="name">ID Nombre</label>

        <!-- <input>  →  Campo de entrada. Etiqueta auto-cerrada (no necesita </input>).
             type="text"   →  Acepta cualquier texto sin validación especial.
             id="name"     →  Identificador único en el DOM. Lo vincula con el label.
             name="name"   →  Con este nombre llega el dato al PHP: $_POST['name'].
                              ¡El name es lo que importa en PHP, no el id!
             placeholder   →  Texto gris de guía dentro del campo. Desaparece al escribir. -->
        <input type="text" id="name" name="name" placeholder="Enter your name">

        <label for="email">Correo Electrónico</label>

        <!-- type="email"  →  El navegador valida que tenga formato correo (algo@algo.com).
             Si no cumple, bloquea el envío antes de llegar al PHP. Validación del lado cliente.
             required      →  Campo obligatorio. El form no se envía si está vacío.
                              Siempre reforzar esta validación también en el PHP. -->
        <input type="email" id="email" name="email" placeholder="Enter your email" required>

        <label for="password">Contraseña</label>

        <!-- type="password"  →  Oculta los caracteres con puntos mientras se escribe.
             Solo los oculta visualmente, NO los encripta.
             La encriptación real (bcrypt, etc.) se hace en el servidor con PHP. -->
        <input type="password" id="password" name="password" placeholder="Enter your password" required>

        <!-- <p class="accion-label">  →  Párrafo usado como separador visual de sección.
             No es un label semántico real, solo texto con estilos para agrupar los botones. -->
        <p class="accion-label">Acciones Disponibles</p>

        <!-- <button type="submit">  →  Al clickearlo envía el formulario al action definido.
             name="accion"       →  El nombre con que llega al PHP: $_POST['accion'].
             value="guardar"     →  El valor que tendrá $_POST['accion'] si se clickea ESTE botón.
             Así un solo form puede manejar múltiples acciones según qué botón se presione. -->
        <button type="submit" name="accion" value="guardar">Agregar clientes</button>

        <!-- Botón de editar. Al clickearlo $_POST['accion'] valdrá "editar".
             class="btn-editar"  →  Clase CSS para darle estilos propios (color azul, etc.). -->
        <button type="submit" name="accion" value="editar" class="btn-editar">Editar</button>

        <!-- Botón de eliminar. Al clickearlo $_POST['accion'] valdrá "eliminar".
             class="btn-eliminar"  →  Clase CSS para estilos distintos (color rojo, etc.). -->
        <button type="submit" name="accion" value="eliminar" class="btn-eliminar">Eliminar</button>

    </form>

    <!-- <table>  →  Elemento para mostrar datos en filas y columnas.
         Ideal para listar registros traídos de una base de datos (la R del CRUD: Read). -->
    <table>

        <!-- <thead>  →  Agrupa la fila de encabezados. Semánticamente le dice al navegador
             "estas celdas son títulos de columna", no datos. Mejora accesibilidad y estilos. -->
        <thead>
            <!-- <tr>  →  Table Row. Una fila de la tabla. -->
            <tr>
                <!-- <th>  →  Table Header. Celda de encabezado.
                     Se muestra en negrita por defecto y define qué es cada columna. -->
                <th>ID</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Acción</th>
            </tr>
        </thead>

        <!-- <tbody>  →  Agrupa las filas de datos reales.
             Aquí iría un bucle PHP haciendo SELECT a la BD para pintar cada registro
             con sus respectivos <tr><td>dato</td></tr> -->
        <tbody>
            <!-- Aquí van los registros dinámicos del SELECT a la BD -->
        </tbody>

    </table>

</div>
<!-- Cierre del div.container  →  Todo cierra en orden inverso al que abrió. -->

</body>
</html>




       
