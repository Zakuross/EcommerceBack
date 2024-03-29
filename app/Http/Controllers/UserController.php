<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {

        $users = UserResource::collection(User::all());

        return response()->json([
            'users'=>$users
        ]);

    }

    public function show($id)
    {

        $users=new UserResource(User::find($id));

        return response()->json([
            'users'=>$users
        ]);

    }

    public function store(UserRequest $request)
    {

        $users = User::create($request->all());
        $users->save();

        return response()->json([
            'users'=>$users
        ]);

    }

    public function update($id, UserRequest $request)
    {

        $users=User::find($id);
        $users->update($request->safe()->except('email'));
        $users->save();

        return response()->json([
            'users'=>$users
        ]);

    }

    public function destroy($id)
    {

        $users = User::find($id);
        $users->delete();

        return response()->json([
            'users'=>$this->index()
        ]);


    }

}
