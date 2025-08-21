<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Invivo extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'in_vivo';

    protected $fillable = ['reconocimiento_medico', 'toxicologico', 'diagnostico_mental', 'odontologia', 'antropologia', 'radiologia_forense', 'vagino_rectal', 'fijaciones_fotograficas', 'huellas_mordeduras', 'examen_histologico', 'examen_citologico', 'user_id'];
}
