<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CausaMuerte extends Model
{
    protected $table = 'causa_muerte';

    protected $fillable = [
        'numero_entrada',
        'despacho',
        'numero_expediente',
        'direccion_remocion_cadaver',
        'delito',
        'causa_muerte',
        'mecanismo_causa_muerte',
        'tipo_vehiculo',
        'fecha_suceso_transito',
        'fecha_ingreso_cadaver',
        'hora',
        'estado',
        'municipio',
        'parroquia',
        'sector',
        'direccion_exacta',
        'categorizacion_referencias',
        'nombres_apellidos',
        'sexo',
        'embarazada',
        'edad',
        'edad_medida',
        'grupo_etario',
        'tipo_identificacion',
        'nacionalidad',
        'identificacion',
        'nivel_instruccion',
        'sitio_donde_laboraba',
        'descripcion',
        'fecha_dictamen_muerte',
        'hora_dictamen_muerte',
        'fases_descomposicion',
        'observaciones',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* RELACIONES */

    public function getResourceUrlAttribute()
    {
        return url('/admin/causa_muerte/'.$this->getKey());
    }
    public function estado() {
        return $this->belongsTo(User::class);
    }
}
