<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class stock extends Model
{
   // use HasFactory;

    // Nombre de la tabla
   protected $table = 'stock';

    // Clave primaria
    protected $primaryKey = 'stock_id';

    // Incrementar automáticamente la clave primaria
    public $incrementing = true;

    // Tipo de clave primaria
    protected $keyType = 'int';

    // Campos que se pueden asignar de manera masiva
    protected $fillable = [
        'sucursal_id',
        'medicamento_id',

    ];

    public $timestamps = false;

    public function sucursal()
{
    return $this->belongsTo(Sucursal::class, 'sucursal_id', 'sucursal_id');
}


public function medicamentos()
{
    return $this->belongsToMany(Medicamento::class, 'stock_medicamento', 'stock_id', 'medicamento_id')
                ->withPivot('cantidad', 'precio'); // Asegúrate de incluir los atributos
}

}
