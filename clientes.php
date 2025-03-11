<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $dni = $_POST['dni'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];

    $sql = "INSERT INTO clientes (nombre, dni, telefono, correo) VALUES ('$nombre', '$dni', '$telefono', '$correo')";
    
    if ($conexion->query($sql) === TRUE) {
        echo "Cliente registrado correctamente.";
    } else {
        echo "Error: " . $conexion->error;
    }
}
?>

<form method="post">
    <input type="text" name="nombre" placeholder="Nombre completo" required>
    <input type="text" name="dni" placeholder="DNI" required>
    <input type="text" name="telefono" placeholder="Teléfono">
    <input type="email" name="correo" placeholder="Correo electrónico" required>
    <button type="submit">Registrar Cliente</button>
</form>