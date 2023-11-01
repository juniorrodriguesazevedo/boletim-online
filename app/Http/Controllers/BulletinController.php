<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Student;
use App\Models\ClassRoom;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Bulletins\BulletinStoreRequest;

class BulletinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('bulletins.index');
    }

    /**
     * Display a listing of the resource.
     */
    public function store(BulletinStoreRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $student = Student::where('id', $data['id'])
            ->where('birth_date', $data['date'])
            ->first();

        if (!$student) {
            return redirect()
                ->back()
                ->withErrors(['id' => 'Aluno não encontrado. Verifique os dados.']);
        }

        return redirect()->route('bulletins.show', $student->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, int $id)
    {
        $student = Student::where('id', $id)
            ->select('id', 'name')
            ->first();

        $classRoom = ClassRoom::find($request->class_room_id);

        $notes = Note::where('class_room_id', $classRoom->id)
            ->where('student_id', $student->id)
            ->get();

        return view('bulletins.show', compact('student', 'classRoom', 'notes'));
    }
}
