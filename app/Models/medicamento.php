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



    public function stocks()
{
    return $this->belongsToMany(stock::class, 'stock_medicamento', 'medicamento_id', 'stock_id')
                ->withPivot('cantidad', 'precio'); // Incluye los atributos de la tabla pivote
}


    public function monodrogas(){

        return $this->belongsToMany(monodroga::class, 'monodroga_medicamentos', 'medicamentos_id', 'monodroga_id');
    }
    public function laboratorios(){
        return $this->belongsToMany(laboratorio::class,'lab_medicamento', 'medicamento_id', 'lab_id');
    }
    public function presentaciones(){
        return $this->belongsToMany(presentacion::class, 'medicamento_presentaciones', 'medicamentos_id', 'presentacion_id');

    }

    public function pedido_proveedores(){
        return $this->hasMany(pedido_proveedor::class, 'medicamentos_id');
    }


    public function sucursales()
{
    return $this->hasManyThrough(
        Sucursal::class,      // Modelo final (Sucursal)
        Stock::class,         // Modelo intermedio (Stock)
        'medicamento_id',     // Clave foránea en `stock_medicamento` que apunta a `medicamentos`.
        'sucursal_id',                 // Clave primaria en `sucursales`.
        'medicamentos_id',                 // Clave primaria en `medicamentos`.
        'sucursal_id'         // Clave foránea en `stocks` que apunta a `sucursales`.
    );
}

}
