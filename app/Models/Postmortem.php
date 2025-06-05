<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Postmortem extends Model
{
    protected $table = 'postmortem';

    protected $fillable = [
        'certificaciones_causa_natural',
        'toxicologico',
        'protocolos_autopsia',
        'autopsias_realizadas',
        'odontologia',
        'antropologia',
        'radiologia_forense',
        'vagino_rectal',
        'fijaciones_fotograficas',
        'huellas_mordeduras',
        'evidencias_colectadas',
        'examen_histologico',
        'examen_citologico',
        'protocolos_autopsia_animal',
        'crematorio',
        'triaje_lopnna',
        'botanicas_evidencias_biologica',
        'quimicas_evidencia_biologica',
        'quimicos_botanica_evidencia_biologica',
    
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
        return url('/admin/postmortem/'.$this->getKey());
    }
}
