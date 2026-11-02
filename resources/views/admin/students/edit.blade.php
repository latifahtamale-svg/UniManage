@extends('layouts.content')
@section('title', 'Edit student')

@section('content')
<div class="page-head">
    <h1>Edit student</h1>
    <a class="btn btn--outline" href="{{ route('students.index') }}">Cancel</a>
</div>
<form class="card card--narrow form" method="POST" action="{{ route('students.update', $student) }}">
        @csrf
        @method('PUT')
        <label for="name">Full name</label>
        <input id="name" name="name" type="text" class="form__input @error('name') is-invalid @enderror" value="{{ old('name', $student->name) }}">
        @error('name')
            <div class="form__error">{{ $message }}</div>
        @enderror
        <label for="email">Email</label>
        <input id="email" name="email" type="email" class="form__input @error('email') is-invalid @enderror" value="{{ old('email', $student->email) }}">
        @error('email')
            <div class="form__error">{{ $message }}</div>
        @enderror
        <label for="reg_no">Registration number</label>
        <input id="reg_no" name="reg_no" type="text" class="form__input @error('reg_no') is-invalid @enderror" value="{{ old('reg_no', $student->reg_no) }}">
        @error('reg_no')
            <div class="form__error">{{ $message }}</div>
        @enderror
        <label for="programme">Programme</label>
        <input id="programme" name="programme" type="text" class="form__input @error('programme') is-invalid @enderror" value="{{ old('programme', $student->programme) }}">
        @error('programme')
            <div class="form__error">{{ $message }}</div>
        @enderror
        <div class="form__actions"><button class="btn" type="submit">Update student</button></div>
</form>
@endsection
