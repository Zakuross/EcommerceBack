<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceRequest;
use App\Http\Resources\ServiceResource;
use App\Models\Service;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(): JsonResponse
    {
        $services = ServiceResource::collection(Service::all());

        return response()->json([
            'services' => $services
        ]);
    }

    public function show($id)
    {
        $services = Service::find($id);
        $services = ServiceResource::make($services);

        return response()->json([
            'services'=>$services
        ]);
    }

    public function store(ServiceRequest $request)
    {
        $services = Service::create($request->all());

        $services = ServiceResource::make($services);

        return response()->json([
            'services'=>$services
        ]);
    }

    public function update($id, ServiceRequest $request)
    {
        $services = Service::find($id);
        $services->update($request->all());
        $services->save();
        $services = ServiceResource::make($services);

        return response()->json([
            'services'=>$services
        ]);
    }

    public function destroy($id)
    {
        $services = Service::find($id);
        $services->delete();

        return response()->json([
            'services'=>$services
        ]);
    }
}
