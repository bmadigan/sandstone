<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * product index page
     *
     * @return void
     */
    public function index()
    {
        return view('products.index', [
            'products' => Auth::user()->products()->orderBy('product_name')->get()
        ]);
    }

    public function show($id)
    {
        $product = Auth::user()->products()->findOrFail($id);

        return view('products.show', [
            'product' => $product,
        ]);
    }

    /**
     * Display the create form
     *
     * @return void
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Create and Save the product
     *
     * @return void
     */
    public function store()
    {
        request()->validate([
            'product_name' => ['required', 'max:150'],
            'price' => ['required', 'numeric'],
        ]);

        $product = Auth::user()->products()->create(request([
            'product_name',
            'product_description',
            'price'
        ]));

        return redirect("/products/{$product->id}");
    }

    public function edit($id)
    {
        $product = Auth::user()->products()->findOrFail($id);

        return view('products.edit', [
            'product' => $product,
        ]);
    }

    public function update($id)
    {
        $product = Auth::user()->products()->findOrFail($id);

        request()->validate([
            'product_name' => ['required', 'max:150'],
            'price' => ['required', 'numeric']
        ]);

        $product->update(request([
            'product_name',
            'product_description',
            'price'
        ]));

        return redirect("/products/{$product->id}");
    }

    public function destroy($id)
    {
        $product = Auth::user()->products()->findOrFail($id);

        $product->delete();

        return redirect("/products");
    }
}
