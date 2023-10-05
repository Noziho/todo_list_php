<?php

namespace App\service;

use App\dao\imp\UserDaoImp;
use App\model\User;

class UserService
{
    private UserDaoImp $userDao;

    public function __construct()
    {
        $this->userDao = new UserDaoImp();
    }

    public function makeUser(array $data): User
    {
        return (new User
        (
            $data['name'],
            $data['firstname'],
            $data['mail'],
            $data['password'],
        ))->setId($data['id']);
    }

    public function create(User $user): void
    {
        $this->userDao->create($user);
    }

    public function edit(User $user): void
    {
        $this->userDao->edit($user);
    }

    public function delete(int $id): void
    {
        $this->userDao->delete($id);
    }

    public function getUserById(int $id): ?User
    {
        $result = $this->userDao->getUserById($id);

        if (is_array($result)) {
            return self::makeUser($result);
        }

        return null;
    }


}