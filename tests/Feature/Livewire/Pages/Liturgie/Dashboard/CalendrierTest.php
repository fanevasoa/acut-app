<?php

namespace Tests\Feature\Livewire\Pages\Liturgie\Dashboard;

use App\Livewire\Pages\Liturgie\Dashboard\Calendrier;
use Livewire\Livewire;
use Tests\TestCase;

class CalendrierTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(Calendrier::class)
            ->assertStatus(200);
    }
}
