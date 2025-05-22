<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = collect(range(1, 20))->map(function ($i) {
            return (object)[
                'id' => $i,
                'name' => "Product $i",
                'description' => "Description for product $i",
                'price' => rand(100, 1000),
            ];
        });
        return view('products.list', compact('products'));
    }

    public function create()
    {
        return view('products.form');
    }

    public function edit($id)
    {
        $product = (object)[
            'id' => $id,
            'name' => "Product $id",
            'description' => "Description for product $id",
            'price' => rand(100, 1000),
        ];
        return view('products.form', compact('product'));
    }

    public function store(Request $request)
    {
        return redirect()->route('products');
    }

    public function update(Request $request, $id)
    {
        return redirect()->route('products');
    }

    public function show($id)
    {
        $product = (object)[
            'id' => $id,
            'name' => "Product $id",
            'description' => "Description for product $id",
            'price' => rand(100, 1000),
        ];
        return view('products.show', compact('product'));
    }
}
