<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class historial_cargos extends Model
{
    // Nombre de la tabla (opcional si sigue la convención de nombres de Laravel)
    protected $table = 'historial_cargos';

    // Clave primaria (opcional si sigue la convención de nombres de Laravel)
    protected $primaryKey = 'historial_cargo_id';

    // Indicar si la clave primaria es autoincremental (opcional si es true)
    public $incrementing = true;

    // Tipo de la clave primaria (opcional si es int)
    protected $keyType = 'int';

    // Campos asignables en masa (Mass Assignment)
    protected $fillable = [
        'cargo_id',
        'personal_id',
        'descripcion',
        'tiempo_inicio',
        'tiempo_final',
    ];

    // Campos ocultos al serializar el modelo (opcional)
    protected $hidden = [
        // 'campo_oculto',
    ];

    // Campos que deben ser convertidos a tipos nativos (opcional)
    protected $casts = [
        'tiempo_inicio' => 'datetime',
        'tiempo_final' => 'datetime',
    ];

    // Deshabilitar timestamps (created_at y updated_at) si no los usas
    public $timestamps = false;

    // Relación con el mo delo Cargo
  
}
