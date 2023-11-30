function validarFormulario() {
       
    var password = document.getElementById('password').value;
    var passwordC = document.getElementById('passwordC').value;

    if (password !== passwordC) {
      
      document.getElementById('errorMensaje').innerText = 'Las contraseñas no coinciden.';
      
      return false;
    } else {
      
      document.getElementById('errorMensaje').innerText = '';
      
      return true;
    }
  }