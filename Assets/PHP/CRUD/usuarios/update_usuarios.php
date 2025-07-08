<?php
$conn = new mysqli("localhost", "root", "123456", "dotita_db");
if ($conn->connect_error) die("Conexión fallida: " . $conn->connect_error);

$id = $_POST['id_usuario'];
$rango = $_POST['rango'];

$sql = "UPDATE Usuarios SET rango=? WHERE id_usuario=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("si", $rango, $id);

if ($stmt->execute()) echo "Usuario actualizado correctamente";
else echo "Error: " . $conn->error;

$stmt->close();
$conn->close();
?>
