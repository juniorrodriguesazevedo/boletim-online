<?php

namespace App\Http\Controllers\Admin;

use App\Models\Student;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Students\StudentStoreRequest;
use App\Http\Requests\Students\StudentUpdateRequest;

class StudentController extends Controller
{
    public function __construct()
    {
        
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $students = Student::orderBy('name')->paginate();

        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StudentStoreRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $student = Student::create($data);

        return redirect()->route('students.show', $student->id)
            ->withStatus('Aluno cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student): View
    {
        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student): View
    {
        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StudentUpdateRequest $request, Student $student): RedirectResponse
    {
        $data = $request->validated();

        $student->update($data);

        return redirect()->route('students.edit', $student->id)
            ->withStatus('Aluno atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}
