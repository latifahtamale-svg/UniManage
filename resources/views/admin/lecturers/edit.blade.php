@extends('layouts.content')
@section('title', 'Edit lecturer')

@section('content')
<div class="page-head">
    <h1>Edit lecturer</h1>
    <a class="btn btn--outline" href="{{ route('lecturers.index') }}">Cancel</a>
</div>
<form class="card card--narrow form" method="POST" action="{{ route('lecturers.update', $lecturer) }}">
        @csrf
        @method('PUT')
        <label for="name">Full name</label>
        <input id="name" name="name" type="text" class="form__input @error('name') is-invalid @enderror" value="{{ old('name', $lecturer->name) }}">
        @error('name')
            <div class="form__error">{{ $message }}</div>
        @enderror
        <label for="email">Email</label>
        <input id="email" name="email" type="email" class="form__input @error('email') is-invalid @enderror" value="{{ old('email', $lecturer->email) }}">
        @error('email')
            <div class="form__error">{{ $message }}</div>
        @enderror
        <label for="staff_no">Staff number</label>
        <input id="staff_no" name="staff_no" type="text" class="form__input @error('staff_no') is-invalid @enderror" value="{{ old('staff_no', $lecturer->staff_no) }}">
        @error('staff_no')
            <div class="form__error">{{ $message }}</div>
        @enderror
        <div class="form__actions"><button class="btn" type="submit">Update lecturer</button></div>
</form>
@endsection
