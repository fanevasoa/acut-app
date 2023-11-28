<?php

namespace App\Livewire\Pages\Utils\Enums;

enum TypeRegroupementEnum: string
{
    case MESSE   = 'messe';
    case CELLULE_PRIERE  = 'cellule_priere';
    case PRIERE  = 'priere';
    case REUNION = 'reunion';

    public function toString(): string
    {
        return match ($this) {
            TypeRegroupementEnum::MESSE   => 'Messe',
            TypeRegroupementEnum::CELLULE_PRIERE  => 'Cellule de priere',
            TypeRegroupementEnum::PRIERE  => 'Priere',
            TypeRegroupementEnum::REUNION => 'Réunion',
        };
    }

    public static function toStringFrom(string $from): string
    {
        return match ($from) {
            'messe'   => 'Messe',
            'priere'  => 'Priere',
            'reunion' => 'Réunion',
            default   => 'Inconnu'
        };
    }
}
