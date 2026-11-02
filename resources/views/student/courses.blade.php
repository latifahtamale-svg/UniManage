@extends('layouts.content')
@section('title', 'Available courses')

@section('content')
<h1 class="mb-18">Available courses</h1>
<div class="grid grid--3">
    @foreach ($courses as $course)
        <article class="card course-card">
            <span class="badge">{{ $course->code }}</span>
            <h3>{{ $course->title }}</h3>
            <div class="text-muted">Lecturer: {{ $course->lecturer->name ?? '-' }}</div>
            @if (in_array($course->id, $registeredIds))
                <span class="badge">Registered</span>
            @else
                <form method="POST" action="{{ route('student.register', $course) }}">
                    @csrf
                    <button class="btn" type="submit">Register</button>
                </form>
            @endif
        </article>
    @endforeach
</div>
@endsection
