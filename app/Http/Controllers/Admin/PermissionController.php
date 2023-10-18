<?php

namespace App\Http\Controllers\Admin;

use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\Permissions\PermissionStoreRequest;
use App\Http\Requests\Permissions\PermissionUpdateRequest;

class PermissionController extends Controller
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
        $permissions = Permission::orderBy('name')->paginate(10);

        return view('permissions.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        return view('permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\PermissionStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PermissionStoreRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $permission = Permission::create($data);

        return redirect()->route('permissions.show', $permission->id)
            ->withStatus('Permissão cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Spatie\Permission\Models\Permission $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission): View
    {
        return view('permissions.show', compact('permission'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Spatie\Permission\Models\Permission $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission): View
    {
        return view('permissions.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\PermissionUpdateRequest  $request
     * @param  \Spatie\Permission\Models\Permission $permission
     * @return \Illuminate\Http\Response
     */
    public function update(PermissionUpdateRequest $request, Permission $permission): RedirectResponse
    {
        $data = $request->validated();

        $permission->update($data);

        return redirect()->route('permissions.edit', $permission->id)
            ->withStatus('Permissão atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Spatie\Permission\Models\Permission $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission): RedirectResponse
    {
        try {
            $permission->delete();

            return redirect()->route('permissions.index')
                ->withStatus('Permissão deletado com sucesso!');
        } catch (\Exception $e) {
            return redirect()->route('permissions.index')
                ->withError('Registro vinculado á outra tabela, somente poderá ser excluído se retirar o vinculo.');
        }
    }
}
