<?php

namespace App\Livewire\Pages\Liturgie\GererLiturgie;

use App\Models\Regroupement;
use Livewire\Attributes\On;
use Livewire\Component;

class Index extends Component
{
    public array $liturgy;

    public function render()
    {
        return view('livewire.pages.liturgie.gerer-liturgie.index');
    }

    #[On('init-liturgy')]
    public function handleInitLiturgy($idRegroupement)
    {
        if ($idRegroupement) {
            $this->liturgy = Regroupement::where('id', '=', $idRegroupement)->first()?->toArray() ?? [];
        }
    }
}
