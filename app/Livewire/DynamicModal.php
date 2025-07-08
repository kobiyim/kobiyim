<?php

namespace App\Livewire;

use Livewire\Component;

class DynamicModal extends Component
{
    public $isOpen = false;
    public $component = null;
    public $params = [];

    protected $listeners = [
        'openModal' => 'open',
        'closeModal' => 'close',
    ];

    public function open($component, $params = [])
    {
        $this->component = $component;
        $this->params = $params;
        $this->isOpen = true;
    }

    public function close()
    {
        $this->reset(['component', 'params', 'isOpen']);
    }

    public function render()
    {
        return view('components.partials.dynamic-modal');
    }
}
