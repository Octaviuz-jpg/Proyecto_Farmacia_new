<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    use HasFactory;

    // Nombre de la tabla (opcional si sigue la convención de nombres de Laravel)
    protected $table = 'cargos';

    // Clave primaria (opcional si sigue la convención de nombres de Laravel)
    protected $primaryKey = 'cargo_id';

    // Indicar si la clave primaria es autoincremental (opcional si es true)
    public $incrementing = true;

    // Tipo de la clave primaria (opcional si es int)
    protected $keyType = 'int';

    // Campos asignables en masa (Mass Assignment)
    protected $fillable = [
        'cargo',
    ];

    // Campos ocultos al serializar el modelo (opcional)
    protected $hidden = [
        // 'campo_oculto',
    ];

    // Campos que deben ser convertidos a tipos nativos (opcional)
    protected $casts = [
        // 'campo' => 'boolean',
    ];

    // Deshabilitar timestamps (created_at y updated_at) si no los usas
    public $timestamps = false;

    public function cargo_historiales()
{
    return $this->belongsTo(historial_cargos::class, 'historial_cargo_id');
}

    
}