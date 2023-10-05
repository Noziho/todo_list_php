<?php


namespace App\dao\imp;
use App\dao\UserDao;
use App\model\User;
use App\utils\DBconnect;
use PDO;

class UserDaoImp implements UserDao
{


    private PDO $conn;

    public function __construct()
    {
        $this->conn = DBconnect::getInstance()->getPdo();
    }

    public function create(User $user) :void
    {
        $stmt = $this->conn->prepare("
        INSERT INTO user (name, firstname, mail, password)
        VALUES (:name, :firstname, :mail, :password)
        ");

        $stmt->bindValue(":name", $user->getName());
        $stmt->bindValue(":firstname", $user->getFirstname());
        $stmt->bindValue(":mail", $user->getMail());
        $stmt->bindValue(":password", $user->getPassword());

        $stmt->execute();
    }

    public function edit(User $user): void
    {
        $stmt = $this->conn->prepare("
            UPDATE user
            SET name = :name,
                firstname = :firstname,
                mail = :mail,
                password = :password
            WHERE id = :id");

        $stmt->bindValue(':name', $user->getName());
        $stmt->bindValue(':firstname', $user->getFirstname());
        $stmt->bindValue(':mail', $user->getMail());
        $stmt->bindValue(':password', $user->getPassword());

        $stmt->execute();
    }

    public function delete(int $id): void
    {
        $stmt = $this->conn->prepare("DELETE FROM user WHERE id = :id");
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }

    public function getUserById(int $id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM user WHERE id = :id");
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function login(string $mail): ?array
    {
        $stmt = $this->conn->prepare("SELECT * FROM user WHERE mail = :mail");
        $stmt->bindValue(':mail', $mail);
        if ($stmt->execute()) {
           return $stmt->fetch();
        }
        return null;
    }
}