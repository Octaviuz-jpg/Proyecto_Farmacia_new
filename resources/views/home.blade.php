<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmacia Royall</title>
    @vite('public/css/styles.css')
  </head>
  <body>
    <!-- Header -->
    <header>
      <div class="logo">
        <img src="logo.png" alt="Logo de la Farmacia">
      </div>
      <nav class="menu">
        <ul>
          <li><a href="#">Sucursales</a></li>
          <li><a href="#">Afiliados</a></li>
          <li><a href="#">Contactos</a></li>
        </ul>
      </nav>
      <div class="login">
        <a href="/login"><img src="{{asset('/images/home/user.png')}}"/>Login</a>
      </div>
    </header>

    <!-- Contenido Principal -->
    <main>
      <div class="imagen-central">
        <img src="{{asset('/images/home/imagen-central.jpg')}}" alt="Imagen central de la farmacia">
      </div>
    </main>

    <!-- Footer -->
    <footer>
      <p>&copy; 2025 Farmacia Royall. Todos los derechos reservados.</p>
    </footer>
  </body>
</html>
