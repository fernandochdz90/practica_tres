<?php
    $host = 'localhost';  // Servidor de base de datos
    $dbname = 'bd_inventario';  // Nombre de la base de datos
    $username = 'root';  // Nombre de usuario (para XAMPP por defecto es 'root')
    $password = 'master90';  // Contraseña vacía para XAMPP (si no la has cambiado)

    try
    {
        $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
        // Establecer el modo de error para las excepciones
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e)
    {
        echo "Error de conexión: " . $e->getMessage();
    }
?>
