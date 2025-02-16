<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
    use HasFactory;

    // Nombre de la tabla asociada
    protected $table = 'sucursal';

    // Clave primaria
    protected $primaryKey = 'sucursal_id';

    // Indica que la clave primaria es autoincremental
    public $incrementing = true;

    // Tipo de la clave primaria
    protected $keyType = 'int';

    // Indica si el modelo tiene marcas de tiempo
    public $timestamps = false;

    // Definir los campos que pueden ser asignados masivamente
    protected $fillable = [
        'ubicacion',
        'numerodetlf',
    ];

    public function historial_rotaciones(){
       return $this->belongsTo(historial_rotacion::class,'historial_id');
    }

    
   

}
