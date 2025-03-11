<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $matricula = $_POST['matricula'];
    $precio = $_POST['precio'];

    $sql = "INSERT INTO autos (marca, modelo, matricula, precio) VALUES ('$marca', '$modelo', '$matricula', '$precio')";
    
    if ($conexion->query($sql) === TRUE) {
        echo "Auto registrado correctamente.";
    } else {
        echo "Error: " . $conexion->error;
    }
}
?>

<form method="post">
    <input type="text" name="marca" placeholder="Marca" required>
    <input type="text" name="modelo" placeholder="Modelo" required>
    <input type="text" name="matricula" placeholder="Matrícula" required>
    <input type="number" name="precio" placeholder="Precio" required>
    <button type="submit">Registrar Auto</button>
</form>