<?php

namespace App\View\Components;

use App\Models\Indicador;
use Illuminate\View\Component;

class FormGrafico extends Component
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
        $this->indicadores = Indicador::select(['nombreIndicador', 'codigoIndicador'])
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
        return view('components.form-grafico');
    }
}
