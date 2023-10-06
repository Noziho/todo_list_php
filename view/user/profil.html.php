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

<form action="/?c=user&a=edit" method="post">
    <div>
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="<?= $user->getName()?>">
    </div>

    <div>
        <label for="firstname">Firstname:</label>
        <input type="text" name="firstname" id="firstname" value="<?= $user->getFirstname()?>">
    </div>

    <div>
        <label for="mail">Mail:</label>
        <input type="email" name="mail" id="mail" value="<?= $user->getMail()?>">
    </div>

    <input type="submit" name="submit">
</form>

<div>
    <p>Name => <?= $user->getName() ?></p>
    <p>Firstname => <?= $user->getFirstname() ?></p>
    <p>Mail => <?= $user->getMail() ?></p>
    <a href="/?c=user&a=delete"><button>Supprimer le compte</button></a>
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