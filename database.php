<?php
// detalles de conexión
$host = 'mysql_db';
$dbname = 'database';
$username = 'root';
$password = 'root';

// intentar conectar con la base de datos
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Conexión exitosa";
} catch(PDOException $e) {
    echo "La conexión falló: " . $e->getMessage();
}
?>