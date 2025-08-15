<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CausaMuerte extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * La tabla asociada con el modelo.
     * Es crucial definirla explícitamente porque el nombre no sigue la convención plural de Laravel.
     * @var string
     */
    protected $table = 'causa_muerte';

    /**
     * Los atributos que se pueden asignar masivamente.
     *
     * @var array<int, string>
     */
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
        'estado_id', // Clave foránea
        'municipio_id', // Clave foránea
        'parroquia_id', // Clave foránea
        'sector_id', // Clave foránea
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
        'user_id',
    ];

    // =================================================================
    //                       RELACIONES ELOQUENT
    // =================================================================

    /**
     * Un registro de Causa de Muerte pertenece a un Estado.
     */
    public function estado()
    {
        return $this->belongsTo(Estado::class);
    }

    /**
     * Un registro de Causa de Muerte pertenece a un Municipio.
     */
    public function municipio()
    {
        return $this->belongsTo(Municipio::class);
    }

    /**
     * Un registro de Causa de Muerte pertenece a una Parroquia.
     */
    public function parroquia()
    {
        return $this->belongsTo(Parroquia::class);
    }

    /**
     * Un registro de Causa de Muerte pertenece a un Sector.
     */
    public function sector()
    {
        return $this->belongsTo(Sector::class);
    }

    /**
     * Un registro de Causa de Muerte fue creado por un Usuario.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}