<?php

namespace App\Http\Controllers\Admin;

use App\Models\Student;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ClassRoom;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $classroom = ClassRoom::all();

        $students = Student::with('classrooms')
        ->when(!empty($request->search), function ($query) use ($request) {
            $query->where('name', 'like', '%' . $request->search . '%');
        })
        ->when(!empty($request->classroom_id), function ($query) use ($request) {
            $query->whereHas('classrooms', function ($query) use ($request) {
                $query->where('class_rooms.id', $request->classroom_id);
            });
        })
        ->orderBy('name')->paginate();

        return view('students.index', compact('students', 'classroom'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}
