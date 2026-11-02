@extends('layouts.content')
@section('title', 'My courses')

@section('content')
<h1>My courses</h1>
<p class="text-muted">Read-only view of your assigned courses and their registered students.</p>
<div class="grid grid--2">
    @forelse ($courses as $course)
        <section class="card">
            <div class="row-between">
                <strong>{{ $course->code }} &middot; {{ $course->title }}</strong>
                <span class="badge">{{ $course->students->count() }} students</span>
            </div>
            <table class="table">
                <tr><th>Reg. no.</th><th>Name</th><th>Email</th></tr>
                @forelse ($course->students as $student)
                    <tr><td>{{ $student->reg_no }}</td><td>{{ $student->name }}</td><td>{{ $student->email }}</td></tr>
                @empty
                    <tr><td colspan="3">No students registered yet.</td></tr>
                @endforelse
            </table>
        </section>
    @empty
        <p>No courses have been assigned to you.</p>
    @endforelse
</div>
@endsection
