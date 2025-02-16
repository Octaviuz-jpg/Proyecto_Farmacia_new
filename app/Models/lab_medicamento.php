<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class lab_medicamento extends Model
{
    

    // Nombre de la tabla
    protected $table = 'lab_medicamento';

    // Clave primaria
    protected $primaryKey = 'lab_medicamentos';

    // Incrementar automáticamente la clave primaria
    public $incrementing = true;

    // Tipo de clave primaria
    protected $keyType = 'int';

    // Campos que se pueden asignar de manera masiva
    protected $fillable = [
        'lab_id',
        'medicamento_id'
    ];

    // Deshabilitar marcas de tiempo si no las usas
    public $timestamps = false;
}
