<?php
namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class StudentController extends Controller
{
    use AuthorizesRequests;
    
    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_code' => 'required|string|max:10',
            'course_name' => 'required|string|max:255',
            'credits' => 'required|integer|min:1',
            'grade' => 'nullable|string|max:2',
            'category' => 'required|string|max:100',
            'repeat' => 'required|boolean',
        ]);
 
        $student = new Student($request->all());
        $student->user_id = Auth::id();
        $student->save();
        return redirect()->route('students.index')
                         ->with('success', 'students created successfully.');
    }

    public function show(Student $student)
    {
        return view('students.index', compact('student'));
    }

    public function edit(Student $student)
    {
        $this->authorize('update', $student);

        return view('students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {

        $this->authorize('update', $student);

        $request->validate([
           'course_code' => 'required|string|max:10',
            'course_name' => 'required|string|max:255',
            'credits' => 'required|integer|min:1',
            'grade' => 'nullable|string|max:2',
            'category' => 'required|string|max:100',
            'repeat' => 'required|boolean',
        ]);
        $student->update($request->all());
        return redirect()->route('students.index')
                         ->with('success', 'students updated successfully.');
    }

    public function destroy(Student $student)
    {
        $this->authorize('update', $student);
        $student->delete();
        return redirect()->route('students.index')
                         ->with('success', 'students deleted successfully.');
    }
}