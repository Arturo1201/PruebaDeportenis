<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Contacto</title>
    <link rel="stylesheet" href="/PruebaDP/assets/css/styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/PruebaDP/assets/js/script.js"></script>
</head>
<body>
    <div class="container">
        <form action="/PruebaDP/public/index.php?action=store" method="post" id="contactForm">
            <label>Nombre:</label>
            <input type="text" name="nombre" required>
            
            <label>Domicilio:</label>
            <input type="text" name="domicilio" required>

            <label>Número:</label>
            <input type="text" name="numero" required>

            <label>Colonia:</label>
            <input type="text" name="colonia" required>

            <label>Código Postal:</label>
            <input type="text" name="codigo_postal">

            <label>Ciudad:</label>
            <input type="text" name="ciudad" required>

            <label>Estado:</label>
            <input type="text" name="estado" required>

            <label>Teléfono:</label>
            <input type="text" name="telefono" required>

            <label>Correo Electrónico:</label>
            <input type="email" name="email" required>

            <button type="button" id="loadGps">Cargar Datos GPS</button>

            <label>Latitud:</label>
            <input type="text" name="latitud" readonly>

            <label>Longitud:</label>
            <input type="text" name="longitud" readonly>

            <button type="submit">Guardar</button>
        </form>
    </div>
</body>
</html>
