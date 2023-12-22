<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    //一覧表示
    public function index()
    {
        $categories = Category::all();
        return view('category', compact('categories'));
    }

    //カテゴリー追加機能
    public function store(CategoryRequest $request)
    {
        $category = $request->only(['name']);
        Category::create($category);
        return redirect('/categories')->with('message', 'カテゴリーを作成しました');
    }
    
    //カテゴリー更新機能
    public function update(CategoryRequest $request)
    {
        $category = $request->only(['name']);
        Category::find($request->id)->update($category);
        return redirect('/categories')->with('message', 'カテゴリーを更新しました');
    }

    //カテゴリー削除機能
    public function destroy(Request $request)
    {
        Category::find($request->category_id)->delete();
        return redirect('/categories')->with('message', 'カテゴリーを削除しました');
    }


}
