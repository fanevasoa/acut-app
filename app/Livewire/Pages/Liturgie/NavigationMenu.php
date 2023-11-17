<?php

namespace App\Livewire\Pages\Liturgie;

use Illuminate\Support\Facades\Lang;

class NavigationMenu extends \App\Livewire\NavigationMenu
{
    public function setMenus()
    {
        $this->menus= [
            [
                'label'     => Lang::get('liturgie.organisation-liturgie'),
                'routeName' => 'welcome',
            ],
        ];
    }
}
