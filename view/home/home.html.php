<?php

if (isset($_SESSION['user'])) {?>
    <form action="/?c=task&a=add" method="post">
        <div>
            <label for="title">Title:</label>
            <input type="text" name="title" id="title">
        </div>

        <div>
            <label for="description">Description:</label>
            <textarea name="description" id="description" cols="30" rows="10" placeholder="Description ..."></textarea>
        </div>

        <div>
            <label for="dueDate">Due date:</label>
            <input type="date" name="dueDate" id="dueDate">
        </div>

        <div>
            <label for="status">Status</label>
            <select name="status" id="status">
                <option value="Todo">Todo</option>
                <option value="Progress">Progress</option>
                <option value="Done">Done</option>
            </select>
        </div>

        <div>
            <input type="submit" name="submit" value="Add Task">
        </div>
    </form>
    <?php
}
else {?>
    <div>
        <p>
            <a href="/?c=user&a=login">Login</a> for use our app or <a href="/?c=user&a=register">register</a>
            if u don't have account</p>
    </div>
    <?php
}
