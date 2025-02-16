<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class monodroga_medicamento extends Model
{
    
    // Nombre de la tabla
    protected $table = 'monodroga_medicamentos';

    // Clave primaria
    protected $primaryKey = 'monodroga_medicamento_id';

    // Incrementar automáticamente la clave primaria
    public $incrementing = true;

    // Tipo de clave primaria
    protected $keyType = 'int';

    // Campos que se pueden asignar de manera masiva
    protected $fillable = [
        'medicamentos_id',
        'monodroga_id'
    ];

    // Deshabilitar marcas de tiempo si no las usas
    public $timestamps = false;
}
