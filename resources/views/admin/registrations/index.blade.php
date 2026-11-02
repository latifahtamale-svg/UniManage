@extends('layouts.content')
@section('title', 'Registrations')

@section('content')
<h1 class="mb-18">Registrations</h1>
<div class="grid grid--side">
    <form class="card form" method="POST" action="{{ route('registrations.store') }}">
        @csrf
        <strong>Register a student</strong>
        <label for="student_id">Student</label>
        <select id="student_id" name="student_id" class="form__input @error('student_id') is-invalid @enderror">
            <option value="">-- Select --</option>
            @foreach ($students->pluck('name', 'id') as $id => $text)
                <option value="{{ $id }}" @selected(old('student_id', null) == $id)>{{ $text }}</option>
            @endforeach
        </select>
        @error('student_id')
            <div class="form__error">{{ $message }}</div>
        @enderror
        <label for="course_id">Course</label>
        <select id="course_id" name="course_id" class="form__input @error('course_id') is-invalid @enderror">
            <option value="">-- Select --</option>
            @foreach ($courses->mapWithKeys(fn ($c) => [$c->id => $c->code . ' ' . $c->title]) as $id => $text)
                <option value="{{ $id }}" @selected(old('course_id', null) == $id)>{{ $text }}</option>
            @endforeach
        </select>
        @error('course_id')
            <div class="form__error">{{ $message }}</div>
        @enderror
        <button class="btn btn--block" type="submit">Register</button>
    </form>
    <div class="card">
        <table class="table">
            <tr><th>Student</th><th>Course</th><th>Date</th><th>Actions</th></tr>
            @forelse ($registrations as $registration)
                <tr>
                    <td>{{ $registration->student->name }}</td>
                    <td>{{ $registration->course->code }}</td>
                    <td>{{ $registration->created_at->format('j M Y') }}</td>
                    <td class="table__actions">
                        <a href="{{ route('registrations.edit', $registration) }}">Edit</a>
                        <a class="link-danger" href="#delete-{{ $registration->id }}">Remove</a>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4">No registrations yet.</td></tr>
            @endforelse
        </table>
    </div>
</div>
@endsection

@push('modals')
    @foreach ($registrations as $registration)
        <div class="modal" id="delete-{{ $registration->id }}">
            <div class="card modal__dialog" role="dialog" aria-label="Remove registration?">
                <h2>Remove registration?</h2>
                <div class="alert alert--error">Warning: this removes {{ $registration->student->name }} from {{ $registration->course->code }}. This cannot be undone.</div>
                <form class="modal__actions" method="POST" action="{{ route('registrations.destroy', $registration) }}">
                    @csrf
                    @method('DELETE')
                    <a class="btn btn--outline" href="#">Cancel</a>
                    <button class="btn btn--danger" type="submit">Yes, remove</button>
                </form>
            </div>
        </div>
    @endforeach
@endpush
