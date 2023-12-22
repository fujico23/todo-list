<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    protected $fillable = ['category_id','content'];

    //リレーション記載(従テーブル→主テーブル)
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    //ローカルスコープ設定
    public function scopeCategorySearch($query, $category_id)
    {
        if(!empty($category_id))
        {
            $query->where('category_id', $category_id);
        }
    }

    public function scopeKeywordSearch($query, $keyword)
    {
        if(!empty($keyword))
        {
            $query->where('content', 'LIKE', '%'. $keyword . '%');
        }
    }

}

