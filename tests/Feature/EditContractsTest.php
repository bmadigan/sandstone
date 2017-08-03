<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Company;
use App\Models\Contract;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EditContractsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_can_view_the_edit_page()
    {
        $user = factory(User::class)->create();
        $contract = factory(Contract::class)->create([
            'user_id' => $user->id
        ]);

        $response = $this->actingAs($user)->get("/contracts/{$contract->id}/edit");

        $response->assertStatus(200);
    }

    /** @test */
    public function a_guest_user_cannot_view_the_edit_page()
    {
        $this->withExceptionHandling();
        
        $response = $this->get('/contracts/1/edit');

        $response->assertStatus(302);
    }

    /** @test */
    public function a_user_can_only_view_their_own_contract_edit_page()
    {
        $this->withExceptionHandling();

        $userA = factory(User::class)->create();
        $userX = factory(User::class)->create();

        $contractA = factory(Contract::class)->create([
            'user_id' => $userA->id
        ]);

        $response = $this->actingAs($userX)->get("/contracts/{$contractA->id}/edit");

        $response->assertStatus(404);
    }

    /** @test */
    public function a_user_can_delete_a_contract()
    {
        $user = factory(User::class)->create();
        $contract = factory(Contract::class)->create([
            'user_id' => $user->id
        ]);

        $response = $this->actingAs($user)->delete("/contracts/{$contract->id}");
        $response->assertRedirect('/contracts');

        $this->assertDatabaseMissing('contracts', $contract->toArray());
    }

    /** @test */
    public function a_user_cannot_delete_another_users_contract()
    {
        $this->withExceptionHandling();

        $userA = factory(User::class)->create();
        $userX = factory(User::class)->create();
        $contractA = factory(Contract::class)->create([
            'user_id' => $userA->id
        ]);

        $response = $this->actingAs($userX)->delete("/contracts/{$contractA->id}");
        $response->assertStatus(404);

        $this->assertDatabaseHas('contracts', $contractA->toArray());
    }
}
