<?php
$conn = new mysqli("localhost", "root", "123456", "dotita_db");
if ($conn->connect_error) die("Conexión fallida: " . $conn->connect_error);

$id_bp = $_POST['id_bp'] ?? null;
$nivel = $_POST['nivel'] ?? null;
$recompensa = $_POST['recompensa'] ?? null;

$sql = "UPDATE BattlePass SET nivel=?, recompensa=? WHERE id_bp=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("isi", $nivel, $recompensa, $id_bp);

if ($stmt->execute()) echo "BattlePass actualizado correctamente";
else echo "Error: " . $conn->error;

$stmt->close();
$conn->close();
?>
