<?php

namespace App\controller;

use App\service\TaskService;

class TaskController extends AbstractController
{

    private TaskService $taskService;

    public function __construct()
    {
        $this->taskService = new TaskService();
    }


    public function index()
    {
        self::render('task/addTask');
    }

}