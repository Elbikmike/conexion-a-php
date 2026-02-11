<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') exit;

require_once 'conexion.php'; // Incluimos la conexión PDO

// Recibimos los datos de Angular
$json = file_get_contents('php://input');
$data = json_decode($json);

if ($data) {
    try {
        $sql = "INSERT INTO cliente (nombre, apellido, telefono, correo) VALUES (?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        
        // Ejecutamos pasando los valores en un array
        $stmt->execute([
            $data->nombre,
            $data->apellido,
            $data->telefono,
            $data->correo
        ]);

        echo json_encode(["mensaje" => "Cliente registrado exitosamente mediante PDO"]);
    } catch (Exception $e) {
        echo json_encode(["error" => "Error al insertar: " . $e->getMessage()]);
    }
}
?>