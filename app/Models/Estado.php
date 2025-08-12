<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 

class Estado extends Model
{
    use HasFactory, SoftDeletes; 

    /**
     * La tabla asociada con el modelo.
     *
     * @var string
     */
    protected $table = 'estados';

    /**
     * Los atributos que se pueden asignar en masa.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'codigo',
        'nombre',
        'redip_id',
        'user_id',
    ];

    // =================================================================
    // RELACIONES
    // =================================================================

    /**
     * Un Estado pertenece a una Redip.
     */
    public function redip()
    {
        return $this->belongsTo(Redip::class);
    }

    /**
     * Un Estado tiene muchos Municipios.
     */
    public function municipios()
    {
        return $this->hasMany(Municipio::class);
    }
    
    /**
     * Un Estado fue creado/modificado por un Usuario.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}