<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    public function loginAction(Request $request)
    {
        $credential = $request->only('email', 'password');
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:5',

        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'errors' => $validator->errors()], 422);
        }
        if (!Auth::attempt($credential)) {
            return response()->json(['status' => 'error', 'message' => 'Invalid credentials'], 401);
        }

        // generate token pakai sanctum atau jwt
        // token diambil dari auth()->user();, atau v
        $user = Auth::user();
        $token = $user->createToken('api_token')->plainTextToken;
        return response()->json(['status' => 'success', 'user' => $user, 'token' => $token]);
    }

    public function me()
    {
        return response()->json(['status' => 'success', 'data' => Auth::user()]);
    }

    public function getUsers()
    {
        $users = User::get();
        return response()->json(['data' => $users]);
    }

    public function editUser($id)
    {
        $user = User::findOrFail($id);
        return response()->json(['status' => 'success', 'message' => 'Request Success', 'data' => $user]);
    }

    public function storeUser(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6',

            ]);
            if ($validator->fails()) {
                return response()->json(['status' => 'error', 'errors' => $validator->errors()], 422);
            }
            $users = User::create($request->all());
            return response()->json(['data' => $users, 'message' => 'Request Success'], 201);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'error', 'message' => 'Request Failed', 'errors' => $th->getMessage()], 500);
            //throw $th;
        }
    }

    public function updateUser(Request $request, $id)
    {
        try {
            $user = User::findOrFail($id);
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'nullable|min:6',

            ]);
            if ($validator->fails()) {
                return response()->json(['status' => 'error', 'errors' => $validator->errors()], 422);
            }
            $user->name = $request->name;
            $user->email = $request->email;

            if ($request->filled('password')) {
                $user->password = Hash::make($request->password);
            }
            $user->save();
            return response()->json(['status ' => 'success', 'message' => 'Request Update Success', 'data' => $user]);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'error', 'message' => 'Request Failed', 'errors' => $th->getMessage()], 500);
        }
    }

    public function deleteUser($id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();
            return response()->json(['status' => 'success', 'message' => 'Request Delete Success']);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'error', 'message' => 'Request Failed', 'error' => $th->getMessage()], 500);
        }
    }
}
