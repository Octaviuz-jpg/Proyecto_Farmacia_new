<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Farmacia Fictisia</title>
    <link rel="stylesheet" href="{{asset('/css/style-login.css')}}">
</head>
<body>
    <div class="login-container">
        <h2>Iniciar Sesión</h2>
        <form id="loginForm" onsubmit="return validateLogin(event)">
            <div class="input-group">
                <label for="username">Usuario:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-group">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Ingresar</button>
        </form>
        <p class="register-link">¿No tienes una cuenta? <a href="#">Regístrate aquí</a></p>
    </div>
   
    <script>
        function validateLogin(event) {
            // Prevenir el comportamiento predeterminado del formulario
            event.preventDefault();

            // Usuario y contraseña predefinidos
            const predefinedUsername = "admin";
            const predefinedPassword = "12345";

            // Obtener los valores del formulario
            const username = document.getElementById("username").value;
            const password = document.getElementById("password").value;

            // Verificar si coinciden con los valores predefinidos
            if (username === predefinedUsername && password === predefinedPassword) {
                // Redirigir a otra página
                window.location.href = "http://127.0.0.1:8000/administrador";
            } else {
                alert("Usuario o contraseña incorrectos");
            }
        }
    </script>
</body>
</html>
