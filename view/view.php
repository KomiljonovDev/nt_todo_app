<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todo App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

    <div class="container my-5">
        <h1 class="text-center">Todo App</h1>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Todo</th>
                <th scope="col">Delete</th>
                <th scope="col">Update</th>
            </tr>
            </thead>
            <tbody>
            <?php
                $todoList= $todo->getTodo();
                if (count($todoList)){
                    foreach ($todoList as $item) {
                        $text_decoration = $item['status'] ? 'text-decoration-line-through' : '';
                        $check_box = $item['status'] ? 'checked' : '';
                        echo "<tr>
                                <th>{$item['id']}</th>
                                <td><input type='checkbox' {$check_box}><p style='display: inline' class='{$text_decoration}'>{$item['text']}</p></td>
                                <td><a class='btn btn-danger' href='?delete={$item['id']}'>Delete</a></td>
                                <td><a class='btn btn-success' href='?update={$item['id']}'>Update</a></td>
                        </tr>";
                    }
                }else{
                    echo '<tr>
                        <td colspan="4"><h5 class="text-center">Todo is empty</h5></td>
                        </tr>
                    ';
                }
            ?>

            </tbody>
        </table>
        <form method="post">
            <div class="mb-3">
                <label for="todo" class="form-label">Todo</label>
                <input type="text" name="text" class="form-control" id="todo">
            </div>
            <button type="submit" class="btn btn-primary float-end">Add Task</button>
        </form>
    </div>
</body>
</html>