<?php

namespace App\controller;

class TaskController extends AbstractController
{

    public function index()
    {
        self::render('task/addTask');
    }

    public function addTask()
    {

    }
}