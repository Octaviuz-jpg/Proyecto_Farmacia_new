<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class medicamento_presentacion extends Model
{
    // Nombre de la tabla
    protected $table = 'medicamento_presentaciones';

    // Clave primaria
    protected $primaryKey = 'medicamento_presentacion';

    // Incrementar automáticamente la clave primaria
    public $incrementing = true;

    // Campos que se pueden asignar de manera masiva
    protected $fillable = [
        'medicamentos_id',
        'presentacion_id'
    ];

    // Desactivar marcas de tiempo
    public $timestamps = false;
}
