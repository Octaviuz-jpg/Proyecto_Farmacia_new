<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class compra extends Model
{
    //use HasFactory;

    // Nombre de la tabla
    protected $table = 'compras';

    // Clave primaria
    protected $primaryKey = 'compra_id';

    // Incrementar automáticamente la clave primaria
    public $incrementing = true;

    // Tipo de clave primaria
    protected $keyType = 'int';

    // Campos que se pueden asignar de manera masiva
    protected $fillable = [
        'pedido_proveedor_id',
        'forma_pago',
        'tiempo_llegada',
        'fecha_pago',
        'estado_pago'
    ];

    // Deshabilitar marcas de tiempo si no las usas
    public $timestamps = false;


    public function pedido_proveedores(){

        return $this->belongsTo(pedido_proveedor::class, 'pedido_proveedor_id');
    }
}
