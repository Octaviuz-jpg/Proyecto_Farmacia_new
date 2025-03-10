<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Seleccionar Sucursal</title>
    <style>
        /* Estilo del formulario y select */
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
        }

        label {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
            display: inline-block;
            color: #333;
        }

        select {
            width: 100%;
            max-width: 400px;
            padding: 10px;
            font-size: 16px;
            border: 2px solid #4CAF50;
            border-radius: 5px;
            background-color: white;
            color: #333;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        select:focus {
            border-color: #2e7d32;
            box-shadow: 0 0 5px rgba(46, 125, 50, 0.5);
            outline: none;
        }

        .form-container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            width: 90%;
            max-width: 500px;
            margin: 0 auto;
        }

        .btn {
            margin-top: 20px;
            background-color: #4CAF50; /* Verde */
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
            margin-right: 10px;
        }

        .btn:hover {
            background-color: #45a049; /* Color más oscuro al pasar el ratón */
        }

        .btn:disabled {
            background-color: #cccccc; /* Botón gris cuando está deshabilitado */
            cursor: not-allowed;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <label for="sucursal">Selecciona una sucursal:</label>
        <select id="sucursal" name="sucursal" onchange="habilitarBoton()">
            <option value="" disabled selected>Seleccione una opción</option>
            @foreach ($sucursales as $sucursal)
                <option value="{{ $sucursal->sucursal_id }}">
                    {{ $sucursal->sucursal_id }} - {{ $sucursal->ubicacion }}
                </option>
            @endforeach
        </select>

        <!-- Botón de redirección -->
        <button id="redireccionar" class="btn" onclick="redireccionarPagina()" disabled>Ir a la Página</button>
        <!-- Botón para regresar a la página principal -->
        <button class="btn" onclick="regresarPaginaPrincipal()">Regresar a la Página Principal</button>
    </div>

    <script>
        // Variable para guardar el ID seleccionado
        let sucursalSeleccionada = '';

        // Habilitar el botón cuando se seleccione una sucursal
        function habilitarBoton() {
            const select = document.getElementById('sucursal');
            sucursalSeleccionada = select.value;

            // Habilitar el botón si se selecciona algo
            const boton = document.getElementById('redireccionar');
            if (sucursalSeleccionada) {
                boton.disabled = false;
            } else {
                boton.disabled = true;
            }
        }

        // Función para redireccionar a otra página
        function redireccionarPagina() {
            if (sucursalSeleccionada) {
                // Cambia esta URL por la página a la que deseas redirigir
                window.location.href = `/stock-medicamento/${sucursalSeleccionada}`;
            }
        }

        // Función para regresar a la página principal
        function regresarPaginaPrincipal() {
            // Cambia esta URL por la página principal de tu aplicación
            window.location.href = '/';
        }
    </script>
</body>
</html>
