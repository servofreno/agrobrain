<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "datos_usuario";

// Create connection
$conexion = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conexion->connect_error) {
    die("Connection failed: " . $conexion->connect_error);
}

function add_user($nombre, $apellido, $correo, $telefono, $informacion, $file)
{
    global $conexion;
    $sql = "INSERT INTO datos_usuario (nombre, apellido, correo, telefono, informacion, file) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conexion->prepare($sql);
    // Vincular parámetros para el marcador de posición
    $stmt->bind_param("ssssss", $nombre, $apellido, $correo, $telefono, $informacion, $file);
    // Ejecutar la consulta
    $stmt->execute();
    // Obtener el ID generado automáticamente
    $id = $conexion->insert_id;
    $stmt->close();
    return $id;
}
?>