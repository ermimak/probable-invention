<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::orderBy("created_at","desc")->paginate(10);
        return view("welcome", compact("todos"));
    }
    public function store(Request $request)
    {
    $attr = $request->validate([
        "title" => "require",
        "description" => "nullable"
    ]);

    $todo = Todo::create([$attr]);
    $todo->save();
    return redirect('/');
    }

    public function update(Todo $todo)
    {
        $todo -> update(['isDone'=>True]);
    }
}
