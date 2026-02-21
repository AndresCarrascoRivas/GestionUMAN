<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::paginate(10);
        return view('roles.index', compact('roles'));
    }

    public function create()
    {
        return view('roles.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|unique:roles,name',
        ]);

        Role::create(['name' => $validated['name']]);

        return redirect()->route('roles.index')->with('success', 'Rol creado correctamente.');
    }

    public function edit(string $id)
    {
        $role = Role::findOrFail($id);
        return view('roles.edit', compact('role'));
    }

    public function update(Request $request, string $id)
    {
        $role = Role::findOrFail($id);

        $validated = $request->validate([
            'name' => "required|string|unique:roles,name,{$id}",
        ]);

        $role->update(['name' => $validated['name']]);

        return redirect()->route('roles.index')->with('success', 'Rol actualizado correctamente.');
    }

    public function destroy(string $id)
    {
        $role = Role::findOrFail($id);
        $role->delete();

        return redirect()->route('roles.index')->with('success', 'Rol eliminado correctamente.');
    }
}
