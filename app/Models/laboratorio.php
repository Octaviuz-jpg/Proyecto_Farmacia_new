<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class laboratorio extends Model
{
   // use HasFactory;

    // Nombre de la tabla
    protected $table = 'laboratorios';

    // Clave primaria
    protected $primaryKey = 'lab_id';

    // Incrementar automáticamente la clave primaria
    public $incrementing = true;

    // Tipo de clave primaria
    protected $keyType = 'int';

    // Campos que se pueden asignar de manera masiva
    protected $fillable = [
        'nombre',
        'direccion',
        'telefono'
    ];

    // Deshabilitar marcas de tiempo si no las usas
    public $timestamps = false;

    public function medicamentos(){
        return $this->belongsToMany(medicamento::class,'lab_medicamento', 'lab_id', 'medicamento_id');
    }
    

    public function pedido_proveedores(){

        return $this->hasMany(pedido_proveedor::class, 'laboratorio_id');
    }
}
