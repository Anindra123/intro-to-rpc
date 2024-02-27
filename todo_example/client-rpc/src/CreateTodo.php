<?php

require_once dirname(__FILE__) . '/../vendor/autoload.php';

function CreateTodo($val)
{

    $client = new Todo\TodoClient("localhost:30000", ["credentials" => null]);

    $todo_item = new Todo\TodoItem();

    $todo_item->setId(-1);
    $todo_item->setTitle($val);

    list($data, $status) = $client->CreateTodo($todo_item)->wait();

    echo "Created todo " . $data->getTitle() . "\n";
}


$val = $argv[1];

CreateTodo($val);
