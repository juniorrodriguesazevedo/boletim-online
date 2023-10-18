<?php

namespace App\Http\Controllers\Admin;

use Illuminate\View\View;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\Roles\RoleStoreRequest;
use App\Http\Requests\Roles\RoleUpdateRequest;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:super_admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $roles = Role::whereNotIn('name', ['super_admin'])->orderBy('name')->paginate(10);

        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\RoleStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleStoreRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $role = Role::create($data);

        return redirect()->route('roles.show', $role->id)
            ->withStatus('Função cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Spatie\Permission\Models\Role $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role): View
    {
        $permissions = $role->getAllPermissions();

        return view('roles.show', compact('permissions', 'role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Spatie\Permission\Models\Role $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role): View
    {
        $permissions = Permission::orderBy('name')->get();
        $roles = $role->getAllPermissions();

        return view('roles.edit', compact('role', 'roles', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\RoleUpdateRequest  $request
     * @param  \Spatie\Permission\Models\Role $role
     * @return \Illuminate\Http\Response
     */
    public function update(RoleUpdateRequest $request, Role $role): RedirectResponse
    {
        $data = $request->validated();
        $role->update($data);
        $role->syncPermissions($request->permissions);

        return redirect()->route('roles.edit', $role->id)
            ->withStatus('Função atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Spatie\Permission\Models\Role $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role): RedirectResponse
    {
        try {
            $role->delete();

            return redirect()->route('roles.index')
                ->withStatus('Função deletado com sucesso!');
        } catch (\Exception $e) {
            return redirect()->route('roles.index')
                ->withError('Registro vinculado á outra tabela, somente poderá ser excluído se retirar o vinculo.');
        }
    }
}
