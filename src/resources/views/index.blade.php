@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="todo__content">
    @if (session('success'))
    <div class="alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if ($errors->any())
    <div class="alert-error">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="todo-create">
        <form action="/todos" method="post" class="create-form">
            @csrf
            <input type="text" name="content" class="create-form__input">
            <button type="submit" class="btn-create">作成</button>
        </form>
    </div>

    <div class="todo__table">
        <table class="todo-table__inner">
            <tr class="todo-table__row">
                <th class="todo-table__header">Todo</th>
            </tr>

            @foreach ($todos as $todo)
            <tr class="todo-table__row">
                <td class="todo-table__item">
                    <form action="/todos/update" method="post" id="update-{{ $todo->id }}">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="id" value="{{ $todo->id }}">
                        <input type="text" name="content" value="{{ $todo->content }}" class="update-form__input">
                    </form>
                </td>
                        <td class="todo-table__button">
                            <button type="submit" form="update-form-{{ $todo->id }}" class="todo-table__button--update">更新</button>

                        <form action="/todos/delete" method="post" class="delete-form">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id" value="{{ $todo->id }}">
                            <button type="submit" class="todo-table__button--delete">削除</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection
