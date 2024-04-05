<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Http\Requests\ServiceRequest;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ServiceResource;
use Illuminate\Http\JsonResponse;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(): JsonResponse
    {
        $products = Product::orderBy('created_at', 'DESC')->get();
        return $products;

    }

    public function show($id): JsonResponse
    {
        $products = new ProductResource(Product::find($id));

        return response()->json([
            "products"=>$products
        ]);
    }

    public function store(ProductRequest $request): JsonResponse
    {
        $products = Product::create($request->all());
        $products = ServiceResource::make($products);

        return response()->json([
            'products'=>$products
        ]);
    }

    public function update($id, ProductRequest $request): JsonResponse
    {
        $products = Product::find($id);
        $products->update($request->all());
        $products->save();
        $products = ProductResource::make($products);

        return response()->json([
            'products'=>$products
        ]);
    }

    public function destroy($id): JsonResponse
    {
        $products = Product::find($id);
        $products->delete();

        return response()->json([
            'products'=>$products
        ]);
    }
}
