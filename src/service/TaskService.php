<?php

namespace App\service;

use App\dao\imp\TaskDaoImp;
use App\model\Task;

class TaskService
{
    private TaskDaoImp $taskDao;

    public function __construct()
    {
        $this->taskDao = new TaskDaoImp();
    }

    public function makeTask(array $data): Task
    {
        return (new Task
        (
            $data['title'],
            $data['description'],
            $data['due_date'],
            $data['created_at'],
            $data['status'],
            $data['user_fk']
        ))->setId($data['id']);
    }

    public function create(Task $task): void
    {
        $this->taskDao->create($task);
    }

    public function edit(Task $task): void
    {
        $this->taskDao->edit($task);
    }

    public function delete(int $id): void
    {
        $this->taskDao->delete($id);
    }

    public function getTaskById(int $id): ?Task
    {
        $result = $this->taskDao->getTaskById($id);

        if (is_array($result)) {
            return self::makeTask($result);
        }

        return null;
    }

    public function getAll(): array
    {
        $tasks = [];

        foreach ($this->taskDao->getAll() as $task) {
            $tasks[] = self::makeTask($task);
        }
        return $tasks;
    }

    public function getAllByUserId(int $id): ?array
    {
        $result = $this->taskDao->getAllTaskByUserId($id);
        $tasks = [];
        if (is_array($result)){
            foreach ($result as $task) {
                $tasks[] = self::makeTask($task);
            }
            return $tasks;
        }
        return null;
    }

    public function editStatus(int $id, string $status): void
    {
        $this->taskDao->editTaskStatus($id, $status);
    }
}