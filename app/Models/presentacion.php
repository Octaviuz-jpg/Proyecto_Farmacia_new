<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class presentacion extends Model
{
    // Nombre de la tabla
    protected $table = 'presentaciones';

    // Clave primaria
    protected $primaryKey = 'presentacion_id';

    // Incrementar automáticamente la clave primaria
    public $incrementing = true;

    // Tipo de clave primaria
    protected $keyType = 'int';

    // Campos que se pueden asignar de manera masiva
    protected $fillable = [
        'tipo_presentacion'
    ];

    // Deshabilitar marcas de tiempo si no las usas
    public $timestamps = false;


    public function medicamentos(){
        return $this->belongsToMany(medicamento::class, 'medicamento_presentaciones', 'presentacion_id', 'medicamentos_id');
        
    }
}
