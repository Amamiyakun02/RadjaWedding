<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserModel;

class UserController extends Controller
{
    public function index()
    {
        return response()->json(UserModel::all(), 200);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',

        ]);

        UserModel::create($request->all());
        return response()->json('User created!',200);
    }

    public function show($id)
    {
        return response()->json(UserModel::find($id),200);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'sometimes|required|numeric',
            'stock' => 'sometimes|required|integer',
        ]);

        $user = UserModel::find($id);

        if ($user) {
            $user->update($validated);
            return response()->json($user, 200);
        } else {
            return response()->json(['message' => 'Customer not found'], 404);
        }
    }

    public function destroy($id){
             $user = UserModel::find($id);

        if ($user) {
            $user->delete();
            return response()->json(null, 204);
        } else {
            return response()->json(['message' => 'Customer not found'], 404);
        }
    }
}
