<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Compras</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
            padding: 1rem;
        }

        header {
            background: linear-gradient(135deg, var(--primary-color), #34495e);
            padding: 1rem 2rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 2rem;
        }

        header h1 {
            color: white;
            font-size: 1.8rem;
            display: flex;
            align-items: center;
            gap: 1rem;
            text-align: center;
            justify-content: center;
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
            text-align: left;
        }

        table tr:hover {
            background-color: #f8f9fa;
        }

        table td[colspan] {
            text-align: center;
            font-size: 1rem;
            color: var(--accent-color);
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
            header h1 {
                font-size: 1.5rem;
                text-align: center;
            }

            table {
                font-size: 0.8rem;
            }

            form button {
                font-size: 0.9rem;
            }
        }
    </style>
</head>
<body>
    <header>
        <h1>
            <i class="fas fa-shopping-cart"></i>
            Lista de Compras
        </h1>
    </header>

    <table>
        <thead>
            <tr>
                <th>Compra ID</th>
                <th>Pedido Proveedor ID</th>
                <th>Forma de Pago</th>
                <th>Tiempo de Llegada</th>
                <th>Fecha de Pago</th>
                <th>Estado de Pago</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($compras as $compra)
                <tr>
                    <td>{{ $compra->compra_id }}</td>
                    <td>{{ $compra->pedido_proveedor_id }}</td>
                    <td>{{ $compra->forma_pago }}</td>
                    <td>{{ $compra->tiempo_llegada }}</td>
                    <td>{{ $compra->fecha_pago }}</td>
                    <td>{{ $compra->estado_pago }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">No hay compras registradas.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <form action="{{ route('compra-formulario') }}" method="GET">
        <button>
            <i class="fas fa-plus-circle"></i>
            Registrar Nueva Compra
        </button>
    </form>
</body>
</html>
