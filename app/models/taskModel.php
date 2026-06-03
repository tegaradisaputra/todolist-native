<?php

function getAllTasks(PDO $pdo){
    $stmt = $pdo->prepare('SELECT * FROM tasks ORDER BY status ASC, id DESC');
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function addTask(PDO $pdo, string $title){
    $stmt = $pdo->prepare('INSERT INTO tasks (title, status) values (:title, 0)');

    // bind param
    $stmt->bindParam(':title', $title, PDO::PARAM_STR);
    return $stmt->execute();
}

function togleTask(PDO $pdo, int $id){
    // get status saat ini first
    $stmtSelect = $pdo->prepare('SELECT status FROM tasks where id = :id');
    // bind
    $stmtSelect->bindParam(':id', $id, PDO::PARAM_INT);
    $stmtSelect->execute();
    $task = $stmtSelect->fetch(PDO::FETCH_ASSOC);

    if($task){
        $newStatus = ($task['status'] == 0) ? 1 : 0;

        $stmtUpdate = $pdo->prepare('UPDATE tasks SET status = :status where id = :id');
        $stmtUpdate->bindParam(':status', $newStatus, PDO::PARAM_INT);

        return $stmtUpdate->execute();
    }
    
    return false;
}

function deleteTask(PDO $pdo, int $id){
    $stmt = $pdo->prepare('DELETE FROM tasks where id = :id');
    
    // bind param
    $stmt->bindParam('id', $id, PDO::PARAM_INT);
    return $stmt->execute();
}