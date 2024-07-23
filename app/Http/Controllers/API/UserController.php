<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class UserController extends Controller
{
    public function index(Request $request)
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
                        <button onClick="editPengguna(' . $list->id . ')" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></button>';
                $data[] = $row;
            }

            $output = [
                'draw' => $request->input('draw'),
                'recordsTotal' => $userModel->countAll(),
                'recordsFiltered' => $userModel->countFiltered($request),
                'data' => $data,
            ];

            return Response::json($output);
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
        return response()->json('User created!', 200);
    }

    public function show($id)
    {
        return response()->json(UserModel::find($id), 200);
    }

    public function update(Request $request, $id)
    {

        // $validated = $request->validate([
        //     'name' => 'sometimes|required|string|max:255',
        //     'description' => 'nullable|string',
        //     'price' => 'sometimes|required|numeric',
        //     'stock' => 'sometimes|required|integer',
        // ]);

        // $user = UserModel::find($id);

        // if ($user) {
        //     $user->update($validated);
        //     return response()->json($user, 200);
        // } else {
        //     return response()->json(['message' => 'Customer not found'], 404);
        // }
        $data = [
            'msg' => 'Update Success',
            'status' => 202,
        ];
        return response()->json($data, 404);
    }

    public function destroy($id)
    {
        $user = UserModel::find($id);

        if ($user) {
            $user->delete();
            return response()->json(null, 204);
        } else {
            return response()->json(['message' => 'Customer not found'], 404);
        }
    }
}
