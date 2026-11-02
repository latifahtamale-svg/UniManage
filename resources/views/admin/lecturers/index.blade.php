@extends('layouts.content')
@section('title', 'Lecturers')

@section('content')
<div class="page-head">
    <h1>Lecturers</h1>
    <a class="btn" href="{{ route('lecturers.create') }}">Add lecturer</a>
</div>
<div class="card">
    <table class="table">
        <tr><th>Staff no.</th><th>Name</th><th>Email</th><th>Courses</th><th>Actions</th></tr>
        @forelse ($lecturers as $lecturer) 
            <tr>
                <td>{{ $lecturer->staff_no }}</td>
                <td>{{ $lecturer->name }}</td>
                <td>{{ $lecturer->email }}</td>
                <td>{{ $lecturer->courses->pluck('code')->join(', ') }}</td>
                <td class="table__actions">
                    <a href="{{ route('lecturers.edit', $lecturer) }}">Edit</a>
                    <a class="link-danger" href="#delete-{{ $lecturer->id }}">Delete</a>
                </td>
            </tr>
        @empty
            <tr><td colspan="5">No records found.</td></tr>
        @endforelse
    </table>
</div>
@endsection

@push('modals')
    @foreach ($lecturers as $lecturer)
        <div class="modal" id="delete-{{ $lecturer->id }}">
            <div class="card modal__dialog" role="dialog" aria-label="Delete lecturer?">
                <h2>Delete lecturer?</h2>
                <div class="alert alert--error">Warning: this permanently deletes {{ $lecturer->name }}. This cannot be undone.</div>
                <form class="modal__actions" method="POST" action="{{ route('lecturers.destroy', $lecturer) }}">
                    @csrf
                    @method('DELETE')
                    <a class="btn btn--outline" href="#">Cancel</a>
                    <button class="btn btn--danger" type="submit">Yes, delete lecturer</button>
                </form>
            </div>
        </div>
    @endforeach
@endpush
