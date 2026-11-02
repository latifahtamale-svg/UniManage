@extends('layouts.content')
@section('title', 'Courses')

@section('content')
<div class="page-head">
    <h1>Courses</h1>
    <a class="btn" href="{{ route('courses.create') }}">Add course</a>
</div>
<div class="card">
    <table class="table">
        <tr><th>Code</th><th>Title</th><th>Lecturer</th><th>Credits</th><th>Actions</th></tr>
        @forelse ($courses as $course) 
            <tr>
                <td>{{ $course->code }}</td>
                <td>{{ $course->title }}</td>
                <td>{{ $course->lecturer->name ?? '-' }}</td>
                <td>{{ $course->credits }}</td>
                <td class="table__actions">
                    <a href="{{ route('courses.edit', $course) }}">Edit</a>
                    <a class="link-danger" href="#delete-{{ $course->id }}">Delete</a>
                </td>
            </tr>
        @empty
            <tr><td colspan="5">No records found.</td></tr>
        @endforelse
    </table>
</div>
@endsection

@push('modals')
    @foreach ($courses as $course)
        <div class="modal" id="delete-{{ $course->id }}">
            <div class="card modal__dialog" role="dialog" aria-label="Delete course?">
                <h2>Delete course?</h2>
                <div class="alert alert--error">Warning: this permanently deletes {{ $course->code }} {{ $course->title }} and all student registrations for it. This cannot be undone.</div>
                <form class="modal__actions" method="POST" action="{{ route('courses.destroy', $course) }}">
                    @csrf
                    @method('DELETE')
                    <a class="btn btn--outline" href="#">Cancel</a>
                    <button class="btn btn--danger" type="submit">Yes, delete course</button>
                </form>
            </div>
        </div>
    @endforeach
@endpush
