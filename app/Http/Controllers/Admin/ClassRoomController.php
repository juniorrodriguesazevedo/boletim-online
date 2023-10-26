<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Enums\RoleEnum;
use App\Models\Student;
use App\Models\ClassRoom;
use Illuminate\View\View;
use App\Models\Discipline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\ClassRooms\ClassRoomStoreRequest;
use App\Http\Requests\ClassRooms\ClassRoomUpdateRequest;

class ClassRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $classRooms = ClassRoom::
        when(!empty($request->search), function ($query) use ($request) {
            $query->where('name', 'like', '%' . $request->search . '%');
        })
        ->when(!empty($request->code), function ($query) use ($request) {
                $query->where('code', $request->code);
        })
        ->orderBy('year')->paginate();

        return view('class_rooms.index', compact('classRooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $students = Student::orderBy('name')->get();
        $disciplines = Discipline::orderBy('name')->get();
        $teachers = User::where('role_id', RoleEnum::TEACHER)->get();

        return view('class_rooms.create', compact('disciplines', 'teachers', 'students'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClassRoomStoreRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $classRoom = ClassRoom::create($data);

        if ($classRoom) {
            $classRoom->students()->attach($data['students']);
            $classRoom->disciplines()->attach($data['disciplines']);
            $classRoom->users()->attach($data['teachers']);
        }

        return redirect()->route('class-rooms.show', $classRoom->id)
            ->withStatus('Turma cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(ClassRoom $classRoom)
    {
        return view('class_rooms.show', compact('classRoom'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ClassRoom $classRoom): View
    {
        $students = Student::orderBy('name')->get();
        $disciplines = Discipline::orderBy('name')->get();
        $teachers = User::where('role_id', RoleEnum::TEACHER)->get();

        return view('class_rooms.create', compact('classRoom', 'disciplines', 'teachers', 'students'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ClassRoomUpdateRequest $request, ClassRoom $classRoom)
    {
        $data = $request->validated();

        $classRoom->update($data);

        $classRoom->students()->sync($data['students']);
        $classRoom->disciplines()->sync($data['disciplines']);
        $classRoom->users()->sync($data['teachers']);

        return redirect()->route('class-rooms.edit', $classRoom->id)
            ->withStatus('Turma atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ClassRoom $classRoom)
    {
        //
    }

    public function pdf(ClassRoom $classRoom)
    {
        $pdf = App::make('dompdf.wrapper');
        // $pdf->setPaper('a4', 'landscape');
        $pdf->loadView('class_rooms.pdf', compact('classRoom'));

        return $pdf->stream("turma-$classRoom->name.pdf");
    }
}
