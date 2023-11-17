<?php

namespace Tests\Feature\Livewire\Pages\Liturgie\Dashboard;

use App\Livewire\Pages\Liturgie\Dashboard\Index;
use Livewire\Livewire;
use Tests\TestCase;

class IndexTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(Index::class)
            ->assertStatus(200);
    }
}
