<?php

namespace App\Livewire\Pages\Liturgie\GererLiturgie;

use Livewire\Component;

class LtgForm extends Component
{
    public $fields = [
        'name'         => [],
        'song'         => [],
        'pages_number' => [],
    ];

    public int $maxChrono = 1;

    public function render()
    {
        return view('livewire.pages.liturgie.gerer-liturgie.ltg-form');
    }

    public function formHandler()
    {
        $this->saveLine();
    }

    public function incrementMaxChrono()
    {
        $this->maxChrono++;
    }

    public function decrementMaxChrono()
    {
        $this->maxChrono--;
    }

    public function saveLine()
    {
    }
}
