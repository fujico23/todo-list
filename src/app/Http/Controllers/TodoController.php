<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use App\Http\Requests\TodoRequest;

class TodoController extends Controller
{
    //Todo一覧表示
    public function index()
    {
        $todos = Todo::all();
        return view('index', compact('todos'));
    }

    //Todo新規作成
    public function store()
    {

    }

    //Todo更新
    public function update()
    {

    }

    //Todo削除
    public function destroy()
    {

    }
}
