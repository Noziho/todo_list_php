<?php

namespace App\controller;

use App\model\User;
use App\service\UserService;

class UserController extends AbstractController
{
    private UserService $userService;

    public function __construct() {
        $this->userService = new UserService();
    }
    public function index(): void
    {
        $this->render('user/profil');
    }

    public function register ()
    {
        $this->render('user/register');

        if (isset($_POST['submit'])) {

            $password = password_hash($_POST['password'], PASSWORD_ARGON2I);

            $user = new User
            (
                $_POST['name'],
                $_POST['firstname'],
                $_POST['mail'],
                $password
            );

            $this->userService->create($user);

            header("Location: ?c=user&a=login");
        }
    }

    public function login (): void
    {
        $this->render('user/login');

        if (isset($_POST['submit'])) {
            //Vérif des champs normalement
            $this->userService->login($_POST['mail'], $_POST['password']);
        }
    }

    public function logout(): void
    {
        session_destroy();
        header("Location: /?c=home");
    }
}