<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pedido_proveedor extends Model
{
    //use HasFactory;

    // Nombre de la tabla
    protected $table = 'pedido_proveedor';

    // Clave primaria
    protected $primaryKey = 'pedido_proveedor_id';

    // Incrementar automáticamente la clave primaria
    public $incrementing = true;

    // Tipo de clave primaria
    protected $keyType = 'int';

    // Campos que se pueden asignar de manera masiva
    protected $fillable = [
        'laboratorio_id',
        'pedido_id',
        'medicamento_id',
        'cantidad'
    ];

    // Deshabilitar marcas de tiempo si no las usas
    public $timestamps = false;

    public function laboratorios(){
        return $this->belongsTo(laboratorio::class, 'laboratorio_id');
    }

    public function pedidos(){
        return $this->belongsTo(pedido::class, 'pedido_id');
    }

    public function medicamentos(){
        return $this->belongsTo(medicamento::class, 'medicamento_id');
    }

    public function compras(){
        return $this->hasMany(compra::class, 'pedido_proveedor_id');
    }
}
