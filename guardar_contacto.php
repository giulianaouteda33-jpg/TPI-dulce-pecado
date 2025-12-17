<?php
// 1. Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "dulce_pecado");

// Verificar conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// 2. Recibir datos del formulario
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$mensaje = $_POST['mensaje'];

// 3. Insertar en la base de datos
$sql = "INSERT INTO datos_clientes (nombre, email, mensaje)
        VALUES ('$nombre', '$email', '$mensaje')";

if ($conexion->query($sql) === TRUE) {
    echo "<h2>Mensaje enviado correctamente ✔</h2>";
    echo "<a href='index.html'>Volver</a>";
} else {
    echo "Error al guardar: " . $conexion->error;
}

$conexion->close();
?>
