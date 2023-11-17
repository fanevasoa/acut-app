<?php

namespace Tests\Feature\Livewire\Pages\Admin\Chretien;

use App\Livewire\Pages\Admin\Chretien\Index;
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
