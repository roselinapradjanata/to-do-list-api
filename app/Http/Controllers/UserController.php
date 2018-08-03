<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public $successStatus = 200;
    public $errorStatus = 401;

    public function login()
    {
        if (Auth::attempt(['username' => request('username'), 'password' => request('password')])) {
            $user = Auth::user();
            $success['token'] = $user->createToken('gits-technical-test')->accessToken;
            return response()->json($success, $this->successStatus);
        } else {
            return response()->json(['error' => 'unauthorised'], $this->errorStatus);
        }
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:100',
            'password' => 'required|string|max:20',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], $this->errorStatus);
        }

        if (User::where('username', $request->input('username'))->exists()) {
            return response()->json(['error' => 'username already exists'], 409);
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] = $user->createToken('gits-technical-test')->accessToken;
        $success['username'] = $user->username;
        return response()->json($success, $this->successStatus);
    }

    public function details()
    {
        $user = Auth::user();
        return response()->json($user, $this->successStatus);
    }
}
