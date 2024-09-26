<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Contacto</title>
    <link rel="stylesheet" href="/PruebaDP/assets/css/styles.css">
</head>
<body>
    <div class="container">
        <h2>Editar contacto</h2>
        <form action="/PruebaDP/public/index.php?action=update&id=<?= $contact['id'] ?>" method="POST">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="<?= htmlspecialchars($contact['nombre']) ?>" required>

            <label for="domicilio">Domicilio:</label>
            <input type="text" id="domicilio" name="domicilio" value="<?= htmlspecialchars($contact['domicilio']) ?>" required>

            <label for="numero">Número:</label>
            <input type="text" id="numero" name="numero" value="<?= htmlspecialchars($contact['numero']) ?>" required>

            <label for="colonia">Colonia:</label>
            <input type="text" id="colonia" name="colonia" value="<?= htmlspecialchars($contact['colonia']) ?>" required>

            <label for="codigo_postal">Código Postal:</label>
            <input type="text" id="codigo_postal" name="codigo_postal" value="<?= htmlspecialchars($contact['codigo_postal']) ?>" required>

            <label for="ciudad">Ciudad:</label>
            <input type="text" id="ciudad" name="ciudad" value="<?= htmlspecialchars($contact['ciudad']) ?>" required>

            <label for="estado">Estado:</label>
            <input type="text" id="estado" name="estado" value="<?= htmlspecialchars($contact['estado']) ?>" required>

            <label for="telefono">Teléfono:</label>
            <input type="text" id="telefono" name="telefono" value="<?= htmlspecialchars($contact['telefono']) ?>" required>

            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" value="<?= htmlspecialchars($contact['email']) ?>" required>

            <label for="latitud">Latitud:</label>
            <input type="text" id="latitud" name="latitud" value="<?= htmlspecialchars($contact['latitud']) ?>" required>

            <label for="longitud">Longitud:</label>
            <input type="text" id="longitud" name="longitud" value="<?= htmlspecialchars($contact['longitud']) ?>" required>

            <button type="submit">Guardar cambios</button>
        </form>
    </div>
</body>
</html>
