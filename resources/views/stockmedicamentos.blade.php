<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock de Medicamentos</title>
    <link rel="stylesheet" href="css/style-laboratorios.css">
</head>
<body>
    <header class="header">
           <div class="header-content">
               <h1 class="titulo">
                   <i class="fas fa-microscope"></i>
                   Stock De Medicamentos
               </h1>
               <button class="button-retroceder" onclick="window.location.href='/administrador'">
                   <i class="fas fa-arrow-left"></i>
                   Volver al Panel
               </button>
           </div>
       </header>

       <main class="container">
           <div class="table-container">
               <table class="modern-table">
                   <thead>
                       <tr>
                           <th>ID del Medicamento</th>
                           <th>Nombre del Medicamento</th>
                           <th>ID del Stock</th>
                           <th>Precio</th>
                           <th>Cantidad</th>
                           <th>Sucursal</th>
                       </tr>
                   </thead>
                   <tbody>
                       @foreach ($stockMedicamentos as $stock)
                           <tr>
                               <td>{{ $stock->medicamento_id }}</td>
                               <td>{{ $stock->medicamento->nombre ?? 'Desconocido' }}</td>
                               <td>{{ $stock->stock_id }}</td>
                               <td>${{ number_format($stock->precio, 2) }}</td>
                               <td>{{ $stock->cantidad }}</td>
                               <td>{{ $stock->stock->sucursal->ubicacion ?? 'No asignada' }}</td>
                           </tr>
                       @endforeach
                   </tbody>
           </div>

           <div class ="action-cards">
               <div class="action-card">
                   <h2>Buscar Medicamento</h2>
                   <form action="{{ route('buscar-medicamento') }}" method="POST">
                       @csrf <!-- Protección CSRF de Laravel -->
                       <label for="medicamento_id">ID del Medicamento</label>
                       <input type="number" id="medicamento_id" name="medicamento_id" placeholder="Ingrese el ID del medicamento" required>
                       <button type="submit">Buscar Medicamento</button>
                   </form>
               </div>

               <div class="action-card">
                   <h2>Buscar Stock por Sucursal</h2>
                   <form action="{{ route('buscar-stock-sucursal') }}" method="POST">
                       @csrf <!-- Protección CSRF de Laravel -->
                       <label for="sucursal_id">ID de la Sucursal</label>
                       <input type="number" id="sucursal_id" name="sucursal_id" placeholder="Ingrese el ID de la sucursal" required>
                       <button type="submit">Buscar Stock</button>
                   </form>
               </div>

           </div>

       </main>
    <!-- Tabla de stock de medicamentos -->

        <!-- Formulario para buscar stock por ID de la sucursal -->


</body>
</html>
