<?php

namespace App\Repositories;

use App\Http\Requests\StoreTaskRequest;
use App\Models\Task;

interface TasksRepository
{
    public function add(StoreTaskRequest $request) : Task;
}