<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    /**
     * Authenticate user
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        /** validating post data */
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string|min:8'
        ]);

        /**
         * get user
         *
         * @var \App\Models\User $user
         */
        $user = User::where('username', $request->get('username'))->first();

        if(!$user || !Hash::check($request->get('password'), $user->password)) {
            /** user not found */
            return [
                'status' => STATUS_ERROR,
                'message' => LOGIN_ERROR
            ];
        }


        /** user found and have correct password */
        $token = $user->createToken('app', [ROLES[(int) $user->role]]);

        return [
            'status' => STATUS_SUCCESS,
            'token' => $token->plainTextToken
        ];
    }

    /**
     * Revoking Tokens | logout
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    function logout(Request $request) {
        $request->user()->tokens()->delete();
        return true;
    }
}
