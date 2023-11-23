<?php

namespace Tests\Feature\Livewire\Pages\Liturgie\GererLiturgie;

use App\Livewire\Pages\Liturgie\GererLiturgie\LtgForm;
use Livewire\Livewire;
use Tests\TestCase;

class LtgFormTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(LtgForm::class)
            ->assertStatus(200);
    }
}
