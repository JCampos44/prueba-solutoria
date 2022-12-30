<?php

namespace App\View\Components;

use App\Models\Indicador;
use Illuminate\View\Component;

class ListaIndicadores extends Component
{

    public $indicadores;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->indicadores = Indicador::orderBy('id', 'desc')->paginate(10);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.lista-indicadores');
    }
}
