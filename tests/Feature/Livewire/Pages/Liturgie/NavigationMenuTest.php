<?php

namespace Tests\Feature\Livewire\Pages\Liturgie;

use App\Livewire\Pages\Liturgie\NavigationMenu;
use Livewire\Livewire;
use Tests\TestCase;

class NavigationMenuTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(NavigationMenu::class)
            ->assertStatus(200);
    }
}
