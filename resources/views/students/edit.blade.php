<!-- resources/views/Students/edit-modal.blade.php -->
@foreach ($students as $student)
<x-modal modalId="editStudentModal{{ $student->id }}" modalTitle="Edit Student" formAction="true"
    formId="editStudentForm{{ $student->id }}">
    <form id="editStudentForm{{ $student->id }}" action="{{ route('students.update', $student) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="modal-body">
            <div class="mb-3">
                <label for="course_code{{ $student->id }}" class="form-label">Course Code</label>
                <input type="text" name="course_code" class="form-control" id="course_code{{ $student->id }}"
                    value="{{ $student->course_code }}" required>
            </div>
            <div class="mb-3">
                <label for="course_name{{ $student->id }}" class="form-label">Course Name</label>
                <input type="text" name="course_name" class="form-control" id="course_name{{ $student->id }}"
                    value="{{ $student->course_name }}" required>
            </div>
            <div class="mb-3">
                <label for="credits{{ $student->id }}" class="form-label">Credits</label>
                <input type="number" name="credits" class="form-control" id="credits{{ $student->id }}"
                    value="{{ $student->credits }}" required min="1">
            </div>
            <div class="mb-3">
                <label for="grade{{ $student->id }}" class="form-label">Grade</label>
                <input type="text" name="grade" class="form-control" id="grade{{ $student->id }}"
                    value="{{ $student->grade }}">
            </div>
            <div class="mb-3">
                <label for="category{{ $student->id }}" class="form-label">Category</label>
                <input type="text" name="category" class="form-control" id="category{{ $student->id }}"
                    value="{{ $student->category }}" required>
            </div>
            <div class="mb-3">
                <label for="repeat{{ $student->id }}" class="form-label">Repeat</label>
                <select name="repeat" class="form-select" id="repeat{{ $student->id }}" required>
                    <option value="1" {{ $student->repeat ? 'selected' : '' }}>Yes</option>
                    <option value="0" {{ !$student->repeat ? 'selected' : '' }}>No</option>
                </select>
            </div>
        </div>
        <input type="hidden" name="user_id" value="{{ $student->user_id }}">
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
    </div>
    </form>
</x-modal>
@endforeach