<?php


require dirname(__FILE__) . "/../vendor/autoload.php";



function greetUser(string $userName)
{
    //set up the client to send rpc request
    $client = new Greetings\GreetingsClient("localhost:60000", ["credentials" => null]);

    //the service method takes a greet message as parameter
    $greet = new Greetings\Greet();

    $greet->setName($userName);

    //call the method and wait for the response
    list($data, $status) = $client->GreetUser($greet)->wait();

    return $data;
}


$name = $argv[1];

echo greetUser($name)->getResponse() . "\n";
