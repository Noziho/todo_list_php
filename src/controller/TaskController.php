<?php

namespace App\controller;

use App\model\Task;
use App\service\TaskService;
use DateTime;

class TaskController extends AbstractController
{

    private TaskService $taskService;

    public function __construct()
    {
        $this->taskService = new TaskService();
    }


    public function index(): void
    {
        self::render('task/addTask');
    }

    public function add(): void
    {
        if (isset($_POST['submit'])){
            $date = new DateTime();
            $task = new Task
            (
                $_POST['title'],
                $_POST['description'],
                $_POST['dueDate'],
                $date,
                $_POST['status'],
                $_SESSION['user']->getId()

            );
            $this->taskService->create($task);
            header("Location: /?c=home");
        }
    }

    public function edit(int $id)
    {
        $this->render('task/edit',
            [
                'task' => $this->taskService->getTaskById($id),
            ]);
    }

    public function delete(int $id) {
        $this->taskService->delete($id);
        header("Location: /?c=home");
    }

}