<?php
class Todo extends DB {
    public function setTodo (string $todoName) {
        $status = false;
        $todoName = trim($todoName);
        $stmt   = $this->pdo->prepare('INSERT INTO todos(text, status) VALUES(:text, :status)');
        $stmt->bindParam(':text', $todoName);
        $stmt->bindParam(':status', $status, PDO::PARAM_BOOL);
        $stmt->execute();
    }
    public function getTodo () {
        return $this->pdo->query("SELECT * FROM todos")->fetchAll(PDO::FETCH_ASSOC);
    }
    public function toggle ($todoId){
        $todoId = trim($todoId);
        $todo = $this->pdo->query("SELECT * FROM todos WHERE id={$todoId}")->fetch(PDO::FETCH_ASSOC);
        if ($todo['status']){
            $this->pdo->query("UPDATE todos SET status=0 WHERE id={$todoId}");
            return;
        }
        $this->pdo->query("UPDATE todos SET status=1 WHERE id={$todoId}");
    }

    public function remove ($todoId) {
        $todoId = trim($todoId);
        $this->pdo->query("DELETE FROM todos WHERE id={$todoId}");
    }

}