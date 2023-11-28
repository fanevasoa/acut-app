<?php

namespace Tests\Feature\Livewire\Pages\Components;

use App\Livewire\Pages\Utils\GroupmentForm;
use Livewire\Livewire;
use Tests\TestCase;

class GroupmentFormTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(GroupmentForm::class)
            ->assertStatus(200);
    }
}
