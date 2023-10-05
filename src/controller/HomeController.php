<?php


namespace App\controller;


class HomeController extends AbstractController
{

    public function index(): void
    {
        $this->render('home/home');
    }


}
