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

    public function deleteTodo ($todoId){
        return $this->pdo->query("DELETE FROM todos WHERE id={$todoId}");
    }

}