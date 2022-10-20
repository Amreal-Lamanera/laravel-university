<?php

namespace App\Http\Controllers\Admin;

use App\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::orderBy('registration_number', 'desc')->limit(50)->get();

        return view('admin.students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $params = $request->validate([
            'name' => 'required|max:255',
            'surname' => ['required', 'max:255'],
            'email' => 'required|email|distinct',
            'date_of_birth' => 'required|date|before:today',
            'fiscal_code' => 'required|max:16|min:16|distinct',
            'enrolment_date' => 'required|date|before:today',
        ]);
        // dd($params);
        $last_registration_number = Student::max('registration_number');
        // dd($last_registration_number);
        $params['registration_number'] = $last_registration_number + 1;
        // $student = new Student();
        // $student->fill($params);
        $student = Student::create($params);

        return redirect()->route('admin.students.show', $student);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return view('admin.students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view('admin.students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $params = $request->validate([
            'name' => 'required|max:255',
            'surname' => ['required', 'max:255'],
            'email' => 'required|email|distinct',
            'date_of_birth' => 'required|date|before:today',
            'fiscal_code' => 'required|max:16|min:16|distinct',
            'enrolment_date' => 'required|date|before:today',
        ]);
        $params['registration_number'] = $student->registration_number;
        $student->update($params);

        return redirect()->route('admin.students.show', $student);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }
}
