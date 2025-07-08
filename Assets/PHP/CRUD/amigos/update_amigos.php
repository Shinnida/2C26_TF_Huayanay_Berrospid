<?php
$conn = new mysqli("localhost", "root", "123456", "dotita_db");
if ($conn->connect_error) die("Conexión fallida: " . $conn->connect_error);

$id_amigo = $_POST['id_amigo'] ?? null;
$nuevo_id_usuario_amigo = $_POST['nuevo_id_usuario_amigo'] ?? null;

$sql = "UPDATE Amigos SET id_usuario_amigo=? WHERE id_amigo=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $nuevo_id_usuario_amigo, $id_amigo);

if ($stmt->execute()) echo "Amigo actualizado correctamente";
else echo "Error: " . $conn->error;

$stmt->close();
$conn->close();
?>
