@extends('layouts.content')
@section('title', 'Students')

@section('content')
<div class="page-head">
    <h1>Students</h1>
    <a class="btn" href="{{ route('students.create') }}">Add student</a>
</div>
<div class="card">
    <table class="table">
        <tr><th>Reg. no.</th><th>Name</th><th>Email</th><th>Programme</th><th>Actions</th></tr>
        @forelse ($students as $student) 
            <tr>
                <td>{{ $student->reg_no }}</td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->email }}</td>
                <td>{{ $student->programme }}</td>
                <td class="table__actions">
                    <a href="{{ route('students.edit', $student) }}">Edit</a>
                    <a class="link-danger" href="#delete-{{ $student->id }}">Delete</a>
                </td>
            </tr>
        @empty
            <tr><td colspan="5">No records found.</td></tr>
        @endforelse
    </table>
    <p class="pagination">Showing {{ $students->firstItem() ?? 0 }}-{{ $students->lastItem() ?? 0 }} of {{ $students->total() }}</p>
    {{ $students->links() }}
</div>
@endsection

@push('modals')
    @foreach ($students as $student)
        <div class="modal" id="delete-{{ $student->id }}">
            <div class="card modal__dialog" role="dialog" aria-label="Delete student?">
                <h2>Delete student?</h2>
                <div class="alert alert--error">Warning: this permanently deletes {{ $student->name }} and all of their course registrations. This cannot be undone.</div>
                <form class="modal__actions" method="POST" action="{{ route('students.destroy', $student) }}">
                    @csrf
                    @method('DELETE')
                    <a class="btn btn--outline" href="#">Cancel</a>
                    <button class="btn btn--danger" type="submit">Yes, delete student</button>
                </form>
            </div>
        </div>
    @endforeach
@endpush
