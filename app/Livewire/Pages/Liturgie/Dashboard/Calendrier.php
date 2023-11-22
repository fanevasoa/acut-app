<?php

namespace App\Livewire\Pages\Liturgie\Dashboard;

use Carbon\Carbon;
use Livewire\Component;
use WireUi\Traits\Actions;

class Calendrier extends Component
{
    use Actions;

    public $days = [];

    public $filters = [
        'minDate' => null,
        'maxDate' => null,
    ];

    public $months = [
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

    public $colonnes = [];

    public function mount()
    {
        $this->filters['minDate'] = Carbon::now();
        $this->filters['maxDate'] = Carbon::now()->addYear();
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
        if (Carbon::make($this->filters['minDate'])->lt(Carbon::make($this->filters['maxDate']))) {
            $this->setColumHeaders();
            $d  = Carbon::make($this->filters['minDate']);
            $dt = [];

            while ($d->lte(Carbon::make($this->filters['maxDate']))) {
                $month        = $this->months[$d->month - 1] . ' ' . $d->year;
                $dt[$month][] = $d->format('d D');
                $d            = $d->copy()->addDay();
            }
            $this->days = $dt;
        } else {
            $this->notification()->error('Date fin doit être supérieure à la date de debut');
        }
    }

    private function setColumHeaders()
    {
        $startDate = Carbon::make($this->filters['minDate']);
        $endDate   = Carbon::make($this->filters['maxDate']);
        $yStart    = $startDate->year;
        $mEnd      = $endDate->month;
        $yEnd      = $endDate->year;
        $numYFin   = $mEnd + (12 * ($yEnd - $yStart));

        $res = [];

        for ($i = $startDate->month - 1, $y = $yStart; $i < $numYFin; $i++) {
            $monthNb = $i % 12;

            if ($monthNb === 0) {
                $y++;
            }
            $res[] = $this->months[$monthNb] . ' ' . $y;
        }
        $this->colonnes = $res;
    }
}
