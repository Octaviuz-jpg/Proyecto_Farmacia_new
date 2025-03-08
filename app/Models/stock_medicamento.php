<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class stock_medicamento extends Model
{
   // use HasFactory;

    // Nombre de la tabla
    protected $table = 'stock_medicamento';

    // Clave primaria
    protected $primaryKey = 'stock_medicamento';

    // Incrementar automáticamente la clave primaria
    public $incrementing = true;

    // Tipo de clave primaria
    protected $keyType = 'int';

    // Campos que se pueden asignar de manera masiva
    protected $fillable = [
        'medicamento_id',
        'stock_id',
        'sucursal_id',
        'precio'
    ];

    // Deshabilitar marcas de tiempo si no las usas
    public $timestamps = false;


    public function stock()
{
    return $this->belongsTo(stock::class, 'stock_id', 'stock_id');
}

public function medicamento()
{
    return $this->belongsTo(medicamento::class, 'medicamento_id', 'medicamentos_id');
}

}


