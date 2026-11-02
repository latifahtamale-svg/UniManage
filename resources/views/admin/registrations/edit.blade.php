@extends('layouts.content')
@section('title', 'Edit registration')

@section('content')
<div class="page-head">
    <h1>Edit registration</h1>
    <a class="btn btn--outline" href="{{ route('registrations.index') }}">Cancel</a>
</div>
<form class="card card--narrow form" method="POST" action="{{ route('registrations.update', $registration) }}">
        @csrf
        @method('PUT')
        <label for="student">Student</label>
        <input id="student" class="form__input" value="{{ $registration->student->name }} ({{ $registration->student->reg_no }})" disabled>
        <label for="course_id">Course</label>
        <select id="course_id" name="course_id" class="form__input @error('course_id') is-invalid @enderror">
            <option value="">-- Select --</option>
            @foreach ($courses->mapWithKeys(fn ($c) => [$c->id => $c->code . ' ' . $c->title]) as $id => $text)
                <option value="{{ $id }}" @selected(old('course_id', $registration->course_id) == $id)>{{ $text }}</option>
            @endforeach
        </select>
        @error('course_id')
            <div class="form__error">{{ $message }}</div>
        @enderror
        <div class="form__actions"><button class="btn" type="submit">Update registration</button></div>
</form>
@endsection
