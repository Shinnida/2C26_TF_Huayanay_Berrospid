<?php
$conn = new mysqli("localhost", "root", "123456", "dotita_db");
if ($conn->connect_error) die("Conexión fallida: " . $conn->connect_error);

$id = $_POST['id_item'] ?? null;
$costo = $_POST['costo'] ?? null;
if ($id === null || $costo === null) die("Error: faltan parámetros");

$sql = "UPDATE Items SET costo=? WHERE id_item=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $costo, $id);

if ($stmt->execute()) echo "Ítem actualizado correctamente";
else echo "Error: " . $conn->error;

$stmt->close();
$conn->close();
?>
