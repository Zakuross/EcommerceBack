<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Order $orders): JsonResponse
    {
        $orders = OrderResource::collection($orders::all());

        return response()->json([
            'orders'=>$orders
        ]);
    }

    public function show($id): JsonResponse
    {
        $orders = Order::find($id);
        $orders = OrderResource::make($orders);

        return response()->json([
            'orders'=>$orders
        ]);
    }

    public function store(OrderRequest $request): JsonResponse
    {
        $orders = Order::create($request->safe()->except('products'));
        $orders = OrderResource::make($orders);

        return response()->json([
            'orders'=>$orders
        ]);
    }

    public function update($id, OrderRequest $request): JsonResponse
    {
        $orders = Order::find($id);
        $orders->update($request->all());
        $orders->save();
        $orders = OrderResource::make($orders);

        return response()->json([
            'orders'=>$orders
        ]);

    }

    public function destroy($id): JsonResponse
    {
        $orders = Order::find($id);
        $orders->delete();

        return response()->json([
            'orders'=>$orders
        ]);

    }
}
