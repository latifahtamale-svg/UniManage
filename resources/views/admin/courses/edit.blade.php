@extends('layouts.content')
@section('title', 'Edit course')

@section('content')
<div class="page-head">
    <h1>Edit course</h1>
    <a class="btn btn--outline" href="{{ route('courses.index') }}">Cancel</a>
</div>
<form class="card card--narrow form" method="POST" action="{{ route('courses.update', $course) }}">
        @csrf
        @method('PUT')
        <label for="code">Course code</label>
        <input id="code" name="code" type="text" class="form__input @error('code') is-invalid @enderror" value="{{ old('code', $course->code) }}">
        @error('code')
            <div class="form__error">{{ $message }}</div>
        @enderror
        <label for="title">Title</label>
        <input id="title" name="title" type="text" class="form__input @error('title') is-invalid @enderror" value="{{ old('title', $course->title) }}">
        @error('title')
            <div class="form__error">{{ $message }}</div>
        @enderror
        <label for="credits">Credits</label>
        <input id="credits" name="credits" type="number" class="form__input @error('credits') is-invalid @enderror" value="{{ old('credits', $course->credits) }}">
        @error('credits')
            <div class="form__error">{{ $message }}</div>
        @enderror
        <label for="lecturer_id">Lecturer</label>
        <select id="lecturer_id" name="lecturer_id" class="form__input @error('lecturer_id') is-invalid @enderror">
            <option value="">-- Select --</option>
            @foreach ($lecturers->pluck('name', 'id') as $id => $text)
                <option value="{{ $id }}" @selected(old('lecturer_id', $course->lecturer_id) == $id)>{{ $text }}</option>
            @endforeach
        </select>
        @error('lecturer_id')
            <div class="form__error">{{ $message }}</div>
        @enderror
        <div class="form__actions"><button class="btn" type="submit">Update course</button></div>
</form>
@endsection
