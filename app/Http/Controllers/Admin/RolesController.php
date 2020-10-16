<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Http\Requests\SaveRolesRequest;
use Spatie\Permission\Models\Permission;

class RolesController extends Controller
{
    public function index()
    {
        $this->authorize('view', new Role);

        return view('admin.roles.index', [
            'roles' => Role::all()
        ]);
    }

    public function create()
    {
        $this->authorize('create', $role = new Role);

        return view('admin.roles.create', [
            'role' => $role,
            'permissions' => Permission::pluck('name', 'id')
        ]);
    }

    public function store(SaveRolesRequest $request)
    {
        $this->authorize('create', new Role);

        $role = Role::create($request->validated());

        if ($request->has('permissions')) {
            $role->givePermissionTo($request->permissions);
        }

        return redirect()->route('admin.roles.index')->withFlash('El role fue creado correctamente');
    }

    public function edit(Role $role)
    {
        $this->authorize('update', $role);

        return view('admin.roles.edit', [
            'role' => $role,
            'permissions' => Permission::pluck('name', 'id')
        ]);
    }

    public function update(SaveRolesRequest $request, Role $role)
    {
        $this->authorize('update', $role);

        $role->update($request->validated());

        $role->permissions()->detach();

        if ($request->has('permissions')) {
            $role->givePermissionTo($request->permissions);
        }

        return redirect()->route('admin.roles.edit', $role)->withFlash('El role fue actualizado correctamente');
    }

    public function destroy(Role $role)
    {
        $this->authorize('delete', $role);

        $role->delete();

        return redirect()->route('admin.roles.index')->withFlash('El role fue eliminado');
    }
}
