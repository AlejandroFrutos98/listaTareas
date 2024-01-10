<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use Illuminate\Http\Request;

class TareaController extends Controller
{
    public function index()
    {
        $tareas = Tarea::all();
        return view('tareas.index', compact('tareas'));
    }

    public function create()
    {
        return view('tareas.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'titulo' => 'required|max:255',
        ]);

        Tarea::create($validatedData);

        return redirect()->route('tareas.index');
    }

    public function edit(Tarea $tarea)
    {
        return view('tareas.edit', compact('tarea'));
    }

    public function update(Request $request, Tarea $tarea)
    {
        $validatedData = $request->validate([
            'titulo' => 'required|max:255',
        ]);

        $tarea->update($validatedData);

        return redirect()->route('tareas.index');
    }

    public function destroy(Tarea $tarea)
    {
        $tarea->delete();
        return redirect()->route('tareas.index');
    }

    public function completar(Tarea $tarea)
    {
    $tarea->update(['completada' => true]);
    return redirect()->route('tareas.index');
    }
}
