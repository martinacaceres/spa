<?php
// Conexión a la base de datos (reemplaza con tus propios datos)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "spa_sweethands";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error en la conexión a la base de datos: " . $conn->connect_error);

}

// Recibe los datos del formulario
$username = $_POST['Email'];
$password = $_POST['Password'];

// Consulta la base de datos para verificar las credenciales
$sql = "SELECT * FROM usuario_cliente WHERE correo = '$username' AND contrasena = '$password'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $_SESSION['id_cliente'] = $username;
    $_SESSION['loggrd_in'] = true;
    echo "success"; // Inicio de sesión exitoso
} else {
    echo "error"; // Usuario o contraseña incorrectos
}


$conn->close();

header("location: inicio.html")

?>