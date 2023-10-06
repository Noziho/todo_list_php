<?php

namespace App\dao;

use App\model\Task;

interface TaskDao
{
    function create(Task $task);

    function edit(Task $task);

    function delete(int $id);

    function getTaskById(int $id);

    function getAll();

    function getAllTaskByUserId(int $id);

    function editTaskStatus(int $id, string $status);
}