<?php
require dirname(__FILE__) . '/../vendor/autoload.php';



$client = new PingPong\PingPongClient("localhost:40000", ['credentials' => null]);

function getMessage()
{
    global $client;

    echo "Sending ping message \n";
    $message = new PingPong\Ping();


    $message->setPingMessage("ping");

    list($pong, $status) = $client->SendPingMessage($message)->wait();

    echo "Response " . trim($pong->getPongMessage()) . "\n";
    return;
}

function fooBar()
{
    global $client;

    $message = new PingPong\Foo();

    $message->setFooMessage("foo");

    list($bar, $status) = $client->SendFooMessage($message)->wait();

    return $bar;
}


function main()
{
    getMessage();

    echo "Response " . fooBar()->getBarMessage() . "\n";
}

main();
