<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class historial_rotacion extends Model
{
     // Definir la tabla asociada al modelo
     protected $table = 'historial_rotaciones';
    
     // Definir la clave primaria de la tabla
     protected $primaryKey = 'historial_id';
 
     // Indicar que el campo de clave primaria es autoincremental
     public $incrementing = true;
 
     // Definir los campos que se pueden asignar de manera masiva
     protected $fillable = [
         'personal_id',
         'sucursal_id',
         'fecha_entrada',
         'fecha_salida',
     ];
     //Deshabilitar marcas de tiempo
     public $timestamps = false;

    // Deshabilitar marcas de tiempo

     public function personales(){

        return $this->hasMany(Personal::class, 'personal_id');


     }

     public function sucursales(){

        return $this->hasMany(Sucursal::class,'sucursal_id');
     }



}
