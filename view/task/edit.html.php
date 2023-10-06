<?php

use App\model\Task;

if (isset($data['task'])) {
    /** @var $task Task **/
    $task = $data['task'];
}
?>
<h1>Edit task</h1>

<form action="/?c=task&a=edit&id=<?= $task->getId() ?>" method="post">
    <div>
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" value="<?= $task->getTitle() ?>">
    </div>

    <div>
        <label for="description">Description:</label>
        <input type="text" name="description" id="description" value="<?= $task->getDescription() ?>">
    </div>

    <div>
        <label for="dueDate">Due date</label>
        <input type="date" name="dueDate" id="dueDate">
    </div>

    <div>
        <label for="status">Status</label>
        <select name="status" id="status">
            <option value="<?= $task->getStatus() ?>">Current status: => <?= $task->getStatus() ?></option>
            <option value="Todo">Todo</option>
            <option value="Progress">Progress</option>
            <option value="Done">Done</option>
        </select>
    </div>

    <div>
        <input type="submit" name="submit" id="submit">
    </div>
</form>

