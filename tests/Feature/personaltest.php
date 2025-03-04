<?php


namespace Tests\Feature;


use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Personal;

class personaltest extends TestCase
{
    //use RefreshDatabase; // Limpia la base de datos después de cada prueba

   /** @test */
      public function test_personal_agregar()
    {
        // Datos simulados
        $data = [
            'nombre' => 'Octavio',
            'apellido' => 'Pérez',
            'edad' => 30,
            'correo' => 'octavio@example.com',
            'telefono' => 1234567890,
        ];

        // Simular una solicitud POST al método personalAgregar
        $response = $this->post(route('personal-agregar'), $data);

        // Asegurarse de que la solicitud fue exitosa
        $response->assertStatus(302); // Redirección después del guardado
        $response->assertSessionHas('success', '¡Persona agregada con éxito!');

        // Verificar que los datos se guardaron en la base de datos
        $this->assertDatabaseHas('personal', [
            'nombre' => 'Octavio',
            'apellido' => 'Pérez',
            'edad' => 30,
            'correo' => 'octavio@example.com',
            'telefono' => 1234567890,
        ]);
    }
}
