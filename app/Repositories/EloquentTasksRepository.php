<?php

namespace App\Repositories;

use App\Http\Requests\StoreTaskRequest;
use App\Models\Task;

class EloquentTasksRepository implements TasksRepository
{

    public function add(StoreTaskRequest $request): Task
    {
        $task = Task::create($request->all());

        return $task;
    }
}