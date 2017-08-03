<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Company;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AddCompaniesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_can_view_the_add_page()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get('/companies/create');

        $response->assertStatus(200);
    }

    /** @test */
    public function a_guest_user_cannot_view_the_add_form()
    {
        $this->withExceptionHandling();

        $response = $this->get('/companies/create');

        $response->assertStatus(302);
    }

    /** @test */
    public function all_company_required_fields_must_be_created()
    {
        $this->withExceptionHandling();
        
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->post('/companies', [
            'company_name'          => null,
            'street_address'        => '123 Main Street',
            'secondary_address'     => 'ABC Suite',
            'city'                  => 'Sault',
            'state'                 => 'MI',
            'country'               => 'US',
            'zipcode'               => '90210',
            'contact_name'          => 'John Smith',
            'contact_email'         => 'john@email.com'
        ]);

        $response->assertStatus(302);        
    }

    /** @test */
    public function a_user_can_save_a_valid_company()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->post('/companies', [
            'company_name'          => 'Acme Corp',
            'street_address'        => '123 Main Street',
            'secondary_address'     => 'ABC Suite',
            'city'                  => 'Sault',
            'state'                 => 'MI',
            'country'               => 'US',
            'zipcode'               => '90210',
            'contact_name'          => 'John Smith',
            'contact_email'         => 'john@email.com'
        ]);

        tap(Company::first(), function ($company) use ($response) {
            $response->assertStatus(302);
            $response->assertRedirect("/companies/{$company->id}");

            $this->assertEquals('Acme Corp', $company->company_name);
            $this->assertEquals('123 Main Street', $company->street_address);
            $this->assertEquals('ABC Suite', $company->secondary_address);
            $this->assertEquals('Sault', $company->city);
            $this->assertEquals('MI', $company->state);
            $this->assertEquals('US', $company->country);
            $this->assertEquals('90210', $company->zipcode);
            $this->assertEquals('John Smith', $company->contact_name);
            $this->assertEquals('john@email.com', $company->contact_email);
        });
    }

}
