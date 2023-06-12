<?php

namespace App\Providers;

use App\Repositories\{TasksRepository, EloquentTasksRepository};
use Illuminate\Support\ServiceProvider;

class TasksRepositoryProvider extends ServiceProvider
{
    public array $bindings = [
        TasksRepository::class => EloquentTasksRepository::class
    ];
}
