<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos a Proveedores</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/style-analistas.css">
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #3498db;
            --accent-color: #e74c3c;
            --text-color: #2c3e50;
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
        }

        .header {
            background: linear-gradient(135deg, var(--primary-color), #34495e);
            padding: 1rem 2rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 2rem auto;
            background: white;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            overflow: hidden;
            font-size: 0.9rem;
        }

        table th {
            background: var(--primary-color);
            color: white;
            padding: 1rem;
            text-align: left;
        }

        table td {
            padding: 1rem;
            border-bottom: 1px solid #ecf0f1;
            color: var(--text-color);
        }

        table tr:hover {
            background-color: #f8f9fa;
        }

        .no-data {
            text-align: center;
            margin-top: 2rem;
            color: var(--accent-color);
            font-size: 1.2rem;
            font-weight: bold;
        }

        form {
            max-width: 600px;
            margin: 2rem auto;
            text-align: center;
        }

        form button {
            background: var(--secondary-color);
            color: white;
            border: none;
            padding: 0.8rem 1.5rem;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            justify-content: center;
            width: 100%;
        }

        form button:hover {
            background: #2980b9;
            transform: translateY(-2px);
        }

        @media (max-width: 768px) {
            .header-content {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }

            .button-retroceder {
                width: 100%;
                justify-content: center;
            }

            table {
                font-size: 0.8rem;
            }
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="header-content">
            <h1 class="titulo">
                <i class="fas fa-user-tie"></i>
                Pedidos Proveedores
            </h1>
            <button class="button-retroceder" onclick="window.location.href='/administrador'">
                <i class="fas fa-arrow-left"></i>
                Volver al Panel
            </button>
        </div>
    </header>

    @if ($pedido->isNotEmpty())
        <table>
            <thead>
                <tr>
                    <th>ID Pedido Proveedor</th>
                    <th>ID Laboratorio</th>
                    <th>ID Pedido</th>
                    <th>ID Medicamento</th>
                    <th>Cantidad</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pedido as $ped)
                    <tr>
                        <td>{{ $ped->pedido_proveedor_id }}</td>
                        <td>{{ $ped->laboratorio_id }}</td>
                        <td>{{ $ped->pedido_id }}</td>
                        <td>{{ $ped->medicamento_id }}</td>
                        <td>{{ $ped->cantidad }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="no-data">No hay pedidos registrados actualmente.</p>
    @endif

    <form action="{{ route('pedido-formulario') }}" method="get">
        <button>
            <i class="fas fa-plus-circle"></i> Hacer Pedido
        </button>
    </form>
</body>
</html>
