<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Http\Requests\TodoRequest;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all();

        return view('index', compact('todos'));
    }

    public function store(TodoRequest $request)
    {
        $todo = $request->only(['content']);
        Todo::create($todo);

        return redirect('/')->with('success', 'Todoを作成しました');
    }

    public function update(TodoRequest $request)
    {
        $todoData = $request->only(['content']);
        Todo::find($request->id)->update($todoData);

        return redirect('/')->with('success', 'Todoを更新しました');
    }

    public function destroy(Request $request)
    {
        Todo::find($request->id)->delete();

        return redirect('/')->with('success', 'Todoを削除しました');
    }

}
