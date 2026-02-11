<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

require_once 'conexion.php';

try {
    // Consulta simple con PDO
    $stmt = $pdo->query("SELECT * FROM cliente");
    $clientes = $stmt->fetchAll(); // Obtiene todos los registros como array

    echo json_encode($clientes);
} catch (Exception $e) {
    echo json_encode(["error" => "Error al consultar: " . $e->getMessage()]);
}
?>