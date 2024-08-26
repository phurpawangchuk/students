<div class="container mt-4">
    <div class="card shadow rounded-lg bg-white">
        <div class="card-body">
            <table class="table-responsive">
                <thead>
                    <tr>
                        <th class="text-center">Course Code</th>
                        <th class="text-center">Course Name</th>
                        <th class="text-center">Credits</th>
                        <th class="text-center">Grade</th>
                        <th class="text-center">Category</th>
                        <th class="text-center">Repeat</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                    <tr>
                        <td class="text-center">{{ $student->course_code }}</td>
                        <td class="text-center">{{ $student->course_name }}</td>
                        <td class="text-center">{{ $student->credits }}</td>
                        <td class="text-center">{{ $student->grade }}</td>
                        <td class="text-center">{{ $student->category }}</td>
                        <td class="text-center">{{ $student->repeat ? 'Yes' : 'No' }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>