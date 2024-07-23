<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserModel;

class UserController extends Controller
{
    public function index($request)
    {
    $userModel = new UserModel();

        if ($request->isMethod('post')) {
            $lists = $userModel->getDatatables($request);
            $data = [];
            $no = $request->input('start');

            foreach ($lists as $list) {
                $no++;
                $row = [];
                $row[] = $no;
                $row[] = $list->nama;
                $row[] = $list->email;
                $row[] = $list->telepon;
                $row[] = $list->alamat;
                $row[] = $list->jenis_pengguna;
                $row[] = $list->jenis_kelamin;
                $row[] = $list->tanggal_lahir;
                $row[] = '
                <button onClick="editLayanan(' . htmlspecialchars(json_encode($list), ENT_QUOTES, 'UTF-8') . ')" class="bg-primary focus:outline-none hover:bg-blue-700 text-white font-bold px-2 py-1 rounded">Edit</button>
                <button onClick="deleteLayanan(' . $list->id . ')" class="bg-danger mt-2 focus:outline-none hover:bg-red-700 text-white font-bold px-2 py-1  rounded">Hapus</button>';
                $data[] = $row;
            }

            $output = [
                'draw' => $request->input('draw'),
                'recordsTotal' => $userModel->countAll(),
                'recordsFiltered' => $userModel->countFiltered($request),
                'data' => $data,
            ];

            return response()->json($output);
        }
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
