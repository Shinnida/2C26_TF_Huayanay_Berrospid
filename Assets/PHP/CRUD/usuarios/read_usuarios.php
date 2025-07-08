<?php
$conn = new mysqli("localhost", "root", "123456", "dotita_db");
if ($conn->connect_error) die("Conexión fallida: " . $conn->connect_error);

$result = $conn->query("SELECT * FROM Usuarios");
$usuarios = array();
while ($row = $result->fetch_assoc()) $usuarios[] = $row;

echo json_encode($usuarios);

$conn->close();
?>
