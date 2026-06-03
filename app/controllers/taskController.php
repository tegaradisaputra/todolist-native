<?php

require_once 'config/database.php';
require_once 'models/taskModel.php';

$action = $_GET['action'] ?? '';

switch($action){
    case 'add':
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($title)){
            $title = trim($_POST['title']);

            addTask($pdo, $title);
        }

        header('Location: index.php');
        exit;
    
    case 'togle':
        $id = (int)($_GET['id'] ?? 0);
        if ($id > 0){
            togleTask($pdo, $id);
        }

        header('Location: index.php');
        exit;

    case 'delete':
        $id == (int)($_GET['id'] ?? '');
        if ($id > 0){
            deleteTask($pdo, $id);
        }
        header('Location: index.php');
        exit;

    default:
        header('Location: index.php');
        exit;
}