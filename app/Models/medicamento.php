<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class medicamento extends Model
{
    // Nombre de la tabla
    protected $table = 'medicamentos';

    // Clave primaria
    protected $primaryKey = 'medicamentos_id';

    // Incrementar automáticamente la clave primaria
    public $incrementing = true;

    // Tipo de clave primaria
    protected $keyType = 'int';

    // Campos que se pueden asignar de manera masiva
    protected $fillable = [
        'nombre',
        'generico'
    ];

    // Deshabilitar marcas de tiempo si no las usas
    public $timestamps = false;


    public function stocks(){
        return $this->belongsToMany(medicamento::class, 'stock_medicamento');
    }

    public function monodrogas(){

        return $this->belongsToMany(monodroga::class, 'monodroga_medicamentos');
    }
    public function laboratorios(){
        return $this->belongsToMany(laboratorio::class,'lab_medicamento');
    }
    public function presentaciones(){
        return $this->belongsToMany(presentacion::class, 'medicamento_presentaciones');
        
    }

    public function pedido_proveedores(){
        return $this->hasMany(pedido_proveedor::class, 'medicamentos_id');
    }
}
