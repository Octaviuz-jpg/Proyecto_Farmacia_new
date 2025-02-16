<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class analista extends Model
{
   // use HasFactory;

    // Nombre de la tabla
    protected $table = 'analista';

    // Clave primaria
    protected $primaryKey = 'analista_id';

    // Incrementar automáticamente la clave primaria
    public $incrementing = true;

    // Tipo de clave primaria
    protected $keyType = 'int';

    // Campos que se pueden asignar de manera masiva
    protected $fillable = [
        'nombre',
        'apellido'
    ];

    // Deshabilitar marcas de tiempo si no las usas
    public $timestamps = false;

    public function pedidos(){
        return $this->hasMany(pedido::class, 'analista_id');
    }
}
