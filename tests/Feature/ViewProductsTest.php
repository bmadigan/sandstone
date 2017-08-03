<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Company;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ViewProductsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_can_view_the_product_listings_index()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get('/products');

        $response->assertStatus(200);
    }

    /** @test */
    public function a_user_can_only_view_the_their_products_listings()
    {
        $userA = factory(User::class)->create();
        $userX = factory(User::class)->create();

        $productsA = factory(Product::class, 5)->create(['user_id' => $userA->id]);
        $productsX = factory(Product::class, 3)->create(['user_id' => $userX->id]);

        $response = $this->actingAs($userA)->get('/products');

        // get the view data (what is passed into the view from the Controller)
        $viewData = $this->getResponseData($response, 'products');

        $response->assertStatus(200);
        $this->assertCount(5, $viewData);
    }

    /** @test */
    public function a_guest_user_cannot_view_the_product_listings_index_page()
    {
        $this->withExceptionHandling();
        
        $response = $this->get('/products');

        $response->assertStatus(302);
    }
}
