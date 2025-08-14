<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // 1. Importa el trait para borrado lógico

class Redip extends Model
{
    use HasFactory, SoftDeletes; // 2. Usa los traits de Factory y SoftDeletes

    /**
     * La tabla asociada con el modelo.
     * Es buena práctica definirla explícitamente.
     * @var string
     */
    protected $table = 'redips';

    /**
     * Los atributos que se pueden asignar masivamente.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'codigo',
        'nombre',
        'descripcion',
        'user_id', // Para registrar qué usuario creó/modificó el registro
    ];

    // =================================================================
    //                       RELACIONES ELOQUENT
    // =================================================================

    /**
     * Define la relación uno a muchos: una Redip tiene muchos Estados.
     */
    public function estados()
    {
        // Laravel buscará la clave foránea 'redip_id' en la tabla 'estados'.
        return $this->hasMany(Estado::class);
    }

    /**
     * Opcional: Define la relación con el usuario que creó el registro.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}