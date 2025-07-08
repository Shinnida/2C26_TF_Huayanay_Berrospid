<?php
$conn = new mysqli("localhost", "root", "123456", "dotita_db");
if ($conn->connect_error) die("Conexión fallida: " . $conn->connect_error);

if (!isset($_POST['id_usuario'], $_POST['id_heroe'], $_POST['resultado'], $_POST['fecha'], $_POST['kills'], $_POST['muertes'], $_POST['asistencias'])) {
    die("Error: faltan parámetros");
}

$id_usuario = $_POST['id_usuario'];
$id_heroe = $_POST['id_heroe'];
$resultado = $_POST['resultado'];
$fecha = $_POST['fecha'];
$kills = $_POST['kills'];
$muertes = $_POST['muertes'];
$asistencias = $_POST['asistencias'];

$sql = "INSERT INTO Partidas (id_usuario, id_heroe, resultado, fecha, kills, muertes, asistencias) VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iissiii", $id_usuario, $id_heroe, $resultado, $fecha, $kills, $muertes, $asistencias);

if ($stmt->execute()) echo "Partida creada correctamente";
else echo "Error: " . $conn->error;

$stmt->close();
$conn->close();
?>
