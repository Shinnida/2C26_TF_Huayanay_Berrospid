<?php
$conn = new mysqli("localhost", "root", "123456", "dotita_db");
if ($conn->connect_error) die("Conexión fallida: " . $conn->connect_error);

$id_bp = $_POST['id_bp'] ?? null;

$sql = "DELETE FROM BattlePass WHERE id_bp=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_bp);

if ($stmt->execute()) echo "BattlePass eliminado correctamente";
else echo "Error: " . $conn->error;

$stmt->close();
$conn->close();
?>
