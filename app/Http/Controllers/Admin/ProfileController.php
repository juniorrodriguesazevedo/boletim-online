<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Profiles\ProfileUpdateRequest;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:super_admin|director|professional');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(): View
    {
        $user = User::find(Auth::id());

        return view('profiles.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProfileUpdateRequest $request)
    {
        $data = $request->validated();

        $user = User::find(Auth::id());
        $user->update($data);

        return redirect()->route('profiles.edit')
            ->withStatus('Perfil atualizado com sucesso!');
    }
}
