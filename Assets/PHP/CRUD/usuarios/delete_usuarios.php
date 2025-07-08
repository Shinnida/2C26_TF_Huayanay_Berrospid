<?php
$conn = new mysqli("localhost", "root", "123456", "dotita_db");
if ($conn->connect_error) die("Conexión fallida: " . $conn->connect_error);

$id = $_POST['id_usuario'];

$sql = "DELETE FROM Usuarios WHERE id_usuario=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

if ($stmt->execute()) echo "Usuario eliminado correctamente";
else echo "Error: " . $conn->error;

$stmt->close();
$conn->close();
?>
