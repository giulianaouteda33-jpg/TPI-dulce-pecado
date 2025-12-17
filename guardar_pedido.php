<?php
// 1. Conectar a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "dulce_pecado");

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

// 2. Obtener datos del formulario
$email_cliente = $_POST['email_cliente'];
$producto = $_POST['producto'];
$cantidad = $_POST['cantidad'];
$total = $_POST['total'];
$notas = $_POST['notas'] ?? '';

$sql = "INSERT INTO pedidos (email_cliente, producto, cantidad, total, notas) 
        VALUES ('$email_cliente', '$producto', '$cantidad', '$total', '$notas')";

if (mysqli_query($conexion, $sql)) {
    // 4. Redirigir a exito.html
    header("Location: exito.html");
    exit();
} else {
    echo "Error: " . mysqli_error($conexion);
}

// Cerrar conexión
mysqli_close($conexion);
?>