<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sector extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * La tabla asociada con el modelo.
     * @var string
     */
    protected $table = 'sectores';

    /**
     * Los atributos que se pueden asignar masivamente.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        'parroquia_id',
    ];

    // =================================================================
    //                       RELACIONES ELOQUENT
    // =================================================================

    /**
     * Define la relación inversa: un Sector pertenece a una Parroquia.
     */
    public function parroquia()
    {
        // Laravel buscará la clave foránea 'parroquia_id' en la tabla 'sectores'.
        return $this->belongsTo(Parroquia::class);
    }
}