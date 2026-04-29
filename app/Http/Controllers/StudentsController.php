<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class StudentsController extends Controller
{
    public function index(Request $request)
    {
        $query = Students::query();

        // Use filled() to check if search is present and not empty
        if ($request->filled('search')) {
            $search = $request->input('search'); // Use input() instead of get()

            $query->where(function ($q) use ($search) {
                $q->where('student_id', 'LIKE', "%{$search}%")
                    ->orWhere('first_name', 'LIKE', "%{$search}%")
                    ->orWhere('last_name', 'LIKE', "%{$search}%")
                    ->orWhere('course', 'LIKE', "%{$search}%");
            });
        }

        $students = $query->latest()->get()->map(function ($student) {
            $student->qr = QrCode::size(80)->generate(json_encode([
                'ID' => $student->student_id,
                'Name' => $student->full_name,
                'Course' => $student->course,
                'Email' => $student->email
            ]));
            return $student;
        });

        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'student_id' => 'required|unique:students',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:students',
            'phone' => 'required',
            'course' => 'required',
            'gender' => 'required',
            'birthdate' => 'required',
            'year_level' => 'required',
            'photo' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('photo')) {
            // Store the file and get the path
            $path = $request->file('photo')->store('students', 'public');
            $data['photo'] = $path; // Ensure this matches your database column name
        }

        Students::create($data);
        return redirect()->route('students.index')->with('success', 'Student Created!');
    }

    public function show(Students $student)
    {
        $qr = QrCode::size(250)->generate(json_encode([
            'ID' => $student->student_id,
            'Name' => $student->full_name,
            'Course' => $student->course,
            'Email' => $student->email
        ]));
        return view('students.show', compact('student', 'qr'));
    }

    public function edit(Students $student)
    {
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, Students $student)
    {
        $request->validate([
            'student_id' => 'required|unique:students,student_id,' . $student->id,
            'first_name' => 'required',
            'last_name'  => 'required',
            'email'      => 'required|email|unique:students,email,' . $student->id,
            'phone'      => 'required',
            'course'     => 'required',
            'gender'     => 'required',
            'birthdate'  => 'required',
            'year_level' => 'required',
        ]);

        $data = $request->except(['_token', '_method']);

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('students', 'public');
        } else {
            unset($data['photo']); // keep old photo if no new one uploaded
        }

        $student->update($data);
        return redirect()->route('students.index')->with('success', 'Student updated.');
    }

    public function destroy(Students $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student removed.');
    }
}