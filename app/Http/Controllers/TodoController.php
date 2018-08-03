<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TodoController extends Controller
{
    public $successStatus = 200;
    public $errorStatus = 401;

    public function index()
    {
        $user = User::find(Auth::user()->id);
        $todos = $user->todos()->get();
        return response()->json($todos, $this->successStatus);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'priority' => 'required|integer|digits_between:0,2',
            'location' => 'required|string',
            'timestart' => 'required|date_format:Y-m-d H:i:s',
            'completed' => 'boolean',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], $this->errorStatus);
        }

        $user = User::find(Auth::user()->id);
        $todo = $user->todos()->create($request->all());
        return response()->json($todo, $this->successStatus);
    }

    public function show($id)
    {
        $user = User::find(Auth::user()->id);
        $todo = $user->todos()->where('id', $id);
        return response()->json($todo->first(), $this->successStatus);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'priority' => 'required|integer|digits_between:0,2',
            'location' => 'required|string',
            'timestart' => 'required|date_format:Y-m-d H:i:s',
            'completed' => 'boolean',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], $this->errorStatus);
        }

        $user = User::find(Auth::user()->id);
        $todo = $user->todos()->where('id', $id);
        $todo->update($request->all());
        return response()->json($todo->first(), $this->successStatus);
    }

    public function destroy($id)
    {
        $user = User::find(Auth::user()->id);
        $todo = $user->todos()->where('id', $id);
        $todo->delete();
        return response()->json("success", $this->successStatus);
    }
}
