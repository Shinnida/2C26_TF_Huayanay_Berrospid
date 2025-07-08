<?php
$conn = new mysqli("localhost", "root", "123456", "dotita_db");
if ($conn->connect_error) die("Conexión fallida: " . $conn->connect_error);

$id_usuario = $_POST['id_usuario'] ?? null;
$id_usuario_amigo = $_POST['id_usuario_amigo'] ?? null;

$sql = "INSERT INTO Amigos (id_usuario, id_usuario_amigo) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $id_usuario, $id_usuario_amigo);

if ($stmt->execute()) echo "Amigo agregado correctamente";
else echo "Error: " . $conn->error;

$stmt->close();
$conn->close();
?>
