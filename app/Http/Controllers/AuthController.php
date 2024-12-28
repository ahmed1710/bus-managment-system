<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
  public function register(Request $request)
  {
      $request->validate([
          'name' => 'required|string|max:255',
          'email' => 'required|email|unique:users',
          'password' => 'required|string|min:6',
      ]);

      $user = User::create([
          'name' => $request->name,
          'email' => $request->email,
          'password' => Hash::make($request->password),
      ]);

      $token = auth('api')->login($user);

      return response()->json([
          'message' => 'User registered successfully',
          'user' => $user,
          'token' => $token,
      ], 201);
  }


  public function login(Request $request)
  {
      $request->validate([
          'email' => 'required|email',
          'password' => 'required|string',
      ]);

      $credentials = $request->only('email', 'password');

      if (!$token = auth('api')->attempt($credentials)) {
          return response()->json(['error' => 'Unauthorized'], 401);
      }

      return response()->json([
          'message' => 'Login successful',
          'user' => auth('api')->user(),
          'token' => $token,
      ]);
  }

  public function profile()
{
    return response()->json(auth()->user());
}

  public function logout()
{
    auth()->logout();
    return response()->json(['message' => 'Successfully logged out']);
}



}
