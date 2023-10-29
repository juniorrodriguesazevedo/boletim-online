<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Requests\Bulletins\BulletinStoreRequest;

class BulletinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('bulletins.index');
    }

    /**
     * Display a listing of the resource.
     */
    public function store(BulletinStoreRequest $request)
    {
        $data = $request->validated();

        $student = Student::where('id', $data['code'])
            ->where('birth_date', $data['date'])
            ->first();

        if (!$student) {
            return redirect()
                ->back()
                ->withErrors(['code' => 'Aluno não encontrado. Verifique os dados.']);
        }

        dd($student);
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }
}
