<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Company;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EditCompaniesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_can_view_the_edit_page()
    {
        $user = factory(User::class)->create();
        $company = factory(Company::class)->create([
            'user_id' => $user->id
        ]);

        $response = $this->actingAs($user)->get("/companies/{$company->id}/edit");

        $response->assertStatus(200);
    }

    /** @test */
    public function a_guest_user_cannot_view_the_edit_page()
    {
        $this->withExceptionHandling();
        
        $response = $this->get('/companies/1/edit');

        $response->assertStatus(302);
    }

    /** @test */
    public function a_user_can_only_view_their_own_company_edit_page()
    {
        $this->withExceptionHandling();

        $userA = factory(User::class)->create();
        $userX = factory(User::class)->create();

        $companyA = factory(Company::class)->create([
            'user_id' => $userA->id
        ]);

        $response = $this->actingAs($userX)->get("/companies/{$companyA->id}/edit");

        $response->assertStatus(404);
    }

    /** @test */
    public function a_user_can_delete_a_company()
    {
        $user = factory(User::class)->create();
        $company = factory(Company::class)->create([
            'user_id' => $user->id
        ]);

        $response = $this->actingAs($user)->delete("/companies/{$company->id}");
        $response->assertRedirect('/companies');

        $this->assertDatabaseMissing('companies', $company->toArray());
    }

    /** @test */
    public function a_user_cannot_delete_another_users_company()
    {
        $this->withExceptionHandling();

        $userA = factory(User::class)->create();
        $userX = factory(User::class)->create();
        $companyA = factory(Company::class)->create([
            'user_id' => $userA->id
        ]);

        $response = $this->actingAs($userX)->delete("/companies/{$companyA->id}");
        $response->assertStatus(404);

        $this->assertDatabaseHas('companies', $companyA->toArray());
    }
}
