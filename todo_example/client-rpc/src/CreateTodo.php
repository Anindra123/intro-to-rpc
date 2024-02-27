<?php

require_once dirname(__FILE__) . '/../vendor/autoload.php';

function CreateTodo($val)
{

    /*
    this sets up the rpc client
    here the generated code is called to create the client
    and perform the rpc calls

    credentials are set to null so that we can
    bypass the rpc security features and make the call
    */
    $client = new Todo\TodoClient("localhost:30000", ["credentials" => null]);

    $todo_item = new Todo\TodoItem(); // TodoItem message defined in the proto file

    // message contains an id of number and title of string
    $todo_item->setId(-1);
    $todo_item->setTitle($val);

    //create todo method is invoked through the client object
    //this CreateTodo was defined as a rpc service in proto file
    list($data, $status) = $client->CreateTodo($todo_item)->wait();

    // Returned data is a TodoItem defined in proto file
    echo "Created todo " . $data->getTitle() . "\n";
}


$val = $argv[1];

CreateTodo($val);
