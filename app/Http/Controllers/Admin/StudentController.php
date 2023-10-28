<?php

namespace App\Http\Controllers\Admin;

use App\Models\Student;
use App\Models\ClassRoom;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\Students\StudentStoreRequest;
use App\Http\Requests\Students\StudentUpdateRequest;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:admin_create', ['only' => ['create', 'store']]);
        $this->middleware('permission:admin_edit', ['only' => ['edit', 'update']]);

        $this->middleware('permission:teacher_view|admin_view', ['only' => ['show', 'index', 'pdf']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $search = $request->search;

        $students = Student::when(!empty($search), function ($query) use ($search) {
            $query->where('name', 'LIKE', "%$search%");
        })->orderBy('name')->paginate();

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
        $classrooms = $student->classrooms()
            ->orderBy('year', 'desc')
            ->get();

        return view('students.show', compact('student', 'classrooms'));
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

    public function pdf(ClassRoom $classRoom, Student $student): Response
    {
        $disciplines = $classRoom->disciplines;

        $notesByDiscipline = [];

        foreach ($disciplines as $discipline) {
            $notes = $student->notes()
                ->where('class_room_id', $classRoom->id)
                ->where('discipline_id', $discipline->id)
                ->get();

            $notesByDiscipline[$discipline->name] = $notes;
        }

        $pdf = App::make('dompdf.wrapper');
        $pdf->setPaper('a4', 'landscape');
        $pdf->loadView('students.pdf', compact('classRoom', 'student', 'disciplines', 'notesByDiscipline'));

        return $pdf->stream("$student->id-$classRoom->name.pdf");
    }
}
