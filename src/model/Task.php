<?php

namespace App\model;
use DateTime;

class Task extends AbstractEntity
{
    private string $title;
    private string $description;
    private DateTime $due_date;
    private DateTime $created_at;
    private string $status;
    private int $user_fk;

    public function __construct
    (
        string $title,
        string $description,
        DateTime $due_date,
        DateTime $created_at,
        string $status,
        int $user_fk
    )
    {
        $this->title = $title;
        $this->description = $description;
        $this->due_date = $due_date;
        $this->created_at = $created_at;
        $this->status = $status;
        $this->user_fk = $user_fk;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }

    public function getDueDate(): DateTime
    {
        return $this->due_date;
    }

    public function setDueDate(DateTime $due_date): self
    {
        $this->due_date = $due_date;
        return $this;
    }

    public function getCreatedAt(): DateTime
    {
        return $this->created_at;
    }

    public function setCreatedAt(DateTime $created_at): self
    {
        $this->created_at = $created_at;
        return $this;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;
        return $this;
    }

    public function getUserFk(): int
    {
        return $this->user_fk;
    }

    public function setUserFk(int $user_fk): self
    {
        $this->user_fk = $user_fk;
        return $this;
    }




}