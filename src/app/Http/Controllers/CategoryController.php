<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    //一覧ページ
    public function index()
    {
        $categories = Category::all();
        return view ('category', compact('categories'));
    }

    //カテゴリ追加機能
    public function store(CategoryRequest $request)
    {
        $category = $request->only(['name']);
        Category::create($category);
        return redirect('/categories')->with('message', 'カテゴリーを作成しました');
    }

    //カテゴリ更新機能
    public function update(CategoryRequest $request)
    {
        $item = $request->only(['name']);
        Category::find($request->id)->update($item);
        return redirect('/categories')->with('message', 'カテゴリーを更新しました');
    }

    //カテゴリ削除機能
    public function destroy(Request $request)
    {
        Category::find($request->id)->delete();
        return redirect('/categories')->with('message', 'カテゴリーを削除しました');
    }
}
