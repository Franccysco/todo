<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    //Metodo index para lista de Tarefas
    public function index()
    {

        return Task::all();

    }

    public function store(Request $request)
    {

        //Validar os dados antes de enviar para o banco
        $request->validate([
            'name' => 'required|max:255',
            'complete' => 'required',
        ]);

        $tasks = Task::create([
            'name' => $request->input('name'),
            'complete' => $request->input('complete')
        ]);

        return $tasks;

    }

    public function show(Task $task)
    {
        return $task;
    }

    public function update(Request $request, Task $task)
    {

        $request->validate([
            'name' => 'required|max:255'
        ]);

        $task->name = $request->input('name');

        $task->save();

        return $task;
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return response()->json(['success' => true]);
    }

}
