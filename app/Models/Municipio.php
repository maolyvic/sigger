<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Municipio extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * La tabla asociada con el modelo.
     * Aunque Laravel lo infiere, es buena práctica definirla explícitamente.
     * @var string
     */
    protected $table = 'municipios';

    /**
     * Los atributos que se pueden asignar en masa (mass assignable).
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        'estados_id', // ¡Importante! La clave foránea debe estar aquí
        'user_id',   // Si también tienes un user_id
    ];

    // =================================================================
    //                       RELACIONES ELOQUENT
    // =================================================================

    /**
     * Un Municipio pertenece a un solo Estado.
     * Esta es la relación que soluciona tu error anterior.
     */
    public function estado()
    {
        // Laravel buscará la clave foránea 'estado_id' en la tabla 'municipios'.
        return $this->belongsTo(Estado::class);
    }

    /**
     * Un Municipio tiene muchas Parroquias.
     */
    public function parroquias()
    {
        return $this->hasMany(Parroquia::class);
    }

    /**
     * Opcional: Si registras qué usuario creó el municipio.
     * Un Municipio fue creado por un Usuario.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}