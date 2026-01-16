@extends('layouts.app')

@section('title','Login Admin')

@section('content')
<div class="card" style="max-width:420px;margin:auto">
    <h2>Login Admin</h2>

    @if(session('error'))
        <p style="color:red">{{ session('error') }}</p>
    @endif

    <form method="POST" action="/login">
        @csrf
        <label>Email</label>
        <input type="email" name="email">

        <label>Password</label>
        <input type="password" name="password">

        <button type="submit">Login</button>
    </form>
</div>
@endsection
