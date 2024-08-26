@include('layouts.header')

<div class="flex-grow-1 bg-gray-100">
    @include('layouts.navigation')

    <div class="container mt-4">
        <h1 class="mb-4">Students</h1>

        <!-- Button for creating a new student, visible only to authenticated users -->
        <x-authenticated-content>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
                <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#createStudentModal">
                    <i class="fa fa-plus"></i> Create New Student
                </button>
            </div>
        </x-authenticated-content>

        <!-- Success message after actions like create, edit, delete -->
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
        @endif

        <!-- Table to display students -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Course Code</th>
                    <th>Course Name</th>
                    <th>Credits</th>
                    <th>Grade</th>
                    <th>Category</th>
                    <th>Repeat</th>
                    <!-- Actions column visible only to authenticated users -->
                    <x-authenticated-content>
                        <th>Actions</th>
                    </x-authenticated-content>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                <tr>
                    <td>{{ $student->course_code }}</td>
                    <td>{{ $student->course_name }}</td>
                    <td>{{ $student->credits }}</td>
                    <td>{{ $student->grade }}</td>
                    <td>{{ $student->category }}</td>
                    <td>{{ $student->repeat ? 'Yes' : 'No' }}</td>
                    <x-authenticated-content>
                        <td>
                            <a href="{{ route('students.show', $student) }}" class="btn btn-info btn-sm">Show</a>

                            @can('update', $student)
                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                data-bs-target="#editStudentModal{{ $student->id }}">Edit</button>
                            @else
                            <button class="btn btn-warning btn-sm" disabled>Edit</button>
                            @endcan

                            @can('delete', $student)
                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                data-bs-target="#deleteStudentModal{{ $student->id }}">Delete</button>
                            @else
                            <button class="btn btn-danger btn-sm" disabled>Delete</button>
                            @endcan
                        </td>
                    </x-authenticated-content>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<x-authenticated-content>
    @include('students.create')
    @include('students.edit')
    @include('students.delete')
</x-authenticated-content>

@include('layouts.footer')