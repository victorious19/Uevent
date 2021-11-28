<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    function register(Request $request) {
        $request->validate([
            'username' => 'required|string|unique:users,username|max:30',
            'password'=>'required|confirmed|min:8',
            'email'=>'required|string|unique:users,email|max:255',
            'full_name' => 'required'
        ]);
        $request['password'] = bcrypt($request['password']);
        unset($request["role"]);
        $user = User::create($request->all());
        $token = $user->createToken('uevent')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];
        return response($response, 201);
    }
    function login(Request $request)
    {
        $request->validate([
            'login' => 'required|string|max:30',
            'password'=>'required|string|min:8'
        ]);
        $auth = $request->only(['login', 'password']);
        if (empty($auth['login']) or empty($auth['password'])) {
            return response(['message' => "Empty fields"], 422);
        }
        $user = User::where('login', $auth['login'])->first();
        if (empty($user)) $user = User::where('email', $auth['login'])->first();
        if (empty($user) or !Hash::check($auth['password'], $user->password)) {
            return response(['message' => "Bad login or password"], 400);
        }
        $token = $user->createToken('uevent')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];
        return response($response, 201);
    }
}
