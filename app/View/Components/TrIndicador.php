<?php

namespace App\View\Components;

use App\Models\Indicador;
use Illuminate\View\Component;

class TrIndicador extends Component
{

    /**
     * @var Indicador
     */
    public $indicador;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($indicador)
    {
        $this->indicador = $indicador;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.tr-indicador');
    }
}
