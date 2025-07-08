<?php
$conn = new mysqli("localhost", "root", "123456", "dotita_db");
if ($conn->connect_error) die("Conexión fallida: " . $conn->connect_error);

$id_partida = $_POST['id_partida'];

$sql = "DELETE FROM Partidas WHERE id_partida=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_partida);

if ($stmt->execute()) echo "Partida eliminada correctamente";
else echo "Error: " . $conn->error;

$stmt->close();
$conn->close();
?>
