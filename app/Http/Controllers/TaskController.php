<?php

namespace App\Http\Controllers;

use App\Http\Requests\{StoreTaskRequest, UpdateTaskRequest};
use App\Models\Task;
use App\Repositories\TasksRepository;

class TaskController extends Controller
{
    
    public function __construct(private TasksRepository $repository)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::all();

        return response()
            ->json($tasks);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        $task = $this->repository->add($request);

        return response()
            ->json($task, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $task)
    {
        $taskModel = Task::find($task);
        if ($taskModel === null) {
            return response()->json(['message' => 'Task not found'], 404);
        }

        return $taskModel;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Task $task, UpdateTaskRequest $request)
    {
        $task->fill($request->all());
        $task->save();

        return $task;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $task)
    {
        Task::destroy($task);

        return response()->noContent();
    }
}
