<?php

use App\model\Task;
use App\model\User;

if (isset($data)){
    /** @var $user User **/
    $user = $data['user'];
    $tasks = $data['tasks'];
}


?>

<h1>Profil</h1>

<div>
    <p>Name => <?= $user->getName() ?></p>
    <p>Firstname => <?= $user->getFirstname() ?></p>
    <p>Mail => <?= $user->getMail() ?></p>
</div>

<div>
    <h2>Your tasks:</h2>
    <?php
        foreach ($tasks as $task) {
            /** @var $task Task **/?>
            <div>
                <p>Titre => <?= $task->getTitle() ?></p>
                <p>Description => <?= $task->getDescription() ?></p>
                <p>Status => <?= $task->getStatus() ?></p>
                <p>Due date => <?= $task->getDueDate() ?></p>
                <p>Created at => <?= $task->getCreatedAt() ?></p>
                <a href="/?c=task&a=edit&id=<?= $task->getId() ?>">Editer</a>
                <a href="/?c=task&a=delete&id=<?= $task->getId() ?>">Supprimer</a>
                <a href="/?c=task&a=editStatus&id=<?= $task->getId() ?>&status=Done">Task done</a>
            </div>
            <?php
        }
    ?>
</div>