<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    //リレーション記述(主テーブル→従テーブル)
    public function todos()
    {
        return $this->hasMany('Todo::class');
    }

}