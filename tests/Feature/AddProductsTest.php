<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AddProductsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_can_view_the_add_page()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get('/products/create');

        $response->assertStatus(200);
    }

    /** @test */
    public function a_guest_user_cannot_view_the_add_form()
    {
        $this->withExceptionHandling();

        $response = $this->get('/products/create');

        $response->assertStatus(302);
    }

    /** @test */
    public function a_product_name_is_required()
    {
        $this->withExceptionHandling();
        
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->post('/products', [
            'product_name'          => null,
            'product_description'   => 'I am a description',
            'price'                 => 1000
        ]);

        $response->assertStatus(302);        
    }

    /** @test */
    public function a_product_price_is_required()
    {
        $this->withExceptionHandling();
        
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->post('/products', [
            'product_name'          => 'Sample Product',
            'product_description'   => 'I am a description',
            'price'                 => null
        ]);

        $response->assertStatus(302);        
    }

    /** @test */
    public function a_user_can_save_a_valid_product()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->post('/products', [
            'product_name'          => 'Sample Product',
            'product_description'   => 'I am a description',
            'price'                 => 1000
        ]);

        tap(product::first(), function ($product) use ($response) {
            $response->assertStatus(302);
            $response->assertRedirect("/products/{$product->id}");

            $this->assertEquals('Sample Product', $product->product_name);
            $this->assertEquals('I am a description', $product->product_description);
            $this->assertEquals('1000', $product->price);
        });
    }

}
