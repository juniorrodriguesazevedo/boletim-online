<?php

namespace App\Http\Controllers\Admin;

use App\Models\Note;
use App\Models\ClassRoom;
use Illuminate\View\View;
use App\Models\Discipline;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $classRoom = ClassRoom::find($request->class_room_id);
        $classRooms = ClassRoom::where('year', date('Y'))->get();

        return view('notes.index', compact('classRooms', 'classRoom'));
    }

    /**
     * Display the specified resource.
     */
    public function show(ClassRoom $classRoom, Discipline $discipline)
    {
        $notes = Note::where('class_room_id', $classRoom->id)
            ->where('discipline_id', $discipline->id)
            ->get();

        return view('notes.show', compact('classRoom', 'discipline', 'notes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ClassRoom $classRoom, Discipline $discipline)
    {
        foreach ($request->notes as $key => $notes) {
            Note::updateOrCreate([
                'student_id' => $key,
                'class_room_id' => $classRoom->id,
                'discipline_id' => $discipline->id,
            ], [
                'note1' => $notes['note1'],
                'note2' => $notes['note2'],
                'note3' => $notes['note3'],
                'note4' => $notes['note4'],
                'lack1' => $notes['lack1'],
                'lack2' => $notes['lack2'],
                'lack3' => $notes['lack3'],
                'lack4' => $notes['lack4'],
            ]);
        }

        return redirect()->route('notes.show', [$classRoom->id, $discipline->id])
            ->withStatus('Notas e faltas atualizadas com sucesso!');
    }
}
