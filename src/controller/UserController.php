<?php

namespace App\controller;

use App\model\User;
use App\service\TaskService;
use App\service\UserService;

class UserController extends AbstractController
{
    private UserService $userService;
    private TaskService $taskService;

    public function __construct() {
        $this->userService = new UserService();
        $this->taskService = new TaskService();
    }
    public function index(): void
    {
        $this->render('user/profil');
    }

    public function register (): void
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

    public function profil (): void
    {
        if (isset($_SESSION['user'])) {
            $this->render('user/profil',
                [
                    "user" => $this->userService->getUserById($_SESSION['user']->getId()),
                    "tasks" => $this->taskService->getAllByUserId($_SESSION['user']->getId())
                ]);
        }
        else {
            header('Location: /?c=home');
        }

    }

    public function edit(): void
    {
        if (isset($_POST['submit'])) {
            $user = $this->userService->getUserById($_SESSION['user']->getId());

            $editedUser = (new User
            (
                $_POST['name'],
                $_POST['firstname'],
                $_POST['mail'],
                $user->getPassword()

            ))->setId($_SESSION['user']->getId());

            $this->userService->edit($editedUser);
            header('Location: /?c=user&a=profil');
        }

    }

    public function delete (): void
    {
        $this->userService->delete($_SESSION['user']->getId());
        self::logout();
    }
}