<?php
// Configuración de la base de datos
$host = 'localhost';
$db   = 'uue_bd20262';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

// Data Source Name
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

// Opciones de configuración para PDO
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Reportar errores como excepciones
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       // Devolver datos como arrays asociativos
    PDO::ATTR_EMULATE_PREPARES   => false,                  // Desactivar emulación para mayor seguridad
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    // Si falla la conexión, enviamos el error en formato JSON
    echo json_encode(["error" => "Error de conexión: " . $e->getMessage()]);
    exit;
}
?>