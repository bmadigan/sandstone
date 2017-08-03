<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Company;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EditProductsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_can_view_the_edit_page()
    {
        $user = factory(User::class)->create();
        $product = factory(Product::class)->create([
            'user_id' => $user->id
        ]);

        $response = $this->actingAs($user)->get("/products/{$product->id}/edit");

        $response->assertStatus(200);
    }

    /** @test */
    public function a_guest_user_cannot_view_the_edit_page()
    {
        $this->withExceptionHandling();
        
        $response = $this->get('/products/1/edit');

        $response->assertStatus(302);
    }

    /** @test */
    public function a_user_can_only_view_their_own_product_edit_page()
    {
        $this->withExceptionHandling();

        $userA = factory(User::class)->create();
        $userX = factory(User::class)->create();

        $productA = factory(Product::class)->create([
            'user_id' => $userA->id
        ]);

        $response = $this->actingAs($userX)->get("/products/{$productA->id}/edit");

        $response->assertStatus(404);
    }

    /** @test */
    public function a_user_can_delete_a_product()
    {
        $user = factory(User::class)->create();
        $product = factory(Product::class)->create([
            'user_id' => $user->id
        ]);

        $response = $this->actingAs($user)->delete("/products/{$product->id}");
        $response->assertRedirect('/products');

        $this->assertDatabaseMissing('products', $product->toArray());
    }

    /** @test */
    public function a_user_cannot_delete_another_users_product()
    {
        $this->withExceptionHandling();

        $userA = factory(User::class)->create();
        $userX = factory(User::class)->create();
        $productA = factory(Product::class)->create([
            'user_id' => $userA->id
        ]);

        $response = $this->actingAs($userX)->delete("/products/{$productA->id}");
        $response->assertStatus(404);

        $this->assertDatabaseHas('products', $productA->toArray());
    }
}
