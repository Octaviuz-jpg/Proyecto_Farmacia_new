<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Generar PDF</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #3498db;
            --accent-color: #e74c3c;
            --text-color: #2c3e50;
            --success-color: #27ae60;
            --background-gradient: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', system-ui, sans-serif;
        }

        body {
            background: var(--background-gradient);
            padding: 2rem;
        }

        .header {
            background: linear-gradient(135deg, var(--primary-color), #34495e);
            padding: 1rem 2rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 2rem;
        }

        .header-content {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .titulo {
            color: white;
            font-size: 1.8rem;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .titulo i {
            font-size: 2rem;
            color: var(--secondary-color);
        }

        .button-retroceder {
            background: rgba(255, 255, 255, 0.1);
            color: white;
            border: 2px solid var(--secondary-color);
            padding: 0.8rem 1.5rem;
            border-radius: 50px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .button-retroceder:hover {
            background: var(--secondary-color);
            transform: translateY(-2px);
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.2);
        }

        form {
            background: white;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            max-width: 400px;
            margin: 2rem auto;
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            color: var(--text-color);
            font-weight: 500;
        }

        input[type="number"] {
            width: 100%;
            padding: 0.8rem;
            border: 2px solid #ecf0f1;
            border-radius: 8px;
            transition: border-color 0.3s ease;
        }

        input[type="number"]:focus {
            border-color: var(--secondary-color);
            outline: none;
        }

        button[type="submit"] {
            background: var(--secondary-color);
            color: white;
            border: none;
            padding: 0.8rem 1.5rem;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        button[type="submit"]:hover {
            background: #2980b9;
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="header-content">
            <h1 class="titulo">
                <i class="fas fa-file-pdf"></i>
                Generar PDF de Compras y Pedidos
            </h1>
            <button class="button-retroceder" onclick="window.location.href='/administrador'">
                <i class="fas fa-arrow-left"></i>
                Volver al Panel
            </button>
        </div>
    </header>

    <form action="{{ route('pedido-proveedor.pdf') }}" method="GET">
        <label for="id"><i class="fas fa-hashtag"></i> ID del Pedido:</label>
        <input type="number" name="id" id="id" required>
        <button type="submit"><i class="fas fa-file-pdf"></i> Generar PDF</button>
    </form>
</body>
</html>
