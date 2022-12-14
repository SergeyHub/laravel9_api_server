<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        // All Product
        $products = Product::all();

        // Return Json Response
        return response()->json([
            'products' => $products
        ], 200);
    }

    public function store(ProductRequest $request)
    {
        //$products = Product::all();
        try {

            // Create Product
            $product = Product::create([
                'name' => $request->name,
                'description' => $request->description
            ]);

            // Return Json Response
            return response()->json([
                'status' => true,
                'message' => "Product successfully created.",
                'product' => $product
            ], 200);
        } catch (\Exception $e) {
            // Return Json Response
            return response()->json([
                'message' => "Something went really wrong!"
            ], 500);
        }
    }

    public function show($id)
    {
        // Product Detail
        $product = Product::find($id);
        if (!$product) {
            return response()->json([
                'message' => 'Product № = ' . $id . ' Not Found.'
            ], 404);
        }

        // Return Json Response
        return response()->json([
            'product' => $product
        ], 200);
    }

    public function update(ProductRequest $request, $id)
    {
        try {
             // Find Product Detail
            $product = Product::find($id);

            if (!$product) {
                return response()->json([
                    'message' => 'Product № = ' . $id . ' Not Found.',
                 ], 404);
            }
            $product->update($request->all());

            return response()->json([
                'status' => true,
                'message' => 'Product № = '.$id.'  Updated Successfully',
                'product' => $product
            ], 200);

        } catch (\Exception $e) {
            // Return Json Response
            return response()->json([
                'message' => "Something went really wrong!"
            ], 500);
        }
    }

    public function destroy($id)
    {
        // Detail
        $product = Product::find($id);
        if (!$product) {
            return response()->json([
                'message' => 'Product Not Found.'
            ], 404);
        }

        // Delete Product
        $product->delete();

        // Return Json Response
        return response()->json([
            'message' => "Product № " . $id . " successfully deleted."
        ], 200);
    }

}
