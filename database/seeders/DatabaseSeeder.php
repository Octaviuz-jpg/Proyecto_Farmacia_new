<?php

namespace Database\Seeders;

use App\Models\laboratorio;
use App\Models\medicamento_presentacion;
use App\Models\presentacion;
use App\Models\Sucursal;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

     


       /* $this->call([
            AnalistaSeeder::class,
            MonodrogaSeeder::class,
            MedicamentosSeeder::class,
            


        ]);*/

       /* $this->call([
            PersonalSeeder::class,
            HistorialCargosSeeder::class,

        ]);*/

       /* $this->call([
            HistorialRotacionesSeeder::class,
        ]);*/

        $this->call([
           // StockSeeder::class,
          //  StockMedicamentoSeeder::class,
            //LaboratoriosSeeder::class,
           // PresentacionesSeeder::class,
           // MedicamentoPresentacionSeeder::class,
           //MonodrogaMedicamentoSeeder::class,
            //LabMedicamentoSeeder::class,
           // PedidoSeeder::class,
           //PedidoProveedorSeeder::class,
          // ComprasSeeder::class,
         // HistorialCargosSeeder::class,
         // HistorialRotacionesSeeder::class,
         // LabMedicamentoSeeder::class,
         // MedicamentoPresentacionSeeder::class,
          //StockSeeder::class,
          StockMedicamentoSeeder::class,

        ]);


        
    }
}
