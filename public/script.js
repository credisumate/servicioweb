function solicitarContrasena() {
    // Bucle para solicitar la contraseña hasta que sea correcta
    while (true) {
      // Solicitar la contraseña mediante un cuadro de diálogo de entrada
      var inputContrasena = prompt("Ingrese la contraseña:");

      if (inputContrasena === "password123") {
        // Contraseña correcta, salir del bucle
        alert("Contraseña correcta. ¡Bienvenido!");
        break;
      } else {
        // Contraseña incorrecta, mostrar un mensaje de error
        alert("Contraseña incorrecta. Inténtelo de nuevo.");
      }
    }
  }

  solicitarContrasena();