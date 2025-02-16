<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    use HasFactory;

    // Nombre de la tabla (opcional si sigue la convención de nombres de Laravel)
    protected $table = 'personal';

    // Clave primaria (opcional si sigue la convención de nombres de Laravel)
    protected $primaryKey = 'personal_id';

    // Indicar si la clave primaria es autoincremental (opcional si es true)
    public $incrementing = true;

    // Tipo de la clave primaria (opcional si es int)
    protected $keyType = 'int';

    // Campos asignables en masa (Mass Assignment)
    protected $fillable = [
        'nombre',
        'apellido',
        'edad',
        'correo',
        'telefono',
    ];

    // Campos ocultos al serializar el modelo (opcional)
    protected $hidden = [
        // 'campo_oculto',
    ];

    // Campos que deben ser convertidos a tipos nativos (opcional)
    protected $casts = [
        // 'campo' => 'boolean',
    ];

    // Deshabilitar timestamps (created_at y updated_at) si no los usas
    public $timestamps = false;

    public function historiales()
{
    return $this->hasMany(historial_cargos::class, 'personal_id', 'personal_id');
}

public function sucursal_rotaciones(){
    return $this->belongsTo(historial_rotacion::class, "historial_id");
}

public function ingresos_personal(){
    return $this->hasMany(ingreso_personal::class, 'personal_id');
}

public function historial_rotaciones(){
    return $this->belongsTo(historial_rotacion::class,'historial_id');
 }

 public function cargo_historiales()
{
return $this->belongsTo(historial_cargos::class, 'historial_cargo_id');
}


}