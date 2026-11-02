{{-- Each link is shown only if the user has the matching permission. --}}
<nav class="site-nav">
    @can('manage students')
        <a href="{{ route('students.index') }}" class="{{ request()->routeIs('students.*') ? 'is-active' : '' }}">Students</a>
    @endcan
    @can('manage courses')
        <a href="{{ route('courses.index') }}" class="{{ request()->routeIs('courses.*') ? 'is-active' : '' }}">Courses</a>
    @endcan
    @can('manage registrations')
        <a href="{{ route('registrations.index') }}" class="{{ request()->routeIs('registrations.*') ? 'is-active' : '' }}">Registrations</a>
    @endcan
    @can('manage lecturers')
        <a href="{{ route('lecturers.index') }}" class="{{ request()->routeIs('lecturers.*') ? 'is-active' : '' }}">Lecturers</a>
    @endcan
    @can('view assigned courses')
        <a href="{{ route('lecturer.courses') }}" class="{{ request()->routeIs('lecturer.courses') ? 'is-active' : '' }}">My Courses</a>
    @endcan
    @can('view available courses')
        <a href="{{ route('student.courses') }}" class="{{ request()->routeIs('student.courses') ? 'is-active' : '' }}">Available Courses</a>
    @endcan
    @can('view own registrations')
        <a href="{{ route('student.registrations') }}" class="{{ request()->routeIs('student.registrations') ? 'is-active' : '' }}">My Registrations</a>
    @endcan
</nav>
