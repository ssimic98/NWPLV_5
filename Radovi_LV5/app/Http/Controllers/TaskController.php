<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Http\Middleware\CheckNastavnik;
use App\Models\User;
class TaskController extends Controller
{
    
    public function create()
    {
        return view('tasks.create');
    }

    
    public function store(Request $request)
    {

    $request->validate([
        'naziv_rada' => 'required|string',
        'naziv_rada_eng' => 'required|string',
        'zadatak_rada' => 'required|string',
        'tip_studija' => 'required|string|in:strucni_studij,preddiplomski_studij,diplomski_studij',
    ]);

    
    $task = new Task();
    $task->naziv_rada = $request->naziv_rada;
    $task->naziv_rada_eng = $request->naziv_rada_eng;
    $task->zadatak_rada = $request->zadatak_rada;
    $task->tip_studija = $request->tip_studija;
    $task->nastavnik_id=$request->user()->id;
    $task->save();

    return redirect()->route('home')->with('success', 'Zadatak uspješno dodan!');
    }
    public function tasksAddedByTeacher()
    {
        $teachers = User::where('role', 'nastavnik')->get();

        if ($teachers->isNotEmpty()) {
        
            $tasks = collect();

        
            foreach ($teachers as $teacher) {
            $tasks = $tasks->merge($teacher->tasks);
            }

        
            if ($tasks->isNotEmpty()) 
            {
                return view('tasks.tasks-added-by-teacher', ['tasks' => $tasks]);
            } 
            else 
            {
                return redirect()->route('home')->with('error', 'Nema dostupnih zadataka dodanih od strane nastavnika.');
            }
        } 
        else 
        {
            return redirect()->route('home')->with('error', 'Nema dostupnih zadataka dodanih od strane nastavnika.');
        }
    }

}
