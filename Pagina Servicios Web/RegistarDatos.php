<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['nombreU'];
    $useremail = $_POST['correoU'];
    $password = $_POST['password'];

    // Conexión a la base de datos
    $conexion = mysqli_connect("localhost", "root", "", "veterinaria");

    // Verificar la conexión
    if (!$conexion) {
        die("La conexión a la base de datos falló: " . mysqli_connect_error());
    }

    // Escapar caracteres especiales para prevenir SQL injection
    $username = mysqli_real_escape_string($conexion, $username);
    $useremail = mysqli_real_escape_string($conexion, $useremail);
    $password = mysqli_real_escape_string($conexion, $password);

    // Hashear la contraseña (se recomienda utilizar funciones más seguras como password_hash)
    $hashedPassword = md5($password);

    // Consulta SQL para insertar datos en la tabla clientes
    $consulta = "INSERT INTO clientes (nombre, correo, contraseña) VALUES ('$username', '$useremail', '$hashedPassword')";

    // Ejecutar la consulta
    $resultado = mysqli_query($conexion, $consulta);

    // Verificar si la consulta fue exitosa
    if ($resultado) {
        // Redireccionar a la página de inicio exitoso
        header("location: iniciar.html");
        exit(); // Terminar el script después de redirigir
    } else {
        // Si hay un error en la consulta, mostrar un mensaje de error y redirigir a la página de error
        $_SESSION['error'] = "Error en la consulta SQL: " . mysqli_error($conexion);
        header("location: procesarcripto.php");
        exit(); // Terminar el script después de redirigir
    }

    // Cerrar la conexión y liberar los resultados
    mysqli_close($conexion);
}
?>
