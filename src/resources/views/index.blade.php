@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="todo__alert">
    <div class="todo__alert--success">
        Todoを作成しました
    </div>
</div>

<div class="todo__content">
    <!-- 新規作成 -->
    <form class="create-form">
        @csrf
        <div class="create-form__item">
            <input type="text" class="create-form__item-input">
        </div>
        <div class="create-form__button">
            <button class="create-form__button-submit">作成</button>
        </div>
    </form>

    <!-- Todoリスト -->
    <div class="todo-table">
        <table class="todo-table__inner">
            <tr class="todo-table__row">
                <th class="todo-table__header">Todo</th>
            </tr>
            <tr class="todo-table__row">
                <!-- 更新 -->
                <td class="todo-table__item">
                    <form action="" class="update-form">
                        @csrf
                        <div class="update-form__item">
                            <input type="text" class="update-form__item-input" value="test">
                        </div>
                        <div class="update-form__button">
                            <button class="update-form__button-submit">更新</button>
                        </div>
                    </form>
                </td>
                <!-- 削除 -->
                <td class="todo-table__item">
                    <form action="" class="delete-form">
                        @csrf
                        <div class="delete-form__button">
                            <button class="delete-form__button-submit">削除</button>
                        </div>
                    </form>
                </td>
            </tr>
        </table>
    </div>
</div>

@endsection