<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Company;
use App\Models\Contract;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AddContractsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_can_view_the_add_page()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get('/contracts/create');

        $response->assertStatus(200);
    }

    /** @test */
    public function a_guest_user_cannot_view_the_add_form()
    {
        $this->withExceptionHandling();

        $response = $this->get('/contracts/create');

        $response->assertStatus(302);
    }

    /** @test */
    public function all_contract_required_fields_must_be_created()
    {
        $this->withExceptionHandling();
        
        $user = factory(User::class)->create();
        $company = factory(Company::class)->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)->post('/contracts', [
            'buyer_id'          => $company->id,
            'contract_name'     => null,
            'contract_number'   => 'ID-123',
            'released_date'     => '2017-10-10',
            'released_weight'   => '100'
        ]);

        $response->assertStatus(302);        
    }

    /** @test */
    public function a_user_can_save_a_valid_contract()
    {
        $user = factory(User::class)->create();
        $company = factory(Company::class)->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)->post('/contracts', [
            'buyer_id'          => $company->id,
            'contract_name'     => 'Acme Corp.',
            'contract_number'   => 'ID-123',
            'released_date'     => '2017-10-10',
            'released_weight'   => '100'
        ]);

        tap(Contract::first(), function ($contract) use ($response, $company) {
            $response->assertStatus(302);
            $response->assertRedirect("/contracts/{$contract->id}");

            $this->assertEquals('Acme Corp.', $contract->contract_name);
            $this->assertEquals('ID-123', $contract->contract_number);
            $this->assertEquals($company->id, $contract->buyer_id);
            $this->assertEquals('2017-10-10', $contract->released_date);
            $this->assertEquals('100', $contract->released_weight);
        });
    }

}
