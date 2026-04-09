<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Todo;
use App\Http\Requests\TodoRequest;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::with('category')->get();
        $categories = Category::all();
        return view('index', compact('todos', 'categories'));
    }

    public function store(TodoRequest $request)
    {
        $todo = $request->only(['category_id','content']);
        Todo::create($todo);

        return redirect('/')->with('message', 'Todoを作成しました');
    }

    public function update(TodoRequest $request)
    {
        $todoData = $request->only(['content']);
        Todo::find($request->id)->update($todoData);

        return redirect('/')->with('message', 'Todoを更新しました');
    }

    public function destroy(Request $request)
    {
        Todo::find($request->id)->delete();

        return redirect('/')->with('message', 'Todoを削除しました');
    }

    public function search(Request $request)
    {

        $query = Todo::with('category');
        if ($request->keyword) {
        $query->where('content',  $request->keyword);
        }
        if ($request->category_id) {
        $query->where('category_id', $request->category_id);
        }
        $todos = $query->get();
        $categories = Category::all();

        return view('index', compact('todos', 'categories'));
    }
}
