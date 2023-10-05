<?php

namespace App\controller;


class ErrorController extends AbstractController
{

    public function index()
    {
        // TODO: Implement index() method.
    }

    /**
     * @param $askPage
     * @return void
     */
    public function error404 ($askPage): void
    {
        $this->render('error/404');
    }
}