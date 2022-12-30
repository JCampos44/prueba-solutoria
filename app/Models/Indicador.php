<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indicador extends Model
{
    use HasFactory;

    protected $table = 'indicadores';

    protected $fillable = [
        'nombreIndicador',
        'codigoIndicador',
        'unidadMedidaIndicador',
        'valorIndicador',
        'fechaIndicador',
        'origenIndicador'
    ];

    public $timestamps = false;
}
