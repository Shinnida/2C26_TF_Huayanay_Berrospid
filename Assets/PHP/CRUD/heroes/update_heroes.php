<?php
$conn = new mysqli("localhost", "root", "123456", "dotita_db");
if ($conn->connect_error) die("Conexión fallida: " . $conn->connect_error);

$id_heroe = $_POST['id_heroe'] ?? null;
$rol = $_POST['rol'] ?? null;

$sql = "UPDATE Heroes SET rol=? WHERE id_heroe=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("si", $rol, $id_heroe); // ✅ variable correcta

if ($stmt->execute()) echo "Héroe actualizado correctamente";
else echo "Error: " . $conn->error;

$stmt->close();
$conn->close();
?>
