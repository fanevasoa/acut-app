<?php

namespace Tests\Feature\Livewire\Pages\Liturgie\GererLiturgie\Components;

use App\Livewire\Pages\Utils\SongForm;
use Livewire\Livewire;
use Tests\TestCase;

class SongFormTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(SongForm::class)
            ->assertStatus(200);
    }
}
