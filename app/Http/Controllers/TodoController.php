<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TodoController extends Controller
{
    public $successStatus = 200;
    public $errorStatus = 404;

    public function index(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $todos = $user->todos();

        foreach ($request->query() as $key => $value) {
            if ($key == 'sort') {
                foreach (explode(',', $value) as $sortValue) {
                    $sortValueAttributes = explode(':', $sortValue);
                    $todos = $todos->orderBy($sortValueAttributes[0], count($sortValueAttributes) > 1 ? $sortValueAttributes[1] : "asc");
                }
            } else {
                $todos = $todos->where($key, $value);
            }
        }

        return response()->json($todos->get(), $this->successStatus);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:500',
            'priority' => 'required|integer|digits_between:0,2',
            'location' => 'required|string|max:273',
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

        if (!$todo->first()) return response()->json(['error' => 'not found'], $this->errorStatus);

        return response()->json($todo->first(), $this->successStatus);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:500',
            'priority' => 'required|integer|digits_between:0,2',
            'location' => 'required|string|max:273',
            'timestart' => 'required|date_format:Y-m-d H:i:s',
            'completed' => 'boolean',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], $this->errorStatus);
        }

        $user = User::find(Auth::user()->id);
        $todo = $user->todos()->where('id', $id);

        if ($todo->first()) $todo->update($request->all());
        else return response()->json(['error' => 'not found'], $this->errorStatus);

        return response()->json($todo->first(), $this->successStatus);
    }

    public function destroy($id)
    {
        $user = User::find(Auth::user()->id);
        $todo = $user->todos()->where('id', $id);

        if ($todo->first()) $todo->delete();
        else return response()->json(['error' => 'not found'], $this->errorStatus);

        return response()->json("success", $this->successStatus);
    }
}
