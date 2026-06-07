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
<!-- <!DOCTYPE html>: No es una etiqueta HTML, es una declaración.
Le dice al navegador: "Ey, este archivo usa HTML5, la versión moderna".
Sin esto, el navegador entra en "modo compatibilidad antiguo" y tu página puede verse rara. -->

<html lang="es">
<!-- <html>: Es la etiqueta raíz, la mamá de todas las demás.
Todo el contenido de tu página vive dentro de ella.
Atributo lang="es": Le dice al navegador (y a Google) que el idioma es español.
Esto ayuda con la accesibilidad y el SEO. -->

<head>
<!-- <head>: Es la "mochila invisible" de la página.
Contiene información técnica que el navegador necesita pero el usuario NO ve directamente.
Aquí van los metadatos, el título, los estilos CSS, etc. -->

    <!-- Metadatos básicos -->
    <meta charset="UTF-8">
    <!-- <meta charset="UTF-8">: Define la codificación de caracteres.
    UTF-8 es como un diccionario universal que incluye acentos (á,é,í,ó,ú), la ñ,
    emojis y caracteres de otros idiomas.
    Sin esto, tus tildes se verían como símbolos raros tipo: â€™ -->

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <meta http-equiv="X-UA-Compatible">: Instrucción especial para Internet Explorer.
    Atributo content="IE=edge": Le dice al viejo IE que use su motor más moderno (Edge).
    Hoy en día casi nadie usa IE, pero se pone por buena práctica
    para que tu página no se rompa en computadores muy viejos. -->

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <meta name="viewport">: La clave para que tu página sea RESPONSIVE.
    Atributo content="width=device-width": El ancho de la página se adapta al ancho del dispositivo.
    Atributo initial-scale=1.0: El zoom inicial es 100%, sin acercar ni alejar.
    Sin esto, en celular tu página se vería miniatura como si fuera escritorio. -->

    <title>Ejercicio profesor</title>
    <!-- <title>: Define el texto que aparece en la pestaña del navegador.
    También es lo que Google muestra como título en los resultados de búsqueda.
    Es el único hijo de <head> que el usuario puede "ver" (en la pestaña). -->
      <link rel="stylesheet" href="style.css">
      <!-- <link rel="stylesheet" href="style.css">: Enlace a un archivo de estilos CSS externo.
      Atributo rel="stylesheet": Indica que este enlace es una hoja de estilos. 
      Atributo href="style.css": La ruta al archivo CSS que contiene las reglas de estilo.
      Esto permite separar la apariencia (CSS) de la estructura (HTML), lo que es una buena práctica. --> 
</head>
<!-- </head>: Cierra la mochila invisible. A partir de aquí empieza lo visual. -->

