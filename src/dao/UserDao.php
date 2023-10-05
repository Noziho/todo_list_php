<?php


namespace App\dao;
use App\model\User;

interface UserDao
{
    function create(User $user);

    function edit(User $user);

    function delete(int $id);

    function getUserById(int $id);

    function login(string $mail);

}