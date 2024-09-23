<?php

// Incluir archivo de conexión a la base de datos
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $idProd = $_POST['idProd'];
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $existencia = $_POST['existencia'];

    // Verificar que los campos no estén vacíos
    if (!empty($idProd) && !empty($nombre) && !empty($precio) && !empty($existencia)) {
        try {
            // Preparar la sentencia SQL para insertar el producto
            $sql = "INSERT INTO productos (idProd, nombre, precio, existencia) 
                    VALUES (:idProd, :nombre, :precio, :existencia)";

            // Preparar la consulta con la conexión y bindear parámetros
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':idProd', $idProd);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':precio', $precio);
            $stmt->bindParam(':existencia', $existencia);

            // Ejecutar la consulta
            if ($stmt->execute()) {
                // Redireccionar al index.php después de la inserción
                header("Location: index.php");
                exit();
            } else {
                echo "Error al insertar el producto.";
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        echo "Por favor, complete todos los campos.";
    }
}
?>
