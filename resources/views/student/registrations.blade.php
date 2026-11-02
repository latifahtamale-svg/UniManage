@extends('layouts.content')
@section('title', 'My registrations')

@section('content')
<h1>My registrations</h1>
<p class="text-muted">You can only see your own registrations.</p>
<div class="card">
    <table class="table">
        <tr><th>Code</th><th>Course</th><th>Lecturer</th><th>Registered on</th></tr>
        @forelse ($registrations as $registration)
            <tr>
                <td>{{ $registration->course->code }}</td>
                <td>{{ $registration->course->title }}</td>
                <td>{{ $registration->course->lecturer->name ?? '-' }}</td>
                <td>{{ $registration->created_at->format('j M Y') }}</td>
            </tr>
        @empty
            <tr><td colspan="4">You have not registered for any course yet.</td></tr>
        @endforelse
    </table>
</div>
@endsection
