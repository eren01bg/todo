<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [];
        $tasks = Task::query()->orderBy('created_at', 'desc')->get();

        $data['tasks'] = $tasks;

        return view('task.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('task.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data = $request->validate(
            array(
                'title' => 'required|max:255',
                'description' => 'required',
                'status' => 'required',
                'due_date' => 'required|date',
                'priority' => 'required',
                'tag' => 'required',
            )
        );

        $data['user_id'] = request()->user()->id;

        $task = Task::create($data);

        return to_route('tasks.show', ['task' => $task])->with('message', 'Task has been created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {

        if(request()->user()->id != $task->user_id) {
            abort(403);
        }

        return view('task.show', ['task' => $task]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        if(request()->user()->id != $task->user_id) {
            abort(403);
        }

        return view('task.edit', ['task' => $task]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {

        if(request()->user()->id != $task->user_id) {
            abort(403);
        }

        $data = $request->validate(
            array(
                'title' => 'required|max:255',
                'description' => 'required',
                'status' => 'required',
                'due_date' => 'required|date',
                'priority' => 'required',
                'tag' => 'required',
            )
        );


        $data['user_id'] = request()->user()->id;

        $task->update($data);

        return to_route('tasks.show', ['task' => $task])->with('message', 'Task has been updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        if(request()->user()->id != $task->user_id) {
            abort(403);
        }

        $task->delete();

        return to_route('tasks.index')->with('message', 'Task has been deleted successfully');
    }
}
