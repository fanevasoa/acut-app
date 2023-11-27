<?php

namespace Tests\Feature\Livewire\Pages\Liturgie\GererLiturgie\Components;

use App\Livewire\Pages\Utils\ParoleForm;
use Livewire\Livewire;
use Tests\TestCase;

class ParoleFormTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(ParoleForm::class)
            ->assertStatus(200);
    }
}
