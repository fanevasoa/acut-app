<?php

namespace App\Livewire\Pages\Liturgie\GererLiturgie;

use App\Livewire\Pages\Utils\SongForm;
use Livewire\Attributes\On;
use Livewire\Component;

class LtgForm extends Component
{
    public $fields = [];

    public $optionList = [
        [
            'label' => 'Chant',
            'value' => 'chant',
        ],
        [
            'label' => 'Parole',
            'value' => 'parole',
        ],
    ];

    public int $maxChrono = 1;

    public array $maxChronoSong = [];

    public function mount()
    {
        $this->setFormStructure();
    }

    public function render()
    {
        return view('livewire.pages.liturgie.gerer-liturgie.ltg-form');
    }

    #[On('add-songs-fields-in-program')]
    public function handleAddSongFields($associatedChronology, array $songs)
    {
        $this->fields[$associatedChronology]['songs'] = $songs;
    }

    public function formHandler($programChronology)
    {
        $this->dispatch('add-songs-in-program', idProgram: $programChronology)->to(SongForm::class);
        $this->saveLine();
    }

    public function insertProgrammeSession($idx)
    {
        $this->maxChrono++;
        $this->moveUpData($idx);
        $this->fields[max($idx, 0)] = [
            'name'  => null,
            'type'  => null,
            'songs' => [],
        ];
    }

    public function removeProgrammeSession($idx)
    {
        unset($this->fields[$idx]);
        $this->maxChrono--;
        $this->restoreDataKeys();
    }

    public function incrementMaxChronoSong($id)
    {
        $this->maxChronoSong[$id]++;
    }

    public function decrementMaxChronoSong($id)
    {
        $this->maxChronoSong[$id]--;
    }

    public function saveLine()
    {
    }

    public function setFormStructure(): void
    {
        for ($ch = 0; $ch < $this->maxChrono; $ch++) {
            $this->fields[$ch] = [
                'name'  => null,
                'type'  => null,
                'songs' => [],
            ];
            $this->maxChronoSong[$ch] = 1;
        }
    }

    public function moveUpData($idx)
    {
        for ($i = $this->maxChrono; $i > $idx; $i--) {
            $this->fields[max($i - 1, 0)] = $this->fields[max($i - 2, 0)] ?? [
                'name'  => null,
                'type'  => null,
                'songs' => [],
            ];
            $this->maxChronoSong[$i - 1] = 1;
        }
    }

    public function restoreDataKeys()
    {
        $i   = 0;
        $res = [];

        foreach ($this->fields as $field) {
            $res[$i] = $field;
            $i++;
        }
        $this->fields = $res;
    }
}
