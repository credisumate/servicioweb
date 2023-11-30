<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $useremail = $_POST['correoU'];
    $password = $_POST['password'];

    // Conexión a la base de datos
    $conexion = mysqli_connect("localhost", "root", "", "veterinaria");

    // Verificar la conexión
    if (!$conexion) {
        die("La conexión a la base de datos falló: " . mysqli_connect_error());
    }

    // Escapar caracteres especiales para prevenir SQL injection
    $useremail = mysqli_real_escape_string($conexion, $useremail);
    $password = mysqli_real_escape_string($conexion, $password);

    // Hashear la contraseña para compararla con la almacenada en la base de datos
    $hashedPassword = md5($password);

    // Consulta SQL para verificar las credenciales del usuario
    $consulta = "SELECT * FROM clientes WHERE correo = '$useremail' AND contraseña = '$hashedPassword'";
    
    // Ejecutar la consulta
    $resultado = mysqli_query($conexion, $consulta);

    // Verificar si la consulta fue exitosa
    if ($resultado) {
        // Verificar si se encontró un usuario con las credenciales proporcionadas
        if (mysqli_num_rows($resultado) == 1) {
            $fila = mysqli_fetch_assoc($resultado);
            $_SESSION['clientes'] = $fila['correo'];
            $_SESSION['nombre'] = $fila['nombre'];
            header("location: inicio_exitoso.php");
            exit(); // Terminar el script después de redirigir
        } else {
            // Si las credenciales son incorrectas, mostrar un mensaje de error y redirigir
            $_SESSION['error'] = "Credenciales incorrectas";
            header("location: procesarcripto.php");
            exit(); // Terminar el script después de redirigir
        }
    } else {
        // Si hay un error en la consulta, mostrar un mensaje de error y redirigir
        $_SESSION['error'] = "Error en la consulta SQL: " . mysqli_error($conexion);
        header("location: procesarcripto.php");
        exit(); // Terminar el script después de redirigir
    }

    // Cerrar la conexión y liberar los resultados
    mysqli_free_result($resultado);
    mysqli_close($conexion);
}
?>
