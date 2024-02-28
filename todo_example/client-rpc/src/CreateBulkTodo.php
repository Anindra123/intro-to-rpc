<?php
require_once dirname(__FILE__) . '/../vendor/autoload.php';

/*
        client streaming rpc implementation
*/

function CreateBulkTodo(array $todos)
{

    //create the client for sending rpc request
    $client = new Todo\TodoClient('localhost:30000', ['credentials' => null]);

    //write the messages as a stream of todos on the client
    //call variable holds the client streaming method reference

    $call = $client->CreateBulkTodo();

    foreach ($todos as $id => $todo) {

        $todoItem = new Todo\TodoItem();

        $todoItem->setId($id + 1);
        $todoItem->setTitle($todo);

        $call->write($todoItem);
    }

    list($data, $status) = $call->wait();

    return $data;
}

$todo_list = $argv;
$fileName = array_shift($todo_list);
// we get a response message from server which has a text property
echo CreateBulkTodo($todo_list)->getText() . "\n";
