<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pedido extends Model
{
    //use HasFactory;

    // Nombre de la tabla
    protected $table = 'pedido';

    // Clave primaria
    protected $primaryKey = 'pedido_id';

    // Incrementar automáticamente la clave primaria
    public $incrementing = true;

    // Tipo de clave primaria
    protected $keyType = 'int';

    // Campos que se pueden asignar de manera masiva
    protected $fillable = [
        'analista_id',
        'fecha_pedido'
    ];

    // Deshabilitar marcas de tiempo si no las usas
    public $timestamps = false;

    public function analistas(){
        return $this->belongsTo(analista::class,'analista_id');
    }

    public function pedido_proveedores(){
        return $this->hasMany(pedido_proveedor::class, 'pedido_id');
    }
}
