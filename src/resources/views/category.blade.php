@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/category.css') }}">
@endsection

@section('content')
<div class="category__content">
    @if (session('message'))
    <div class="alert-success">
        {{ session('message') }}
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

    <div class="category-create">
        <form class="create-form" action="/categories" method="post">
            @csrf
            <div class="create-form__item">
                <input class="create-form__input" type="text" name="name" value="{{ old('name') }}">
            </div>
            <button class="btn-create" type="submit">作成</button>
        </form>
    </div>

    <div class="category-table">
        <table class="category-table__inner">
            <tr class="category-table__row">
                <th class="category-table__header">category</th>
            </tr>
            @foreach ($categories as $category)
            <tr class="category-table__row">
                <td class="category-table__item">

                    <form class="update-form" action="/categories/update" method="post">
                        @method('PATCH')
                        @csrf
                        <input class="update-form__input" type="text" name="name" value="{{ $category['name'] }}">
                        <input type="hidden" name="id" value="{{ $category['id'] }}">
                </td>
                <td class="category-table__button">
                        <div class="button-group">
                            <button class="category-table__button--update" type="submit">更新</button>
                    </form>

                    <form class="delete-form" action="/categories/delete" method="post">
                        @method('DELETE')
                        @csrf
                        <input type="hidden" name="id" value="{{ $category['id'] }}">
                        <button class="category-table__button--delete" type="submit">削除</button>
                    </form>
                        </div>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection
