<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $roles = Role::all();
        return view('admin.roles.index', ['roles' => $roles]);
    }

    public function create() {
        return view('admin.roles.create');
    }
   
    public function store(Request $request, Role $role) {
        $role->name = $request->name;
        
        if ($role->save()) {
            $request->session()->flash('success', 'Grupo '.$role->name.' criado');
        } else {
            $request->session()->flash('error', 'Erro ao tentar criar grupo');
        }
        return redirect()->route('admin.roles.index');
    }

    public function edit(Role $role) {
        return view('admin.roles.edit', ['role' => $role]);
    }

    public function update(Request $request, $id) {
        $role = Role::find($id);

        $role->name = $request->name;
        
        if ($role->save()) {
            $request->session()->flash('success', 'Grupo '.$role->name.' atualizado');
        } else {
            $request->session()->flash('error', 'Erro ao tentar atualizar grupo');
        }
        return redirect()->route('admin.roles.index');
    }
    
    public function destroy(Role $role) {
        $role->delete();
        return redirect()->route('admin.roles.index');
    }
}
