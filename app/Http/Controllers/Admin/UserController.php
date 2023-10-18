<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Enums\RoleEnum;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Users\UserStoreRequest;
use App\Http\Requests\Users\UserUpdateRequest;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware("role:super_admin|admin");
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $search = $request->search;

        $users = User::when(!empty($search), function ($query) use ($search) {
            $query->where('name', 'LIKE', "%$search%");
        })->where('role_id', '!=', RoleEnum::SUPER_ADMIN)
            ->orderBy('name')
            ->paginate(10);

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $roles = Role::whereNotIn('id', [RoleEnum::SUPER_ADMIN])->get();

        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserStoreRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $user = User::create($data);
        $user->assignRole($data['role_id']);

        return redirect()->route('users.show', $user->id)
            ->withStatus('Usuário cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user): View
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateRequest $request, User $user): RedirectResponse
    {
        $data = $request->validated();

        $user->update($data);

        return redirect()->route('users.edit', $user->id)
            ->withStatus('Usuário atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->update(['status' => false]);

        return redirect()->route('users.edit', $user->id)
            ->withStatus('Usuário desativado com sucesso!');
    }
}
