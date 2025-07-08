<?php
$conn = new mysqli("localhost", "root", "123456", "dotita_db");
if ($conn->connect_error) die("Conexión fallida: " . $conn->connect_error);

// Obtener los datos del formulario
$nombre_heroe = $_POST['nombre_heroe'] ?? null;
$rol = $_POST['rol'] ?? null;
$dificultad = $_POST['dificultad'] ?? null;
$habilidad1 = $_POST['habilidad1'] ?? null;
$habilidad2 = $_POST['habilidad2'] ?? null;
$habilidad3 = $_POST['habilidad3'] ?? null;
$ultimate   = $_POST['ultimate'] ?? null;

// Validación mínima
if (empty($nombre_heroe)) {
    die("Error: El campo 'nombre_heroe' no puede estar vacío.");
}

// Insertar datos
$sql = "INSERT INTO Heroes 
(nombre_heroe, rol, dificultad, habilidad1, habilidad2, habilidad3, ultimate) 
VALUES (?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssss", $nombre_heroe, $rol, $dificultad, $habilidad1, $habilidad2, $habilidad3, $ultimate);

if ($stmt->execute()) {
    echo "✔️ Héroe creado correctamente";
} else {
    echo "❌ Error: " . $conn->error;
}

$stmt->close();
$conn->close();
?>
