<?php

namespace Tests\Feature\Livewire\Pages\Liturgie\GererLiturgie;

use App\Livewire\Pages\Liturgie\GererLiturgie\Index;
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