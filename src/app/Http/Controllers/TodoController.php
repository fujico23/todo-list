<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Models\Todo;
use App\Models\Category;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**ページ一覧 */
    public function index()
    {
        //$todos = Todo::all();
        $todos = Todo::with('category')->get();
        $categories = Category::all();
        return view('index', compact('todos', 'categories'));
    }

    /**新規作成機能 */
    public function store(TodoRequest $request)
    {
        $todo = $request->only(['category_id','content']);
        Todo::create($todo);
        return redirect('/')->with('message', 'Todoを作成しました');
    }

    /**更新機能 */
    public function update(TodoRequest $request)
    {
        $todo = $request->only(['content']);
        Todo::find($request->id)->update($todo);
        return redirect('/')->with('message', 'Todoを更新しました');
    }

    /**削除機能 */
    public function destroy(Request $request)
    {
        Todo::find($request->id)->delete();
        return redirect('/')->with('message', 'Todoを削除しました');
    }

    //検索機能
    public function search(Request $request)
    {
        $todos = Todo::with('category')->CategorySearch($request->category_id)->keywordSearch($request->keyword)->get();
        $categories = Category::all();
        return view('index', compact('todos', 'categories'));

    }

}