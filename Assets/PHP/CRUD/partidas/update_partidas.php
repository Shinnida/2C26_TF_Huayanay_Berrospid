<?php
$conn = new mysqli("localhost", "root", "123456", "dotita_db");
if ($conn->connect_error) die("Conexión fallida: " . $conn->connect_error);

$id_partida = $_POST['id_partida'];
$resultado = $_POST['resultado'];

$sql = "UPDATE Partidas SET resultado=? WHERE id_partida=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("si", $resultado, $id_partida);

if ($stmt->execute()) echo "Partida actualizada correctamente";
else echo "Error: " . $conn->error;

$stmt->close();
$conn->close();
?>
