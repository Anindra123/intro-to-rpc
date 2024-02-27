<?php

require_once dirname(__FILE__) . '/../vendor/autoload.php';

function ReadTodo()
{

    $client = new Todo\TodoClient('localhost:30000', ['credentials' => null]);

    $empty = new Todo\PBEmpty();

    $todos = $client->ReadTodo($empty)->responses();

    echo "Current Tasks : \n";
    foreach ($todos as $key => $todo) {
        echo ($key + 1) . "." . $todo->getTitle() . "\n";
    }
}

ReadTodo();
