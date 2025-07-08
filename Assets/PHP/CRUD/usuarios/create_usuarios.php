<?php
$conn = new mysqli("localhost", "root", "123456", "dotita_db");
if ($conn->connect_error) die("Conexión fallida: " . $conn->connect_error);

$nombre = $_POST['nombre_usuario'];
$correo = $_POST['correo'];
$rango = $_POST['rango'];

$sql = "INSERT INTO Usuarios (nombre_usuario, correo, rango) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $nombre, $correo, $rango);

if ($stmt->execute()) echo "Usuario creado correctamente";
else echo "Error: " . $conn->error;

$stmt->close();
$conn->close();
?>
