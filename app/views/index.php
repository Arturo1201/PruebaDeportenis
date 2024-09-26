<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda de Contactos</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>
    <div class="container">
        <h2>Agenda</h2>
        <div class="header-buttons">
        <a href="/PruebaDP/public/index.php?action=new" class="btn-new-contact">Nuevo Contacto</a>
        </div>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Domicilio</th>
                    <th>Número</th>
                    <th>Colonia</th>
                    <th>Ciudad</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($contacts as $i => $contact): ?>
                    <tr>
                        <td><?php echo $i + 1 + ($page - 1) * $limit; ?></td>
                        <td><?php echo $contact['nombre']; ?></td>
                        <td><?php echo $contact['domicilio']; ?></td>
                        <td><?php echo $contact['numero']; ?></td>
                        <td><?php echo $contact['colonia']; ?></td>
                        <td><?php echo $contact['ciudad']; ?></td>
                        <td>
                            <a href="/PruebaDP/public/index.php?action=edit&id=<?= $contact['id'] ?>" class="btn-edit">Editar</a>
                            <a href="/PruebaDP/public/index.php?action=delete&id=<?= $contact['id'] ?>" class="btn-delete">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="pagination">
            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <a href="?page=<?php echo $i; ?>" class="btn <?php echo ($i == $page) ? 'active' : ''; ?>">
                    <?php echo $i; ?>
                </a>
            <?php endfor; ?>
        </div>
    </div>
</body>
</html>
