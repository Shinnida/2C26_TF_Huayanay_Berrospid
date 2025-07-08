<?php
$conn = new mysqli("localhost", "root", "123456", "dotita_db");
if ($conn->connect_error) die("Conexión fallida: " . $conn->connect_error);

$id = $_GET['id_item'] ?? null;
if ($id === null) die("Error: falta el parámetro id_item");

$sql = "DELETE FROM Items WHERE id_item=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

if ($stmt->execute()) echo "Ítem eliminado correctamente";
else echo "Error: " . $conn->error;

$stmt->close();
$conn->close();
?>
