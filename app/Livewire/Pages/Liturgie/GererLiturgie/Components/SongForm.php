<?php

namespace App\Livewire\Pages\Liturgie\GererLiturgie\Components;

use Livewire\Component;

class SongForm extends Component
{
    public $fields = [
        'song'        => null,
        'page_number' => null,
    ];

    public function render()
    {
        return view('livewire.pages.liturgie.gerer-liturgie.components.song-form');
    }
}
