<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ErrorAlert extends Component
{
    /**
     * Los errores que se mostrarán.
     *
     * @var \Illuminate\Support\MessageBag
     */
    public $errors;

    /**
     * Crea una nueva instancia del componente.
     *
     * @param  \Illuminate\Support\MessageBag  $errors
     * @return void
     */
    public function __construct($errors)
    {
        $this->errors = $errors;
    }

    /**
     * Obtiene la vista / cadena de renderización del componente.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.error-alert');
    }
}
