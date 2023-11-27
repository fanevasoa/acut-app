<?php

namespace Tests\Feature\Livewire\Pages\Components;

use App\Livewire\Pages\Utils\GroupmentForm;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
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
