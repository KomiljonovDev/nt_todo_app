<ul>
    <?php

    $todoList = $todo->getTodo();
    foreach ($todoList as $item):
        echo "<li>{$item['text']} <a href='?delete=1'>ochirish</a></li>";
    endforeach; ?>
</ul>
<form action="" method="post">
    <input type="checkbox">
    <input type="text" name="text">
    <button type="submit">Add</button>
</form>