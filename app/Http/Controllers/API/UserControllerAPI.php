<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserControllerAPI extends Controller
{
    public function index()
    {
        $user = User::orderBy('id', 'ASC')->paginate(10);
        if ($user) {
            return response()->json(['user' => $user]);
        } else {
            return response()->json(['message' => 'Failed Get User']);
        }
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'username' => 'required|unique:users,username',
            'nama_lengkap' => 'required',
            'email' => 'required|unique:users,email',
            'no_hp' => 'required|numeric|min:11',
            'status' => 'required',
            'level' => 'required|in:admin,user',
            'blokir' => 'required|in:Y,N',
            'password' => 'required',
        ], [
            'username.required' => 'Username Should be filled',
            'username.unique' => 'Username has Duplicate entry',
            'nama_lengkap.required' => 'Nama Lengkap Should be filled',
            'email.required' => 'Email Should be filled',
            'email.unique' => 'Email has Duplicate entry',
            'no_hp.required' => 'Number Phone Should be filled',
            'no_hp.numeric' => 'Number Phone Must be Number',
            'no_hp.min' => 'Number Phone min 11 number',
            'status.required' => 'Status Should be filled',
            'level.required' => 'Level Should be filled',
            'level.in' => 'Level Selection is not match, enum: admin, user',
            'blokir.required' => 'Blokir Should be filled',
            'blokir.in' => 'Blokir Selection is not match, enum: Y,N',
            'password.required' => 'Password Should be filled',

        ]);

        $data['password'] = bcrypt($data['password']);
        if (User::create($data)) {
            return response()->json(['message' => 'Success Create New User']);
        } else {
            return response()->json(['message' => 'Failed Create New User']);
        }
    }

    public function show(User $user)
    {
        if ($user) {
            return response()->json(['data' => $user]);
        } else {
            return response()->json(['message' => 'Failed Show User']);
        }
    }

    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'username' => 'required',
            'nama_lengkap' => 'required',
            'email' => 'required',
            'no_hp' => 'required|numeric|min:11',
            'status' => 'required',
            'level' => 'required|in:admin,user',
            'blokir' => 'required|in:Y,N',
            'password' => 'required',
        ], [
            'username.required' => 'Username Should be filled',
            'nama_lengkap.required' => 'Nama Lengkap Should be filled',
            'email.required' => 'Email Should be filled',
            'no_hp.required' => 'Number Phone Should be filled',
            'no_hp.numeric' => 'Number Phone Must be Number',
            'no_hp.min' => 'Number Phone min 11 number',
            'status.required' => 'Status Should be filled',
            'level.required' => 'Level Should be filled',
            'level.in' => 'Level Selection is not match, enum: admin, user',
            'blokir.required' => 'Blokir Should be filled',
            'blokir.in' => 'Blokir Selection is not match, enum: Y,N',
            'password.required' => 'Password Should be filled',

        ]);

        $data['password'] = bcrypt($data['password']);
        if (User::find($user->id)->update($data)) {
            return response()->json(['message' => 'Success Update User']);
        } else {
            return response()->json(['message' => 'Failed Update User']);
        }
    }

    public function destroy(User $user)
    {
        if (User::destroy($user->id)) {
            return response()->json(['message' => 'Success Delete User']);
        }
        return response()->json(['message' => 'Failed Delete User']);
    }
}
