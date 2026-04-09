@extends('layouts.app')

@section('content')
<div class="mypage__inner">
    <h1>マイページ</h1>
    <p>こんにちは、{{ $user->name }} さん！</p>
</div>
@endsection
