<?php
    include 'conexion.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $idProd = $_POST['idProd'];

        if (!empty($idProd))
        {
            $sql = "DELETE FROM productos WHERE idProd = :idProd";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':idProd', $idProd);

            if ($stmt->execute())
            {
                header("Location: index.php");
                exit();
            }
            else 
            {
                echo "Error al eliminar el producto.";
            }
        } 
        else
        {
            echo "Por favor, ingrese el ID del producto.";
        }
    }
?>
