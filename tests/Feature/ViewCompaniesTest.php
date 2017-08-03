<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Company;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ViewCompaniesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_can_view_the_company_listings_index()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get('/companies');

        $response->assertStatus(200);
    }

    /** @test */
    public function a_user_can_only_view_the_their_companies_listings()
    {
        $userA = factory(User::class)->create();
        $userX = factory(User::class)->create();

        $companiesA = factory(Company::class, 5)->create(['user_id' => $userA->id]);
        $companiesX = factory(Company::class, 3)->create(['user_id' => $userX->id]);

        $response = $this->actingAs($userA)->get('/companies');

        // get the view data (what is passed into the view from the Controller)
        $viewData = $this->getResponseData($response, 'companies');

        $response->assertStatus(200);
        $this->assertCount(5, $viewData);
    }

    /** @test */
    public function a_guest_user_cannot_view_the_company_listings_index_page()
    {
        $this->withExceptionHandling();
        
        $response = $this->get('/companies');

        $response->assertStatus(302);
    }
}
