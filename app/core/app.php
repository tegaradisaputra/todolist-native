<?php

function routing(){
    $action = isset($_GET['action']) ?  $_GET['action'] : 'index';

    switch ($action){
        case 'index':
            echo "welcome to index";
            break;
        case 'add':
            echo "welcome to add";
            break;
        case 'edit':
            echo "welcome to edit";
            break;
        case 'delete':
            echo "welcome to delete";
            break;
        default:
        http_response_code(404);
            echo "404 bro";
            break;
    }
    
}