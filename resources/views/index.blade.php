@extends('layouts.content')
@section('title', 'Login')

@section('content')
<div class="card card--auth form">
    <h1>Sign in</h1>
    <p class="text-muted">Use your university account.</p>
    <form method="POST" action="{{ route('login.attempt') }}">
        @csrf
        <label for="email">Email</label>
        <input id="email" name="email" type="email" class="form__input @error('email') is-invalid @enderror" value="{{ old('email', '') }}">
        @error('email')
            <div class="form__error">{{ $message }}</div>
        @enderror
        <label for="password">Password</label>
        <input id="password" name="password" type="password" class="form__input @error('password') is-invalid @enderror" value="">
        @error('password')
            <div class="form__error">{{ $message }}</div>
        @enderror
        <label class="form__check"><input type="checkbox" name="remember"> Remember me</label>
        <button class="btn btn--block" type="submit">Log in</button>
    </form>
</div>
@endsection
