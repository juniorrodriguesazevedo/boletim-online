<?php

namespace App\Http\Controllers\Admin;

use App\Enums\RoleEnum;
use App\Models\ClassRoom;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Discipline;
use App\Models\User;

class ClassRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $classCooms = ClassRoom::paginate();

        return view('class_rooms.index', compact('classCooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $disciplines = Discipline::all();
        $teachers = User::where('role_id', RoleEnum::TEACHER)->active()->get();

        return view('class_rooms.create', compact('disciplines', 'teachers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(ClassRoom $classRoom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ClassRoom $classRoom)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ClassRoom $classRoom)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ClassRoom $classRoom)
    {
        //
    }
}
