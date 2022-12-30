<?php

namespace App\View\Components;

use App\Models\Indicador;
use Illuminate\View\Component;

class FormCreateIndicador extends Component
{
    /**
     * @var Indicador
     */
    public $indicadores;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->indicadores = Indicador::select(['nombreIndicador', 'codigoIndicador', 'unidadMedidaIndicador'])
            ->distinct()
            ->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form-create-indicador');
    }
}
