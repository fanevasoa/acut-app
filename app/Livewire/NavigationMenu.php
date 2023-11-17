<?php

namespace App\Livewire;

use Livewire\Component;

class NavigationMenu extends Component
{
    public array $menus = [];

    public function mount()
    {
        $this->setMenus();
    }

    public function render()
    {
        return view('navigation-menu');
    }

    public function setMenus()
    {
        $this->menus = [];
    }
}
