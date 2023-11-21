<?php

namespace App\Livewire\Pages\Liturgie\Dashboard;

use Carbon\Carbon;
use Livewire\Component;

class Calendrier extends Component
{
    public $days = [];

    public $filters=[
        'minDate'=>null,
        'maxDate'=>null,
    ];
    public $colonnes = [
        'Janvier',
        'Fevrier',
        'Mars',
        'Avril',
        'Mey',
        'Juin',
        'Juillet',
        'Aout',
        'Septembre',
        'Octobre',
        'Novembre',
        'Decembre',
    ];

    public function mount()
    {
        $this->filters['minDate']  = Carbon::now();
        $this->filters['maxDate']  = Carbon::now()->addYear();
        $this->setListeDate();
    }

    public function updated()
    {
        $this->setListeDate();
    }

    public function render()
    {
        return view('livewire.pages.liturgie.dashboard.calendrier');
    }

    public function setListeDate()
    {
        $d=Carbon::make($this->filters['minDate']);
        $dt = [];

        while ($d->lt(Carbon::make($this->filters['maxDate']))) {
            $month        = $d->month;
            $dt[$month][] = $d->format('d D');
            $d            = $d->copy()->addDay();
        }
        $this->days = $dt;
    }
}
