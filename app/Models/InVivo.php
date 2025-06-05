<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InVivo extends Model
{
    protected $table = 'in_vivo';

    protected $fillable = [
        'reconocimiento_medico',
        'toxicologico',
        'diagnostico_mental',
        'odontologia',
        'antropologia',
        'radiologia_forense',
        'vagino_rectal',
        'fijaciones_fotograficas',
        'huellas_mordeduras',
        'examen_histologico',
        'examen_citologico',
    
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
        return url('/admin/in_vivo/'.$this->getKey());
    }
    
}
