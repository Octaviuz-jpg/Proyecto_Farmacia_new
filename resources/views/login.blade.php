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
        <form action="#" method="post">
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
</body>
</html>
