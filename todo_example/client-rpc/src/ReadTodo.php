<?php

require_once dirname(__FILE__) . '/../vendor/autoload.php';

function ReadTodo()
{

    /*
    this sets up the rpc client
    here the generated code is called to create the client
    and perform the rpc calls

    credentials are set to null so that we can
    bypass the rpc security features and make the call
    */
    $client = new Todo\TodoClient('localhost:30000', ['credentials' => null]);

    /*
        ReadTodo Method takes and Empty message as parameter
    */
    $empty = new Todo\PBEmpty();

    /*
    we wait for the sever to send all the response
    as it is using server streaming
    */
    $todos = $client->ReadTodo($empty)->responses();

    echo "Current Tasks : \n";
    foreach ($todos as $key => $todo) {
        echo ($key + 1) . "." . $todo->getTitle() . "\n";
    }
}

ReadTodo();
