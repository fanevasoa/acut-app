<?php

namespace App\Livewire\Pages\Utils;

use App\Livewire\Pages\Liturgie\GererLiturgie\LtgForm;
use Livewire\Attributes\On;
use Livewire\Component;

class SongForm extends Component
{
    public int $maxChronoSong = 1;

    public $fields = [];

    public array $chronoOptions;

    public function mount()
    {
        $this->fillChronoOptions();
        $this->setDefaultChronology();
    }

    public function render()
    {
        return view('livewire.pages.utils.song-form');
    }

    #[On('add-song')]
    public function handleAddSong()
    {
        $this->maxChronoSong++;
        $this->fillChronoOptions();
        $this->setDefaultChronology();
    }

    #[On('remove-song')]
    public function handleRemoveSong($idSong)
    {
        unset($this->fields[$idSong]);
        $this->maxChronoSong--;
        $this->restoreDataKeys();
    }

    #[On('add-songs-in-program')]
    public function handleAddSongsInProgram($idProgram)
    {
        $this->dispatch('add-songs-fields-in-program', associatedChronology: $idProgram, songs: [...$this->fields])
            ->to(LtgForm::class);
    }

    public function changeSongsOrder($idx)
    {
        $storedField = $this->fields[$idx];
        unset($this->fields[$idx]);
        $i                = 0;
        $res              = [];
        $storedFieldAdded = false;

        foreach ($this->fields as $k => $field) {
            if ($i === $storedField['order'] - 1) {
                $res[$i] = $storedField;
                $i++;
                $storedFieldAdded = true;
            }
            $field['order'] = $i + 1;
            $res[$i]        = $field;

            $i++;

            if ($k === $this->maxChronoSong - 1 && !$storedFieldAdded) {
                $res[$i] = $storedField;
            }
        }
        $this->fields = $res;
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

    public function fillChronoOptions()
    {
        $this->chronoOptions = [];

        for ($co = $this->maxChronoSong; $co >= 1; $co--) {
            $this->chronoOptions[] = $co;
        }
    }

    public function setDefaultChronology(): void
    {
        $this->fields[$this->maxChronoSong - 1]['order'] = $this->maxChronoSong;
    }
}
