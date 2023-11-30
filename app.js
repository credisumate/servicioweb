const express = require('express');
const http = require('http');
const path = require('path');  // Agrega esta línea

const app = express();
const server = http.createServer(app);

// Configura Express para servir archivos estáticos desde la carpeta 'public'
app.use(express.static(path.join(__dirname, 'public')));

// Manejar la ruta de la página de inicio de sesión
app.get('/login', (req, res) => {
  // En lugar de fs, utiliza el método `sendFile` de Express para enviar el archivo HTML
  res.sendFile(path.join(__dirname, 'login.html'));
});

// Manejar la ruta de la página de inicio de sesión
app.get('/indexD', (req, res) => {
    // En lugar de fs, utiliza el método `sendFile` de Express para enviar el archivo HTML
    res.sendFile(path.join(__dirname, 'Pagina Servicios Web/indexD.html'));
  });

  // Manejar la ruta de la página de inicio de sesión
app.get('/iniciar', (req, res) => {
    // En lugar de fs, utiliza el método `sendFile` de Express para enviar el archivo HTML
    res.sendFile(path.join(__dirname, 'Pagina Servicios Web/iniciar.html'));
  });

    // Manejar la ruta de la página de inicio de sesión
app.get('/home', (req, res) => {
    // En lugar de fs, utiliza el método `sendFile` de Express para enviar el archivo HTML
    res.sendFile(path.join(__dirname, 'index.html'));
  });

// Manejar otras rutas o configuraciones según sea necesario

const port = 3000;
server.listen(port, () => {
  console.log(`Server running at http://localhost:${port}/home`);
});
