<?php
$conn = new mysqli("localhost", "root", "123456", "dotita_db");
if ($conn->connect_error) die("Conexión fallida: " . $conn->connect_error);

$id_amigo = $_POST['id_amigo'] ?? null;

$sql = "DELETE FROM Amigos WHERE id_amigo=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_amigo);

if ($stmt->execute()) echo "Amigo eliminado correctamente";
else echo "Error: " . $conn->error;

$stmt->close();
$conn->close();
?>
