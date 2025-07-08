<?php
$conn = new mysqli("localhost", "root", "123456", "dotita_db");
if ($conn->connect_error) die("Conexión fallida: " . $conn->connect_error);

$result = $conn->query("SELECT * FROM Partidas");
$partidas = array();
while ($row = $result->fetch_assoc()) $partidas[] = $row;

echo json_encode($partidas);

$conn->close();
?>
