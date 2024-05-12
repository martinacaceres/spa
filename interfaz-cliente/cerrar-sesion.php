<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION["Email"])) {
    // Si el usuario no ha iniciado sesión, redirigirlo al formulario de inicio de sesión
    header("Location: index.html");
    exit;
}

// El usuario ha iniciado sesión correctamente, puedes mostrar el contenido protegido aquí
// Eliminar todas las variables de sesión
$_SESSION = array();

// Finalizar la sesión
session_destroy();

// Redirigir a la página de inicio de sesión (o a cualquier otra página)
header("location: index.html");
exit;
?>