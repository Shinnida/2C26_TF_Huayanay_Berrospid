<?php
$conn = new mysqli("localhost", "root", "123456", "dotita_db");
if ($conn->connect_error) die("Conexión fallida: " . $conn->connect_error);

$nombre_item = $_GET['nombre_item'] ?? null;
$efecto = $_GET['efecto'] ?? null;
$costo = $_GET['costo'] ?? null;
$tipo = $_GET['tipo'] ?? null;

$sql = "INSERT INTO Items (nombre_item, efecto, costo, tipo) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssis", $nombre_item, $efecto, $costo, $tipo);

if ($stmt->execute()) echo "Ítem creado correctamente";
else echo "Error: " . $conn->error;

$stmt->close();
$conn->close();
?>