<body>
<!-- <body>: El cuerpo de la página. Todo lo que el usuario VE vive aquí.
Textos, imágenes, formularios, botones... todo va dentro de <body>. -->

    <div class="container">
    <!-- <div>: Es una caja genérica sin significado semántico propio.
    Sirve para agrupar y organizar otros elementos.
    Atributo class="container": Le asigna una clase CSS llamada "container".
    Desde CSS puedes hacer .container { } para darle estilos a esta caja. -->

        <h2>Formulario</h2>
        <!-- <h2>: Es un encabezado de nivel 2 (hay del h1 al h6).
        h1 es el título más importante de la página (solo debe haber uno).
        h2 es un subtítulo, más pequeño que h1 pero más grande que h3.
        Ayuda a organizar la jerarquía visual y es importante para el SEO. -->

        <!-- Formulario principal -->
        <form method="POST" action="index.php">
        <!-- <form>: Define el contenedor del formulario. Agrupa todos los campos.
        Sin <form>, los inputs no tienen a dónde enviar sus datos.

        Atributo method="POST": El método de envío HTTP.
        Como una carta en sobre cerrado, los datos viajan ocultos en el
        cuerpo de la petición y NO aparecen en la URL del navegador.
        Ideal para contraseñas y datos sensibles.
        (El otro método es GET, que sí muestra los datos en la URL: ?nombre=Juan)

        Atributo action="index.php": El destino del formulario al enviarse.
        Le dice: "Cuando presionen un botón submit, manda los datos a index.php".
        Como estamos en el mismo archivo, el PHP del inicio los procesa. -->

            <!-- Campo de nombre -->
             <label for="name">ID Nombre</label>
            <!-- <label>: Etiqueta de texto descriptiva para un campo del formulario.
            Le dice al usuario qué debe escribir en ese input.
            Atributo for="name": Conecta el label con el input que tenga id="name".
            Al hacer clic en el texto "Nombre", el cursor salta directo al input. -->
            <input type="text" id="name" name="Name" placeholder="Enter your name">
            <!-- <input>: Campo de entrada de datos. Es una etiqueta vacía (no tiene cierre </input>).
            
            Atributo type="text": Acepta cualquier texto libre (letras, números, símbolos).
            
            Atributo name="Name": El identificador del campo al enviarse.
            En PHP lo recibes así: $_POST['Name']
            ¡Ojo! Es sensible a mayúsculas: 'Name' ≠ 'name'.
            
            Atributo placeholder="Enter your name": Texto fantasma que aparece dentro
            del campo cuando está vacío. Desaparece al escribir.
            Sirve como guía visual para el usuario.
            
            Nota: No tiene "required", así que este campo es opcional. -->

            <!-- Campo de correo -->
            <label for="email">Correo</label>
            <!-- Conectado con el input de email mediante for="email" e id="email". -->
            <input type="email" id="email" name="email" placeholder="Enter your email" required>
            <!-- <input type="email">: Campo especializado para correos electrónicos.
            
            Atributo type="email": El navegador valida automáticamente que tenga
            formato de email (que incluya @ y un dominio). Si no, muestra error.
            En móvil, abre un teclado especial con el símbolo @ visible.
            
            Atributo name="email": En PHP: $_POST['email']
            
            Atributo placeholder="Enter your email": Texto guía dentro del campo.
            
            Atributo required: No tiene valor, solo su presencia es suficiente.
            Hace el campo OBLIGATORIO. Si el usuario intenta enviar sin llenarlo,
            el navegador bloquea el envío y muestra un mensaje de error. -->

            <!-- Campo de contraseña -->
            <!-- Campo de contraseña -->
            <label for="password">Contraseña</label>
            <!-- Conectado con el input de password mediante for="password" e id="password". -->
            <input type="password" id="password" name="password" placeholder="Enter your password" required>
            <!-- <input type="password">: Campo especializado para contraseñas.
            
            Atributo type="password": Oculta automáticamente los caracteres escritos
            mostrando puntos o asteriscos (●●●●●). Protege de miradas indiscretas.
            
            Atributo name="password": En PHP: $_POST['password']
            
            Atributo placeholder="Enter your password": Texto guía dentro del campo.
            
            Atributo required: Campo obligatorio. No se puede enviar el formulario vacío. -->

            <p class="accion-label">Acción</p>

            <!--margin-bottom: 6px; → controla el espacio debajo, antes de los botones.-->
            
            <!-- Botón enviar -->
            <button type="submit" name="accion" value="guardar">Agregar clientes</button>
            <!-- <button>: Crea un botón clickeable. A diferencia de <input type="button">,
            puede contener HTML dentro (iconos, texto formateado, etc.).
            
            Atributo type="submit": Al hacer clic, dispara el envío del formulario
            hacia la URL definida en el action del <form>.
            
            Atributo name="accion": El nombre que llega a PHP.
            
            Atributo value="guardar": El valor que viaja junto al name.
            En PHP llega como: $_POST['accion'] = 'guardar'
            Así el PHP del inicio sabe que debe ejecutar el bloque de "guardar". -->

            <!-- Botón eliminar -->
            <button type="submit" name="accion" value="eliminar" class="btn-eliminar">Eliminar</button>
            <!-- Mismo comportamiento que el botón anterior, pero con value="eliminar".
            
            Atributo value="eliminar": En PHP llega como: $_POST['accion'] = 'eliminar'
            Así el PHP ejecuta el bloque elseif y corre el código de eliminación.
            
            Tener dos botones submit con el mismo name pero diferente value es
            una técnica clásica para saber cuál botón presionó el usuario. -->

        </form>
        <!-- </form>: Cierra el formulario. Todo input dentro de estas etiquetas
        será enviado al hacer submit. Lo que esté fuera NO se envía. -->
        <table>
        <!-- <table>: Define el inicio de una tabla HTML.
        Organiza datos en filas y columnas, como una hoja de Excel.
        Todo el contenido de la tabla vive dentro de esta etiqueta. -->
<tr>
            <!-- <tr> (table row): Define una FILA de la tabla.
            Cada <tr> es una fila horizontal.
            Esta primera fila será el encabezado de la tabla. -->

                <th>ID</th>
                <!-- <th> (table header): Celda de ENCABEZADO.
                A diferencia de <td>, pone el texto en negrita y centrado automáticamente.
                Le dice al usuario qué tipo de dato hay en esa columna. -->

                <th>Nombre</th>
                <!-- Segunda columna: encabezado para los nombres -->

                <th>Correo</th>
                <!-- Tercera columna: encabezado para los correos -->

                <th>Acción</th>
                <!-- Cuarta columna: encabezado para los botones de acción
                (aquí irían botones de editar/eliminar por cada registro) -->

            </tr>
            <!-- </tr>: Cierra la fila de encabezados -->

        </table>
        <!-- </table>: Cierra la tabla -->

    </div>
    <!-- </div>: Cierra la caja contenedora. -->

</body>
<!-- </body>: Cierra el cuerpo visual de la página. -->

</html>
<!-- </html>: Cierra la etiqueta raíz. Debe ser siempre la última línea del archivo.
Todo el documento HTML vive entre <html> y </html>. -->




       
