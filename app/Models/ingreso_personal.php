<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ingreso_personal extends Model
{
  //  use HasFactory;

    // Nombre de la tabla
    protected $table = 'ingreso_personal';

    // Clave primaria
    protected $primaryKey = 'ingreso_id';

    // Incrementar automáticamente la clave primaria
    public $incrementing = true;

    // Tipo de clave primaria
    protected $keyType = 'int';

    // Campos que se pueden asignar de manera masiva
    protected $fillable = [
        'personal_id',
        'fecha_entrada',
        'fecha_salida'
    ];

    // Deshabilitar marcas de tiempo si no las usas
    public $timestamps = false;

    public function personal(){
        return $this->belongsTo(personal::class, 'personal_id');
    }
}


