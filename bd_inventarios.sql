-- Crea la base de datos bd_inventario
CREATE DATABASE IF NOT EXISTS bd_inventario;

-- Hacemos uso de la base de datos
USE bd_inventario;

-- Creamos la tabla productos
CREATE TABLE IF NOT EXISTS productos (
    idProd INT(11) AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    precio DECIMAL(10, 2) NOT NULL,
    existencia INT(11) NOT NULL
);
