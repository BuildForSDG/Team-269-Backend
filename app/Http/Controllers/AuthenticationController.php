<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UpdateUserPasswordRequest;

class AuthenticationController extends Controller
{
    /**
     * Create a new AuthenticationController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('login');
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $credentials = request(['email', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['message' => 'Unauthenticated'], 401);
        }

        return response()->json(['token' => $token, 'user' => auth()->user()]);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function authUser()
    {
        return response()->json(auth()->user());
    }

    /**
     * Updates user profile
     * @return \Illuminate\Http\Response
     */
    public function resetPassword(UpdateUserPasswordRequest $request)
    {
        return response()->json([
            'message' => 'Password was updated successfully',
            'user' => tap($request->user())->update($request->only('password')),
        ]);
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        try {
            // user might be logged out
            auth()->logout();
        } catch (\Exception $e) {
        }

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return response()->json(['token' => auth()->refresh()]);
    }
}
