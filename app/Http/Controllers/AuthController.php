<?php

namespace App\Http\Controllers;

use App\enums\Gender;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Nette\Utils\Random;

/**
 * @tags User
 */
class AuthController extends Controller
{

    /**
     * @operationId Login
     * @unauthenticated
     *
     * Login
     *
     * Login with a email and password and get a token
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = Random::generate(64);
            $user->update([
                'api_token' => $token,
            ]);
            return response()
                ->json([
                    'token' => $token
                ]);
        } else {
            return response()
                ->json([
                    'error' => 'Invalid username or password'
                ], 401);
        }
    }

    /**
     * @operationId Register
     * @unauthenticated
     *
     * Register
     *
     * Register a new user and get a token
     */
    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'password_confirm' => 'required|same:password',
            'email' => 'required|email',
            'age' => 'required|numeric',
            'gender' => ['required', Rule::enum(Gender::class)]
        ]);
        $credentials = $request->only('email', 'password', 'password_confirm', 'username', 'age', 'gender');

        $user = User::create([
            'username' => $credentials['username'],
            'email' => $credentials['email'],
            'api_token' => Random::generate(64),
            'password' => Hash::make($credentials['password']),
            'age' => $credentials['age'],
            'gender' => $credentials['gender']
        ]);

        if ($user){
            return response()->json([
                'message' => "$user->username registered successfully",
                'token' => $user->api_token,
            ]);
        }
        return response()->json([
            'message' => "Registration failed",
        ], 500);
    }

    /**
     * @operationId Get User
     * @response array{user: User}
     *
     * Get User
     *
     * Get info about the current user
     */
    public function me(Request $request)
    {
        /** @var User $user */
        $user = $request->get('user');
        return response()
            ->json([
                'user' => $user
            ]);
    }

    /**
     * @operationId Update User
     *
     * Update User
     *
     * Update info about the current user
     */
    public function update(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'email' => 'required|email',
            'age' => 'required|numeric',
            'gender' => ['required', Rule::enum(Gender::class)],
            'beer_limit' => 'nullable|numeric',
            'password' => ['nullable', 'required_with:password_confirm'],
            'password_confirm' => ['nullable', 'required_with:password', 'same:password'],
        ]);
        /** @var User $user */
        $user = $request->get('user');
        $data = $request->only('username', 'email', 'age', 'gender');

        $user->update($data);
        if($request->has('password')){
            $user->update([
                'password' => Hash::make($request->get('password')),
            ]);
        }
        if($request->has('beer_limit')){
            $user->setNewBeerLimit($request->get('beer_limit'), 1);
        }

        return response()->json([
            'message' => "$user->username updated successfully",
        ]);
    }

    /**
     * @operationId Delete User
     *
     * Delete User
     *
     * Delete the current user
     */
    public function delete(Request $request)
    {
        /** @var User $user */
        $user = $request->get('user');
        try {
            $user->delete();
            return response()->json([
                'message' => "$user->username deleted successfully",
            ]);
        }catch (\Exception $e){
            return response()->json([
                'message' => "Failed to delete $user->username",
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * @operationId Delete Token
     *
     * Delete Token
     *
     * Delete the current user's Token
     */
    public function deleteToken(Request $request)
    {
        /** @var User $user */
        $user = $request->get('user');
        try {
            $user->update([
                'api_token' => null,
            ]);
            return response()->json([
                'message' => "Token deleted successfully",
            ]);
        }catch (\Exception $e){
            return response()->json([
                'message' => "Failed to delete $user->username's Token",
                'error' => $e->getMessage(),
            ], 500);
        }
    }


}
