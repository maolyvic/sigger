<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

// Si usas Soft Deletes para Parroquias, descomenta la siguiente línea y el 'use' de abajo.
// use Illuminate\Database\Eloquent\SoftDeletes;

class Parroquia extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'parroquias';

    protected $fillable = [
        'nombre',
        'municipio_id',
    ];

    // ==========================================================
    // =====>      AQUÍ ESTÁ LA RELACIÓN QUE FALTA         <=====
    // ==========================================================
    /**
     * Una Parroquia pertenece a un Municipio.
     */
    public function municipio()
    {
        // Eloquent buscará automáticamente una clave foránea llamada 'municipio_id'
        // en la tabla 'parroquias' para hacer la conexión.
        return $this->belongsTo(Municipio::class);
    }

    /**
     * Una Parroquia tiene muchos Sectores.
     */
    public function sectores()
    {
        return $this->hasMany(Sector::class);
    }
}