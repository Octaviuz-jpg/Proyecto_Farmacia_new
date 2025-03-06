<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class monodroga extends Model
{
    // Nombre de la tabla
    protected $table = 'monodroga';

    // Clave primaria
    protected $primaryKey = 'monodroga_id';

    // Incrementar automáticamente la clave primaria
    public $incrementing = true;

    // Tipo de clave primaria
    protected $keyType = 'int';

    // Campos que se pueden asignar de manera masiva
    protected $fillable = [
        'tipo_monodroga',
        'descripcion'
    ];

    // Deshabilitar marcas de tiempo si no las usas
    public $timestamps = false;


    public function medicamentos(){

        return $this->belongsToMany(medicamento::class, 'monodroga_medicamentos','monodroga_id', 'medicamentos_id');
    }
}
