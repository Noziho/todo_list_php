<?php

namespace App\dao\imp;

use App\dao\TaskDao;
use App\model\Task;
use App\utils\DBconnect;
use PDO;

class TaskDaoImp implements TaskDao
{
    private PDO $conn;

    public function __construct()
    {
        $this->conn = DBconnect::getInstance()->getPdo();
    }

    public function create(Task $task) :void
    {
        $stmt = $this->conn->prepare("
        INSERT INTO task (title, description, due_date, created_at, status, user_fk)
        VALUES (:title, :description, :due_date, :created_at, :status, :user_fk)
        ");

        $stmt->bindValue(":title", $task->getTitle());
        $stmt->bindValue(":description", $task->getDescription());
        $stmt->bindValue(":due_date", $task->getDueDate());
        $stmt->bindValue(":created_at", $task->getCreatedAt());
        $stmt->bindValue(":status", $task->getStatus());
        $stmt->bindValue(":user_fk", $task->getUserFk());

        $stmt->execute();
    }

    public function edit(Task $task): void
    {
        $stmt = $this->conn->prepare("
            UPDATE task
            SET title = :title,
                description = :description,
                due_date = :due_date,
                created_at = :created_at,
                status = :status,
            WHERE id = :id");

        $stmt->bindValue(':title', $task->getTitle());
        $stmt->bindValue(':description', $task->getDescription());
        $stmt->bindValue(':due_date', $task->getDueDate());
        $stmt->bindValue(':created_at', $task->getCreatedAt());
        $stmt->bindValue(':status', $task->getStatus());
        $stmt->execute();
    }

    public function delete(int $id): void
    {
        $stmt = $this->conn->prepare("DELETE * FROM task WHERE id = :id");
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }

    public function getTaskById(int $id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM task WHERE id = :id");
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function getAll(): bool|array
    {
        return $this->conn->query('SELECT * FROM task')->fetchAll();
    }

}