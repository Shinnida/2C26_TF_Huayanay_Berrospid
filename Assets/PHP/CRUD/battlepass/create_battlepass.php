<?php
$conn = new mysqli("localhost", "root", "123456", "dotita_db");
if ($conn->connect_error) die("Conexión fallida: " . $conn->connect_error);

$id_usuario = $_POST['id_usuario'] ?? null;
$nivel = $_POST['nivel'] ?? null;
$recompensa = $_POST['recompensa'] ?? null;

$sql = "INSERT INTO BattlePass (id_usuario, nivel, recompensa) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iis", $id_usuario, $nivel, $recompensa);

if ($stmt->execute()) echo "BattlePass creado correctamente";
else echo "Error: " . $conn->error;

$stmt->close();
$conn->close();
?>
