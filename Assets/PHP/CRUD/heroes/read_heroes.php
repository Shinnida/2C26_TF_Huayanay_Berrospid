<?php
$conn = new mysqli("localhost", "root", "123456", "dotita_db");
if ($conn->connect_error) die("Conexión fallida: " . $conn->connect_error);

$result = $conn->query("SELECT * FROM Heroes");
$heroes = array();
while ($row = $result->fetch_assoc()) $heroes[] = $row;

echo json_encode($heroes);

$conn->close();
?>
