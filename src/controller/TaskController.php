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

    public function edit(int $id): void
    {
        $this->render('task/edit',
            [
                'task' => $this->taskService->getTaskById($id),
            ]);

        if (isset($_POST['submit'])) {
            $title = $_POST['title'];
            $description = $_POST['description'];
            $dueDate = $_POST['dueDate'];
            $status = $_POST['status'];
            $editedTask = (new Task
            (
                $title,
                $description,
                $dueDate,
                $this->taskService->getTaskById($id)->getCreatedAt(),
                $status,
                $_SESSION['user']->getId()
            ))->setId($id);
            $this->taskService->edit($editedTask);
            header('Location: /?c=user&a=profil');
        }
    }

    public function delete(int $id): void
    {
        $this->taskService->delete($id);
        header("Location: /?c=home");
    }

}