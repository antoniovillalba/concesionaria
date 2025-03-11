<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cliente_id = $_POST['cliente_id'];
    $auto_id = $_POST['auto_id'];
    $fecha = $_POST['fecha'];

    $sql = "INSERT INTO compras (cliente_id, auto_id, fecha) VALUES ('$cliente_id', '$auto_id', '$fecha')";
    
    if ($conexion->query($sql) === TRUE) {
        echo "Compra registrada correctamente.";
    } else {
        echo "Error: " . $conexion->error;
    }
}
?>

<form method="post">
    <select name="cliente_id">
        <?php
        $resultado = $conexion->query("SELECT id, nombre FROM clientes");
        while ($fila = $resultado->fetch_assoc()) {
            echo "<option value='{$fila['id']}'>{$fila['nombre']}</option>";
        }
        ?>
    </select>

    <select name="auto_id">
        <?php
        $resultado = $conexion->query("SELECT id, modelo FROM autos");
        while ($fila = $resultado->fetch_assoc()) {
            echo "<option value='{$fila['id']}'>{$fila['modelo']}</option>";
        }
        ?>
    </select>

    <input type="date" name="fecha" required>
    <button type="submit">Registrar Compra</button>
</form>