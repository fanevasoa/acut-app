<?php

namespace App\Livewire\Pages\Utils;

use App\Livewire\Pages\Liturgie\GererLiturgie\Index;
use App\Livewire\Pages\Utils\Enums\TypeRegroupementEnum;
use App\Models\Regroupement;
use Carbon\Carbon;
use Livewire\Component;
use WireUi\Traits\Actions;

class GroupmentForm extends Component
{
    use Actions;

    public int $idMeeting;

    public $fields = [
        'name'         => null,
        'theme'        => null,
        'date'         => null,
        'type'         => null,
        'introduction' => null,
    ];

    public array $listeTypeOptions;

    public function mount()
    {
        $this->listeTypeOptions= [
            [
                'label'=>TypeRegroupementEnum::MESSE->toString(),
                'value'=>TypeRegroupementEnum::MESSE->value
            ],
            [
                'label'=>TypeRegroupementEnum::CELLULE_PRIERE->toString(),
                'value'=>TypeRegroupementEnum::CELLULE_PRIERE->value
            ],
        ];
    }

    public function render()
    {
        return view('livewire.pages.utils.groupment-form');
    }

    public function formHandler()
    {
        $vd = $this->validate(...$this->validator())['fields'];

        $rgm = Regroupement::create([
            'theme'             => $vd['theme'],
            'nom'               => $vd['name'],
            'description'       => $vd['introduction'],
            'type_regroupement' => $vd['type'],
            'date_regroupement' => Carbon::make($vd['date']),
        ]);

        $this->notification()->success('Nouvel regroupement créé avec succès');
        $this->dispatch('init-liturgy', idRegroupement: $rgm->id)->to(Index::class);
    }

    public function validator(): array
    {
        $messages = [
            'fields.date.required'    => 'Date : champ requis',
            'fields.theme.required'   => 'Thème : champ requis',
            'fields.name.required'    => 'Nom : Champ requis',
            'fields.type.required'    => 'Nom : Champ requis',
            'fields.introduction.min' => 'Introduction : Champ insuffisant',
        ];
        $fieldNames = [];

        $rules = [
            'fields.date'         => 'required|date',
            'fields.theme'        => 'required|string|min:5|max:255',
            'fields.name'         => 'required|string|min:5|max:1000',
            'fields.type'         => 'required|string|min:5|max:1000',
            'fields.introduction' => 'nullable|string|min:5|max:2000',
        ];

        return [$rules, $messages, $fieldNames];
    }
}
