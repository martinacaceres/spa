<?php
// Establece la conexión a la base de datos (Completa con la información correcta)
$servername = "localhost";
$username = "root";
$password = "";
$database = "spa_sweethands";

$conn = new mysqli($servername, $username, $password, $database);

// Verifica la conexión a la base de datos
if ($conn->connect_error) {
    die("Error en la conexión a la base de datos: " . $conn->connect_error);
}

// Obtiene los datos del formulario (Completa con los nombres de campo correctos)
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$dni = $_POST['dni'];
$telefono = $_POST['telefono'];
$email = $_POST['email'];
$contrasena = $_POST['contrasena'];


  // Insertar datos en la tabla "usuarios"
  $sql1 = "INSERT INTO clientes (nombre, apellido, dni, telefono) VALUES ('$nombre', '$apellido', '$dni', '$telefono')";

  // Verificar si la inserción en la tabla "usuarios" fue exitosa
  if ($conn->query($sql1) === TRUE) {
      // Obtener el ID del último usuario insertado
      $last_id = $conn->insert_id;

      // Insertar la contraseña en la tabla "contraseñas" asociada al ID del usuario
      $sql2 = "INSERT INTO usuario_cliente (id_cliente, correo, contrasena) VALUES ('$last_id', '$email', '$contrasena')";

      if ($conn->query($sql2) === TRUE) {
          echo "Datos guardados correctamente";
      } else {
          echo "Error al guardar la contraseña: " . $conn->error;
      }
  } else {
      echo "Error al guardar los datos del usuario: " . $conn->error;
  }

// Cerrar la conexión
$conn->close();



/*$sql = "INSERT INTO usuarios
(nombre, apellido, email, telefono, contrasena, ciudad)
VALUES ('$nombre', '$apellido', '$dni', '$telefono', '$email', '$contrasena')";

if (mysqli_query($conn, $sql)) {
  echo "inserción exitosa";
} else {
  echo "error en la insercion: " . mysqli_error($conn);
}

mysqli_close($conn);*/

?>