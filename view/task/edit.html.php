<?php

use App\model\Task;

if (isset($data['task'])) {
    /** @var $task Task **/
    $task = $data['task'];
}
?>
<h1>Edit task</h1>

<p>Title: <?= $task->getTitle() ?></p>

