<?php

namespace Tests\Feature\Livewire\Pages\Admin;

use App\Livewire\Pages\Admin\NavigationMenu;
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
