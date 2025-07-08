<?php
$conn = new mysqli("localhost", "root", "123456", "dotita_db");
if ($conn->connect_error) die("Conexión fallida: " . $conn->connect_error);

$id_heroe = $_POST['id_heroe'] ?? null;

$sql = "DELETE FROM Heroes WHERE id_heroe = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_heroe);

if ($stmt->execute()) echo "Héroe eliminado correctamente";
else echo "Error: " . $conn->error;

$stmt->close();
$conn->close();
?>
