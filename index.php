<?php
// Incluir archivo de conexión
include('conexion.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <title>Inventario de Productos</title>
</head>
<body>
    <h1>Inventario de Productos</h1>

    <!-- Formulario para agregar productos -->
    <form action="insertar.php" method="post">
        <label for="idProd">ID Producto:</label>
        <input type="number" id="idProd" name="idProd" required>

        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>

        <label for="precio">Precio:</label>
        <input type="number" id="precio" name="precio" step="0.01" required>

        <label for="existencia">Existencia:</label>
        <input type="number" id="existencia" name="existencia" required>

        <input type="submit" value="Registrar">
    </form>

    <!-- Tabla de productos registrados -->
    <table>
        <tr>
            <th>ID Producto</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Existencia</th>
            <th></th>
        </tr>
        <?php
        // Consulta para obtener todos los productos
        $stmt = $conn->query('SELECT idProd, nombre, precio, existencia FROM productos');

        // Verificar si hay productos en la tabla
        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>
                    <td>{$row['idProd']}</td>
                    <td>{$row['nombre']}</td>
                    <td>{$row['precio']}</td>
                    <td>{$row['existencia']}</td>
                    <td><a class='delete-link' href='eliminar.php?id={$row['idProd']}'>Eliminar</a></td>
                </tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No hay productos registrados.</td></tr>";
        }
        ?>
    </table>
</body>
</html>
